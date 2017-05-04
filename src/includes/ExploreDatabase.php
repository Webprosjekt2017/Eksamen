<?php
use PHPUnit\Framework\TestCase;
/**
 * @codeCoverageIgnore
 */
include_once('Database.php');

class ExploreDatabase extends Database
{
    public function __construct($host = Config::DB_HOST, $db = Config::DB_DATABASE, $user = Config::DB_USER, $pwd = Config::DB_PASSWORD)
    {
        parent::__construct($host, $db, $user, $pwd);
    }

    public function getLocId($address) {
        $this->query("SELECT `id` FROM `locations` WHERE `address`=:address");
        $this->bind(":address", $address);
        $location = $this->single();

        if (!$location) return false;
        return $location['id'];
    }
    public function getImages($address) {
        if ($location = $this->getLocId($address)) {
            $this->query("SELECT `path` FROM `location_images` WHERE `loc_id`=:loc_id");
            $this->bind(":loc_id", $location);
            $images = $this->fetchAll();
            return $images;
        }
        return array();
    }

    public function getTags($address){
        if ($location = $this->getLocId($address)) {
            $this->query("SELECT `tag` FROM `location_tags` WHERE `loc_id`=:loc_id");
            $this->bind(":loc_id", $location);
            $tags = $this->fetchAll();
            return $tags;
        }
        return array();
    }

    public function getOpeningHours($address) {
        if ($location = $this->getLocId($address)) {
            $this->query("SELECT `day`, `open`, `close` FROM `opening_hours` WHERE `loc_id`=:loc_id");
            $this->bind(":loc_id", $location);
            $hours = $this->fetchAll();
            return $hours;
        }
        return array();
    }

    public function getPhoneNumbers($address) {
        if ($location = $this->getLocId($address)) {
            $this->query("SELECT `country_code`, `number` FROM `phone_numbers` WHERE `loc_id`=:loc_id");
            $this->bind(":loc_id", $location);
            $numbers = $this->fetchAll();
            return $numbers;
        }
        return array();
    }

    public function getLocation($address) {
        $this->query("SELECT * FROM `locations` WHERE `address`=:$address");
        $this->bind(":address", $address);
        $location = $this->single();
        return $location;
    }

    public function getCampus($address) {
        $this->query("SELECT `campus` FROM `locations` WHERE `address`=:$address");
        $this->bind(":address", $address);
        return $this->single();
    }
    public function getAllLocations() {
        $this->query("SELECT * FROM `locations`");
        $locations = $this->fetchAll();
        return $locations;
    }

    public function getAllCampusLocation($campus) {
        $returnArray = array();
        $this->query("SELECT * FROM `locations` WHERE `campus`=:campus");
        $this->bind(":campus", strtolower($campus));

        $rows = $this->fetchAll();

        while ($row = array_shift($rows)) {
            $mergedArray =
                $row +
                array('images' => $this->getImages($row['address'])) +
                array('tags' => $this->getTags($row['address'])) +
                array('hours' => $this->getOpeningHours($row['address'])) +
                array('numbers' => $this->getPhoneNumbers($row['address'])) +
                array('campus' => $this->getCampus($row['address']));
            array_push($returnArray, $mergedArray);
        }

        return $returnArray;
    }

    public function getAllLocationsData() {
        $returnArray = array();
        $this->query("SELECT * FROM `locations`");

        $rows = $this->fetchAll();

        while ($row = array_shift($rows)) {
            $mergedArray =
                $row +
                array('images' => $this->getImages($row['address'])) +
                array('tags' => $this->getTags($row['address'])) +
                array('hours' => $this->getOpeningHours($row['address'])) +
                array('numbers' => $this->getPhoneNumbers($row['address'])) +
                array('campus' => $this->getCampus($row['address']));
            array_push($returnArray, $mergedArray);
        }

        return $returnArray;

    }
}
// @codeCoverageIgnore