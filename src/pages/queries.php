<?php
echo "<pre>";
$db = new ExploreDatabase();

if ($db->getError()) {
    echo nl2br ("Connection to database could not be established\n");
    echo $db->getError();
    die();
} else {
    echo nl2br("Connection to database has been established\n");
}

if ($images = $db->getImages('rema 1000')) {
    foreach ($images as $image) {
        echo ($image['path']);
        echo "<br>";
    }
} else {
    echo 'No images!';
    print_r($images);
}

echo "<br>";

if ($tags = $db->getTags("rema 1000")) {
    foreach ($tags as $tag) {
        echo ($tag['tag']);
        echo "<br>";
    }
} else {
    echo 'No tags!';
    print_r($tags);
}


echo "</pre>";
