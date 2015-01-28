<?php

if (!isset($_GET['artist'])) {
    header('Location: index.php');
}

$artist = $_GET['artist'];

$host = 'itp460.usc.edu';
$dbname = 'music';
$user = 'student';
$password = 'ttrojan';

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

$sql = "
    SELECT title, artist_name, genre
    FROM songs
    INNER JOIN artists
    ON songs.artist_id = artists.id
    INNER JOIN genres
    ON genres.id = songs.genre_id
    WHERE artist_name LIKE ?
";

$statement = $pdo->prepare($sql);

$like = '%' . $artist . '%';
$statement->bindParam(1, $like);

$statement->execute();
$songs = $statement->fetchAll(PDO::FETCH_OBJ);
//var_dump($songs);

//foreach($songs as $song) {
//    echo "<div>" . $song['title'] . "</div>";
//    echo "<br>";
//}

?>


<?php foreach($songs as $song) : ?>
    <div>
        <?php echo $song->title ?> by <?php echo $song->artist_name ?>
        <a href="genres.php?genre=<?php echo $song->genre ?>">
            <?php echo $song->genre ?></a>
    </div>
<?php endforeach ?>

