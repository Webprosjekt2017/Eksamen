
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title><?= $pageTitle ?></title>
  <!-- STYLESHEET-->
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet"/>
  <link rel="stylesheet" href="assets/css/main.css"/>
  <link rel="stylesheet" href="assets/css/map.css"/>
  <link rel="stylesheet" href="assets/css/nav.css"/>
  <link rel="stylesheet" href="assets/css/home.css"/>
    <?php
    if ($_GET["destination"] == 'about') {
        echo '<link rel="stylesheet" href="assets/css/om-oss.css"/>';
    } else if ($_GET["destination"] == 'contact') {
        echo '<link rel="stylesheet" href="assets/css/contact.css"/>';
    } else if ($_GET["destination"] == 'see_all') {
        echo '<link rel="stylesheet" href="assets/css/see_all.css"/>';
    }
  ?>
  <!-- SCRIPTS-->

  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script src="assets/js/nav.js"></script>
  <script src="assets/js/map.js"></script>
  <script src="assets/js/filter.js"></script>
</head>
