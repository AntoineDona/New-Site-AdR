function submit_form() {
    document.formu1.submit();
    document.formu1.reset();
}
// pour reset le form -> éviter les doublons


function deselectAll() {
    const aucun = document.getElementById("reset_button");
    const isChecked = aucun.checked;
    if (isChecked == true) {
        Array.from(document.querySelectorAll('input:not(#reset_button)')).forEach(element => {
            element.checked = false
        });

    }
}

// Fonction pour sélectionner tous les éléments d'une catégorie

function selectAll(categorie_id) {
    console.log(categorie_id);
    const all = document.getElementById(categorie_id);
    console.log(all);
    const isChecked = all.checked;
    console.log(isChecked);
    Array.from(document.getElementsByClassName(categorie_id)).forEach(element => {
        console.log("boucle for ok");
        element.checked = isChecked;
        console.log(element.checked);
    });
    uncheckNone();
}

function uncheckNone() {
    const aucun = document.getElementById("reset_button");
    aucun.checked = false
}

function uncheckAll(categorie_id) {
    const all = document.getElementById(categorie_id);
    all.checked = false;
    uncheckNone();
}

//Sort arrow display

function displaySort(sessionOrder, sessionSort) {
    // console.log('çatourne');
    // console.log(typeof (sessionOrder));
    const order = document.getElementById(sessionOrder);
    // console.log(order);
    const sort_up = document.getElementById(sessionOrder).querySelector(".sort_up");
    const sort_down = document.getElementById(sessionOrder).querySelector(".sort_down");
    const sort = document.getElementById(sessionOrder).querySelector(".sort");
    // console.log(sort);
    if (sessionSort == 'asc') {//Si on est en asc
        // console.log('on entre dans le 2e if asc');
        sort_up.classList.toggle('active');
    }
    else { // sinon on est desc
        // console.log('on est dans desc');
        // console.log(sort_down);
        sort_down.classList.toggle('active');
    }
    sort.classList.toggle('disable');
    sort.parentElement.parentElement.style.backgroundColor = `white`
    sort.parentElement.parentElement.style.color = `black`

}