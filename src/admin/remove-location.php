<?php
session_start();
require_once('../includes/config.php');
require_once('../includes/ExploreDatabase.php');

if (!isset($_SESSION['logged_in']) or !$_SESSION['logged_in']) {
    header("Location: index.php");
}

if ($_SESSION['success']) {
    echo '<script type="text/javascript">toastr.success("Lokasjon har blitt fjernet!", "")</script>';
    $_SESSION['success'] = false;
}

$db = new ExploreDatabase();
if ($db->getError()) {
    echo('<script type="text/javascript">toastr.error("Kunne ikke koble til tjener","' . $db->getError() . '")</script>');
}
?>

<!doctype html>
<html lang="no">
<head>
    <title>Fjern sted</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          type="text/css"/>
    <script type="text/javascript/"
            src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <link href="css/toastr.css" rel="stylesheet" type="text/css"/>
    <script src="js/toastr.js"></script>

    <style>
        html,
        body,
        .vh-center {
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -ms-flex-align: center;
            -webkit-align-items: center;
            -webkit-box-align: center;
            align-items: center;
            height: 100%;
        }
    </style>
</head>


<body>
<div class="fluid-container">
    <div id="testbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 vh-center">
        <div class="panel-body">
            <form action="delete.php" id="remove-location" class="form-horizontal" role="form" method="post">
                <div style="margin-bottom: 10px" class="input-group">
                    <span class="input-group-addon">Sted</span>
                    <select class="form-control" name="delete" required>
                        <?php
                        $locations = $db->getAllLocations();
                        foreach ($locations as $location) { ?>
                            <option value="<?= $location['address'] ?>"><?= $location['title'] ?>
                                – <?= $location['address'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div style="margin-top:10px" class="form-group">
                    <div class="col-sm-12 controls">
                        <input type="submit" class="btn btn-danger center-block" value="Fjern fra databasen!"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

