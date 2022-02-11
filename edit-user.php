<?php
session_start();
require('actions/users/securityAction.php');
require('actions/users/showOneUsersProfileAction.php');
require('actions/users/getInfosOfUser.php');
require('actions/users/editUsersAction.php');

?>


<!DOCTYPE html>
<html lang="en">
<?php include 'includes/header.php'; ?>

<body>

    <?php include 'includes/navbar.php'; ?>

    <?php if (isset($errorMsg)) {
        echo '<p>' . $errorMsg . '</p>';
    } ?>

    <?php
    if (isset($_SESSION['id']) && isset($_SESSION['auth']) === true) {
    ?>


        <form method="POST">
            <h2>Modifier votre profil !</h2>
            <br>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" value="<?= $lastname_user; ?>">
            </div>
            <br>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Prenom</label>
                <input type="text" class="form-control" name="prenom" value="<?= $firstname_user; ?>">
            </div>
            <br>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?= $email_user; ?>">
            </div>

            <br>
            <button type="submit" class="btn btn-primary" name="modification">Modifier le profil</button>
        </form>
    <?php
    }
    ?>
</body>

</html>