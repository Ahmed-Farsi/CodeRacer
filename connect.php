<?php
$host = 'localhost';
$db = 'nsp';
$user = 'nsp';
$password = 'wart1drex*LIY2rern';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$pdo = new PDO($dsn, $user, $password);

$pdo->query('SELECT VERSION()');
var_dump($pdo->fetch()) ;

$pdo->query("SHOW TABLES;")
var_dump($pdo->fetch()) ;
?>

