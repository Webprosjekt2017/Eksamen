<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once ('../includes/config.php');

if (!isset($_SESSION['logged_in']) or !$_SESSION['logged_in']) {
    header("Location: index.php");
} ?>

<!doctype html>
<html lang="no">
<head>
    <title>Legg til sted</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../assets/css/map.css"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          type="text/css"/>
    <script type="text/javascript/" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/adm-map.js"></script>
    <link href="css/toastr.css" rel="stylesheet" type="text/css"/>
    <script src="js/toastr.js"></script>
    <script>
        $(document).ready(function () {
            $('.day_check').change(function () {
                $("." + $(this).data("group")).prop('disabled', this.checked);
            }).change();
        });
    </script>
</head>
<body>
<?php
    if (isset($_SESSION['add_success'])) {
        echo('<script type="text/javascript">toastr.success("Lokasjon har blitt lagt til!", "")</script>');
        unset($_SESSION['add_success']);
    } else if (isset($_SESSION['add_fail'])) {
        echo('<script>toastr.error("Det finnes allerede en lokasjon med denne addressen.", "Lokasjon ikke lagt til!")</script>');
        unset($_SESSION['add_fail']);
    }
?>
<div class="vertical-center">
    <div class="container">
        <div id="" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Legg til lokasjon</div>
                </div>
                <div style="padding-top:30px" class="panel-body">

                    <form action="" id="addlocation" class="form-horizontal" role="form" method="post">
                        <input type="hidden" name="posX">
                        <input type="hidden" name="posY">
                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">Tittel</span>
                            <input type="text" class="form-control" name="title" value="" placeholder="SJB" required>
                        </div>

                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">Beskrivelse</span>
                            <textarea class="form-control" rows="4" cols="65" name="description"></textarea>
                        </div>

                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">Adresse</span>
                            <input type="text" class="form-control" name="address" value=""
                                   placeholder="Chr. Kroghs Gate 32B" required>
                        </div>

                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">Nettside</span>
                            <input type="text" class="form-control" name="website" value=""
                                   placeholder="https://kij.no/">
                        </div>

                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">Telefonnummer</span>
                            <input type="number" class="form-control" name="phone" value="" placeholder="11223344"
                                   maxlength="99999999">
                        </div>

                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">
                                <input type="checkbox" name="takeaway">
                            </span>
                            <span class="input-group-addon">Takeaway</span>
                        </div>

                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">
                                <input type="checkbox" name="delivery">
                            </span>
                            <span class="input-group-addon">Levering</span>
                        </div>

                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">
                                <input type="checkbox" name="show-title">
                            </span>
                            <span class="input-group-addon">Vis tittel</span>
                        </div>

                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">Campus</span>
                            <select class="form-control" name="campus" id="campcamp" onchange="changeMap()" required>
                                <option>Fjerdingen</option>
                                <option>Vulkan</option>
                                <option>Brenneriveien</option>
                            </select>
                        </div>

                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">localhost/assets/imgs/</span>
                            <input type="text" class="form-control" name="image" placeholder="cat.jpg">
                        </div>

                        <div id="tags">
                            <div style="margin-bottom: 10px" class="input-group">
                                <span class="input-group-addon">Tag</span>
                                <input type="text" class="form-control" name="qty[]">
                            </div>
                        </div>

                        <input style="margin-bottom: 10px" onclick="addTag(this.form);" type="button"
                               class="btn btn-primary center-block" value="Legg til tag"/>

                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">Åpningstid</span>
                            <span class="input-group-addon">Mandag</span>
                            <input type="time" class="form-control" name="time_monday_start" required>
                            <input type="time" class="form-control" name="time_monday_end" required>
                        </div>

                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">Åpningstid</span>
                            <span class="input-group-addon">Tirsdag</span>
                            <span class="input-group-addon">
                                <input type="checkbox" class="day_check" name="same_tuesday" data-group="tuesday">
                            </span>
                            <input type="time" class="form-control tuesday" name="time_tuesday_start" disabled>
                            <input type="time" class="form-control tuesday" name="time_tuesday_end" disabled>
                        </div>

                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">Åpningstid</span>
                            <span class="input-group-addon">Onsdag</span>
                            <span class="input-group-addon">
                                <input type="checkbox" class="day_check" name="same_wednesday" data-group="wednesday">
                            </span>
                            <input type="time" class="form-control wednesday" name="time_wednesday_start" disabled>
                            <input type="time" class="form-control wednesday" name="time_wednesday_end" disabled>
                        </div>

                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">Åpningstid</span>
                            <span class="input-group-addon">Torsdag</span>
                            <span class="input-group-addon">
                                <input type="checkbox" class="day_check" name="same_thursday" data-group="thursday">
                            </span>
                            <input type="time" class="form-control thursday" name="time_thursday_start" disabled>
                            <input type="time" class="form-control thursday" name="time_thursday_end" disabled>
                        </div>

                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">Åpningstid</span>
                            <span class="input-group-addon">Fredag</span>
                            <span class="input-group-addon">
                                <input type="checkbox" class="day_check" name="same_friday" data-group="friday">
                            </span>
                            <input type="time" class="form-control friday" name="time_friday_start" disabled>
                            <input type="time" class="form-control friday" name="time_friday_end" disabled>
                        </div>

                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">Åpningstid</span>
                            <span class="input-group-addon">Lørdag</span>
                            <span class="input-group-addon">
                                <input type="checkbox" class="day_check" name="same_saturday" data-group="saturday">
                            </span>
                            <input type="time" class="form-control saturday" name="time_saturday_start" disabled>
                            <input type="time" class="form-control saturday" name="time_saturday_end" disabled>
                        </div>

                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">Åpningstid</span>
                            <span class="input-group-addon">Søndag</span>
                            <span class="input-group-addon">
                                <input type="checkbox" class="day_check" name="same_sunday" data-group="sunday">
                            </span>
                            <input type="time" class="form-control sunday" name="time_sunday_start" disabled>
                            <input type="time" class="form-control sunday" name="time_sunday_end" disabled>
                        </div>
                        <div style="margin-top:10px" class="form-group">
                            <div class="col-sm-12 controls">
                                <input type="submit" class="btn btn-success center-block" value="Legg til!"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="map">
    <div class="location" style="opacity: 1; border: 3px solid deeppink;" id="dummy"></div>

    <?php
    $fjerdingenArr = json_decode(file_get_contents(__DIR__ . '/../assets/fjerdingen.json'), true);
    $brennArr = json_decode(file_get_contents(__DIR__ . '/../assets/brenneriveien.json'), true);
    $vulkanArr = json_decode(file_get_contents(__DIR__ . '/../assets/vulkan.json'), true);

    foreach ($fjerdingenArr as $key => $val) {
        echo '<div class="location cFjerdingen" style="opacity: 1; left: ' . $val['x'] . '%; top: ' . $val['y'] . '%;"></div>';
    }

    foreach ($brennArr as $key => $val) {
        echo '<div class="location cBrenneriveien" style="opacity: 0; left: ' . $val['x'] . '%; top: ' . $val['y'] . '%;"></div>';
    }

    foreach ($vulkanArr as $key => $val) {
        echo '<div class="location cVulkan" style="opacity: 0; left: ' . $val['x'] . '%; top: ' . $val['y'] . '%;"></div>';
    }

    ?>

