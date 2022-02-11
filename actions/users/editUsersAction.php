<?php

require('actions/database.php');

//Validation du formulaire
if (isset($_POST['modification']) || isset($_SESSION['id'])) {

    //Vérifier si les champs sont remplis
    if (!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['email'])) {

        //Les données à faire passer dans la requête
        $new_lastname = htmlspecialchars($_POST['nom']);
        $new_firstname = htmlspecialchars($_POST['prenom']);
        $new_email = htmlspecialchars($_POST['email']);


        //Modifier les informations de l'utilisateur qui possède l'id rentré en paramêtre dans l'URL
        $editProfilOnWebsite = $bdd->prepare('UPDATE users SET nom = ?, prenom = ?, email = ? WHERE id = ?');
        $editProfilOnWebsite->execute(array($new_lastname, $new_firstname, $new_email, $infosUser));

        //Redirection vers la page d'affichage du profil de l'utilisateur
        header('Location: forum.php');
    } else {
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}
