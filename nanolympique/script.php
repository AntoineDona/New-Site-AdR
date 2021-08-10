<script type="text/javascript">
function redirect(url) {
	window.location = url;
};
var getFormattedDigits = function getFormattedDigits(num) {
	return (num < 10 ? '0' : '') + num;
	// Fonction qui s'assure qu'on ait bien 2 chiffres dans le chrono, même si <10
};
function onLoad() {
	var bottom_margin = $(".etat").height() +20 || 0;
	var top_margin = $(".connexion").height() +20 || 0;
	document.body.style.backgroundPosition = "top "+top_margin+"px center, bottom "+bottom_margin+"px center, center";
	timer();
};

function timer() {
	var date = new Date();
	<?php
	$_SESSION['shotgun'] = false;
	if ($_SESSION['shotgun']) { 
		echo 'var date_shotgun = new Date(2021, 07, 10, 16, 00);';
		echo 'title = "Début du NANOLYMPIQUE dans";';
	} else {
		echo 'var date_shotgun = new Date(2021, 07, 11, 16, 00, 00);';
		echo 'title = "Ouverture du shotgun dans";';
	}
	?>
	var total_sec = Math.trunc((date_shotgun.getTime() - date.getTime())/1000);
	var diff_jour = getFormattedDigits(Math.trunc(total_sec/3600/24));
	var diff_hour = getFormattedDigits(Math.trunc((total_sec-diff_jour*24*3600)/3600));
	var diff_min = getFormattedDigits(Math.trunc((total_sec-diff_jour*24*3600-diff_hour*3600)/60));
	var diff_sec = getFormattedDigits(Math.trunc(total_sec-diff_jour*24*3600-diff_hour*3600-diff_min*60));
	if (total_sec >= 0){
		$('#titre_sg').html(
			'<div class="neon" style="grid-area: title; font-size:40%;">'+title+'</div>'
		);
		$('#mois').html(
			'<p class="chiffre"> 00 </p>'
			+ '<p class="text">mois(s)</p>'
		);
		$('#jours').html(
			'<p class="chiffre">'+diff_jour+'</p>'
			+ '<p class="text">jours(s)</p>'
		)
		$('#heures').html(
			'<p class="chiffre">'+diff_hour+'</p>'
			+ '<p class="text">heure(s)</p>'
		)
		$('#minutes').html(
			'<p class="chiffre">'+diff_min+'</p>'
			+ '<p class="text">minutes(s)</p>'
		)
		$('#secondes').html(
			'<p class="chiffre">'+diff_sec+'</p>'
			+ '<p class="text">secondes(s)</p>'
		)

	} else {
		$('#titre_sg').html(
			'<div class="neon" style="grid-area: title; font-size:40%;">'+title+'</div>'
		);
		$('#counter').html(
			'<div class="neon" style="grid-area: title; font-size:40%;">'+title+'</div>'
			+ '<div class="neon" style="grid-area: d_top;">'+00+'</div>'
			+ '<div class="neon" style="grid-area: h_top;">'+00+'</div>'
			+ '<div class="neon" style="grid-area: m_top;">'+00+'</div>'
			+ '<div class="neon" style="grid-area: s_top;">'+00+'</div>'
			+ '<div class="neon" style="grid-area: d_bottom; font-size:20%;">jour(s)</div>'
			+ '<div class="neon" style="grid-area: h_bottom; font-size:20%;">heure(s)</div>'
			+ '<div class="neon" style="grid-area: m_bottom; font-size:20%;">minute(s)</div>'
			+ '<div class="neon" style="grid-area: s_bottom; font-size:20%;">seconde(s)</div>');
	}
	
	if (total_sec <= 0) {
		$('#link').css({ display: 'block' });
		$('#link').css({ opacity: '1' });
	}
	<?php if ($_SESSION['shotgun']) { 
		echo '$("#link").css({ top: "-10px" });';
		echo '$("#link").css({ opacity: "1" });';
	}?>
	
	setTimeout(timer,1000);
}
</script>