</div>

<script type="text/javascript">
    var rowNum = 0;
    function addTag(frm) {
        rowNum++;
        var row = '<div style="margin-bottom: 10px" class="input-group"><span class="input-group-addon">Tag</span><input type="text" class="form-control" name="qty[]"></div>';
        jQuery('#tags').append(row);
    }

</script>
</body>
</html>

<?php if (isset($_POST['title']) && (isset($_POST['address'])) && (isset($_POST['campus']))) {

    if ($_POST['posX'] == '' || $_POST['posY'] == '') {
        echo('<script>toastr.error("Velg en punkt på kartet for dette stedet.", "Prøv igjen!")</script>');
        echo "<script>window.location = 'add-location.php'</script>";
        die();
    }

    $link = new PDO('mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_DATABASE . ';charset=utf8', Config::DB_USER, Config::DB_PASSWORD);

    $stmt = $link->prepare('SELECT * FROM `locations` WHERE `address`=?');
    $stmt->bindParam(1, $_POST['address'], PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $_SESSION['add_fail'] = true;
        echo "<script>window.location = 'add-location.php'</script>";
        die();
    }



    $campus = strtolower($_POST['campus']);
    $strippedAddress = strtolower(preg_replace('/\s*/', '', $_POST['address']));

    $locJson = file_get_contents(__DIR__ . '/../assets/' . $campus . '.json');
    $locArr = json_decode($locJson, true);

    if (array_key_exists($strippedAddress, $locArr)) {
        $_SESSION['add_fail'] = true;
        echo "<script>window.location = 'add-location.php'</script>";
        die();
    }

    $locPos = array($strippedAddress => array('x' => $_POST['posX'], 'y' => $_POST['posY']));
    $mergedArray = array_replace($locArr, $locPos);
    $locJson = json_encode($mergedArray, true);
    file_put_contents(__DIR__ . '/../assets/' . $campus . '.json', $locJson);


    $title = $_POST['title'];
    $desc = $_POST['description'];
    $address = $_POST['address'];
    $website = $_POST['website'];
    $takeaway = (isset($_POST['takeaway']) ? 1 : 0);
    $delivery = (isset($_POST['delivery']) ? 1 : 0);
    $showTitle = (isset($_POST['show-title']) ? 1 : 0);
    $mondayOpen = ($_POST['time_monday_start']) . ":00";
    $mondayClose = ($_POST['time_monday_end']) . ":00";


    $insertLocation = $link->prepare('INSERT INTO locations (title, description, address, url, takeaway, delivery, show_title, campus)
        VALUES (:title, :description, :address, :url, :takeaway, :delivery, :show_title, :campus)');

    $insertLocation->execute([
        'title' => $title,
        'description' => $desc,
        'address' => $address,
        'url' => $website,
        'takeaway' => $takeaway,
        'delivery' => $delivery,
        'show_title' => $showTitle,
        'campus' => $campus
    ]);

    $locationId = $link->lastInsertId();

    if (isset($_POST['image'])) {
        $link->prepare('INSERT INTO location_images (loc_id, path) VALUES (?, ?)')->execute([$locationId, $_POST['image']]);
    }


    if (!empty($_POST['qty'])) {
        foreach ($_POST['qty'] as $cnt => $qty) {
            $link->prepare('INSERT INTO location_tags (loc_id, tag) VALUES (?, ?)')->execute([$locationId, $qty]);
        }
    }

    if (isset($_POST['phone'])) {
        $link->prepare('INSERT INTO phone_numbers (loc_id, country_code, `number`) VALUES (?, 47, ?)')->execute([$locationId, $_POST['phone']]);
    }

    $timeArr = Array(
        0 => Array(
            "open" => $mondayOpen,
            "close" => $mondayClose
        ),
        1 => Array(
            "open" => isset($_POST['same_tuesday']) ? $mondayOpen : $_POST['time_tuesday_start'] . ":00",
            "close" => isset($_POST['same_tuesday']) ? $mondayClose : $_POST['time_tuesday_end'] . ":00"
        ),
        2 => Array(
            "open" => isset($_POST['same_wednesday']) ? $mondayOpen : $_POST['time_wednesday_start'] . ":00",
            "close" => isset($_POST['same_wednesday']) ? $mondayClose : $_POST['time_wednesday_end'] . ":00"
        ),
        3 => Array(
            "open" => isset($_POST['same_thursday']) ? $mondayOpen : $_POST['time_thursday_start'] . ":00",
            "close" => isset($_POST['same_thursday']) ? $mondayClose : $_POST['time_thursday_end'] . ":00"
        ),
        4 => Array(
            "open" => isset($_POST['same_friday']) ? $mondayOpen : $_POST['time_friday_start'] . ":00",
            "close" => isset($_POST['same_friday']) ? $mondayClose : $_POST['time_friday_end'] . ":00"
        ),
        5 => Array(
            "open" => isset($_POST['same_saturday']) ? $mondayOpen : $_POST['time_saturday_start'] . ":00",
            "close" => isset($_POST['same_saturday']) ? $mondayClose : $_POST['time_saturday_end'] . ":00"
        ),
        6 => Array(
            "open" => isset($_POST['same_sunday']) ? $mondayOpen : $_POST['time_sunday_start'] . ":00",
            "close" => isset($_POST['same_sunday']) ? $mondayClose : $_POST['time_sunday_end'] . ":00"
        )
    );

    foreach ($timeArr as $key => $val) {
        if ($val['open'] == ':00') {
            $val['open'] = '00:00:00';
        }
        if ($val['open'] == ':00') {
            $val['open'] = '00:00:00';
        }
        $link->prepare('INSERT INTO opening_hours (`loc_id`, `day`, `open`, `close`) VALUES (?, ?, ?, ?)')->execute([$locationId, $key, $val['open'], $val['close']]);
    }


    $_SESSION['add_success'] = true;
    echo "<script>window.location = 'add-location.php'</script>";
    die();

} ?>
    