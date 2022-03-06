<?php

/*
|++++++++++++++++++++
| composer autoload +
|++++++++++++++++++++
*/

$autoload = 'vendor/autoload.php';
if (file_exists($autoload)) {
    require_once $autoload;
}

use PhpDatabase\Models\Person;

$persons = Person::fetchAll(['name']);
print_r($persons);
