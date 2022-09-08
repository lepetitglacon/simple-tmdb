<?php

require 'vendor/autoload.php';

use Classes\Tmdb;
use Symfony\Component\VarDumper\Dumper;

use Classes\Movie;

$apiKey = "361914a5343a0b491d46e1e4ffdc6c0c";

$tmdb = new Tmdb($apiKey);


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

<form action="" method="post">
    <label>
        Search
        <input type="text" name="name">
    </label>
    <label>
        Limit
        <input type="number" name="limit">
    </label>
    <input type="submit" name="submit">
</form>

<?php

if (isset($_POST["name"]) && isset($_POST["submit"])) {
    $movies = $tmdb->searchFilms($_POST["name"]);
    /** @var Movie $movie */
    foreach ($movies as $movie) {
        ?>
        <div>
            <img src="<?php echo $movie->getPoster(); ?>" width="200" height="350">
        </div>
        <?php
    }
} else {?>

<?php }

?>

<script></script>

</body>
</html>
