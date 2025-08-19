<?php

declare(strict_types=1);
/**
 * Scanning mathematical expressions
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/PhascolarctosCinereus
 * @package 
 * @version 0.1
 * @since 2025-08-01
 * 
 */

namespace Koalas\Internal;

use Koalas\Internal\Grammar;

class Scanner 
{
 
    private array $found = [];

    public function __construct(private string $sub)
    {
        
    }

    public function lex(string $sub): array
    {
        foreach (Grammar::OP as $op) {
            if($p = strpos($sub, $op))
                $this->found[$p] = $op;
        }

        return $this->found;
    }
}