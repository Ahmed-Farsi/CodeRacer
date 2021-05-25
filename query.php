<?php
$host = 'localhost';
$db = 'typegame';
$user = 'root';
$password = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$pdo = new PDO($dsn, $user, $password);
?>


<?php
$result = $pdo->query('SELECT text FROM code');
$to_encode = array();
$i = 0;
While ($row = $result->fetch()) {
    $to_encode[] = $row['text'];
}
header("Content-Type: text/plain");
var_dump($to_encode);
?>

