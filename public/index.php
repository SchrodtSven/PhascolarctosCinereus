<?php

use Koalas\File\CsvManager;

require_once 'src/Koalas/Bootstrap.php';

print_r(kfunctions());
$csvMgr = new CsvManager('data/worldcities.csv');

#print_r($csvMgr->asArray());
print_r($csvMgr->raw());