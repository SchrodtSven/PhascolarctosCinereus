<?php

declare(strict_types=1);
/**
 * Base class 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/PhascolarctosCinereus
 * @package 
 * @version 0.1
 * @since 2025-04-29
 */

namespace Koalas\Core;

use DateTime;
use Koalas\Type\ListClass;
use Koalas\Type\StringClass;
use Koalas\DataFrame;

class Base
{
    private DataFrame $df;
    
    public function dataFrame(array|ListClass $dta): DataFrame
    {
        return new DataFrame($dta);
    }   

    public function readSql(string|StringClass $query, $conn=null): DataFrame
    {
        # handle_foo($sql);
        $dta = [23];
        return new DataFrame($dta);
    }
}
