


var letters = /^[A-Za-z]+$/;

var adressr =/^[a-zA-Z0-9\s\-\#\.]+$/;

let adressInput = document.getElementById("emailInput");

let lNameInput = document.getElementById("nameInput");
let descInput = document.getElementById("reclamationText");
var b= document.getElementById("submit");
//const motDePasseRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{5,}$/;
/////////////////////////////////////


//nom
function nameValidation() {
    if (lNameInput.value.length < 4) {
        lNameError = " Le nom doit compter au minimum 3 caractères.";
        document.getElementById("nomEr").innerHTML = lNameError;

        return false;
    }
    if (!lNameInput.value.match(letters)) {
        lNameError2 = "Veuillez entrer un nom valid ! (seulement des lettres)";
        lNameValid2 = false;
        document.getElementById("nomEr").innerHTML = lNameError2;
        return false;
    }
    document.getElementById("nomEr").innerHTML =
        "<p style='color:green'> Correct </p>";

    return true;
}
lNameInput.addEventListener ("keyup",nameValidation);
//fin nom




//text de reclamation
function descValidation() {
    if (descInput.value.length < 10) {
        descError = " La description doit compter au minimum 10 caractères.";
        document.getElementById("descEr").innerHTML = descError;

        return false;
    }
    
    document.getElementById("descEr").innerHTML =
        "<p style='color:green'> Correct </p>";

    return true;
}
descInput.addEventListener ("keyup",descValidation);
//fin description







function adressValidation() {
    if (adressInput.value.length < 4) {
        lNameError = " L'adresse doit compter au minimum 7 caractères.";
        document.getElementById("adEr").innerHTML = adressError;

        return false;
    }
    if (!adressInput.value.match(letters&&'@')) {
        adressError2 = "Veuillez entrer une adresse valide ! (contient @ )";
        adressValid2 = false;
        document.getElementById("adEr").innerHTML = lNameError2;
        return false;
    }
    document.getElementById("nomEr").innerHTML =
        "<p style='color:green'> Correct </p>";

    return true;
}
lNameInput.addEventListener ("keyup",nameValidation);