<?php

require '../vendor/autoload.php';

use Classes\Tmdb;

$apiKey = "361914a5343a0b491d46e1e4ffdc6c0c";

$tmdb = new Tmdb($apiKey);

$jsonFilms = $tmdb->searchFilms("speed racer");
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
foreach ($jsonFilms as $jsonFilm) {
    echo "<pre>";
    var_dump($jsonFilm);
    echo "</pre>";
    echo "<div>".$jsonFilm->getTitle()."</div>";
}
?>

</body>
</html>
