<?php declare(strict_types=1);
/**
 * Class parsing array|index|slice|step [$arguments] for array (sliced, keyed/indexed and opt. stepped by) access to lists
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/PhascolarctosCinereus
 * @package 
 * @version 0.1
 * @since 2025-04-29
 */
namespace Koalas\Internal;

use Koalas\Type\StringClass;

class AccessParser
{
    public const string SLC_SEP = ':';

    private static $instance = null;

    /**
     * accessors ($idxslcstp) be like 
     * 
     * - 'index/key' | 
     * - 'start:end:step', OR opened:
     * - '1:'
     * - ':2'
     * - '::2'
     * - '1::2'
     *
     * @param string|StringClass $idxslc
     * @return array
     */
    public function analyse(string|StringClass|int|array $idxslcstp): array
    {
        if(is_int($idxslcstp)) return [$idxslcstp];
        $tmp = [];

        if(!strstr((string) $idxslcstp, self::SLC_SEP)) {
            if(is_numeric($idxslcstp)) {
                $tmp = [(int) $idxslcstp];
            } else {
                $tmp = [$idxslcstp];
            }
        } else {
            $parts =  explode(self::SLC_SEP, $idxslcstp);
            $step = 1;
            $start = (int) $parts[0];
            $end = (int) $parts[1];

            if(strpos($idxslcstp, self::SLC_SEP) == 0 ) {
                $tmp = [0,$end];
            } elseif(strpos($idxslcstp, self::SLC_SEP) != strlen($idxslcstp)-1) {
                $tmp = [$start, $end];
            } else {
                $tmp = [$start, null];
            }

            if(count($parts)>2) {
                $step = (int) $parts[2];
                $tmp = [$start, $end, $step];
            }
        }

        return($tmp);
    } 
    
    /**
     * To be used as (anonymous) factory method returning singleton instance
     *
     * @return self
     */
    public static function g(): self
    {
        if(is_null(self::$instance)) self::$instance = new self();
        return self::$instance;
    }
}