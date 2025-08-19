<?php


require_once 'src/Koalas/Bootstrap.php';
use Koalas\Type\DictClass;
use Koalas\Type\Token;
use Koalas\Internal\Scanner;

$scan = new Scanner('a = 5 or b =2');

var_dump($scan->lex('a = 5 or b =2'));



 
$test = [
    "id" => 2,
    "first_name"=>"Karolina",
    "last_name"=>"Francesch",
    "email"=>"kfrancesch1@harvard.edu",
    "gender"=>"Female",
    "country"=>"China"
];

$fooDict = new DictClass($test);

# Cutting "columns" from dict like  🐍([🐼, 🐼])
print_r($fooDict[['id', 'gender']]);
