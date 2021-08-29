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

	function timer() {
		var date = new Date();
		console.log(date);
		<?php //$_SESSION['shotgun'] = false; ?>
		var date_shotgun = new Date(2021, 07, 29, 17, 00, 00);
		var date_soiree = new Date(2021, 07, 29, 23, 00);
		var title = "Ouverture du Shotgun dans :";
		var total_sec = Math.trunc((date_shotgun.getTime() - date.getTime()) / 1000);
		var shotgun = '<?php 
		if (isset($_SESSION['shotgun']) && $_SESSION['shotgun']==true){
			echo 1;
		} else {echo 0;} // sinon on est pas connecté (car dès qu'on est connecté, on définie session(shotgun))
		?>';
		if (shotgun==1){ // Obligé d'utiliser des nombres car convertion php js pourrie
			var total_sec = Math.trunc((date_soiree.getTime() - date.getTime()) / 1000);
			var title = "Début du NANOLYMPIQUE dans :";
		}

		var diff_jour = getFormattedDigits(Math.trunc(total_sec / 3600 / 24));
		var diff_hour = getFormattedDigits(Math.trunc((total_sec - diff_jour * 24 * 3600) / 3600));
		var diff_min = getFormattedDigits(Math.trunc((total_sec - diff_jour * 24 * 3600 - diff_hour * 3600) / 60));
		var diff_sec = getFormattedDigits(Math.trunc(total_sec - diff_jour * 24 * 3600 - diff_hour * 3600 - diff_min * 60));
		if (total_sec >= 0) {
			$('#titre_sg').html(
				'<span>' + title + '</span>'
			);
			$('#mois').html(
				'<p class="chiffre"> 00 </p>' +
				'<p class="text">mois(s)</p>'
			);
			$('#jours').html(
				'<p class="chiffre">' + diff_jour + '</p>' +
				'<p class="text">jours(s)</p>'
			)
			$('#heures').html(
				'<p class="chiffre">' + diff_hour + '</p>' +
				'<p class="text">heure(s)</p>'
			)
			$('#minutes').html(
				'<p class="chiffre">' + diff_min + '</p>' +
				'<p class="text">minutes(s)</p>'
			)
			$('#secondes').html(
				'<p class="chiffre">' + diff_sec + '</p>' +
				'<p class="text">secondes(s)</p>'
			)

		} else {
			$('#titre_sg').html(
				'<span>' + title + '</span>'
			);
			$('#mois').html(
				'<p class="chiffre"> 00 </p>' +
				'<p class="text">mois(s)</p>'
			);
			$('#jours').html(
				'<p class="chiffre"> 00 </p>' +
				'<p class="text">jours(s)</p>'
			)
			$('#heures').html(
				'<p class="chiffre"> 00 </p>' +
				'<p class="text">heure(s)</p>'
			)
			$('#minutes').html(
				'<p class="chiffre"> 00 </p>' +
				'<p class="text">minutes(s)</p>'
			)
			$('#secondes').html(
				'<p class="chiffre"> 00 </p>' +
				'<p class="text">secondes(s)</p>'
			)
		}

		if (total_sec <= 0) {
			$('#sg_link').css({
				cursor: "pointer",
				animation: "shotgun 3s ease infinite",
				"pointer-events": "Visible"
			});
		}
		<?php if ($_SESSION['shotgun']) {
			?>
			$('#sg_link').css({
				cursor: "pointer",
				animation: "shotgun 3s ease infinite",
				"pointer-events": "Visible"
			});
			<?php
		} ?>

		setTimeout(timer, 1000);
	}
</script>