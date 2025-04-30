<?php declare(strict_types=1);
/**
 * Class parsing array|index|slice arguments for array access to lists
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

    public function analyse(string|StringClass $idxslc): array
    {
        $tmp = [];
        if(!strstr((string) $idxslc, ':')) {
            if(is_numeric($idxslc)) {
                $tmp = [(int) $idxslc];
            } else {
                $tmp = [$idxslc];
            }
        } else {
            list($start, $end) = explode(':', $idxslc);
            if(strpos($idxslc, ':') == 0 ) {
                $tmp = [0,$end];
            } elseif(strpos($idxslc, ':') != strlen($idxslc)-1) {
                $tmp = [$start, $end];
            } 
            
            else {
                $tmp = [$start, null];
            }
        }

        return($tmp);
    } 
    
}