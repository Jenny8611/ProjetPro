<?php
require('actions/users/securityAction.php');
require('actions/questions/publishQuestionAction.php');
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
    <title>ParentSchool - Publier une question</title>


<body class="is-preload">
    <!----- Wrapper ----->
    <div id="wrapper">
        <?php include_once('includes/header.php'); ?>
        <?php include 'includes/navbar.php'; ?>

        <!----- Main ----->
        <div id="main">

            <form class="container" method="POST">

                <?php
                if (isset($errorMsg)) {
                    echo '<p>' . $errorMsg . '</p>';
                } elseif (isset($successMsg)) {
                    echo '<p>' . $successMsg . '</p>';
                }
                ?>
                <h2>Poser votre question </h2>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Titre de la question</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <!-- <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Description de la question</label>
                <textarea class="form-control" name="description"></textarea>
            </div> -->
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Contenu de la question</label>
                    <textarea type="text" class="form-control" name="content"></textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-dark" name="validate">Publier la question</button>

            </form>
        </div>
    </div> <!-- fin div wrapper -->
</body>

<?php include './includes/footer.php'; ?>

</html>