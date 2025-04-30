<?php


require_once 'src/Koalas/Bootstrap.php';


use Koalas\Type\ListClass;
use Koalas\DataFrame;

#use function Koalas\kprint;

$foo = DataFrame::readJson('data/customers_small_db.json');

#print_r($foo);


#exit();


#$bar = $foo->slice(1, 3);


#kprint(gettype($foo->slice(0,3)));
kprint($foo->slice(0,1));

echo $foo;

var_dump($koalas);