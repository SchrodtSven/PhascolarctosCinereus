<?php 

$source = '$angry > 100';
$tokens = PhpToken::tokenize($source);

var_dump($tokens);