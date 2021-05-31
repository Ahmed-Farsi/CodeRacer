<?php
include 'connect.php'
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
