<?php
use PHPUnit\Framework\TestCase;
/**
 * @codeCoverageIgnore
 */
include_once('Database.php');

/*
 * En utvidelse av custom PDO klasse, Database.
 * Formålet er at en sett med predefinerte funksjoner brukes for å
 * sende spørring til databasen.
 */
class ExploreDatabase extends Database
{
    public function __construct($host = Config::DB_HOST, $db = Config::DB_DATABASE, $user = Config::DB_USER, $pwd = Config::DB_PASSWORD)
    {
        parent::__construct($host, $db, $user, $pwd);
    }

    /*
     * Henter ID til en lokasjon, basert på adresse.
     */
    public function getLocId($address) {
        $this->query("SELECT `id` FROM `locations` WHERE `address`=:address");
        $this->bind(":address", $address);
        $location = $this->single();

        if (!$location) return false;
        return $location['id'];
    }

    /*
     * Henter bildene til en lokasjon, basert på adresse.
     */
    public function getImages($address) {
        if ($location = $this->getLocId($address)) {
            $this->query("SELECT `path` FROM `location_images` WHERE `loc_id`=:loc_id");
            $this->bind(":loc_id", $location);
            $images = $this->fetchAll();
            return $images;
        }
        return array();
    }

    /*
     * Henter tags til en lokasjon, basert på adresse.
     */
    public function getTags($address){
        if ($location = $this->getLocId($address)) {
            $this->query("SELECT `tag` FROM `location_tags` WHERE `loc_id`=:loc_id");
            $this->bind(":loc_id", $location);
            $tags = $this->fetchAll();
            return $tags;
        }
        return array();
    }

    /*
     * Henter åpningstidene til en lokasjon, basert på adresse.
     */
    public function getOpeningHours($address) {
        if ($location = $this->getLocId($address)) {
            $this->query("SELECT `day`, `open`, `close` FROM `opening_hours` WHERE `loc_id`=:loc_id");
            $this->bind(":loc_id", $location);
            $hours = $this->fetchAll();
            return $hours;
        }
        return array();
    }

    /*
     * Henter telefonnummere til en lokasjon, basert på adresse.
     */
    public function getPhoneNumbers($address) {
        if ($location = $this->getLocId($address)) {
            $this->query("SELECT `country_code`, `number` FROM `phone_numbers` WHERE `loc_id`=:loc_id");
            $this->bind(":loc_id", $location);
            $numbers = $this->fetchAll();
            return $numbers;
        }
        return array();
    }

    /*
     * Henter alt i lokasjons tabellen, basert på en adresse.
     *
     */
    public function getLocation($address) {
        $this->query("SELECT * FROM `locations` WHERE `address`=:address");
        $this->bind(":address", $address);
        $location = $this->single();
        return $location;
    }

    /*
     * Henter campus til en lokasjon, basert på adresse.
     */
    public function getCampus($address) {
        $this->query("SELECT `campus` FROM `locations` WHERE `address`=:address");
        $this->bind(":address", $address);
        $campus = $this->single();
        return $campus;
    }

    /*
     * Henter avstand til en lokasjon fra campus, basert på adresse.
     */
    public function getDistance($address) {
        $this->query("SELECT `distance` FROM `locations` WHERE `address`=:address");
        $this->bind(":address", $address);
        $distance = $this->single();
        return $distance;
    }

    /*
     * Henter alle lokasjonene i lokasjontabellen.
     */
    public function getAllLocations() {
        $this->query("SELECT * FROM `locations`");
        $locations = $this->fetchAll();
        return $locations;
    }

    /*
     * Henter alle lokasjonene i lokasjonstabellen som tilhører en spesifikk campus.
     */
    public function getAllCampusLocation($campus) {
        $returnArray = array();
        $this->query("SELECT * FROM `locations` WHERE `campus`=:campus");
        $this->bind(":campus", strtolower($campus));

        $rows = $this->fetchAll();

        while ($row = array_shift($rows)) {
            $mergedArray = $this->getMergedLocationsData($row);
            array_push($returnArray, $mergedArray);
        }
        return $returnArray;
    }

    /*
     * Henter absolutt alt fra databasen.
     */
    public function getAllLocationsData() {
        $returnArray = array();
        $this->query("SELECT * FROM `locations`");

        $rows = $this->fetchAll();

        while ($row = array_shift($rows)) {
            $mergedArray = $this->getMergedLocationsData($row);
            array_push($returnArray, $mergedArray);
        }

        return $returnArray;
    }


    /*
     * Henter absolutt alt fra databasen om en spesifikk lokasjon, basert på adresse.
     */
    public function getLocationData($address) {
        $this->query("SELECT * FROM `locations` WHERE `address`=:address");
        $this->bind(":address", $address);
        $row = $this->single();
        return $this->getMergedLocationsData($row);
    }

    /*
     * En privat metode som skal hente alt om en lokasjon fra databasen, og slå den sammen til en array.
     */
    private function getMergedLocationsData($row) {
        $mergedArray =
            $row +
            array('images' => $this->getImages($row['address'])) +
            array('tags' => $this->getTags($row['address'])) +
            array('hours' => $this->getOpeningHours($row['address'])) +
            array('numbers' => $this->getPhoneNumbers($row['address'])) +
            array('campus' => $this->getCampus($row['address'])) +
            array('distance' => $this->getDistance($row['address']));
        return $mergedArray;
    }

    /*
     * Fjerne absolutt alt om en lokasjon fra databasen, basert på adresse.
     */
    public function removeLocation($address) {
        if ($location = $this->getLocId($address)) {

            $this->beginTransaction();

            $this->query("DELETE FROM `phone_numbers` WHERE `loc_id`=:loc_id");
            $this->bind(":loc_id", $location);
            $this->execute();

            $this->query("DELETE FROM `opening_hours` WHERE `loc_id`=:loc_id");
            $this->bind(":loc_id", $location);
            $this->execute();

            $this->query("DELETE FROM `location_tags` WHERE `loc_id`=:loc_id");
            $this->bind(":loc_id", $location);
            $this->execute();

            $this->query("DELETE FROM `location_images` WHERE `loc_id`=:loc_id");
            $this->bind(":loc_id", $location);
            $this->execute();

            $this->query("DELETE FROM `locations` WHERE `id`=:loc_id");
            $this->bind(":loc_id", $location);
            $this->execute();

            $this->endTransaction();
        }
    }
}
// @codeCoverageIgnore
