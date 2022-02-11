<?php

require('actions/database.php');

//Valider le formulaire
if (isset($_POST['validate'])) {

    //Vérifier si les champs ne sont pas vides
    if (!empty($_POST['answer'])) {

        //Les données de la réponse
        $user_answer = nl2br(htmlspecialchars($_POST['answer']));
        $date_publication_answer = date('d/m/Y H:i:s');


        //Insérer la réponse sur la question
        $insertAnswer = $bdd->prepare('INSERT INTO answers(id_auteur, pseudo_auteur, id_question, contenu, date_publication)VALUES(?, ?, ?, ?, ?)');
        $insertAnswer->execute(array($_SESSION['id'], $_SESSION['pseudo'], $idOfTheQuestion, $user_answer, $date_publication_answer));
    }
}
