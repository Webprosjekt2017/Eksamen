<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once('config.php');
require_once('ExploreDatabase.php');

if (Config::REQUIRE_DB) {
    $db = new ExploreDatabase();
    if ($db->getError()) {
        echo 'Connection to database could not be established.';
        echo '<br>';
        echo $db->getError();
        die();
    }
}

$locations = $db->getAllLocationsData();
$days = array('Mandag', 'Tirsdag', 'Onsdag', 'Torsdag', 'Fredag', 'Lørdag', 'Søndag');
foreach ($locations as $location) {
    ?>

    <div class="location" id="<?= strtolower(preg_replace('/\s*/', '', $location['address'])) ?>">
        <div class="hover-title"><?= $location['title'] ?></div>
        <div class="locInfo">

            <img src="<?= $location['images'][0]['path'] ?>" alt="<?= $location['title'] ?>">

            <?php if ($location['show_title']) { ?>
                <h2 class="title"><?= $location['title'] ?></h2>
            <?php }?>

            <div class="tags">
                <?php foreach ($location['tags'] as $tag) { ?>
                    <span><?= $tag['tag'] ?></span>
                <?php } ?>
            </div>

            <?php if ($location['description']) { ?>
                <div class="desc"><?= nl2br($location['description']) ?></div>
            <?php } ?>

            <div class="open">
                <div class="status">Open Now</div>
                <div class="toggleBtn" onClick="showTimes(this)" data-open="false"></div>

                <div class="times">
                    <?php foreach ($location['hours'] as $hours) { ?>
                        <div class="row">
                            <div class="c2"><?= $days[$hours['day']] ?></div>
                            <div class="c2"><?= date("h", strtotime($hours['open'])) ?>
                                - <?= date("h", strtotime($hours['close'])) ?></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!--<div class="subLocations"><a href="#">ico</a><a href="#">ico</a></div>-->
    </div>
<?php } ?>