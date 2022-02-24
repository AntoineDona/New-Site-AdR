var getFormattedDigits = function getFormattedDigits(num) {
	return (num < 10 ? '0' : '') + num;
};

function onLoad() {
	timer();
};

function timer() {
	var date = new Date();
	var date_shotgun = new Date(2022, 01, 25, 13, 00);
	var total_sec = Math.trunc((date_shotgun.getTime() - date.getTime()) / 1000);
	var diff_jour = getFormattedDigits(Math.trunc(total_sec / 3600 / 24));
	var diff_hour = getFormattedDigits(Math.trunc((total_sec - diff_jour * 24 * 3600) / 3600));
	var diff_min = getFormattedDigits(Math.trunc((total_sec - diff_jour * 24 * 3600 - diff_hour * 3600) / 60));
	var diff_sec = getFormattedDigits(Math.trunc(total_sec - diff_jour * 24 * 3600 - diff_hour * 3600 - diff_min * 60));
	if (total_sec >= 0) {
		document.getElementById("counter").innerHTML =
			'<div>' + diff_jour + ' :&nbsp</div>' +	
			'<div>' + diff_hour + ' :&nbsp</div>' +
			'<div>' + diff_min + ' :&nbsp</div>' +
			'<div>' + diff_sec + '</div>';
	} else {
		document.getElementById('counter').innerHTML = '00:00:00:00';
	}

	setTimeout(timer, 1000);

	var elmnt = document.getElementById("parallax");
	var prevScrollpos = elmnt.scrollTop;
	var arrows = document.getElementById("arrows");

	elmnt.onscroll = function () {
		var currentScrollPos = elmnt.scrollTop;
		if (currentScrollPos != 0) {
			arrows.style.visibility = "hidden";
		} else {
			arrows.style.visibility = "visible";
		}
		prevScrollpos = currentScrollPos;
	}
}