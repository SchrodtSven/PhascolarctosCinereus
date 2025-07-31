<?php


require_once 'src/Koalas/Bootstrap.php';
use Koalas\Type\Token;
use Koalas\Internal\Lexer;




 
$lexer = new Lexer();

$sub = "a = 12 OR continent ='Europe'";
$sub = 'continent = "Europe" and amount > 1250';
$sub = 'ab = 1.234';
var_dump($lexer->tokenize($sub));