<?php
$result = $pdo->query('SELECT * FROM code WHERE id =' . $_COOKIE['id']);
While ($row = $result->fetch()) {
    $array = $row['text'];
}
$delete = array(" ","　","\t","\n","\r");
$tekens = str_replace($delete ,'',$array);
$aantal_tekens = strlen($tekens);

$tijd = $_COOKIE["tijd"];//seconds
$berekening = ($aantal_tekens/$tijd)*60; 
$TPM = round($berekening, 0);
    
?>