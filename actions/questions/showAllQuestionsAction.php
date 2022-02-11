<?php

require('actions/database.php');

//Récupérer les questions par défaut sans recherche
$getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, contenu, pseudo_auteur, date_publication FROM questions ORDER BY id DESC LIMIT 0,5');

//Vérifier si une recherche a été rentrée par l'utlisateur
if (isset($_GET['search']) and !empty($_GET['search'])) {

    //La recherche
    $usersSearch = $_GET['search'];

    //Récupérer toutes les questions qui correspondent à la recherche (en fonction du titre)
    $getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, contenu, pseudo_auteur, date_publication FROM questions WHERE titre LIKE "%' . $usersSearch . '%" ORDER BY id ASC');
}
