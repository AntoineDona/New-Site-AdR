var getFormattedDigits = function getFormattedDigits(num) {
	return (num < 10 ? '0' : '') + num;
};



function timer() {
	var date = new Date();
	var date_shotgun = new Date(2023, 2, 17, 23, 00,00);
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

	var elmnt = document.getElementById("parallax");
	var prevScrollpos = elmnt.scrollTop;
	var navbar = document.getElementById("navbar");
	var nav = document.getElementById("nav-links")

	elmnt.onscroll = function () {
		var currentScrollPos = elmnt.scrollTop;
		if (prevScrollpos >= currentScrollPos || nav.classList.contains("nav-active")) {
			navbar.style.top = "0";
			// console.log(nav.classList.contains("nav-active"));

		} else {
			navbar.style.top = "-8rem";
			navbar.style.opacity = 0;
			// console.log(nav.classList.contains("nav-active"));
		}
		if (currentScrollPos != 0) {
			navbar.style.backgroundColor = "black";
			navbar.style.opacity = 1;
			if (navbar.style.width >= 950) {
				navbar.style.height = "6rem";
			}
		} else {
			navbar.style.backgroundColor = "transparent";
			navbar.style.height = "8rem";
		}
		prevScrollpos = currentScrollPos;
	}
}

const navSlide = () => {
	const burger = document.querySelector('.burger');
	const nav = document.querySelector('.nav-links');
	const navLinks = document.querySelectorAll('.nav-links li');

	burger.addEventListener('click', () => {
		//toggle Nav
		nav.classList.toggle('nav-active');
		//Animate Links
		navLinks.forEach((link, index) => {
			if (link.style.animation) {
				link.style.animation = ''
			} else {
				link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.2}s`;
			}
		});
		//Burger Animation
		burger.classList.toggle('toggle');
	});
	if (document.getElementById("navbar").style.width >= 950) {
		navLinks.forEach((link) => {
			link.addEventListener('click', () => {
				//toggle Nav
				nav.classList.toggle('nav-active');
				//Animate Links
				navLinks.forEach((link, index) => {
					if (link.style.animation) {
						link.style.animation = ''
					} else {
						link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.2}s`;
					}
				});
				//Burger Animation
				burger.classList.toggle('toggle');
			});
		});
	}
}
function onLoad() {
	timer();
	navSlide();
};

