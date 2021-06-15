var getFormattedDigits = function getFormattedDigits(num) {
	return (num < 10 ? '0' : '') + num;
};

function onLoad() {
	timer();
};

function timer() {
	var date = new Date();
	var date_shotgun = new Date(2021, 9, 8, 23, 00);
	var total_sec = Math.trunc((date_shotgun.getTime() - date.getTime())/1000);
	var diff_jour = getFormattedDigits(Math.trunc(total_sec/3600/24));
	var diff_hour = getFormattedDigits(Math.trunc((total_sec-diff_jour*24*3600)/3600));
	var diff_min = getFormattedDigits(Math.trunc((total_sec-diff_jour*24*3600-diff_hour*3600)/60));
	var diff_sec = getFormattedDigits(Math.trunc(total_sec-diff_jour*24*3600-diff_hour*3600-diff_min*60));
	if (total_sec >= 0){
		$('#counter').html(
			'<div style="grid-area: d_top;">'+diff_jour+'</div>'
			+ '<div style="grid-area: h_top;">'+diff_hour+'</div>'
			+ '<div style="grid-area: m_top;">'+diff_min+'</div>'
			+ '<div style="grid-area: s_top;">'+diff_sec+'</div>'
			+ '<div style="grid-area: d_bottom; font-size:20%;">jour(s)</div>'
			+ '<div style="grid-area: h_bottom; font-size:20%;">heure(s)</div>'
			+ '<div style="grid-area: m_bottom; font-size:20%;">minute(s)</div>'
			+ '<div style="grid-area: s_bottom; font-size:20%;">seconde(s)</div>');
	} else {
		$('#counter').html('00:00:00:00');
	}
	
	var date_content = new Date(2021, 9, 8, 10, 30);
	var total_sec_content = Math.trunc((date_content.getTime() - date.getTime())/1000);
	var diff_jour_content = getFormattedDigits(Math.trunc(total_sec_content/3600/24));
	var diff_hour_content = getFormattedDigits(Math.trunc((total_sec_content-diff_jour_content*24*3600)/3600));
	var diff_min_content = getFormattedDigits(Math.trunc((total_sec_content-diff_jour_content*24*3600-diff_hour_content*3600)/60));
	var diff_sec_content = getFormattedDigits(Math.trunc(total_sec_content-diff_jour_content*24*3600-diff_hour_content*3600-diff_min_content*60));
	if (total_sec_content >= 0){
		$('#ticket_content').html(
			'SHOTGUN AU TARIF NORMAL<br>OUVERTURE LE 11 OCTOBRE A 10H30<br><br>'
			+ diff_jour_content+'j '+diff_hour_content+'h '+diff_min_content+':'+diff_sec_content);
	} else {
		$('#ticket_content').html('SHOTGUN AU TARIF NORMAL<br>OUVERTURE LE 11 OCTOBRE A 10H30<br><br>GO GO GO');
	}
	
	setTimeout(timer,1000);
}

function trailer() {
	$('.trailer').css({height: '100vh'});
	$('.trailer').html('<video style="width:100%;height:100%;" controls controlslist="nodownload" preload="metadata">'
			+ '<source src="https://vid.hyris.tv/encode_tmp/1080p/teaser-qudrabang-2019.mp4" type="video/mp4">'
			+ '</video>');
	$("html, body").stop().animate( { scrollTop: $(".trailer").offset().top }, 500);
}

function drawerLeft() {
	$("html, .perms_grid").stop().animate( { scrollLeft: $("#table1").offset().left }, 500);
	$('#perms_button_right').css({opacity: '1', 'pointer-events': 'auto'});
	$('#perms_button_left').css({opacity: '0', 'pointer-events': 'none'});
}
function drawerRight() {
	$("html, .perms_grid").stop().animate( { scrollLeft: $("#table2").offset().left }, 500);
	$('#perms_button_right').css({opacity: '0', 'pointer-events': 'none'});
	$('#perms_button_left').css({opacity: '1', 'pointer-events': 'auto'});
}