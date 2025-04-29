<?php declare(strict_types=1);
/**
 * CLass managing stdin/stdout streams
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/PhascolarctosCinereus
 * @package 
 * @version 0.1
 * @since 2025-04-29
 */

namespace Koalas\Core;

class StdIO
{
   public const string SEP = ' ';


   public static function toString(mixed $arg): string
   {
      ob_start();
      print_r($arg);
      $tmp = ob_get_contents();
      ob_end_clean();
      return $tmp;
   }
}