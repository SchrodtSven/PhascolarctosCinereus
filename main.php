<?php


require_once 'src/Koalas/Bootstrap.php';


use Koalas\Type\Ls;
use Koalas\Type\Lst;
use Koalas\Internal\AccessParser;

$ap = new AccessParser;
#use function Koalas\kprint;

$foo = new Lst(['Werner', 'Herbert', 'Franzy']);



// var_dump((['0:2:88'])[0] == (['0:2:88', 23, '0:2:88'])[2]);

// var_dump([1, 2, 3] == [1, 1 + 1, 1 + 2]);
// exit(233);





var_dump($foo['0:2']);
var_dump($foo['1:']);
var_dump($foo[':']);
var_dump($foo['1']);
var_dump($foo[1]);
var_dump($foo[':']);
exit(233);
#var_dump($koalas);die;
foreach (['12:', '2:77', ':5', 2, '3', 'sharky', '1:3:2', '2::2', '::4'] as $itm) {
    kprint($itm);
    kprint($ap->analyse($itm));
}

var_dump($itm);
$tmp = $ap->analyse($itm);
var_dump(empty($tmp[0]));
var_dump(empty($tmp[1]));
var_dump(empty($tmp[2]));
// sO. we can check if(empty)
