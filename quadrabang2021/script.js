var getFormattedDigits = function getFormattedDigits(num) {
	return (num < 10 ? '0' : '') + num;
};

function onLoad() {
	let loading_page = document.querySelector('.loading_page');
	let parallax_group = document.querySelector('.parallax_group');
	loading_page.style.opacity = '0';
	loading_page.style.visibility = 'hidden';
	parallax_group.style.overflowY = 'visible';

	timer();
};

function timer() {
	var date = new Date();
	var date_shotgun = new Date(2021, 9, 8, 23, 00);
	var total_sec = Math.trunc((date_shotgun.getTime() - date.getTime()) / 1000);
	var diff_jour = getFormattedDigits(Math.trunc(total_sec / 3600 / 24));
	var diff_hour = getFormattedDigits(Math.trunc((total_sec - diff_jour * 24 * 3600) / 3600));
	var diff_min = getFormattedDigits(Math.trunc((total_sec - diff_jour * 24 * 3600 - diff_hour * 3600) / 60));
	var diff_sec = getFormattedDigits(Math.trunc(total_sec - diff_jour * 24 * 3600 - diff_hour * 3600 - diff_min * 60));
	if (total_sec >= 0) {
		document.getElementById("counter").innerHTML =
			'<div style="grid-area: d_top;">' + diff_jour + '</div>' +
			'<div style="grid-area: h_top;">' + diff_hour + '</div>' +
			'<div style="grid-area: m_top;">' + diff_min + '</div>' +
			'<div style="grid-area: s_top;">' + diff_sec + '</div>' +
			'<div style="grid-area: d_bottom; font-size:20%;">jour(s)</div>' +
			'<div style="grid-area: h_bottom; font-size:20%;">heure(s)</div>' +
			'<div style="grid-area: m_bottom; font-size:20%;">minute(s)</div>' +
			'<div style="grid-area: s_bottom; font-size:20%;">seconde(s)</div>';
	} else {
		document.getElementById('counter').innerHTML = '00:00:00:00';
	}

	setTimeout(timer, 1000);
}