/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/**
 * Format Google Calendar JSON output into human readable list
 *
 * Copyright 2017, Milan Lund
 *
 */

window.formatGoogleCalendar = function () {

    'use strict';

    var config;

    var renderList = function renderList(data, settings) {
        var result = [];

        //Remove cancelled events, sort by date
        result = data.items.filter(function (item) {
            return item && item.hasOwnProperty('status') && item.status !== 'cancelled';
        }).sort(comp).reverse();

        var pastCounter = 0,
            upcomingCounter = 0,
            pastResult = [],
            upcomingResult = [],
            upcomingResultTemp = [],
            upcomingElem = document.querySelector(settings.upcomingSelector),
            pastElem = document.querySelector(settings.pastSelector),
            i;

        if (settings.pastTopN === -1) {
            settings.pastTopN = result.length;
        }

        if (settings.upcomingTopN === -1) {
            settings.upcomingTopN = result.length;
        }

        if (settings.past === false) {
            settings.pastTopN = 0;
        }

        if (settings.upcoming === false) {
            settings.upcomingTopN = 0;
        }

        for (i in result) {

            if (isPast(result[i].end.dateTime || result[i].end.date)) {
                if (pastCounter < settings.pastTopN) {
                    pastResult.push(result[i]);
                    pastCounter++;
                }
            } else {
                upcomingResultTemp.push(result[i]);
            }
        }

        upcomingResultTemp.reverse();

        for (i in upcomingResultTemp) {
            if (upcomingCounter < settings.upcomingTopN) {
                upcomingResult.push(upcomingResultTemp[i]);
                upcomingCounter++;
            }
        }

        for (i in pastResult) {
            pastElem.insertAdjacentHTML('beforeend', transformationList(pastResult[i], settings.itemsTagName, settings.format));
        }

        for (i in upcomingResult) {
            upcomingElem.insertAdjacentHTML('beforeend', transformationList(upcomingResult[i], settings.itemsTagName, settings.format));
        }

        if (upcomingElem.firstChild) {
            upcomingElem.insertAdjacentHTML('beforebegin', settings.upcomingHeading);
        }

        if (pastElem.firstChild) {
            pastElem.insertAdjacentHTML('beforebegin', settings.pastHeading);
        }
    };

    //Gets JSON from Google Calendar and transfroms it into html list items and appends it to past or upcoming events list
    var _init = function _init(settings) {
        config = settings;

        var finalURL = settings.calendarUrl;

        if (settings.recurringEvents) {
            finalURL = finalURL.concat('&singleEvents=true&orderBy=starttime');
        }

        if (settings.timeMin) {
            finalURL = finalURL.concat('&timeMin=' + settings.timeMin);
        };

        if (settings.timeMax) {
            finalURL = finalURL.concat('&timeMax=' + settings.timeMax);
        };

        //Get JSON, parse it, transform into list items and append it to past or upcoming events list
        var request = new XMLHttpRequest();
        request.open('GET', finalURL, true);

        request.onload = function () {
            if (request.status >= 200 && request.status < 400) {
                var data = JSON.parse(request.responseText);
                renderList(data, settings);
            } else {
                console.error(err);
            }
        };

        request.onerror = function () {
            console.error(err);
        };

        request.send();
    };

    //Overwrites defaultSettings values with overrideSettings and adds overrideSettings if non existent in defaultSettings
    var mergeOptions = function mergeOptions(defaultSettings, overrideSettings) {
        var newObject = {},
            i;
        for (i in defaultSettings) {
            newObject[i] = defaultSettings[i];
        }
        for (i in overrideSettings) {
            newObject[i] = overrideSettings[i];
        }
        return newObject;
    };

    var isAllDay = function isAllDay(dateStart, dateEnd) {
        var dateEndTemp = subtractOneDay(dateEnd);
        var isAll = true;

        for (var i = 0; i < 3; i++) {
            if (dateStart[i] !== dateEndTemp[i]) {
                isAll = false;
            }
        }

        return isAll;
    };

    var isSameDay = function isSameDay(dateStart, dateEnd) {
        var isSame = true;

        for (var i = 0; i < 3; i++) {
            if (dateStart[i] !== dateEnd[i]) {
                isSame = false;
            }
        }

        return isSame;
    };

    //Get all necessary data (dates, location, summary, description) and creates a list item
    var transformationList = function transformationList(result, tagName, format) {
        var dateStart = getDateInfo(result.start.dateTime || result.start.date),
            dateEnd = getDateInfo(result.end.dateTime || result.end.date),
            dayNames = config.dayNames,
            moreDaysEvent = true,
            isAllDayEvent = isAllDay(dateStart, dateEnd);

        if (typeof result.end.date !== 'undefined') {
            dateEnd = subtractOneDay(dateEnd);
        }

        if (isSameDay(dateStart, dateEnd)) {
            moreDaysEvent = false;
        }
		
		var infos = result.location.split('|');

        var dateFormatted = getFormattedDate(dateStart, dateEnd, dayNames, moreDaysEvent, isAllDayEvent),
            output = '<' + tagName + ' class="event" style="background:url('+ infos[0] +') No-Repeat center;background-size:cover;">',
            summary = result.summary || '',
            description = result.description || '',
            location = result.location || '',
            i;

        for (i = 0; i < format.length; i++) {
            format[i] = format[i].toString();

            if (format[i] === '*summary*') {
                output = output.concat('<span class="summary">' + summary + '</span>');
            } else if (format[i] === '*date*') {
                output = output.concat('<span class="date">' + dateFormatted + '</span>');
            } else if (format[i] === '*description*') {
                output = output.concat('</p><span style="font-size:80%;font-family:sans-serif;" class="description">' + description + '</span>');
            } else if (format[i] === '*location*') {
                output = output.concat('<span class="location">' + location + '</span>');
            } else {
                if (format[i + 1] === '*location*' && location !== '' || format[i + 1] === '*summary*' && summary !== '' || format[i + 1] === '*date*' && dateFormatted !== '' || format[i + 1] === '*description*' && description !== '') {

                    output = output.concat(format[i]);
                }
            }
        }

        return output + '</' + tagName + '>';
    };

    //Check if date is later then now
    var isPast = function isPast(date) {
        var compareDate = new Date(date),
            now = new Date();

        if (now.getTime() > compareDate.getTime()) {
            return true;
        }

        return false;
    };

    //Get temp array with information abou day in followin format: [day number, month number, year, hours, minutes]
    var getDateInfo = function getDateInfo(date) {
        date = new Date(date);
        return [date.getDate(), date.getMonth(), date.getFullYear(), date.getHours(), date.getMinutes(), 0, 0];
    };

    //Get month name according to index
    var getMonthName = function getMonthName(month) {
        var monthNames = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

        return monthNames[month];
    };

    var getDayName = function getDayName(day) {
        var dayNames = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];

        return dayNames[day];
    };

    var calculateDate = function calculateDate(dateInfo, amount) {
        var date = getDateFormatted(dateInfo);
        date.setTime(date.getTime() + amount);
        return getDateInfo(date);
    };

    var getDayNameFormatted = function getDayNameFormatted(dateFormatted) {
        return getDayName(getDateFormatted(dateFormatted).getDay()) + ' ';
    };

    var getDateFormatted = function getDateFormatted(dateInfo) {
        return new Date(dateInfo[2], dateInfo[1], dateInfo[0], dateInfo[3], dateInfo[4] + 0, 0);
    };

    //Compare dates
    var comp = function comp(a, b) {
        return new Date(a.start.dateTime || a.start.date).getTime() - new Date(b.start.dateTime || b.start.date).getTime();
    };

    //Subtract one day
    var subtractOneDay = function subtractOneDay(dateInfo) {
        return calculateDate(dateInfo, -86400000);
    };

    //Transformations for formatting date into human readable format
    var formatDateSameDay = function formatDateSameDay(dateStart, dateEnd, dayNames) {
        var formattedTime = '',
            dayNameStart = '';

        if (dayNames) {
            dayNameStart = getDayNameFormatted(dateStart);
        }
		
		formattedTime = ' ' + getFormattedTime(dateStart) + ' - ' + getFormattedTime(dateEnd);

        return dayNameStart + ' ' + dateStart[0] + getMonthName(dateStart[1]) + ', ' + formattedTime;
    };

    //Check differences between dates and format them
    var getFormattedDate = function getFormattedDate(dateStart, dateEnd, dayNames, moreDaysEvent, isAllDayEvent) {
        var formattedDate = '';
		formattedDate = formatDateSameDay(dateStart, dateEnd, dayNames);
        return formattedDate;
    };

    var getFormattedTime = function getFormattedTime(date) {
        var formattedTime = '',
            hour = date[3],
            minute = date[4];

        hour = (hour < 10 ? '0' : '') + hour;
        minute = (minute < 10 ? '0' : '') + minute;

        // Format time.
        formattedTime = hour + ':' + minute;
        return formattedTime;
    };

    return {
        init: function init(settingsOverride) {
            var settings = {
                calendarUrl: '',
                past: true,
                upcoming: true,
                sameDayTimes: true,
                dayNames: true,
                pastTopN: -1,
                upcomingTopN: -1,
                recurringEvents: true,
                itemsTagName: 'li',
                upcomingSelector: '#events-upcoming',
                pastSelector: '#events-past',
                upcomingHeading: '<h2>Upcoming events</h2>',
                pastHeading: '<h2>Past events</h2>',
                format: ['*date*', ': ', '*summary*', ' &mdash; ', '*description*', ' in ', '*location*'],
                timeMin: undefined,
                timeMax: undefined
            };

            settings = mergeOptions(settings, settingsOverride);

            _init(settings);
        }
    };
}();

