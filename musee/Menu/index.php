<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="content-type">
<title>Menu</title><link rel="icon" type="image/png" href="img/adr_ico.png" />
<link rel="stylesheet" type="text/css" href="main.css" />
</head>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>

<body onload="onLoad()">
<img src="img/adr_anim.svg" style="width:80px;margin:10px;position:fixed;right:0;bottom:0;"/>
<img src="img/logo_musee.png" style="width:80px;margin:10px;position:fixed;left:0;bottom:0;"/>

<div id="body">
	<div id="button_back" onClick="redirect('https://adr.cs-campus.fr/')">
		Retour au site
	</div>
	
	
	<div class="legend">
		<div class="subcontent" style="grid-template-columns:max-content 1fr;">
			<div style="text-align:center">&#127811;</div>
				<div style="line-height:100%;">Ce plat est végétarien</div>
			<div style="text-align:center"><strong style="color:#ee0;">•</strong></div>
				<div style="line-height:100%;">Ce plat fait parti d'une formule</div>
		</div>
	</div>
	<div class="topmenu" style="grid-area: t;">
	</div>
	<div class="top" style="grid-area: a;">
		<img src="img/logo_musee.png"/>
		<h2 style="color:#ed2024;">Viens te régaler au Musée tous les jours de la semaine !</h2>
		<div style="font-family:CaviarDreams;line-height:140%;">Que ce soit pour une petite pause gustative ou pour un repas complet, le Musée t'accueille du lundi au vendredi:<br><br>
		<strong>7h30-9h</strong>: pour un p'tit dej équilibré à 2€ seulement !!<br><br>
		<strong>11h30-14h</strong>: pour un déjeuner complet, formules à 5€, pizzas à 5€, de quoi se nourrir à petits prix<br><br>
		<strong>17h-00h30</strong>: pour retrouver tes potes autour d'une petite pinte, un snack, ou certainement les deux (fermé le vendredi)</div><br>
	</div>
	<div class="content" id="les_menus" style="grid-area: c;">
		<h1>[LES|MENUS]</h1>
		<br>
		<h2>&#8764; Menu étudiant &#8765;</h2>
		<div class="subcontent">
			<div>
			• 1 plat <strong style="color:#ee0;">•</strong><br>
			• 1 dessert<br>
			• 1 soft ou 1 bière <strong style="color:#ee0;">•</strong><br>
			</div>
			<div>
			5<small>,00</small> €
			</div>
		</div><br>
		<h2>&#8764; Menu pizza &#8765;</h2>
		<div class="subcontent">
			<div>
			• 1 pizza <strong style="color:#ee0;">•</strong><br>
			• 1 soft ou 1 bière <strong style="color:#ee0;">•</strong><br>
			</div>
			<div>
			5<small>,70</small> €
			</div>
		</div><br>
		<h2>&#8764; Menu p'tit dej &#8765;</h2>
		<div class="subcontent">
			<div>
			• 1 boisson chaude<br>
			• 1 viennoiserie<br>
			• 1 verre de jus<br>
			</div>
			<div>
			2<small>,00</small> €
			</div>
		</div><br>
	</div>
	<div class="content" id="les_plats" style="grid-area: b;">
		<h1>[LES|PLATS]</h1>
		<br>
		<h2>&#8764; Pizzas &#8765;</h2>
		<div class="subcontent">
			<div onClick="">Reine <strong style="color:#ee0;">•</strong><div class="compo">Composition : Sauce tomate, mozza, jambon, olives, origan</div></div>
				<div>5<small>,00</small> €</div>
			<div onClick="">Poulet <strong style="color:#ee0;">•</strong><div class="compo">Composition : Sauce tomate, mozza, poulet, olives, origan</div></div>
				<div>5<small>,00</small> €</div>
			<div onClick="">Pepperoni <strong style="color:#ee0;">•</strong><div class="compo">Composition : Sauce tomate, mozza, pepperoni, origan</div></div>
				<div>5<small>,00</small> €</div>
			<div onClick="">Kebab <strong style="color:#ee0;">•</strong><div class="compo">Composition : Sauce tomate, mozza, kebab, salade, sauce blanche, origan</div></div>
				<div>5<small>,00</small> €</div>
			<div onClick="">Végétarienne &#127811;<div class="compo">Composition : Sauce tomate, mozza, artichauts, poivrons, tomates, salade, olives, origan</div></div>
				<div>4<small>,50</small> €</div>
			<div onClick="">Margherita &#127811;<div class="compo">Composition : Sauce tomate, mozza, tomates, olives, origan</div></div>
				<div>4<small>,50</small> €</div>
			<div onClick="">3 fromages &#127811;<div class="compo">Composition : Sauce tomate, mozza, chèvre, bleu, origan</div></div>
				<div>6<small>,00</small> €</div>
			<div onClick="">Orientale<div class="compo">Composition : Sauce tomate, mozza, merguez, poivrons, oeuf, olives, origan</div></div>
				<div>6<small>,00</small> €</div>
			<div onClick="">Bœuf<div class="compo">Composition : Sauce tomate, mozza, boulettes de boeuf, poivrons, oeuf, olives, origan</div></div>
				<div>6<small>,00</small> €</div>
			<div onClick="">Saumon<div class="compo">Composition : Crème fraiche, mozza, saumon, origan</div></div>
				<div>6<small>,00</small> €</div>
			<div onClick="">Raclette<div class="compo">Composition : Crème fraiche, mozza, jambon cru, fromage à raclette, origan</div></div>
				<div>5<small>,50</small> €</div>
			<div onClick="">Tartiflette<div class="compo">Composition : Crème fraiche, mozza, reblochon, pommes de terre, lardons, origan</div></div>
				<div>6<small>,00</small> €</div>
			<div onClick="">Chèvre-Miel &#127811;<div class="compo">Composition : Sauce tomate, mozza, chèvre, miel, olives, origan</div></div>
				<div>6<small>,00</small> €</div>
		</div><br>
		<h2>&#8764; Sandwichs &#8765;</h2>
		<div class="subcontent">
			<div onClick="">Jambon/beurre <strong style="color:#ee0;">•</strong><div class="compo">Composition : Jambon, beurre</div></div>
				<div>2<small>,60</small> €</div>
			<div onClick="">Rillettes <strong style="color:#ee0;">•</strong><div class="compo">Composition : Rillettes d'oie</div></div>
				<div>2<small>,60</small> €</div>
			<div onClick="">Bagnat Poulet crudités<div class="compo">Composition : Poulet, tomates, salade</div></div>
				<div>3<small>,60</small> €</div>
			<div onClick="">Jambon de pays/emmental<div class="compo">Composition : Jambon de pays, emmental</div></div>
				<div>3<small>,60</small> €</div>
		</div><br>
		<h2>&#8764; Wrap &#8765;</h2>
		<div class="subcontent">
			<div onClick="">Poulet <strong style="color:#ee0;">•</strong><div class="compo">Composition : Poulet croustillant, salade, tomates</div></div>
				<div>3<small>,50</small> €</div>
			<div onClick="">Chèvre/Miel &#127811; <strong style="color:#ee0;">•</strong><div class="compo">Composition : Chèvre, miel, carottes, salade</div></div>
				<div>3<small>,00</small> €</div>
			<div onClick="">Saumon fumé<div class="compo">Composition : Saumon, salade, tomates</div></div>
				<div>3<small>,50</small> €</div>
		</div><br>
		<h2>&#8764; Salades &#8765;</h2>
		<div class="subcontent">
			<div onClick="">Caesar <strong style="color:#ee0;">•</strong><div class="compo">Composition : Poulet, salade, parmesan, croutons</div></div>
				<div>3<small>,80</small> €</div>
			<div onClick="">Grecque &#127811; <strong style="color:#ee0;">•</strong><div class="compo">Composition : Feta, salade, oignons</div></div>
				<div>3<small>,80</small> €</div>
			<div onClick="">Chef <strong style="color:#ee0;">•</strong><div class="compo">Composition : Jambon, oeuf dur, fromage, crudités</div></div>
				<div>3<small>,80</small> €</div>
			<div onClick="">Italienne <strong style="color:#ee0;">•</strong><div class="compo">Composition : Jambon cru, mozza, tomates séchées, salade</div></div>
				<div>3<small>,80</small> €</div>
		</div><br>
		<h2>&#8764; Quiches &#8765;</h2>
		<div class="subcontent">
			<div onClick="">Lorraine <strong style="color:#ee0;">•</strong></div>
				<div>2<small>,60</small> €</div>
			<div onClick="">Saumon</div>
				<div>3<small>,50</small> €</div>
		</div><br>
		<h2>&#8764; Pasta box &#8765;</h2>
		<div class="subcontent">
			<div onClick="">Bolognaise</div>
				<div>3<small>,50</small> €</div>
			<div onClick="">Saumon</div>
				<div>3<small>,50</small> €</div>
			<div onClick="">Carbonara <strong style="color:#ee0;">•</strong></div>
				<div>3<small>,00</small> €</div>
		</div><br>
		<h2>&#8764; Fritures &#8765;</h2>
		<div class="subcontent">
			<div>Nuggets <small>(10)</small> <strong style="color:#ee0;">•</strong><br></div>
				<div>3<small>,50</small> €</div>
			<div>Mozzarella sticks <small>(9)</small> <strong style="color:#ee0;">•</strong><br></div>
				<div>3<small>,70</small> €</div>
			<div>Calamars à la romaine <small>(10)</small> <strong style="color:#ee0;">•</strong><br></div>
				<div>3<small>,00</small> €</div>
			<div>Wings de poulet <small>(8)</small> <strong style="color:#ee0;">•</strong><br></div>
				<div>3<small>,80</small> €</div>
			<div>Nems <small>(8)</small> <strong style="color:#ee0;">•</strong><br></div>
				<div>3<small>,80</small> €</div>
			<div>Frites<br></div>
				<div>2<small>,00</small> €</div>
                        <div>Saucisses Frites<br></div>
				<div>3<small>,80</small> €</div>
		</div><br>
		<h2>&#8764; Desserts &#8765;</h2>
		<div class="subcontent">
			<div>Tartes / Flan<br></div>
				<div>2<small>,00</small> €</div>
			<div>Cookie / Muffin / Brownie<br></div>
				<div>1<small>,50</small> €</div>
			<div>Donuts / Beignet / Viennoiserie<br></div>
				<div>1<small>,00</small> €</div>
			<div>Fruit<br></div>
				<div>1<small>,00</small> €</div>
			<div>Barquette de fruit<br></div>
				<div>1<small>,50</small> €</div>
			<div>Yahourt nature<br></div>
				<div>0<small>,80</small> €</div>
			<div>Yahourt aux fruits<br></div>
				<div>1<small>,50</small> €</div>
			<div>Glace<br></div>
				<div>2<small>,00</small> €</div>
		</div>
	</div>
	<div class="content" id="le_bar" style="grid-area: d;">
		<h1>[LE|BAR]</h1>
		<br>
		<h2>&#8764; Les pressions &#8765;</h2>
		<div class="subcontent" style="grid-template-columns:1fr max-content max-content;">
			<div><br></div><div>1/2</div><div>Pinte</div>
			<div>• Kronenbourg <small>(4,2%)</small> <strong style="color:#ee0;">•</strong><br></div>
				<div>1<small>,50</small> €</div>
				<div>2<small>,90</small> €</div>
			<div>• Cidre brut <small>(4,5%)</small> <strong style="color:#ee0;">•</strong><br></div>
				<div>1<small>,50</small> €</div>
				<div>2<small>,90</small> €</div>
			<div>• 1664 blanche <small>(5%)</small><br></div>
				<div>2<small>,00</small> €</div>
				<div>3<small>,90</small> €</div>
			<div>• Grim blonde <small>(6,7%)</small><br></div>
				<div>2<small>,00</small> €</div>
				<div>&#8192;/<br></div>
			<div>• Pietra <small>(6%)</small><br></div>
				<div>2<small>,00</small> €</div>
				<div>&#8192;/<br></div>
			<div>• Grim ambrée <small>(6,5%)</small><br></div>
				<div>2<small>,00</small> €</div>
				<div>&#8192;/<br></div>
		</div><br>
		<h2>&#8764; Les bouteilles &#8765;</h2>
		<div class="subcontent">
			<div>Corona <small>(4,7%)</small><br></div>
				<div>2<small>,80</small> €</div>
			<div>Pécheresse <small>(2,5%)</small><br></div>
				<div>2<small>,40</small> €</div>
			<div>Kriek <small>(4%)</small><br></div>
				<div>2<small>,40</small> €</div>
			<div>Mort Subite <small>(?%)</small><br></div>
				<div>2<small>,00</small> €</div>
			<div>Peroni <small>(5,1%)</small><br></div>
				<div>2<small>,00</small> €</div>
			<div>Franziskaner <small>(?%)</small><br></div>
				<div>2<small>,80</small> €</div>
			<div>Cuvée des Trolls <small>(7%)</small><br></div>
				<div>2<small>,00</small> €</div>
			<div>Namur blanche <small>(4,5%)</small><br></div>
				<div>1<small>,90</small> €</div>
			<div>Cidre doux <small>(2,5%)</small> <strong style="color:#ee0;">•</strong><br></div>
				<div>1<small>,50</small> €</div>
			<div>Grim blanche <small>(6%)</small><br></div>
				<div>1<small>,90</small> €</div>
		</div><br>
		<h2>&#8764; Les softs &#8765;</h2>
		<div class="subcontent">
			<div>En canette (33cL) <strong style="color:#ee0;">•</strong><br></div>
				<div>1<small>,00</small> €</div>
			<div>En bouteille (50cL)<br></div>
				<div>1<small>,50</small> €</div>
			<div>Red Bull (25cL)<br></div>
				<div>1<small>,50</small> €</div>
		</div><br>
	</div>
</div>

</body>
</html>
