<?php


require_once 'src/Koalas/Autoload.php';

use Koalas\Type\ListClass;
use Koalas\DataFrame;

$foo = DataFrame::frmJson('data/customers_small_db.json');

#print_r($foo);


#exit();


#$bar = $foo->slice(1, 3);


print_r($foo->slice(1,3));