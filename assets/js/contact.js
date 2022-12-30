document.getElementById("contact").addEventListener("submit", function(e) {
    e.preventDefault();
    let erreur;
    let nom = document.getElementById("name");
    let email = document.getElementById("email");
    let adress = document.getElementById("adress");
    let tel = document.getElementById("tel");
    let message = document.getElementById("comment");

    if (!nom.value) {
        erreur = "Veuillez renseigner un nom"
    }
    if (!email.value) {
        erreur = "Veuillez renseigner un email"
    } 
    if (!adress.value) {
        erreur = "Veuillez renseigner une adresse"
    } 
    if (!tel.value) {
        erreur = "Veuillez renseigner un numéro de téléphone"
    } 
    if (!message.value) {
        erreur = "Veuillez renseigner votre message ou question"
    }
    if (!message.value) {
        erreur = "Vous n'avez pas renseigné le champ message..."
    }
    if (erreur) {
        e.preventDefault();
        document.getElementById("erreur").innerHTML = erreur;
        return false;
    } else {
        alert('Formulaire envoyé !')
    } 
    alert('Formulaire envoyé !')
  });