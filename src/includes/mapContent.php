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
    if ($_POST['campus'] == $location['campus']) {
        ?>

        <div class="location" id="<?= strtolower(preg_replace('/\s*/', '', $location['address'])) ?>">
            <div class="hover-title">
                <div></div><?= $location['title'] ?></div>

            <div class="locInfo">
                <div class="arr"></div>

                <?php if (isset($location['images']['0']['path'])) { ?>
                    <img src="assets/imgs/<?= $location['images'][0]['path'] ?>" alt="<?= $location['title'] ?>">
                <?php } ?>

                <?php if ($location['show_title']) { ?>
                    <h2 class="title"><?= $location['title'] ?></h2>
                <?php } ?>

                <div class="tags">
                    <?php foreach ($location['tags'] as $tag) {
                        if ($tag['tag'] != '') { ?>
                            <span><?= $tag['tag'] ?></span>
                        <?php }
                    } ?>
                </div>

                <div class="desc"><?=nl2br($location['description']) ?></div>

                <?php if(isset($location['URL']) && $location['URL'] != '') { ?>
                    <a class="fanzy" href="<?=$location['URL']?>">Gå til hjemmeside</a>
                    <hr>
                <?php } ?>

                <div class="open">
                    <div class="status">Open Now</div>
                    <div class="toggleBtn" onClick="showTimes(this)" data-open="false"></div>

                    <div class="times">
                        <?php foreach ($location['hours'] as $hours) {
                            if ($hours['open'] != '00:00:00' && $hours['close'] != '00:00:00') { ?>
                                <div class="row">
                                    <div class="c2"><?= $days[$hours['day']] ?></div>
                                    <div class="c2"><?= date("H", strtotime($hours['open'])) ?>
                                        - <?= date("H", strtotime($hours['close'])) ?></div>
                                </div>
                            <?php } else { ?>
                                <div class="row">
                                    <div class="c2"><?= $days[$hours['day']] ?></div>
                                    <div class="c2">Stengt</div>
                                </div>
                            <?php }
                        } ?>
                    </div>
                </div>

            </div>
            <!--<div class="subLocations"><a href="#">ico</a><a href="#">ico</a></div>-->
        </div>
    <?php }
} ?>
