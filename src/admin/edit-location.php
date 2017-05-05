<?php
session_start();
require_once('../includes/config.php');
require_once('../includes/ExploreDatabase.php');

if (!isset($_SESSION['logged_in']) or !$_SESSION['logged_in']) {
    header("Location: index.php");
}

if ($_SESSION['success']) {
    echo '<script type="text/javascript">toastr.success("Lokasjon har blitt oppdatert!", "")</script>';
    $_SESSION['success'] = false;
}

$db = new ExploreDatabase();
if ($db->getError()) {
    echo('<script type="text/javascript">toastr.error("Kunne ikke koble til tjener","' . $db->getError() . '")</script>');
}
$title = "Endre sted";
include_once('header.php');
?>
<script>
    $(document).ready(function () {
        $('.day_check').change(function () {
            $("." + $(this).data("group")).prop('disabled', this.checked);
        }).change();
    });
</script>
<script type="text/javascript">
    var rowNum = 0;
    function addTag(frm) {
        rowNum++;
        var row = '<div style="margin-bottom: 10px" class="input-group"><span class="input-group-addon">Tag</span><input type="text" class="form-control" name="qtynew[]"></div>';
        jQuery('#tags').append(row);
    }
</script>

<body>
<?php if (!(isset($_POST['update'])) && !(isset($_POST['loc_id']))) { ?>
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
<?php } else if ($_POST['update']) { ?>
    <?php $location = $db->getLocationData($_POST['update']); ?>

    <div class="fluid-container">
        <div style="margin-top:150px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Endre lokasjon</div>
                </div>
                <div style="padding-top:30px" class="panel-body">

                    <form action="" id="editLocation" class="form-horizontal" role="form" method="post">
                        <input type="hidden" name="loc_id" value="<?= $location['id'] ?>">
                        <input type="hidden" name="locationObject" value="<?= htmlentities(serialize($location)) ?>">
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
                            <input type="text" class="form-control" name="address" value="<?= $location['address'] ?>"
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

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php } else if (isset($_POST['locationObject']) && (isset($_POST['loc_id']))) {
    $location = unserialize($_POST['locationObject']);

    $db->beginTransaction();

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

    if ($_POST['address'] != $location['address']) {
        $db->query("UPDATE `locations` SET `address`=:address WHERE `id`=:loc_id");
        $db->bind(":address", $_POST['address']);
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
    if ($_POST['takeaway']) {
        $db->bind(":takeaway", 1);
    } else {
        $db->bind(":takeaway", 0);
    }
    $db->bind(":loc_id", $_POST['loc_id']);
    $db->execute();

    $db->query("UPDATE `locations` SET `delivery`=:delivery WHERE `id`=:loc_id");
    if ($_POST['delivery']) {
        $db->bind(":delivery", 1);
    } else {
        $db->bind(":delivery", 0);
    }
    $db->bind(":loc_id", $_POST['loc_id']);
    $db->execute();

    $db->query("UPDATE `locations` SET `show_title`=:showtitle WHERE `id`=:loc_id");
    if ($_POST['show-title']) {
        $db->bind(":showtitle", 1);
    } else {
        $db->bind(":showtitle", 0);
    }
    $db->bind(":loc_id", $_POST['loc_id']);
    $db->execute();


    if (strtolower($_POST['campus']) != strtolower($location['campus'])) {
        $db->query("UPDATE `locations` SET `campus`=:campus WHERE `id`=:loc_id");
        $db->bind(":campus", strtolower($_POST['campus']));
        $db->bind(":loc_id", $_POST['loc_id']);
        $db->execute();
    }

    if ($_POST['image'] != $location['images'][0]['path']) {
        $db->query("UPDATE `location_images` SET `path`=:path WHERE `loc_id`=:loc_id");
        $db->bind(":path", $_POST['image']);
        $db->bind(":loc_id", $_POST['loc_id']);
        $db->execute();
    }

    foreach ($_POST['qty'] as $key => $val) {
        $db->query("UPDATE `location_tags` SET `tag`=:newtag WHERE `loc_id`=:loc_id AND `tag`=:oldtag");
        $db->bind(":newtag", $val);
        $db->bind(":loc_id", $_POST['loc_id']);
        $db->bind(":oldtag", $location['tags'][$key]['tag']);
        $db->execute();
    }

    foreach ($_POST['qtynew'] as $key => $val) {
        $db->query("INSERT INTO `location_tags` (loc_id, tag) VALUES (:loc_id, :newttag)");
        $db->bind(":loc_id", $_POST['loc_id']);
        $db->bind(":newttag", $val);
        $db->execute();
    }



    $db->endTransaction();
    print_r($db->getError());

    $_SESSION['success'] = true;
    header("Location: edit-location.php");
} ?>
</body>
</html>


