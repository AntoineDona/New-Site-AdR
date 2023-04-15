<script type="text/javascript">
	
	function onLoad() {
		// var bottom_margin = $(".etat").height() + 20 || 0;
		// var top_margin = $(".connexion").height() + 20 || 0;
		// document.body.style.backgroundPosition = "top " + top_margin + "px center, bottom " + bottom_margin + "px center, center";
		timer();
	};

	function redirect(url) {
		window.location = url;
	};

	var getFormattedDigits = function getFormattedDigits(num) {
		// Fonction qui s'assure qu'on ait bien 2 chiffres dans le chrono, même si <10
		return (num < 10 ? '0' : '') + num;
	};

	function select_id(str){
		return document.getElementById(str);
	};

	function timer() {
		var date = new Date();
		// console.log(date);
		<?php //$_SESSION['shotgun'] = false; ?>
		var date_shotgun = new Date(2023, 00, 23, 13, 00, 00);
		var date_soiree = new Date(2023, 00, 26, 23, 00);
		var title = "Shotgun dans :";
		var total_sec = Math.trunc((date_shotgun.getTime() - date.getTime()) / 1000);
		var has_shotgun = <?php echo json_encode(isset($_SESSION['shotgun']))?> && <?php echo json_encode($_SESSION['shotgun']) ?>;
		if (has_shotgun){
			var total_sec = Math.trunc((date_soiree.getTime() - date.getTime()) / 1000);
			var title = "AstroNano dans :";
		};
		var diff_jour = getFormattedDigits(Math.trunc(total_sec / 3600 / 24));
		var diff_hour = getFormattedDigits(Math.trunc((total_sec - diff_jour * 24 * 3600) / 3600));
		var diff_min = getFormattedDigits(Math.trunc((total_sec - diff_jour * 24 * 3600 - diff_hour * 3600) / 60));
		var diff_sec = getFormattedDigits(Math.trunc(total_sec - diff_jour * 24 * 3600 - diff_hour * 3600 - diff_min * 60));
		if (total_sec >= 0) {
			select_id('titre_sg').innerHTML = '<span>' + title + '</span>';
			// select_id('mois').innerHTML = '<p class="chiffre"> 00 </p>' + '<p class="text">mois</p>';
			select_id('jours').innerHTML = '<p class="chiffre">' + diff_jour + '</p>' + '<p class="text">jours</p>';
			select_id('heures').innerHTML = '<p class="chiffre">' + diff_hour + '</p>' + '<p class="text">heures</p>';
			select_id('minutes').innerHTML = '<p class="chiffre">' + diff_min + '</p>' + '<p class="text">minutes</p>';
			select_id('secondes').innerHTML = '<p class="chiffre">' + diff_sec + '</p>' + '<p class="text">secondes</p>';

		} else {
			select_id('titre_sg').innerHTML = '<span>' + title + '</span>';
			// select_id('mois').innerHTML = '<p class="chiffre"> 00 </p>' + '<p class="text">mois</p>';
			select_id('jours').innerHTML = '<p class="chiffre"> 00 </p>' +	'<p class="text">jours</p>';
			select_id('heures').innerHTML = '<p class="chiffre"> 00 </p>' + '<p class="text">heures</p>';
			select_id('minutes').innerHTML = '<p class="chiffre"> 00 </p>' + '<p class="text">minutes</p>';
			select_id('secondes').innerHTML = '<p class="chiffre"> 00 </p>' + '<p class="text">secondes</p>';
		}

		if ((total_sec <= 0)) {
			select_id('sg_link').style.cursor = "pointer";
			select_id('sg_link').style.animation = "shotgun 3s ease infinite";
			select_id('sg_link').style.pointerEvents = "Visible" ;
		}
		<?php if ($_SESSION['shotgun']) {
			?>
			select_id('sg_link').style.cursor = "pointer";
			select_id('sg_link').style.animation = "shotgun 3s ease infinite";
			select_id('sg_link').style.pointerEvents = "Visible";
			<?php
		} ?>

		setTimeout(timer, 1000);
	}

</script>