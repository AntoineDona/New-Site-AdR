const aucun = document.getElementById("reset_button");

aucun.addEventListener('click',toggle);

function toggle(){
    const isChecked = aucun.checked;
    console.log(isChecked);
    if( isChecked == true ){
        Array.from(document.querySelectorAll('input:not(#reset_button)')).forEach(element =>{
            element.checked = false
        });

    }  
}

// Fonction pour sélectionner tous les éléments d'une catégorie
	
function selectAll(categorie_id){
    console.log(categorie_id);
    const all = document.getElementById(categorie_id);
    console.log(all);
    const isChecked = all.checked;
    console.log(isChecked);
    Array.from(document.getElementsByClassName(categorie_id)).forEach(element =>{
        console.log("boucle for ok");
        element.checked = isChecked; 
        console.log(element.checked);
    });
    uncheckNone();
}

function uncheckNone(){
    aucun.checked = false
}
 
function uncheckAll(categorie_id){
    const all = document.getElementById(categorie_id);
    all.checked = false;
    uncheckNone();
}