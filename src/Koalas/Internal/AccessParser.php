<?php declare(strict_types=1);
/**
 * Class parsing array|index|slice|step [$arguments] for array (slice, keyed, indexed and opt. stepped by) access to lists
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
    public const string SEP = ':';
    /**
     * 
     *
     * @param string|StringClass $idxslc
     * @return array
     */
    public function analyse(string|StringClass $idxslcstp): array
    {
        $tmp = [];
        if(!strstr((string) $idxslcstp, ':')) {
            if(is_numeric($idxslcstp)) {
                $tmp = [(int) $idxslcstp];
            } else {
                $tmp = [$idxslcstp];
            }
        } else {
            $parts =  explode(':', $idxslcstp);
            $step = 1;
            $start = $parts[0];
            $end = $parts[1];

            if(strpos($idxslcstp, ':') == 0 ) {
                $tmp = [0,$end];
            } elseif(strpos($idxslcstp, ':') != strlen($idxslcstp)-1) {
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
    
}