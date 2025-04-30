<?php declare(strict_types=1);
/**
 * Class managing ass. Arrays (Hash Maps, Dictionaries) aka Dict in this context
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/PhascolarctosCinereus
 * @package 
 * @version 0.1
 * @since 2025-04-29
 */

namespace Koalas\Type;

use Koalas\Type\ListClass;
use Koalas\DataFrame;

class DictClass extends ListClass
{
    public function __construct(protected array $dta = [])
    {}
}
