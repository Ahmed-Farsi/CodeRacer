DROP DATABASE IF EXISTS `typegame`; 
CREATE DATABASE `typegame`;
USE `typegame`;

Create table `code`(
    id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    text VARCHAR (1000) NOT NULL,
    taal VARCHAR(100) NOT NULL
);

Insert into `code` (`text` ,`taal`) values
('<?php
for ($i = 10; $i >= 1; $i--) {
echo $i . PHP_EOL;
}
?>', 'PHP'),
('<?php
if ($a > $b) {
    echo "a is bigger than b";
}
?>', 'PHP'),
('<!DOCTYPE html>
<html>
    <head>
        <title>Page Title</title>
    </head>
    <body>
        <h1>This is a Heading</h1>
        <p>This is a paragraph.</p>
    </body>
</html>', 'HTML'),
('<script>
var cars = ["BMW", "Volvo", "Saab", "Ford", "Fiat", "Audi"];
var text = "";
var i;
for (i = 0; i < cars.length; i++) {
  text += cars[i] + "<br>";
}
document.getElementById("demo").innerHTML = text;
</script>', 'JS'),
('#include <stdio.h>
int main() {
   printf("Hello, World!");
   return 0;
}', 'C');

