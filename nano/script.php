<script type="text/javascript">
function redirect(url) {
	window.location = url;
};
var getFormattedDigits = function getFormattedDigits(num) {
	return (num < 10 ? '0' : '') + num;
};
function onLoad() {
	var bottom_margin = $(".etat").height() +20 || 0;
	var top_margin = $(".connexion").height() +20 || 0;
	document.body.style.backgroundPosition = "top "+top_margin+"px center, bottom "+bottom_margin+"px center, center";
	timer();
};
//var date_milliseconds = new Date(2019, 10, 3, 22, 0);;
function timer() {
	/*var var_request = new XMLHttpRequest();
	var_request.onload = function() {
		date_milliseconds = this.responseText;
	};
	var_request.open('GET', 'get_date_milliseconds.php', true);
	var_request.send();*/
	var date = new Date();
	<?php
	if ($_SESSION['shotgun']) { 
		echo 'var date_shotgun = new Date(2021, 08, 29, 22, 00);';
		echo 'title = "Début du NANO dans";';
	} else {
		echo 'var date_shotgun = new Date(2021, 08, 28, 21, 00);';
		echo 'title = "Ouverture du shotgun dans";';
	}
	?>
	var total_sec = Math.trunc((date_shotgun.getTime() - date.getTime())/1000);
	var diff_jour = getFormattedDigits(Math.trunc(total_sec/3600/24));
	var diff_hour = getFormattedDigits(Math.trunc((total_sec-diff_jour*24*3600)/3600));
	var diff_min = getFormattedDigits(Math.trunc((total_sec-diff_jour*24*3600-diff_hour*3600)/60));
	var diff_sec = getFormattedDigits(Math.trunc(total_sec-diff_jour*24*3600-diff_hour*3600-diff_min*60));
	if (total_sec >= 0){
		$('#counter').html(
			'<div style="grid-area: title; font-size:40%;">'+title+'</div>'
			+ '<div style="grid-area: d_top;color:var(--text_color);">'+diff_jour+'</div>'
			+ '<div style="grid-area: h_top;color:var(--text_color);">'+diff_hour+'</div>'
			+ '<div style="grid-area: m_top;color:var(--text_color);">'+diff_min+'</div>'
			+ '<div style="grid-area: s_top;color:var(--text_color);">'+diff_sec+'</div>'
			+ '<div style="grid-area: d_bottom; font-size:20%;">jour(s)</div>'
			+ '<div style="grid-area: h_bottom; font-size:20%;">heure(s)</div>'
			+ '<div style="grid-area: m_bottom; font-size:20%;">minute(s)</div>'
			+ '<div style="grid-area: s_bottom; font-size:20%;">seconde(s)</div>');
	} else {
		$('#counter').html(
			'<div style="grid-area: title; font-size:40%;">'+title+'</div>'
			+ '<div style="grid-area: d_top;">'+00+'</div>'
			+ '<div style="grid-area: h_top;">'+00+'</div>'
			+ '<div style="grid-area: m_top;">'+00+'</div>'
			+ '<div style="grid-area: s_top;">'+00+'</div>'
			+ '<div style="grid-area: d_bottom; font-size:20%;">jour(s)</div>'
			+ '<div style="grid-area: h_bottom; font-size:20%;">heure(s)</div>'
			+ '<div style="grid-area: m_bottom; font-size:20%;">minute(s)</div>'
			+ '<div style="grid-area: s_bottom; font-size:20%;">seconde(s)</div>');
	}
	
	if (total_sec <= 0) {
		$('#link').css({ top: '-10px' });
		$('#link').css({ opacity: '1' });
	}
	<?php if ($_SESSION['shotgun']) { 
		echo '$("#link").css({ top: "-10px" });';
		echo '$("#link").css({ opacity: "1" });';
	}?>
	
	setTimeout(timer,1000);
}
</script>
