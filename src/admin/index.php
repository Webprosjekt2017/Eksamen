<?php session_start(); ?>
<?php require_once('1993fkdkau23fjs728fkf90124kfasdf.php') ?>

<!doctype html>
<html lang="no">
<head>
    <meta charset="utf8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrasjon</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/signin.css">
    <link rel="stylesheet" href="css/toastr.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="js/toastr.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<?php if (isset($_POST['password'])) {
    if ($_POST['password'] == LoginDetails::PASSWORD && $_POST['username'] == LoginDetails::USERNAME) {
        $_SESSION['logged_in'] = true;
        echo('<script type="text/javascript">toastr.success("Du har blitt logget inn!","")</script>');
    } else {
        echo('<script type="text/javascript">toastr.error("Feil brukernavn/passord!","")</script>');
    }
} ?>

<?php if (!isset($_SESSION['logged_in']) or !$_SESSION['logged_in']) { ?>
    <div class="container">
        <form action="" role="form" method="post" class="form-signin">
            <h2 class="form-signin-heading text-center">Administrasjon</h2>
            <label for="inputEmail" class="sr-only">Brukernavn</label>
            <input type="text" name="username" class="form-control" placeholder="Brukernavn" required autofocus>
            <label for="inputPassword" class="sr-only">Passord</label>
            <input type="password" name="password" class="form-control" placeholder="Passord" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Logg inn</button>
        </form>
    </div>
<?php } else { ?>

    <div class="container">
        <div style="margin: 150px 250px 10px 250px">
            <button class="btn btn-lg btn-success btn-block" onclick="window.location.href='add-location.php';">Legg til sted</button>
        </div>
        <div style="margin: 0 250px 10px 250px">
            <button class="btn btn-lg btn-warning btn-block" onclick="window.location.href='edit-location.php';">Endre sted</button>
        </div>
        <div style="margin: 0 250px 10px 250px">
            <button class="btn btn-lg btn-danger btn-block" onclick="window.location.href='remove-location.php';">Fjern sted</button>
        </div>
    </div>


<?php } ?>

</body>
</html>