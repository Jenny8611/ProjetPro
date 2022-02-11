<?php
session_start();
require('actions/users/securityAction.php');
require('actions/questions/showAllQuestionsAction.php');
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
    
    <title>ParentSchool - Accueil forum</title>
</head>

<body class="is-preload">

    <!----- Wrapper ----->
    <div id="wrapper">
        <?php include_once('includes/header.php'); ?>
        <?php include_once('includes/navbar.php'); ?>

        <!----- Main ----->
        <div id="main">
            <h1 style="text-align:center">FORUM</h1>

            <!----- Introduction ----->
            <section id="intro" class="main">
                <div class="content">

                    <!-- SI UTILISATEUR AUTHENTIFIE -->
                    <?php
                    if (isset($_SESSION['auth'])) { ?>
                        <div class="align-center">
                            <h1>Bonjour <?= $_SESSION['pseudo'] ?></h1>
                        </div>
                        <br>

                        <form class="row g-2" method="GET">
                            <div class="col-auto">
                                <input type="search" class="form-control" name="search" placeholder="search">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-dark" type="submit">Rechercher</button>
                            </div>
                        </form>
                        <br>

                        <?php
                        while ($question = $getAllQuestions->fetch()) {
                        ?>

                            <div class="card">

                                <h5 class="card-header" style="color: #ff9900;">
                                    <a href="article.php?id= <?= $question['id']; ?> ">
                                        <?= $question['titre']; ?>
                                    </a>
                                </h5>

                                <div class="card-body">
                                    <p class="card-text">
                                        <?= $question['contenu']; ?>
                                    </p>
                                    <br><br>
                                </div>


                                <div class="card-footer">
                                    Publié par <a href="profile.php?id= <?= $question['id_auteur']; ?> " style="color:#ff9900;"> <?= $question['pseudo_auteur']; ?> </a> le <?= $question['date_publication']; ?>
                                </div>

                            </div><!-- fin div card -->
                            <br>
                    <?php
                        }
                    } else {
                        echo "<h5 style='text-align:center'>Veuillez vous connecter pour pouvoir acceder au forum de discussion !</h5>";
                    }
                    ?>
                </div><!-- div content -->
            </section><!-- section main -->
        </div><!-- div main -->
    </div><!-- div wrapper -->
    <?php include('includes/footer.php') ?>
</body>

</html>