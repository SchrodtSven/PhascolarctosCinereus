<?php


require_once 'src/Koalas/Bootstrap.php';


use Koalas\Type\Ls;
use Koalas\Type\Lst;
use Koalas\Internal\AccessParser;
$ap = new AccessParser;
#use function Koalas\kprint;

$foo = new Lst(['Werner', 'Herbert', 'Franzy']);

//var_dump($foo['0:2']);

#var_dump($koalas);die;
foreach(['12:', '2:77', ':5', 2, 3, 'sharky', '1:3:2', '2::2'] as $itm) {
    kprint($itm); 
    kprint($ap->analyse($itm));
   
}

var_dump($itm);
$tmp = $ap->analyse($itm);
var_dump(empty($tmp[0]));
var_dump(empty($tmp[1]));
var_dump(empty($tmp[2]));


