<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once('includes/config.php');
require_once('includes/ExploreDatabase.php');

if (Config::REQUIRE_DB) {
    $db = new ExploreDatabase();
    if ($db->getError()) {
        echo 'Connection to database could not be established.';
        echo '<br>';
        echo $db->getError();
        die();
    }
}

$fjerdingen = $db->getAllCampusLocation('fjerdingen');
$vulkan = $db->getAllCampusLocation('vulkan');
$brenneriveien = $db->getAllCampusLocation('brenneriveien');
$days = array('Mandag', 'Tirsdag', 'Onsdag', 'Torsdag', 'Fredag', 'Lørdag', 'Søndag');

?>


<div id="see_all_container">
    <h1>Vis alt</h1>
    <h3 id="titleC">Fjerdingen</h3>
    <?php
    $counter = 1;
    foreach ($fjerdingen as $fLoc) {
        if ($counter % 4 == 1) { ?>
            <div class="row">
        <?php } ?>

        <div class="c4 column h-center-content">
            <div class="infokort">

                <?php if (isset($fLoc['images'][0]['path'])) { ?>
                    <img class="kortbilde" src="assets/imgs/<?=$fLoc['images'][0]['path']?>" alt="<?= $fLoc['title'] ?>">
                <?php } ?>
                <h4 class="title"><?= $fLoc['title'] ?></h4>

                <div class="row tags">
                    <?php foreach ($fLoc['tags'] as $fTag) {
                        if ($fTag['tag'] != '') { ?>
                            <span><?= $fTag['tag'] ?></span>
                            <?php
                        }
                    } ?>
                </div>

                <p class="desc"><?= nl2br($fLoc['description']) ?></p>
                <?php if ($fLoc['URL'] != '') { ?>
                    <a class="fanzy" href="<?= $fLoc['URL'] ?>">Gå til hjemmeside</a>
                    <hr/>
                <?php } ?>

                <div class="c2 v-align-content">
                    <div class="open">
                        <div class="status">Åpningstider</div>
                        <img src="assets/imgs/DropDownArrow.png" class="toggleBtn" onClick="showTimes(this)" data-open="false">

                        <div class="times">
                            <?php foreach ($fLoc['hours'] as $hours) {
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
                <div class="c2">
                    <?php if ((isset($fLoc['distance'])) && ($fLoc['distance'] != '')) { ?>
                        <p><?= $fLoc['distance'] ?> min</p>
                    <?php } else { ?>
                        <p>Ukjent avstand</p>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php if ($counter % 4 == 0) { ?>
            </div>
        <?php }
        $counter++; ?>
    <?php }
    if ($counter % 4 != 1) echo "</div>"; ?>


    <hr/>
    <h3 id="titleC">Vulkan</h3>
    <?php
    $counter = 1;
    foreach ($vulkan as $fLoc) {
        if ($counter % 4 == 1) { ?>
            <div class="row">
        <?php } ?>

        <div class="c4 column h-center-content">
            <div class="infokort">

                <?php if (isset($fLoc['images'][0]['path'])) { ?>
                    <img class="kortbilde" src="assets/imgs/<?=$fLoc['images'][0]['path']?>" alt="<?= $fLoc['title'] ?>">
                <?php } ?>
                <h4 class="title"><?= $fLoc['title'] ?></h4>

                <div class="row tags">
                    <?php foreach ($fLoc['tags'] as $fTag) {
                        if ($fTag['tag'] != '') { ?>
                            <span><?= $fTag['tag'] ?></span>
                            <?php
                        }
                    } ?>
                </div>

                <p class="desc"><?= nl2br($fLoc['description']) ?></p>
                <?php if ($fLoc['URL'] != '') { ?>
                    <a class="fanzy" href="<?= $fLoc['URL'] ?>">Gå til hjemmeside</a>
                    <hr/>
                <?php } ?>

                <div class="c2 v-align-content">
                    <div class="open">
                        <div class="status">Åpningstider</div>
                        <img src="assets/imgs/DropDownArrow.png" class="toggleBtn" onClick="showTimes(this)" data-open="false">

                        <div class="times">
                            <?php foreach ($fLoc['hours'] as $hours) {
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
                <div class="c2">
                    <?php if ((isset($fLoc['distance'])) && ($fLoc['distance'] != '')) { ?>
                        <p><?= $fLoc['distance'] ?> min</p>
                    <?php } else { ?>
                        <p>Ukjent avstand</p>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php if ($counter % 4 == 0) { ?>
            </div>
        <?php }
        $counter++; ?>
    <?php }
    if ($counter % 4 != 1) echo "</div>"; ?>
    <hr/>

    <h3 id="titleC">Brenneriveien</h3>
    <?php
    $counter = 1;
    foreach ($brenneriveien as $fLoc) {
        if ($counter % 4 == 1) { ?>
            <div class="row">
        <?php } ?>

        <div class="c4 column h-center-content">
            <div class="infokort">

                <?php if (isset($fLoc['images'][0]['path'])) { ?>
                    <img class="kortbilde" src="assets/imgs/<?=$fLoc['images'][0]['path']?>" alt="<?= $fLoc['title'] ?>">
                <?php } ?>
                <h4 class="title"><?= $fLoc['title'] ?></h4>

                <div class="row tags">
                    <?php foreach ($fLoc['tags'] as $fTag) {
                        if ($fTag['tag'] != '') { ?>
                            <span><?= $fTag['tag'] ?></span>
                            <?php
                        }
                    } ?>
                </div>

                <p class="desc"><?= nl2br($fLoc['description']) ?></p>
                <?php if ($fLoc['URL'] != '') { ?>
                    <a class="fanzy" href="<?= $fLoc['URL'] ?>">Gå til hjemmeside</a>
                    <hr/>
                <?php } ?>

                <div class="c2 v-align-content">
                    <div class="open">
                        <div class="status">Åpningstider</div>
                        <img src="assets/imgs/DropDownArrow.png" class="toggleBtn" onClick="showTimes(this)" data-open="false">

                        <div class="times">
                            <?php foreach ($fLoc['hours'] as $hours) {
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
                <div class="c2">
                    <?php if ((isset($fLoc['distance'])) && ($fLoc['distance'] != '')) { ?>
                        <p><?= $fLoc['distance'] ?> min</p>
                    <?php } else { ?>
                        <p>Ukjent avstand</p>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php if ($counter % 4 == 0) { ?>
            </div>
        <?php }
        $counter++; ?>
    <?php }
    if ($counter % 4 != 1) echo "</div>"; ?>
</div>


<script>
    nav.sel = 2;
    filterPage = 1;
</script>