<?php

include_once('Database.php');

class ExploreDatabase extends Database
{
    public function __construct($host = Config::DB_HOST, $db = Config::DB_DATABASE, $user = Config::DB_USER, $pwd = Config::DB_PASSWORD)
    {
        parent::__construct($host, $db, $user, $pwd);
    }

    public function getLocId($title) {
        $this->query("SELECT `id` FROM `locations` WHERE `title`=:title");
        $this->bind(":title", $title);
        $location = $this->single();

        if (!$location) return false;
        return $location['id'];
    }
    public function getImages($title) {
        if ($location = $this->getLocId($title)) {
            $this->query("SELECT `path` FROM `location_images` WHERE `loc_id`=:loc_id");
            $this->bind(":loc_id", $location);
            $images = $this->fetchAll();
            return $images;
        }
        return array();
    }

    public function getTags($title){
        if ($location = $this->getLocId($title)) {
            $this->query("SELECT `tag` FROM `location_tags` WHERE `loc_id`=:loc_id");
            $this->bind(":loc_id", $location);
            $tags = $this->fetchAll();
            return $tags;
        }
        return array();
    }

    public function getOpeningHours($title) {
        if ($location = $this->getLocId($title)) {
            $this->query("SELECT `day`, `open`, `close` FROM `opening_hours` WHERE `loc_id`=:loc_id");
            $this->bind(":loc_id", $location);
            $hours = $this->fetchAll();
            return $hours;
        }
        return array();
    }

    public function getPhoneNumbers($title) {
        if ($location = $this->getLocId($title)) {
            $this->query("SELECT `country_code`, `number` FROM `phone_numbers` WHERE `loc_id`=:loc_id");
            $this->bind(":loc_id", $location);
            $numbers = $this->fetchAll();
            return $numbers;
        }
        return array();
    }

    public function getLocation($title) {
        $this->query("SELECT * FROM `locations` WHERE `title`=:title");
        $this->bind(":title", $title);
        $location = $this->single();
        return $location;
    }

    public function getAllLocations() {
        $this->query("SELECT * FROM `locations`");
        $locations = $this->fetchAll();
        return $locations;
    }
    
    public function getAllLocationsData() {
        $returnArray = array();
        $this->query("SELECT * FROM `locations`");

        $rows = $this->fetchAll();

        while ($row = array_shift($rows)) {
            $mergedArray =
                $row +
                array('images' => $this->getImages($row['title'])) +
                array('tags' => $this->getTags($row['title'])) +
                array('hours' => $this->getOpeningHours($row['title'])) +
                array('numbers' => $this->getPhoneNumbers($row['title']));
            array_push($returnArray, $mergedArray);
        }

        return $returnArray;


    }


}