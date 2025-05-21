<?php declare(strict_types=1);
/**
 * Global functions 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/PhascolarctosCinereus
 * @package 
 * @version 0.1
 * @since 2025-04-29
 */

# no namespace, cauz global;)
use Koalas\Core\StdIO;

$sep=' '; 
$end=\PHP_EOL;

function kprint(mixed $arg, string $sep=' ', $end=\PHP_EOL): void
{
   // @FIXME: handling depending on $arg's type  - the snaky way
   # p rint_r(gettype($arg));

   $t = StdIO::toString($arg);
   print($t);
   // print_r($arg);
   print($end);
}


function kprintm(...$args)
{
   global $end, $sep;

   foreach($args as $itm) {
      kprint(($itm));
   }

}


// @FIXME: handling various amount/type of params
function krange(string|int|float $start, string|int|float $end, int|float $step = 1): array
{
   return range($start, $end, $step);
}

