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

use Koalas\Type\ListClass;
use Koalas\DataFrame;

class Base
{
    public function dataFrame(array|ListClass $dta): DataFrame
    {
        return new DataFrame($dta);
    }
}
