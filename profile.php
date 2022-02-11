<?php
session_start();
require('actions/users/showOneUsersProfileAction.php');
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

    <title>ParentSchool - Profil</title>
</head>


<body class="is-preload">

    <!----- Wrapper ----->
    <div id="wrapper">
        <?php include_once('includes/header.php'); ?>
        <?php include_once('includes/navbar.php'); ?>

        <!----- Main ----->
        <div id="main">

            <div class="container">

                <h2>Profil de</h2>

                <?php
                if (isset($errorMsg)) {
                    echo $errorMsg;
                }

                if (isset($getHisQuestions)) {

                    // variable "$user_" enregistré dans ShowOneUsersProfileAction
                ?>
                    <div class="card">

                        <h5 class="card-header" style="color: #ff9900;">
                            Pseudo : @<?= $user_pseudo; ?>
                        </h5>

                        <div class="card-body ">
                            <p class="card-text">
                                &bull; Nom : <?= $user_lastname .
                                                    '<br>&bull; Prénom : ' . $user_firstname .
                                                    '<br>&bull; Email : ' . $user_email; ?>
                            </p>
                        </div>
                        <br>
                        <h5 class="card-header" style="color: #ff9900;">
                            Ecole :
                        </h5>

                        <div class="card-body">
                            <p class="card-text">
                                <?= '&bull; Code postal : ' . $user_code_postal .
                                    '<br>&bull; Commune : ' . $user_commune; ?>
                            </p>
                        </div><!-- fin div card-footer -->
                        <br>
                    </div> <!-- fin de div card -->
            </div><!-- fin div premier container -->

            <br><br><br>
            <div class="container">

                <h2>Mes questions postées :</h2>

                <?php
                    while ($question = $getHisQuestions->fetch()) {
                ?>

                    <div class="card">

                        <h5 class="card-header">
                            <a href="article.php?id=<?= $question['id']; ?>">
                                <?= $question['titre']; ?>
                            </a>
                        </h5>

                        <div class="card-body">
                            <p class="card-text">
                                <?= $question['contenu']; ?>
                            </p>
                            <br>
                            <div class="btn-group-sm g-1">
                                <a href="article.php?id=<?= $question['id']; ?>" class="btn btn-primary">Accéder à la question</a></button>
                                <a href="edit-question.php?id=<?= $question['id']; ?>" class="btn btn-warning">Modifier la question</a></button>
                                <a href="actions/questions/deleteQuestionAction.php?id=<?= $question['id']; ?>" class="btn btn-danger" button type="submit" onclick="if (!confirm('Etes-vous sûr de vouloir supprimer la question ?')) {return false} ;">Supprimer la question</a></button>
                            </div>
                        </div>

                        <div class="card-footer">
                            Par <?= $question['pseudo_auteur']; ?>
                            le <?= $question['date_publication']; ?>
                        </div>
                    </div> <!-- fin div card -->
                <?php
                    }
                ?>
            </div> <!-- fin div deuxième container "questions posées -->
        <?php
                }
        ?>
        </div><!-- fin div main -->
    </div><!-- fin div wrapper -->

    <?php include './includes/footer.php'; ?>
</body>

</html>