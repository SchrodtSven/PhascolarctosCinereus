<?php


require_once 'src/Koalas/Bootstrap.php';


use Koalas\Type\Ls;
use Koalas\Type\Lst;
use Koalas\Internal\AccessParser;
$ap = new AccessParser;
#use function Koalas\kprint;

$foo = new Lst(['Werner', 'Herbert', 'Franzy']);

//var_dump($foo['0:2']);

var_dump($koalas);die;
foreach(['12:', '2:77', ':5', 2, 3, 'sharky'] as $itm) {
    kprint($itm); 
    kprint($ap->analyse($itm));
}