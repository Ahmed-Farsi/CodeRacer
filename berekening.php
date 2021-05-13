<?php
$array = '<?php
for ($i = 10; $i >= 1; $i--) {
    echo $i . PHP_EOL;
}
?>';
$delete = array(" ","　","\t","\n","\r");
$tekens = str_replace($delete ,'',$array);
$aantal_tekens = strlen($tekens);

$tijd = 60;//seconds
$berekening = $aantal_tekens/$tijd*60; 
$TMP = round($berekening, 0);


?>