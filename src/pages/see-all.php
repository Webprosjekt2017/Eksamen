<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 'on');

require_once('includes/config.php');
require_once('includes/ExploreDatabase.php');

?>


<div id="see_all_container" id="main">

    <div class="filterboks">
    <select class="filter" id="filter-type-onpage">
      <option value="0">Hva ser du etter?</option>
      <option value="Bar">Bar</option>
      <option value="Restaurant">Restaurant</option>
      <option value="Dagligvare">Dagligvare</option>
      <option value="Kaffebar">Kaffebar</option>
      <option value="Vegansk">Vegansk</option>
      <option value="Tyrkisk">Tyrkisk</option>
      <option value="Sushi">Sushi</option>
      <option value="Mikrobrygg">Mikrobrygg</option>
    </select>
    <input class="filter" id="filter-name-onpage" type="text" placeholder="Kjenner du navnet?"/>
    </div>

    <h1>Vis alt</h1>
    <h3 id="titleC">Fjerdingen</h3>
    <?php printCampus('fjerdingen') ?>
    <hr/>

    <h3 id="titleC">Vulkan</h3>
    <?php printCampus('vulkan') ?>
    <hr/>

    <h3 id="titleC">Brenneriveien</h3>
    <?php printCampus('brenneriveien') ?>
</div>


<script>
    nav.sel = 2;
    filterPage = 1;
</script>

<?php

/*
 * Funksjon for å sortere alfabetisk, basert på tittel.
 */
function compareByName($a, $b) {
    return strcmp($a["title"], $b["title"]);
}

/*
 * Funksjon for å printe ut lokasjonene til en campus.
 */
function printCampus($campusLoc) {
    $days = array('Mandag', 'Tirsdag', 'Onsdag', 'Torsdag', 'Fredag', 'Lørdag', 'Søndag');
    $db = new ExploreDatabase();

    $string = "";

    $campus = $db->getAllCampusLocation($campusLoc);
    usort($campus, 'compareByName');

    $counter = 1;
    foreach ($campus as $fLoc) {
        if ($counter % 4 == 1) {
            $string .= <<<EOD
<div class="row">
EOD;
        }
        $string .= <<<EOD
<div class="c4 column h-center-content">
<div class="infokort">
EOD;

        if (isset($fLoc['images'][0]['path'])) {
            $string .= <<<EOD
<img class="kortbilde" src="assets/imgs/{$fLoc['images'][0]['path']}" alt="{$fLoc['title']}">
EOD;
        }

        $string .= <<<EOD
<h4 class="title">{$fLoc['title']}</h4>
EOD;

        $string .= <<<EOD
<div class="row tags">
EOD;
        foreach ($fLoc['tags'] as $fTag) {
            if ($fTag['tag'] != '') {
                $string .= <<<EOD
<span>{$fTag['tag']}</span>
EOD;
            }
        }

        $desc = nl2br($fLoc['description']);
        $string .= <<<EOD
</div>
<p class="desc">{$desc}</p>
EOD;

        if ($fLoc['URL'] != '') {
            $string .= <<<EOD
<a class="fanzy" href="{$fLoc['URL']}">Gå til hjemmeside</a>
<hr/>
EOD;
        }

        $string .= <<<EOD
<div class="c2 v-align-content">
<div class="open">
<div class="status">Åpent</div>
<img src="assets/imgs/DropDownArrow.png" class="toggleBtn" onClick="showTimes(this)" data-open="false">
<div class="times">
EOD;

        foreach ($fLoc['hours'] as $hours) {
            $start = date("H", strtotime($hours['open']));
            $end = date("H", strtotime($hours['close']));
            if ($hours['open'] != '00:00:00' && $hours['close'] != '00:00:00') {
                $string .= <<<EOD
<div class="row">
<div class="c2">{$days[$hours['day']]}</div>
<div class="c2">{$start} - {$end}</div>
</div>
EOD;
            } else {
                $string .= <<<EOD
<div class="row">
<div class="c2">{$days[$hours['day']]}</div>
<div class="c2">Stengt</div>
</div>
EOD;
            }
        }

        $string .= <<<EOD
</div>
</div>
</div>
<div class="c2">
EOD;

        if ((isset($fLoc['distance'])) && ($fLoc['distance'] != '')) {
            $string .= <<<EOD
<p>{$fLoc['distance']} min</p>
EOD;
        } else {
            $string .= <<<EOD
<p>Ukjent avstand</p>
EOD;
        }

        $string .= <<<EOD
</div>
</div>
</div>
EOD;

        if ($counter % 4 == 0) {
            $string .= <<<EOD
</div>
EOD;
        }
        $counter++;
    }
    if ($counter % 4 != 1) {
        $string .= <<<EOD
</div>
EOD;
    }

    echo $string;
}