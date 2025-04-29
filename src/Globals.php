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

#namespace Koalas;
use Koalas\Core\StdIO;

function kprint(mixed $arg, string $sep=' ', $end=PHP_EOL): void
{
   // @FIXME: handling depending on $arg's type  - the snaky way
   # p rint_r(gettype($arg));

   StdIO::toString($arg);
   print($end);
   print_r($arg);
   print($end);
}