window.formatGoogleCalendar2 = function () {

    'use strict';

    var config;

    var renderList = function renderList(data, settings) {
        var result = [];

        //Remove cancelled events, sort by date
        result = data.items.filter(function (item) {
            return item && item.hasOwnProperty('status') && item.status !== 'cancelled';
        }).sort(comp).reverse();

        var pastCounter = 0,
            upcomingCounter = 0,
            pastResult = [],
            upcomingResult = [],
            upcomingResultTemp = [],
            upcomingElem = document.querySelector(settings.upcomingSelector),
            pastElem = document.querySelector(settings.upcomingSelector),
            i;

        if (settings.pastTopN === -1) {
            settings.pastTopN = result.length;
        }

        if (settings.upcomingTopN === -1) {
            settings.upcomingTopN = result.length;
        }

        if (settings.past === false) {
            settings.pastTopN = 0;
        }

        if (settings.upcoming === false) {
            settings.upcomingTopN = 0;
        }

        for (i in result) {

            if (isPast(result[i].end.dateTime || result[i].end.date)) {
                if (pastCounter < settings.pastTopN) {
                    pastResult.push(result[i]);
                    pastCounter++;
                }
            } else {
                upcomingResultTemp.push(result[i]);
            }
        }

        upcomingResultTemp.reverse();

        for (i in upcomingResultTemp) {
            if (upcomingCounter < settings.upcomingTopN) {
                upcomingResult.push(upcomingResultTemp[i]);
                upcomingCounter++;
            }
        }

        for (i in pastResult) {
            pastElem.insertAdjacentHTML('beforeend', transformationList(pastResult[i], settings.itemsTagName, settings.format));
        }

        for (i in upcomingResult) {
            upcomingElem.insertAdjacentHTML('beforeend', transformationList(upcomingResult[i], settings.itemsTagName, settings.format));
        }

        if (upcomingElem.firstChild) {
            upcomingElem.insertAdjacentHTML('beforebegin', settings.upcomingHeading);
        }
    };

    //Gets JSON from Google Calendar and transfroms it into html list items and appends it to past or upcoming events list
    var _init = function _init(settings) {
        config = settings;

        var finalURL = settings.calendarUrl;

        if (settings.recurringEvents) {
            finalURL = finalURL.concat('&singleEvents=true&orderBy=starttime');
        }

        if (settings.timeMin) {
            finalURL = finalURL.concat('&timeMin=' + settings.timeMin);
        };

        if (settings.timeMax) {
            finalURL = finalURL.concat('&timeMax=' + settings.timeMax);
        };

        //Get JSON, parse it, transform into list items and append it to past or upcoming events list
        var request = new XMLHttpRequest();
        request.open('GET', finalURL, true);

        request.onload = function () {
            if (request.status >= 200 && request.status < 400) {
                var data = JSON.parse(request.responseText);
                renderList(data, settings);
            } else {
                console.error(err);
            }
        };

        request.onerror = function () {
            console.error(err);
        };

        request.send();
    };

    //Overwrites defaultSettings values with overrideSettings and adds overrideSettings if non existent in defaultSettings
    var mergeOptions = function mergeOptions(defaultSettings, overrideSettings) {
        var newObject = {},
            i;
        for (i in defaultSettings) {
            newObject[i] = defaultSettings[i];
        }
        for (i in overrideSettings) {
            newObject[i] = overrideSettings[i];
        }
        return newObject;
    };

    var isAllDay = function isAllDay(dateStart, dateEnd) {
        var dateEndTemp = subtractOneDay(dateEnd);
        var isAll = true;

        for (var i = 0; i < 3; i++) {
            if (dateStart[i] !== dateEndTemp[i]) {
                isAll = false;
            }
        }

        return isAll;
    };

    var isSameDay = function isSameDay(dateStart, dateEnd) {
        var isSame = true;

        for (var i = 0; i < 3; i++) {
            if (dateStart[i] !== dateEnd[i]) {
                isSame = false;
            }
        }

        return isSame;
    };

    //Get all necessary data (dates, location, summary, description) and creates a list item
    var transformationList = function transformationList(result, tagName, format) {
        var dateStart = getDateInfo(result.start.dateTime || result.start.date),
            dateEnd = getDateInfo(result.end.dateTime || result.end.date),
            dayNames = config.dayNames,
            moreDaysEvent = true,
            isAllDayEvent = isAllDay(dateStart, dateEnd);

        if (typeof result.end.date !== 'undefined') {
            dateEnd = subtractOneDay(dateEnd);
        }

        if (isSameDay(dateStart, dateEnd)) {
            moreDaysEvent = false;
        }
		
		var infos = result.location.split('|');

        var dateFormatted = getFormattedDate(dateStart, dateEnd, dayNames, moreDaysEvent, isAllDayEvent),
            output = '<' + tagName + ' onClick="window.open(\''+ infos[1] +'\',\'_top\');" style="cursor:pointer;z-index:3;background:url('+ infos[0] +') No-Repeat center;background-size:cover;grid-column: '+ Math.abs(getDateFormatted(dateStart).getDay()).toString() +'; grid-row: '+ parseInt(((((getDateFormatted(dateStart).getTime() - Date.parse('01 Jan 2019 00:00:00 GMT')) / 86400000) + 1)/7)).toString() +';">',
            summary = result.summary || '',
            description = result.description || '',
            location = result.location || '',
            i;

        for (i = 0; i < format.length; i++) {
            format[i] = format[i].toString();

            if (format[i] === '*summary*') {
                output = output.concat('<span style="margin:10px;font-family:sans-serif;font-size:150%;" class="summary">' + summary + '</span>');
            } else {
                if (format[i + 1] === '*location*' && location !== '' || format[i + 1] === '*summary*' && summary !== '' || format[i + 1] === '*date*' && dateFormatted !== '' || format[i + 1] === '*description*' && description !== '') {
                    output = output.concat(format[i]);
                }
            }
        }

        return output + '</' + tagName + '>';
    };

    //Check if date is later then now
    var isPast = function isPast(date) {
        var compareDate = new Date(date),
            now = new Date();

        if (now.getTime() > compareDate.getTime()) {
            return true;
        }

        return false;
    };

    //Get temp array with information abou day in followin format: [day number, month number, year, hours, minutes]
    var getDateInfo = function getDateInfo(date) {
        date = new Date(date);
        return [date.getDate(), date.getMonth(), date.getFullYear(), date.getHours(), date.getMinutes(), 0, 0];
    };

    //Get month name according to index
    var getMonthName = function getMonthName(month) {
        var monthNames = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
        return monthNames[month];
    };

    var getDayName = function getDayName(day) {
        var dayNames = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
        return dayNames[day];
    };

    var calculateDate = function calculateDate(dateInfo, amount) {
        var date = getDateFormatted(dateInfo);
        date.setTime(date.getTime() + amount);
        return getDateInfo(date);
    };

    var getDayNameFormatted = function getDayNameFormatted(dateFormatted) {
        return getDayName(getDateFormatted(dateFormatted).getDay()) + ' ';
    };

    var getDateFormatted = function getDateFormatted(dateInfo) {
        return new Date(dateInfo[2], dateInfo[1], dateInfo[0], dateInfo[3], dateInfo[4] + 0, 0);
    };

    //Compare dates
    var comp = function comp(a, b) {
        return new Date(a.start.dateTime || a.start.date).getTime() - new Date(b.start.dateTime || b.start.date).getTime();
    };

    //Subtract one day
    var subtractOneDay = function subtractOneDay(dateInfo) {
        return calculateDate(dateInfo, -86400000);
    };

    //Transformations for formatting date into human readable format
    var formatDateSameDay = function formatDateSameDay(dateStart, dateEnd, dayNames) {
        var formattedTime = '',
            dayNameStart = '';

        if (dayNames) {
            dayNameStart = getDayNameFormatted(dateStart);
        }
		
		formattedTime = ' ' + getFormattedTime(dateStart) + ' - ' + getFormattedTime(dateEnd);

        return dayNameStart + ' ' + dateStart[0] + getMonthName(dateStart[1]) + ', ' + formattedTime;
    };

    //Check differences between dates and format them
    var getFormattedDate = function getFormattedDate(dateStart, dateEnd, dayNames, moreDaysEvent, isAllDayEvent) {
        var formattedDate = '';
		formattedDate = formatDateSameDay(dateStart, dateEnd, dayNames);
        return formattedDate;
    };

    var getFormattedTime = function getFormattedTime(date) {
        var formattedTime = '',
            hour = date[3],
            minute = date[4];

        hour = (hour < 10 ? '0' : '') + hour;
        minute = (minute < 10 ? '0' : '') + minute;

        // Format time.
        formattedTime = hour + ':' + minute;
        return formattedTime;
    };

    return {
        init: function init(settingsOverride) {
            var settings = {
                calendarUrl: '',
                past: true,
                upcoming: true,
                sameDayTimes: true,
                dayNames: true,
                pastTopN: -1,
                upcomingTopN: -1,
                recurringEvents: true,
                itemsTagName: 'li',
                upcomingSelector: '#events-upcoming',
                pastSelector: '#events-past',
                upcomingHeading: '<h2>Upcoming events</h2>',
                pastHeading: '<h2>Past events</h2>',
                format: ['*date*', ': ', '*summary*', ' &mdash; ', '*description*', ' in ', '*location*'],
                timeMin: undefined,
                timeMax: undefined
            };

            settings = mergeOptions(settings, settingsOverride);

            _init(settings);
        }
    };
}();

/***/ })
/******/ ]);
//# sourceMappingURL=format-google-calendar.js.map