document.addEventListener("keypress", function (e) {
    var touche = String.fromCharCode(e.charCode); // Récupération de la touche pressée
    // touche = touche.toUpperCase(); // Pour gérer indifféremment minuscules et majuscules
    var couleur = "";
    switch (touche) {
    case "B":
        couleur = "white";
        break;
    case "J":
        couleur = "yellow";
        break;
    case "V":
        couleur = "green";
        break;
    case "R":
        couleur = "red";
        break;
    case "Q":
        q();
        break;
    default:
        console.log("Touche " + touche + " non gérée");
    }
    // Changement de couleur de fond pour toutes les divs
    var divs = document.getElementsByTagName("p");
    for (var i = 0; i < divs.length; i++) {
        divs[i].style.backgroundColor = couleur;
    }
});


// Gestion de l'appui sur une touche du clavier produisant un caractère
var code = "";
document.addEventListener("keypress", function (e) {
    code = code + String.fromCharCode(e.charCode);
    console.log("Vous avez appuyé sur la touche " + String.fromCharCode(e.charCode));
    var regexAlcool = /jaimelalcool/;
    var regexDjadja = /djadja/;
    var regexQuadra = /quadra/;
    var regexNeige = /neige/;
    var regexSydney = /sydney/;
    console.log(code)
    var alcool = "";
    if (regexAlcool.test(code)) {
        alcool = "Adresse invalide";
        console.log(alcool)
        alert('!! Stop Danger Wei !!');
        var pElt = document.querySelector("body");
        //pElt.style.backgroundColor = "red";
        setInterval(function(){
            pElt.style.backgroundColor = "red";
        },400);
        setTimeout(function() {
        setInterval(function(){
            pElt.style.backgroundColor = "black";
        },400);
        }, 200);
        code = "";
        snow.init(100);
        setInterval("alert('Tu trouves ça drôle ?')",5000);
        setTimeout(function() {
        document.location.href="https://www.alcooliques-anonymes.fr/alcool-besoin-d-aide/";
        //$('.bonjour').load( 'https://www.alcooliques-anonymes.fr/alcool-besoin-d-aide/' );
        }, 6000);
        

    }
    if (regexDjadja.test(code)){
        var audio = new Audio('easteregg/djadja.mp3');
        audio.play();
        code = "";
    }
    if (regexQuadra.test(code)){
        var audio = new Audio('easteregg/quadra.mp3');
        audio.play();
        code = "";
    }
    if (regexSydney.test(code)){
        window.open("easteregg/sydney.jpeg","_self");
    }

    if (regexNeige.test(code)){
        function affiche_text(text){
        document.getElementById("neige").innerHTML = text;
    }
    }
});

function stopAlcool(){
        document.location.href="https://www.alcooliques-anonymes.fr/alcool-besoin-d-aide/";
      }



function q() {
    var audio = new Audio('easteregg/victoire.mp3');
    audio.play();
    alert('le Q vaincra');
    var im = document.getElementsByTagName("img") ;
    for (var i = 0; i < im.length; i++) {
        im[i].src="easteregg/Q.svg";
    }
    window.history.pushState('nicoduq', 'Title', '?leQvaincra');
}


/* NEIGE ---------------------------------------------------------------------------------------------*/
var snow = {

    wind : -1,
    maxXrange : 100,
    minXrange : 10,
    maxSpeed : 4,
    minSpeed : 1,
    /*color : "#fff",*/
    char : "🍺",
    maxSize : 60,
    minSize : 8,

    flakes : [],
    WIDTH : 0,
    HEIGHT : 0,

    init : function(nb){
        var o = this,
            frag = document.createDocumentFragment();
        o.getSize();

        

        for(var i = 0; i < nb; i++){
            var flake = {
                x : o.random(o.WIDTH),
                y : - o.maxSize,
                xrange : o.minXrange + o.random(o.maxXrange - o.minXrange),
                yspeed : o.minSpeed + o.random(o.maxSpeed - o.minSpeed, 100),
                life : 0,
                size : o.minSize + o.random(o.maxSize - o.minSize),
                html : document.createElement("span")
            };

            flake.html.style.position = "absolute";
            flake.html.style.top = flake.y + "px";
            flake.html.style.left = flake.x + "px";
            flake.html.style.fontSize = flake.size + "px";
            flake.html.style.color = o.color;
            flake.html.appendChild(document.createTextNode(o.char));

            frag.appendChild(flake.html);
            o.flakes.push(flake);
        }

        document.body.appendChild(frag);
        o.animate();
    },

    animate : function(){
        var o = this;
        for(var i = 0, c = o.flakes.length; i < c; i++){
            var flake = o.flakes[i],
                top = flake.y + flake.yspeed,
                left = flake.x + Math.sin(flake.life) * flake.xrange + o.wind;
            if(top < o.HEIGHT - flake.size - 10 && left < o.WIDTH - flake.size && left > 0){
                flake.html.style.top = top + "px";
                flake.html.style.left = left + "px";
                flake.y = top;
                flake.x += o.wind;
                flake.life+= .01;
            }
            else {
                flake.html.style.top = -o.maxSize + "px";
                flake.x = o.random(o.WIDTH);
                flake.y = -o.maxSize;
                flake.html.style.left = flake.x + "px";
                flake.life = 0;
            }
        }
        setTimeout(function(){
            o.animate();
        },20);
    },

    random : function(range, num){
        var num = num?num:1;
        return Math.floor(Math.random() * (range + 1) * num) / num;
    },

    getSize : function(){
        this.WIDTH = document.body.clientWidth || window.innerWidth;
        this.HEIGHT = document.body.clientHeight || window.innerHeight;
    }

};