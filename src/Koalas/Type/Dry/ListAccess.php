<?php declare(strict_types=1);
/**
 * Trait implementing \ArrayAccess ++ supporting access operators like `[0::2]` (from start to end, stepped by 2)
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/PhascolarctosCinereus
 * @package 
 * @version 0.1
 * @since 2025-04-29
 */

namespace Koalas\Type\Dry;

use Koalas\Core\StdIO;
use Koalas\Internal\AccessParser;

trait ListAccess 
{
    
    // Implementing ArrayAccess incl. access operators like `['0::2']` (from start to end, stepped by 2)


    public function offsetSet($offset, $value): void
    {
      
        if (is_null($offset)) {
            $this->dta[] = $value;
        } else {
            $this->dta[$offset] = $value;
        }
    }

    public function offsetExists($offset): bool
    {
        return isset($this->dta[$offset]);
    }

    public function offsetUnset($offset): void
    {
        unset($this->dta[$offset]);
    }

    public function offsetGet($offset): mixed
    {
       //var_dump($offset);die;
        if(is_array($offset)) {
            $tmp = array_unique($offset);
            $ret = [];
            for($i=0;$i<count($tmp);$i++) {
                $ret[$tmp[$i]] = $this->dta[$tmp[$i]] ?? null;
            }
            return $ret;
         }
        kprint($offset);
       # var_dump($ctx);
        $ctx = $this->sanitizeAccessorContext($offset);


        //print("FOOO - " . count($ctx) . PHP_EOL); 
        // var_dump($ctx);
        return match(count($ctx)) {
            1 => isset($this->dta[$offset]) ? $this->dta[$offset] : null,
            default => array_slice($this->dta, $ctx[0], $ctx[1]+1),
            // @FIXME!!! if step:: default => [] 
        };
        #return isset($this->dta[$offset]) ? $this->dta[$offset] : null;
    }



    public function sanitizeAccessorContext(mixed $offset): array
    {
        $ctx = (AccessParser::g())->analyse($offset);
        if (count($ctx) == 2) {
            if (empty($ctx[0])) $ctx[0] = 0;
            if (empty($ctx[1])) $ctx[1] = count($this->dta);

        }
        // @FIXME: count($ctx), IF $ctx IN(1,3)  etc.
        
        return $ctx;
    }

}
