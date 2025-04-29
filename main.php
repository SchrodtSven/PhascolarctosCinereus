<?php


require_once 'src/Koalas/Autoload.php';

use Koalas\Type\ListClass;

$foo = ListClass::frmJson('data/customers_database.json');

$bar = $foo->col('last_name');


print_r($bar);