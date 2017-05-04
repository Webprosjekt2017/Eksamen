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
        var row = '<div style="margin-bottom: 10px" class="input-group"><span class="input-group-addon">Tag</span><input type="text" class="form-control" name="qty[]"></div>';
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

        <div style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
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


                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">Åpningstid</span>
                            <span class="input-group-addon">Mandag</span>
                            <input type="time" class="form-control" name="time_monday_start" value="<?= $location['hours'][0]['open'] ?>" required>
                            <input type="time" class="form-control" name="time_monday_end" value="<?= $location['hours'][0]['close'] ?>" required>
                        </div>

                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">Åpningstid</span>
                            <span class="input-group-addon">Tirsdag</span>
                            <span class="input-group-addon">
                                <input type="checkbox" name="tue_skip">
                            </span>
                            <input type="time" class="form-control tuesday" name="time_tuesday_start" value="<?= isset($location['hours'][1]) ? $location['hours'][1]['open'] : ''?>">
                            <input type="time" class="form-control tuesday" name="time_tuesday_end" value="<?= isset($location['hours'][1]) ? $location['hours'][1]['close'] : ''?>">
                        </div>

                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">Åpningstid</span>
                            <span class="input-group-addon">Onsdag</span>
                            <span class="input-group-addon">
                                <input type="checkbox" name="wed_skip">
                            </span>
                            <input type="time" class="form-control wednesday" name="time_wednesday_start" value="<?= isset($location['hours'][2]) ? $location['hours'][2]['open'] : ''?>">
                            <input type="time" class="form-control wednesday" name="time_wednesday_end" value="<?= isset($location['hours'][2]) ? $location['hours'][2]['close'] : ''?>">
                        </div>

                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">Åpningstid</span>
                            <span class="input-group-addon">Torsdag</span>
                            <span class="input-group-addon">
                                <input type="checkbox" name="thu_skip">
                            </span>
                            <input type="time" class="form-control thursday" name="time_thursday_start" value="<?= isset($location['hours'][3]) ? $location['hours'][3]['open'] : ''?>">
                            <input type="time" class="form-control thursday" name="time_thursday_end" value="<?= isset($location['hours'][3]) ? $location['hours'][3]['close'] : ''?>">
                        </div>

                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">Åpningstid</span>
                            <span class="input-group-addon">Fredag</span>
                            <span class="input-group-addon">
                                <input type="checkbox" name="fri_skip">
                            </span>
                            <input type="time" class="form-control friday" name="time_friday_start" value="<?= isset($location['hours'][4]) ? $location['hours'][4]['open'] : ''?>">
                            <input type="time" class="form-control friday" name="time_friday_end" value="<?= isset($location['hours'][4]) ? $location['hours'][4]['close'] : ''?>">
                        </div>

                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">Åpningstid</span>
                            <span class="input-group-addon">Lørdag</span>
                            <span class="input-group-addon">
                                <input type="checkbox" name="sat_skip">
                            </span>
                            <input type="time" class="form-control saturday" name="time_saturday_start" value="<?= isset($location['hours'][5]) ? $location['hours'][5]['open'] : ''?>">
                            <input type="time" class="form-control saturday" name="time_saturday_end" value="<?= isset($location['hours'][5]) ? $location['hours'][5]['close'] : ''?>">
                        </div>

                        <div style="margin-bottom: 10px" class="input-group">
                            <span class="input-group-addon">Åpningstid</span>
                            <span class="input-group-addon">Søndag</span>
                            <span class="input-group-addon">
                                <input type="checkbox" name="sun_skip">
                            </span>
                            <input type="time" class="form-control sunday" name="time_sunday_start" value="<?= isset($location['hours'][6]) ? $location['hours'][6]['open'] : ''?>">
                            <input type="time" class="form-control sunday" name="time_sunday_end" value="<?= isset($location['hours'][6]) ? $location['hours'][6]['close'] : ''?>">
                        </div>

                        <div style="margin-top:10px" class="form-group">
                            <div class="col-sm-12 controls">
                                <input type="submit" class="btn btn-success center-block" value="Gjør endringer!"/>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php } else if (isset($_POST['locationObject']) && (isset($_POST['loc_id']))) {
    $location = unserialize($_POST['locationObject']);

    $db->beginTransaction();



} ?>
</body>
</html>


