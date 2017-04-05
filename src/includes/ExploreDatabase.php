<?php

include('Database.php');

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
}