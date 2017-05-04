<?php session_start(); ?>

<?php if (!isset($_SESSION['logged_in']) or !$_SESSION['logged_in']) { header("Location: index.php"); }?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
<head>
    <title>Legg til lokasjon</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="ROBOTS" content="ALL"/>
    <meta name="author" content="SJB Solutions"/>
    <meta name="copyright" content="SJB Solutions"/>


    <link rel="stylesheet" href="../assets/css/map.css"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript/" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"/></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/adm-map.js"></script>
    <link href="css/toastr.css" rel="stylesheet" type="text/css"/>
    <script src="js/toastr.js"></script>
    <script>
        $(document).ready(function () {
            $('.day_check').change(function () {
                // gets data-group value and uses it in the outer selector
                // to select the inputs it controls and sets their disabled
                // property to the negated value of it's checked property
                $("." + $(this).data("group")).prop('disabled', this.checked);
            }).change();
        });
    </script>
</head>
<body>

<div class="vertical-center">
    <div class="container">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Legg til lokasjon</div>
                </div>
                <div style="padding-top:30px" class="panel-body">

                    <form action="" id="addlocation" class="form-horizontal" role="form" method="post">

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
                            <span class="input-group-addon">
                                <input type="checkbox" name="tue_skip">
                            </span>
                            <input type="time" class="form-control tuesday" name="time_tuesday_start" disabled required>
                            <input type="time" class="form-control tuesday" name="time_tuesday_end" disabled required>
                        </div>

                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">Åpningstid</span>
                            <span class="input-group-addon">Onsdag</span>
                            <span class="input-group-addon">
                                <input type="checkbox" class="day_check" name="same_wednesday" data-group="wednesday">
                            </span>
                            <span class="input-group-addon">
                                <input type="checkbox" name="wed_skip">
                            </span>
                            <input type="time" class="form-control wednesday" name="time_wednesday_start" disabled required>
                            <input type="time" class="form-control wednesday" name="time_wednesday_end" disabled required>
                        </div>

                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">Åpningstid</span>
                            <span class="input-group-addon">Torsdag</span>
                            <span class="input-group-addon">
                                <input type="checkbox" class="day_check" name="same_thursday" data-group="thursday">
                            </span>
                            <span class="input-group-addon">
                                <input type="checkbox" name="thu_skip">
                            </span>
                            <input type="time" class="form-control thursday" name="time_thursday_start" disabled required>
                            <input type="time" class="form-control thursday" name="time_thursday_end" disabled required>
                        </div>

                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">Åpningstid</span>
                            <span class="input-group-addon">Fredag</span>
                            <span class="input-group-addon">
                                <input type="checkbox" class="day_check" name="same_friday" data-group="friday">
                            </span>
                            <span class="input-group-addon">
                                <input type="checkbox" name="fri_skip">
                            </span>
                            <input type="time" class="form-control friday" name="time_friday_start" disabled required>
                            <input type="time" class="form-control friday" name="time_friday_end" disabled required>
                        </div>

                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">Åpningstid</span>
                            <span class="input-group-addon">Lørdag</span>
                            <span class="input-group-addon">
                                <input type="checkbox" class="day_check" name="same_saturday" data-group="saturday">
                            </span>
                            <span class="input-group-addon">
                                <input type="checkbox" name="sat_skip">
                            </span>
                            <input type="time" class="form-control saturday" name="time_saturday_start" disabled required>
                            <input type="time" class="form-control saturday" name="time_saturday_end" disabled required>
                        </div>

                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">Åpningstid</span>
                            <span class="input-group-addon">Søndag</span>
                            <span class="input-group-addon">
                                <input type="checkbox" class="day_check" name="same_sunday" data-group="sunday">
                            </span>
                            <span class="input-group-addon">
                                <input type="checkbox" name="sun_skip">
                            </span>
                            <input type="time" class="form-control sunday" name="time_sunday_start" disabled required>
                            <input type="time" class="form-control sunday" name="time_sunday_end" disabled required>
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

<div class="container">
        <div class="map">
            <div class="location" style="opacity: 1;" id="dummy"></div>
        </div>
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
    /*$title = $_POST['title'];
    $desc = $_POST['description'];
    $address = $_POST['address'];
    $website = $_POST['website'];
    $takeaway = ($_POST['takeaway'] ? 1 : 0);
    $delivery = ($_POST['delivery'] ? 1 : 0);
    $showTitle = ($_POST['show-title'] ? 1 : 0);
    $campus = strtolower($_POST['campus']);
    $mondayOpen = ($_POST['time_monday_start']) . ":00";
    $mondayClose = ($_POST['time_monday_end']) . ":00";

    $link = new PDO("mysql:host=localhost;dbname=woact_explore;", "root", "password");

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
            "close" => isset($_POST['same_tuesday']) ? $mondayClose : $_POST['time_tuesday_end'] . ":00",
            "skip" => isset($_POST['tue_skip']) ? true : false
        ),
        2 => Array(
            "open" => isset($_POST['same_wednesday']) ? $mondayOpen : $_POST['time_wednesday_start'] . ":00",
            "close" => isset($_POST['same_wednesday']) ? $mondayClose : $_POST['time_wednesday_end'] . ":00",
            "skip" => isset($_POST['wed_skip']) ? true : false
        ),
        3 => Array(
            "open" => isset($_POST['same_thursday']) ? $mondayOpen : $_POST['time_thursday_start'] . ":00",
            "close" => isset($_POST['same_thursday']) ? $mondayClose : $_POST['time_thursday_end'] . ":00",
            "skip" => isset($_POST['thu_skip']) ? true : false
        ),
        4 => Array(
            "open" => isset($_POST['same_friday']) ? $mondayOpen : $_POST['time_friday_start'] . ":00",
            "close" => isset($_POST['same_friday']) ? $mondayClose : $_POST['time_friday_end'] . ":00",
            "skip" => isset($_POST['fri_skip']) ? true : false
        ),
        5 => Array(
            "open" => isset($_POST['same_saturday']) ? $mondayOpen : $_POST['time_saturday_start'] . ":00",
            "close" => isset($_POST['same_saturday']) ? $mondayClose : $_POST['time_saturday_end'] . ":00",
            "skip" => isset($_POST['sat_skip']) ? true : false
        ),
        6 => Array(
            "open" => isset($_POST['same_sunday']) ? $mondayOpen : $_POST['time_sunday_start'] . ":00",
            "close" => isset($_POST['same_sunday']) ? $mondayClose : $_POST['time_sunday_end'] . ":00",
            "skip" => isset($_POST['sun_skip']) ? true : false
        )
    );

    foreach ($timeArr as $key => $val) {
        if (!$val['skip']) {
            $link->prepare('INSERT INTO opening_hours (`loc_id`, `day`, `open`, `close`) VALUES (?, ?, ?, ?)')->
            execute([$locationId, $key, $val['open'], $val['close']]);
        }
    }

    echo('<script type="text/javascript">toastr.success("Lokasjon har blitt lagt til!", "")</script>');
*/
} ?>
    