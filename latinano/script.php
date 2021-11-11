<script type="text/javascript">
	
	function redirect(url) {
		window.location = url;
	};
	var getFormattedDigits = function getFormattedDigits(num) {
		return (num < 10 ? '0' : '') + num;
		// Fonction qui s'assure qu'on ait bien 2 chiffres dans le chrono, même si <10
	};

	function onLoad() {
		// var bottom_margin = $(".etat").height() + 20 || 0;
		// var top_margin = $(".connexion").height() + 20 || 0;
		// document.body.style.backgroundPosition = "top " + top_margin + "px center, bottom " + bottom_margin + "px center, center";
		timer();
	};
	function select_id(str){
		return document.getElementById(str);
	}

	function timer() {
		var date = new Date();
		// console.log(date);
		<?php //$_SESSION['shotgun'] = false; ?>
		var date_shotgun = new Date(2021, 11, 09, 00, 00, 00);
		var date_soiree = new Date(2021, 11, 08, 23, 00);
		var title = "Ouverture du Shotgun dans :";
		var total_sec = Math.trunc((date_shotgun.getTime() - date.getTime()) / 1000);
		var shotgun = '<?php 
		if (isset($_SESSION['shotgun']) && $_SESSION['shotgun']==true){
			echo 1;
		} else {echo 0;} // sinon on est pas connecté (car dès qu'on est connecté, on définie session(shotgun))
		?>';
		if (shotgun==1){ // Obligé d'utiliser des nombres car convertion php js pourrie
			var total_sec = Math.trunc((date_soiree.getTime() - date.getTime()) / 1000);
			var title = "Début du LATINANO dans :";
		}

		var diff_jour = getFormattedDigits(Math.trunc(total_sec / 3600 / 24));
		var diff_hour = getFormattedDigits(Math.trunc((total_sec - diff_jour * 24 * 3600) / 3600));
		var diff_min = getFormattedDigits(Math.trunc((total_sec - diff_jour * 24 * 3600 - diff_hour * 3600) / 60));
		var diff_sec = getFormattedDigits(Math.trunc(total_sec - diff_jour * 24 * 3600 - diff_hour * 3600 - diff_min * 60));
		if (total_sec >= 0) {
			select_id('titre_sg').innerHTML = '<span>' + title + '</span>';
			// select_id('mois').innerHTML = '<p class="chiffre"> 00 </p>' + '<p class="text">mois(s)</p>';
			select_id('jours').innerHTML = '<p class="chiffre">' + diff_jour + '</p>' + '<p class="text">jours(s)</p>';
			select_id('heures').innerHTML = '<p class="chiffre">' + diff_hour + '</p>' + '<p class="text">heure(s)</p>';
			select_id('minutes').innerHTML = '<p class="chiffre">' + diff_min + '</p>' + '<p class="text">minutes(s)</p>';
			select_id('secondes').innerHTML = '<p class="chiffre">' + diff_sec + '</p>' + '<p class="text">secondes(s)</p>';

		} else {
			select_id('titre_sg').innerHTML = '<span>' + title + '</span>';
			// select_id('mois').innerHTML = '<p class="chiffre"> 00 </p>' + '<p class="text">mois(s)</p>';
			select_id('jours').innerHTML = '<p class="chiffre"> 00 </p>' +	'<p class="text">jours(s)</p>';
			select_id('heures').innerHTML = '<p class="chiffre"> 00 </p>' + '<p class="text">heure(s)</p>';
			select_id('minutes').innerHTML = '<p class="chiffre"> 00 </p>' + '<p class="text">minutes(s)</p>';
			select_id('secondes').innerHTML = '<p class="chiffre"> 00 </p>' + '<p class="text">secondes(s)</p>';
		}

		if (total_sec <= 0) {
			select_id('sg_link').style.cursor = "pointer";
			select_id('sg_link').style.animation = "shotgun 3s ease infinite";
			select_id('sg_link').style.pointerEvents = "Visible" ;
		}
		<?php if ($_SESSION['shotgun']) {
			?>
			select_id('#sg_link').style.cursor = "pointer";
			select_id('#sg_link').style.animation = "shotgun 3s ease infinite";
			select_id('#sg_link').style.pointerEvents = "Visible";
			<?php
		} ?>

		setTimeout(timer, 1000);
	}
</script>