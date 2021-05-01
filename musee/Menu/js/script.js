document.onkeydown = checkKey;
function checkKey(e) {
	e = e || window.event;
    if (e.which == 81 || e.code == 'KeyA') {
		q()
    }
};

function q() {
	alert('le Q vaincra');
	$('.top').load( 'Q' );
	window.history.pushState('nicoduq', 'Title', '?leQvaincra');
};

function redirect(url) {
	window.location = url;
};

var getFormattedDigits = function getFormattedDigits(num) {
	return (num < 10 ? '0' : '') + num;
};

function onLoad() {
	var date = new Date();
	var dateText = date.getFullYear().toString() +'-'+ (date.getMonth()+1).toString() +'-'+ (date.getDate()+2).toString() + 'T15:00:00Z';
	formatGoogleCalendar.init({
		calendarUrl: 'https://www.googleapis.com/calendar/v3/calendars/jok1aj8d5bjrdi37t72482oouo@group.calendar.google.com/events?key=AIzaSyB8YiMrZWQwVoRXXlfSm2nP8aG2uhloZe8',
		past: false,
		upcoming: true,
		upcomingTopN: 5,
		timeMax:dateText,
		itemsTagName: 'div',
		upcomingSelector: '#events-next',
		upcomingHeading: '<h2>Les événements qui arrivent bientôt</h2>',
		format: ['<p><strong>', '*date*', '</strong><br>', '*summary*', ' &mdash; ', '*description*', '']
	});
	formatGoogleCalendar.init({
		calendarUrl: 'https://www.googleapis.com/calendar/v3/calendars/jok1aj8d5bjrdi37t72482oouo@group.calendar.google.com/events?key=AIzaSyB8YiMrZWQwVoRXXlfSm2nP8aG2uhloZe8',
		past: false,
		upcoming: true,
		upcomingTopN: 10,
		itemsTagName: 'div',
		upcomingSelector: '#events-upcoming',
		upcomingHeading: '<h2>Les autres prochains événements</h2>',
		format: ['<p><strong>', '*date*', '</strong><br>', '*summary*', ' &mdash; ', '*description*', '']
	});
	
	var months_days = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]
	var current_month = new Array();
	var next_month = new Array();
	for (i = 1; i <= months_days[date.getMonth()]; i++) {
		var date_current = new Date(2019, date.getMonth(), i);
		if (date_current.getDay() != 0 && date_current.getDay() != 6) {
			current_month.push(date_current);
		}
	} for (i = 1; i <= months_days[date.getMonth()+1]; i++) {
		var date_next = new Date(2019, date.getMonth()+1, i);
		if (date_next.getDay() != 0 && date_next.getDay() != 6) {
			next_month.push(date_next);
		}
	}
	for (i in current_month) {
		if (current_month[i].getDate() == date.getDate()) {
			document.querySelector('.calendar').insertAdjacentHTML('beforeend', '<div style="z-index:2;background: rgba(150, 0, 0, 0.2); grid-column: '+ current_month[i].getDay().toString() +'; grid-row: '+ parseInt((((current_month[i].getTime() - (new Date(2019, 0, 1)).getTime()) / 86400000) + 2)/7).toString() +';"><p><strong><span class="date">'+getFormattedDigits(current_month[i].getDate())+'.'+(getFormattedDigits(current_month[i].getMonth()+1)).toString()+'</span></strong></p></div>');
		} else {
			document.querySelector('.calendar').insertAdjacentHTML('beforeend', '<div style="z-index:2;background: rgba(150, 150, 150, 0.2); grid-column: '+ current_month[i].getDay().toString() +'; grid-row: '+ parseInt((((current_month[i].getTime() - (new Date(2019, 0, 1)).getTime()) / 86400000) + 2)/7).toString() +';"><p><span class="date">'+getFormattedDigits(current_month[i].getDate())+'.'+(getFormattedDigits(current_month[i].getMonth()+1)).toString()+'</span></p></div>');
		}
	} for (i in next_month) {
		document.querySelector('.calendar').insertAdjacentHTML('beforeend', '<div style="z-index:2;background: rgba(90, 90, 90, 0.2); grid-column: '+ next_month[i].getDay().toString() +'; grid-row: '+ parseInt((((next_month[i].getTime() - (new Date(2019, 0, 1)).getTime()) / 86400000) + 2)/7).toString() +';"><p><span class="date">'+getFormattedDigits(next_month[i].getDate())+'.'+(getFormattedDigits(next_month[i].getMonth()+1)).toString()+'</span></p></div>');
	}
	var dateTextMin = current_month[0].getFullYear().toString() +'-'+ (current_month[0].getMonth()+1).toString() +'-'+ (current_month[0].getDate()).toString() + 'T00:00:00Z';
	var dateTextMax = next_month[next_month.length - 1].getFullYear().toString() +'-'+ (next_month[next_month.length - 1].getMonth()+1).toString() +'-'+ (next_month[next_month.length - 1].getDate()).toString() + 'T23:00:00Z';
	formatGoogleCalendar2.init({
		calendarUrl: 'https://www.googleapis.com/calendar/v3/calendars/jok1aj8d5bjrdi37t72482oouo@group.calendar.google.com/events?key=AIzaSyB8YiMrZWQwVoRXXlfSm2nP8aG2uhloZe8',
		past: true,
		upcoming: true,
		pastTopN: -1,
		upcomingTopN: -1,
		timeMin:dateTextMin,
		timeMax:dateTextMax,
		itemsTagName: 'div',
		upcomingSelector: '.calendar',
		upcomingHeading: '<h2>Calendrier</h2>',
		format: ['<p><strong>', '*date*', '</strong>']
	});
};

function drawerLeft() {
	console.log($('.events').css('left'));
	if ($('.events').css('left') == '-620px') {
		$('.events').css('left', '0px');
		$('#events_parent_button').css('left', '620px');
		document.getElementById("anim_left_in").beginElement();
	} else {
		$('.events').css('left', '-620px');
		$('#events_parent_button').css('left', '0px');
		document.getElementById("anim_left_out").beginElement();
	}
};
function drawerRight() {
	console.log($('#calendar_parent').css('right'));
	if ($('#calendar_parent').css('right') == '0px') {
		$('#calendar_parent').css('right', '-100vw');
		document.getElementById("anim_right_in").beginElement();
	} else {
		$('#calendar_parent').css('right', '0');
		document.getElementById("anim_right_out").beginElement();
	}
};