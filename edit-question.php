<?php
require('actions/users/securityAction.php');
require('actions/questions/getInfosOfEditedQuestionAction.php');
require('actions/questions/editQuestionAction.php');

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

    <title>ParentSchool - Modifier la question</title>
</head>


<body class="is-preload">

    <!----- Wrapper ----->
    <div id="wrapper">
        <?php include_once('includes/header.php'); ?>
        <?php include_once('includes/navbar.php'); ?>

        <!----- Main ----->
        <div id="main">

            <div class="container">

                <?php if (isset($errorMsg)) {
                    echo '<p>' . $errorMsg . '</p>';
                } ?>

                <?php
                if (isset($question_content)) {
                ?>

                    <form method="POST">
                        <section class="show-content">
                            <div class="p-3 mb-3 bg-light rounded-3">

                                <div class="container">
                                    <div class="row">
                                        <h2>Modifier votre question !</h2>

                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Titre de la question</label>
                                            <input type="text" class="form-control" style="color: #ff9900;" name="title" value="<?= $question_title; ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Contenu de la question</label>
                                            <textarea type="text" class="form-control" style="font-weight: 500;" name="content"><?= $question_content; ?></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-dark" name="validate">Modifier la question</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </section>
                        <span class="retour"><a href="my-questions.php?id=">Retour</a></span>
                    </form>

                <?php
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>