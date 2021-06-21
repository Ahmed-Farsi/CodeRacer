<?php

$result = $pdo->query('SELECT * FROM code WHERE id =' . $_COOKIE['id']);
while ($row = $result->fetch()) {
    $array = $row['text'];
}
$delete = array(" ","　","\t","\n","\r");
$tekens = str_replace($delete ,'',$array);
$aantal_tekens = strlen($tekens);

$cyphers = openssl_get_cipher_methods();
$mijn_aes = $cyphers[0];
// we use the same key and IV
$key = hex2bin("0123456789abcdef0123456789abcdef");
$iv =  hex2bin("abcdef9876543210abcdef9876543210");
$decrypted_msg = trim(openssl_decrypt($_COOKIE['tijd'], $mijn_aes, $key, OPENSSL_ZERO_PADDING, $iv));
$tijd = $decrypted_msg;//seconds
<<<<<<< HEAD
$berekening = ($aantal_tekens/$tijd)*60; 
=======
var_dump($tijd);
$berekening = ($aantal_tekens / $tijd) * 60; 
>>>>>>> c993a8eeef645a9e2d84a69998b1c7054b927975
$TPM = round($berekening, 0);
    
?>