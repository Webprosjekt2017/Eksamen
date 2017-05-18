
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge"/>
  <meta name="viewport" content="width=1024"/>
  <title><?= $pageTitle ?></title>
  <!-- SCRIPTS-->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script src="assets/js/nav.js"></script>
  <!-- STYLESHEET-->
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet"/>
  <link rel="stylesheet" href="assets/css/main.css"/>
  <link rel="stylesheet" href="assets/css/nav.css"/>
  <link rel="stylesheet" href="assets/css/footer.css"/>
  <!-- PAGE SPECIFIC -->
    <?php
    if($_GET["destination"] == 'home' || $_GET["destination"] == 'map' || $_GET["destination"] == 'all' || $_GET['destination'] == '') {
      echo '<script src="assets/js/filter.js"></script>';
    }
    if ($_GET["destination"] == 'home' || $_GET["destination"] == 'map' || $_GET['destination'] == '') {
      echo '<link rel="stylesheet" href="assets/css/home.css"/>';
      echo '<link rel="stylesheet" href="assets/css/map.css"/>';
      echo '<script src="assets/js/map.js"></script>';
    } else if ($_GET["destination"] == 'about') {
        echo '<link rel="stylesheet" href="assets/css/about-us.css"/>';
    } else if ($_GET["destination"] == 'contact') {
        echo '<script src="assets/js/contact.js"></script>';
        echo '<link rel="stylesheet" href="assets/css/contact.css"/>';
    } else if ($_GET["destination"] == 'all') {
        echo '<link rel="stylesheet" href="assets/css/see_all.css"/>';
    }
  ?>
</head>
