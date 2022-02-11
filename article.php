<?php
session_start();
require('actions/questions/showArticleContentAction.php');
require('actions/questions/postAnswerAction.php');
require('actions/questions/showAllAnswersOfQuestionAction.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css" />
    </noscript>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <title>Réponse question</title>
</head>


<body class="is-preload">

    <!----- Wrapper ----->
    <div id="wrapper">
        <?php include_once('includes/header.php'); ?>
        <?php include_once('includes/navbar.php'); ?>

        <!----- Main ----->
        <div id="main">

            <div class="container">

                <?php
                if (isset($errorMsg)) {
                    echo $errorMsg;
                }

                if (isset($question_publication_date)) {
                ?>
                    <!-- QUESTION -->
                    <section class="show-content">
                        <div class="p-3 mb-3 bg-light rounded-3">
                            <div class="container-fluid">
                                <h3>
                                    <b style="color:#ff9900"><?= $question_title; ?></b>
                                </h3>
                                <hr> <!-- séparateur de section par une barre horizontale -->
                                <p>
                                    <b><i> <?= $question_content; ?></i></b>
                                </p>
                                <hr>
                                <h6>Auteur : <?= '<a href="profile.php?id=' . $question_id_author . '">' . $question_pseudo_author . '</a> ' . $question_publication_date; ?></h6>
                            </div>
                        </div>
                    </section>

                    <!-- champ  REPONSE -->
                    <section class="show-answers">
                        <form class="form-group" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Votre réponse :</label>
                                <textarea name="answer" class="form-control"></textarea>
                                <br>
                                <button class="btn btn-dark" type="submit" name="validate">Répondre</button>
                            </div>
                        </form>

                        <!-- REPONSE utilisateur -->
                        <?php
                        while ($answer = $getAllAnswersOfThisQuestion->fetch()) {
                        ?>
                            <div class="card">
                                <div class="card-header">Réponse pour :
                                    <a href="profile.php?id=
                                <?= $answer['id_auteur']; ?>">
                                        <?= $question_title; ?>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h6><?= $question_content; ?></h6>
                                    <br>
                                    <h6 style="text-decoration: underline;">Réponse :</h6>
                                    <h6><i><?= $answer['contenu']; ?></i></h6>
                                </div>
                                <div class="card-footer">
                                    Par <?= $_SESSION['pseudo']; ?>
                                    le <?= $date_publication_answer; ?>
                                </div>
                            </div>
                            <br>
                        <?php
                        }
                        ?>
                    </section>
                <?php
                }
                ?>
            </div><!-- fin div container -->
            <span><a href="my-questions.php?id=">Retour</a></span>
        </div> <!-- fin div main -->
    </div> <!-- fin div wrapper -->

    <?php include_once('./includes/footer.php'); ?>
</body>

</html>