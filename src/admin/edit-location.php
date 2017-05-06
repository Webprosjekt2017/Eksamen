<?php
session_start();
require_once('../includes/config.php');
require_once('../includes/ExploreDatabase.php');

if (!isset($_SESSION['logged_in']) or !$_SESSION['logged_in']) {
    header("Location: index.php");
}
?>

<!doctype html>
<html lang="no">
<head>
    <title>Endre sted</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../assets/css/map.css"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          type="text/css"/>
    <script type="text/javascript/"
            src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/adm-map.js"></script>
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

    <script>
        var rowNum = 0;
        function addTag(frm) {
            rowNum++;
            var row = '<div style="margin-bottom: 10px" class="input-group"><span class="input-group-addon">Tag</span><input type="text" class="form-control" name="qtynew[]"></div>';
            jQuery('#tags').append(row);
        }
    </script>
</head>

<?php
$db = new ExploreDatabase();
if ($db->getError()) {
    echo('<script type="text/javascript">toastr.error("Kunne ikke koble til tjener","' . $db->getError() . '")</script>');
}
?>
<body>
<?php if (!(isset($_POST['update'])) && !(isset($_POST['loc_id']))) {
    if (isset($_SESSION['edit_success'])) {
        echo('<script type="text/javascript">toastr.success("Sted har blitt oppdatert.","Lokasjon endret!")</script>');
        unset($_SESSION['edit_success']);
    }
    ?>

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
    <div class="fluid-container">
        <div id="testbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 vh-center">
            <div class="panel-body">
                <form action="" id="remove-location" class="form-horizontal" role="form" method="post">
                    <div style="margin-bottom: 10px" class="input-group">
                        <span class="input-group-addon">Sted</span>
                        <select class="form-control" name="update" required>
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
                            <input type="submit" class="btn btn-primary center-block" value="Gjør endringer!"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } else if (isset($_POST['update'])) { ?>
    <?php $location = $db->getLocationData($_POST['update']); ?>

    <div class="vertical-center">
        <div class="container">
            <div style="margin-top:150px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">Endre lokasjon</div>
                    </div>
                    <div style="padding-top:30px" class="panel-body">

                        <form action="" id="editLocation" class="form-horizontal" role="form" method="post">
                            <input type="hidden" name="posX">
                            <input type="hidden" name="posY">
                            <input type="hidden" name="loc_id" value="<?= $location['id'] ?>">
                            <input type="hidden" name="locationObject"
                                   value="<?= htmlentities(serialize($location)) ?>">
                            <div style="margin-bottom: 10px" class="input-group">
                                <span class="input-group-addon">Tittel</span>
                                <input type="text" class="form-control" name="title" value="<?= $location['title'] ?>"
                                       placeholder="SJB" required>
                            </div>

                            <div style="margin-bottom: 10px" class="input-group">
                                <span class="input-group-addon">Beskrivelse</span>
                                <textarea class="form-control" rows="4" cols="65"
                                          name="description"><?= $location['description'] ?></textarea>
                            </div>

                            <div style="margin-bottom: 10px" class="input-group">
                                <span class="input-group-addon">Adresse</span>
                                <input type="text" class="form-control" name="address"
                                       value="<?= $location['address'] ?>"
                                       placeholder="Chr. Kroghs Gate 32B" required>
                            </div>

                            <div style="margin-bottom: 10px" class="input-group">
                                <span class="input-group-addon">Nettside</span>
                                <input type="text" class="form-control" name="website" value="<?= $location['URL'] ?>"
                                       placeholder="https://kij.no/">
                            </div>

                            <div style="margin-bottom: 10px" class="input-group">
                                <span class="input-group-addon">Telefonnummer</span>
                                <input type="number" class="form-control" name="phone"
                                       value="<?= $location['numbers'][0]['number'] ?>" placeholder="11223344"
                                       maxlength="99999999">
                            </div>

                            <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">
                                <input type="checkbox"
                                       name="takeaway" <?= $location['takeaway'] == 1 ? 'checked' : "" ?>>
                            </span>
                                <span class="input-group-addon">Takeaway</span>
                            </div>

                            <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">
                                <input type="checkbox"
                                       name="delivery" <?= $location['delivery'] == 1 ? 'checked' : "" ?>>
                            </span>
                                <span class="input-group-addon">Levering</span>
                            </div>

                            <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">
                                <input type="checkbox"
                                       name="show-title" <?= $location['show_title'] == 1 ? 'checked' : "" ?>>
                            </span>
                                <span class="input-group-addon">Vis tittel</span>
                            </div>

                            <div style="margin-bottom: 10px" class="input-group">
                                <span class="input-group-addon">Campus</span>
                                <select class="form-control" name="campus" required>
                                    <?php
                                    $dropdown = array('Fjerdingen', 'Vulkan', 'Brenneriveien');
                                    foreach ($dropdown as $option) {
                                        echo '<option value="' . $option . '"' . ($location["campus"] == strtolower($option) ? ' selected' : '') . '>' . $option . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div style="margin-bottom: 10px" class="input-group">
                                <span class="input-group-addon">localhost/assets/imgs/</span>
                                <input type="text" class="form-control" name="image"
                                       value="<?= $location['images'][0]['path'] ?>" placeholder="cat.jpg">
                            </div>

                            <div id="tags">
                                <?php
                                foreach ($location['tags'] as $tag) { ?>
                                    <div style="margin-bottom: 10px" class="input-group">
                                        <span class="input-group-addon">Tag</span>
                                        <input type="text" class="form-control" name="qty[]" value="<?= $tag['tag'] ?>">
                                    </div>
                                <?php } ?>
                            </div>

                            <input style="margin-bottom: 10px" onclick="addTag(this.form);" type="button"
                                   class="btn btn-primary center-block" value="Legg til tag"/>

                            <div style="margin-bottom: 10px" class="input-group">
                                <span class="input-group-addon">Åpningstid</span>
                                <span class="input-group-addon">Mandag</span>
                                <input type="time" class="form-control" name="time_monday_start"
                                       value="<?= $location['hours'][0]['open'] ?>" required>
                                <input type="time" class="form-control" name="time_monday_end"
                                       value="<?= $location['hours'][0]['close'] ?>" required>
                            </div>

                            <div style="margin-bottom: 10px" class="input-group">
                                <span class="input-group-addon">Åpningstid</span>
                                <span class="input-group-addon">Tirsdag</span>
                                <input type="time" class="form-control tuesday" name="time_tuesday_start"
                                       value="<?= $location['hours'][1]['open'] ?>" required>
                                <input type="time" class="form-control tuesday" name="time_tuesday_end"
                                       value="<?= $location['hours'][1]['close'] ?>" required>
                            </div>

                            <div style="margin-bottom: 10px" class="input-group">
                                <span class="input-group-addon">Åpningstid</span>
                                <span class="input-group-addon">Onsdag</span>
                                <input type="time" class="form-control wednesday" name="time_wednesday_start"
                                       value="<?= $location['hours'][2]['open'] ?>" required>
                                <input type="time" class="form-control wednesday" name="time_wednesday_end"
                                       value="<?= $location['hours'][2]['close'] ?>" required>
                            </div>

                            <div style="margin-bottom: 10px" class="input-group">
                                <span class="input-group-addon">Åpningstid</span>
                                <span class="input-group-addon">Torsdag</span>
                                <input type="time" class="form-control thursday" name="time_thursday_start"
                                       value="<?= $location['hours'][3]['open'] ?>" required>
                                <input type="time" class="form-control thursday" name="time_thursday_end"
                                       value="<?= $location['hours'][3]['close'] ?>" required>
                            </div>

                            <div style="margin-bottom: 10px" class="input-group">
                                <span class="input-group-addon">Åpningstid</span>
                                <span class="input-group-addon">Fredag</span>
                                <input type="time" class="form-control friday" name="time_friday_start"
                                       value="<?= $location['hours'][4]['open'] ?>" required>
                                <input type="time" class="form-control friday" name="time_friday_end"
                                       value="<?= $location['hours'][4]['close'] ?>" required>
                            </div>

                            <div style="margin-bottom: 10px" class="input-group">
                                <span class="input-group-addon">Åpningstid</span>
                                <span class="input-group-addon">Lørdag</span>
                                <input type="time" class="form-control saturday" name="time_saturday_start"
                                       value="<?= $location['hours'][5]['open'] ?>" required>
                                <input type="time" class="form-control saturday" name="time_saturday_end"
                                       value="<?= $location['hours'][5]['close'] ?>" required>
                            </div>

                            <div style="margin-bottom: 10px" class="input-group">
                                <span class="input-group-addon">Åpningstid</span>
                                <span class="input-group-addon">Søndag</span>
                                <input type="time" class="form-control sunday" name="time_sunday_start"
                                       value="<?= $location['hours'][6]['open'] ?>" required>
                                <input type="time" class="form-control sunday" name="time_sunday_end"
                                       value="<?= $location['hours'][6]['close'] ?>" required>
                            </div>

                            <div style="margin-top:10px" class="form-group">
                                <div class="col-sm-12 controls">
                                    <input type="submit" class="btn btn-warning center-block" value="Gjør endringer!"/>
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
        $strippedAddress =  strtolower(preg_replace('/\s*/', '', $location['address']));

        foreach ($fjerdingenArr as $key => $val) {
            if ($key != $strippedAddress) {
                echo '<div class="location cFjerdingen" style="opacity: 1; left: ' . $val['x'] . '%; top: ' . $val['y'] . '%;"></div>';
            } else {
                echo "<script>moveLocation(" . $val['x'] . "," . $val['y'] . ")</script>";
            }
        }

        foreach ($brennArr as $key => $val) {
            if ($key != $strippedAddress) {
                echo '<div class="location cBrenneriveien" style="opacity: 0; left: ' . $val['x'] . '%; top: ' . $val['y'] . '%;"></div>';
            } else {
                echo "<script>moveLocation(" . $val['x'] . "," . $val['y'] . ") </script>";
            }
        }

        foreach ($vulkanArr as $key => $val) {
            if ($key != $strippedAddress) {
                echo '<div class="location cVulkan" style="opacity: 0; left: ' . $val['x'] . '%; top: ' . $val['y'] . '%;"></div>';
            } else {
                echo "<script>moveLocation(" . $val['x'] . "," . $val['y'] . ")</script>";
            }
        }
        ?>
    </div>

<?php } else if (isset($_POST['locationObject']) && (isset($_POST['loc_id']))) {
    $location = unserialize($_POST['locationObject']);

    $db->beginTransaction();

    if ($_POST['posX'] != '' && $_POST['posY'] != '') {
        $posX = $_POST['posX'] == '' ? 0 : $_POST['posX'];
        $posY = $_POST['posY'] == '' ? 0 : $_POST['posY'];

        $campusArr = json_decode(file_get_contents(__DIR__ . '/../assets/' . $location['campus'] . '.json'), true);
        $strippedAddress = strtolower(preg_replace('/\s*/', '', $location['address']));
        $campusArr[$strippedAddress]['x'] = $posX;
        $campusArr[$strippedAddress]['y'] = $posY;
        $campusJson = file_put_contents(__DIR__ . '/../assets/' . $location['campus'] . '.json', json_encode($campusArr, true));
    }

    if (strtolower($_POST['campus']) != strtolower($location['campus'])) {

        $originalCampusJson = file_get_contents(__DIR__ . '/../assets/' . strtolower($location['campus']) . '.json');
        $originalCampusArr = json_decode($originalCampusJson, true);

        $strippedAddress = strtolower(preg_replace('/\s*/', '', $location['address']));

        $locCopy = array($strippedAddress => array('x' => $originalCampusArr[$strippedAddress]['x'], 'y' => $originalCampusArr[$strippedAddress]['y']));

        unset($originalCampusArr[$strippedAddress]);
        file_put_contents(__DIR__ . '/../assets/' . strtolower($location['campus']) . '.json', json_encode($originalCampusArr, true));

        $newCampusJson = file_get_contents(__DIR__ . '/../assets/' . strtolower($_POST['campus']) . '.json');
        $newCampusArr = json_decode($newCampusJson, true);

        if (array_key_exists($strippedAddress, $newCampusArr)) {
            echo('<script>toastr.error("Det finnes allerede en lokasjon med denne addressen.", "Lokasjon ikke lagt til!")</script>');
            header("Location: edit-location.php");
            $db->cancelTransaction();
            die();
        }

        $newArr = array_replace($newCampusArr, $locCopy);
        file_put_contents(__DIR__ . '/../assets/' . strtolower($_POST['campus']) . '.json', json_encode($newArr, true));

        $db->query("UPDATE `locations` SET `campus`=:campus WHERE `id`=:loc_id");
        $db->bind(":campus", strtolower($_POST['campus']));
        $db->bind(":loc_id", $_POST['loc_id']);
        $db->execute();
    }


    if ($_POST['address'] != $location['address']) {
        $locJson = file_get_contents(__DIR__ . '/../assets/' . strtolower($_POST['campus']) . '.json');
        $locArr = json_decode($locJson, true);

        $oldAddressKey = strtolower(preg_replace('/\s*/', '', $location['address']));
        $newAddressKey = strtolower(preg_replace('/\s*/', '', $_POST['address']));

        $newLoc = array($newAddressKey => array('x' => $locArr[$oldAddressKey]['x'], 'y' => $locArr[$oldAddressKey]['y']));
        unset($locArr[$oldAddressKey]);

        $newArr = array_replace($locArr, $newLoc);
        file_put_contents(__DIR__ . '/../assets/' . strtolower($_POST['campus']) . '.json', json_encode($newArr, true));

        $db->query("UPDATE `locations` SET `address`=:address WHERE `id`=:loc_id");
        $db->bind(":address", $_POST['address']);
        $db->bind(":loc_id", $_POST['loc_id']);
        $db->execute();
    }

    if ($_POST['title'] != $location['title']) {
        $db->query("UPDATE `locations` SET `title`=:title WHERE `id`=:loc_id");
        $db->bind(":title", $_POST['title']);
        $db->bind(":loc_id", $_POST['loc_id']);
        $db->execute();
    }

    if ($_POST['description'] != $location['description']) {
        $db->query("UPDATE `locations` SET `description`=:description WHERE `id`=:loc_id");
        $db->bind(":description", $_POST['description']);
        $db->bind(":loc_id", $_POST['loc_id']);
        $db->execute();
    }

    if ($_POST['website'] != $location['URL']) {
        $db->query("UPDATE `phone_numbers` SET `number`=:phnumber WHERE `loc_id`=:loc_id");
        $db->bind(":phnumber", $_POST['website']);
        $db->bind(":loc_id", $_POST['loc_id']);
        $db->execute();
    }

    if ($_POST['phone'] != $location['numbers'][0]['number']) {
        $db->query("UPDATE `phone_numbers` SET `number`=:phnum WHERE `loc_id`=:loc_id AND `number`=:old_num");
        $db->bind(":phnum", $_POST['phone']);
        $db->bind(":loc_id", $_POST['loc_id']);
        $db->bind(":old_num", $location['numbers'][0]['number']);
        $db->execute();
    }

    $db->query("UPDATE `locations` SET `takeaway`=:takeaway WHERE `id`=:loc_id");
    if (isset($_POST['takeaway'])) {
        $db->bind(":takeaway", 1);
    } else {
        $db->bind(":takeaway", 0);
    }
    $db->bind(":loc_id", $_POST['loc_id']);
    $db->execute();

    $db->query("UPDATE `locations` SET `delivery`=:delivery WHERE `id`=:loc_id");
    if (isset($_POST['delivery'])) {
        $db->bind(":delivery", 1);
    } else {
        $db->bind(":delivery", 0);
    }
    $db->bind(":loc_id", $_POST['loc_id']);
    $db->execute();

    $db->query("UPDATE `locations` SET `show_title`=:showtitle WHERE `id`=:loc_id");
    if (isset($_POST['show-title'])) {
        $db->bind(":showtitle", 1);
    } else {
        $db->bind(":showtitle", 0);
    }
    $db->bind(":loc_id", $_POST['loc_id']);
    $db->execute();

    if ($_POST['image'] != $location['images'][0]['path']) {
        $db->query("UPDATE `location_images` SET `path`=:path WHERE `loc_id`=:loc_id");
        $db->bind(":path", $_POST['image']);
        $db->bind(":loc_id", $_POST['loc_id']);
        $db->execute();
    }

    if (isset($_POST['qty'])) {
        foreach ($_POST['qty'] as $key => $val) {
            $db->query("UPDATE `location_tags` SET `tag`=:newtag WHERE `loc_id`=:loc_id AND `tag`=:oldtag");
            $db->bind(":newtag", $val);
            $db->bind(":loc_id", $_POST['loc_id']);
            $db->bind(":oldtag", $location['tags'][$key]['tag']);
            $db->execute();
        }
    }

    if (isset($_POST['qtynew'])) {
        foreach ($_POST['qtynew'] as $key => $val) {
            $db->query("INSERT INTO `location_tags` (loc_id, tag) VALUES (:loc_id, :newttag)");
            $db->bind(":loc_id", $_POST['loc_id']);
            $db->bind(":newttag", $val);
            $db->execute();
        }
    }

    $db->query("UPDATE `opening_hours` SET `open`=:newOpen, `close`=:newClose WHERE `loc_id`=:loc_id AND `day`=:dayToUpdate");
    $db->bind(":newOpen", $_POST['time_monday_start']);
    $db->bind(":newClose", $_POST['time_monday_end']);
    $db->bind(":loc_id", $_POST['loc_id']);
    $db->bind(":dayToUpdate", 0);
    $db->execute();

    $db->bind(":newOpen", $_POST['time_tuesday_start']);
    $db->bind(":newClose", $_POST['time_tuesday_end']);
    $db->bind(":loc_id", $_POST['loc_id']);
    $db->bind(":dayToUpdate", 1);
    $db->execute();

    $db->bind(":newOpen", $_POST['time_wednesday_start']);
    $db->bind(":newClose", $_POST['time_wednesday_end']);
    $db->bind(":loc_id", $_POST['loc_id']);
    $db->bind(":dayToUpdate", 2);
    $db->execute();

    $db->bind(":newOpen", $_POST['time_thursday_start']);
    $db->bind(":newClose", $_POST['time_thursday_end']);
    $db->bind(":loc_id", $_POST['loc_id']);
    $db->bind(":dayToUpdate", 3);
    $db->execute();

    $db->bind(":newOpen", $_POST['time_friday_start']);
    $db->bind(":newClose", $_POST['time_friday_end']);
    $db->bind(":loc_id", $_POST['loc_id']);
    $db->bind(":dayToUpdate", 4);
    $db->execute();

    $db->bind(":newOpen", $_POST['time_saturday_start']);
    $db->bind(":newClose", $_POST['time_saturday_end']);
    $db->bind(":loc_id", $_POST['loc_id']);
    $db->bind(":dayToUpdate", 5);
    $db->execute();

    $db->bind(":newOpen", $_POST['time_sunday_start']);
    $db->bind(":newClose", $_POST['time_sunday_end']);
    $db->bind(":loc_id", $_POST['loc_id']);
    $db->bind(":dayToUpdate", 6);
    $db->execute();

    $db->endTransaction();

    $_SESSION['edit_success'] = true;
    echo "<script>window.location = 'edit-location.php'</script>";
    die();
} ?>
</body>
</html>


