<?php


require_once 'src/Koalas/Bootstrap.php';


use Koalas\Type\DictClass;

#use function Koalas\kprint;

$foo = DictClass::readJson('data/customers_small_db.json');


var_dump($foo[1]);

exit();

#$foo = DictClass::readJson('data/customers_database.json');

print_r($foo);
print_r($foo[[3,2,1]]); #WORX!!!!
# IDs: 4,3,2