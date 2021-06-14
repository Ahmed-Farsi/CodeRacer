    DROP DATABASE IF EXISTS `nsp`; 
    CREATE DATABASE `nsp`;
    USE `nsp`;

    Create table `code`(
        id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        text VARCHAR (1000) NOT NULL,
        taal VARCHAR(100) NOT NULL,
        language VARCHAR(100) NOT NULL
    );

    Insert into `code` (`text` ,`taal`, `language`) values
    ('<?php
    for ($i = 10; $i >= 1; $i--) {
        echo $i . PHP_EOL;
    }
    ?>', 'PHP', 'PHP_1'),
    ('<?php
    if ($a > $b) {
        echo "a is bigger than b";
    }
    ?>', 'PHP', 'PHP_2'),
    ('<!DOCTYPE html>
    <html>
        <head>
            <title>Page Title</title>
        </head>
        <body>
            <h1>This is a Heading</h1>
            <p>This is a paragraph.</p>
        </body>
    </html>', 'HTML', 'HTML_1'),
    ('<script>
    var cars = ["BMW", "Volvo", "Saab", "Ford", "Fiat", "Audi"];
    var text = "";
    var i;
    for (i = 0; i < cars.length; i++) {
        text += cars[i] + "<br>";
    }
    document.getElementById("demo").innerHTML = text;
    </script>', 'JS', 'JS_1'),
    ('#include <stdio.h>
    int main() {
        printf("Hello, World!");
        return 0;
    }', 'C', 'C_1');

    Create table `leaderBoard`(
        id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        score int (100) NOT NULL,
        naam varchar (50) NOT NULL
    );
    
    Insert into `leaderBoard`(score, naam)
    values (100, 'testuser');

