<?php

declare(strict_types=1);
/**
 * Tiny lexer class 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/PhascolarctosCinereus
 * @package 
 * @version 0.1
 * @since 2025-07-31
 * @fixme - reimplement w/o RegEx 
 */

namespace Koalas\Internal;

use Koalas\Type\Token;
use Koalas\Internal\Grammar;

class Lexer
{
    public array $op = [];
    public array $opMatch = [];

    public function __construct()
    {   
        $this->op = Grammar::OP;
        $this->opMatch = array_map(function($i) {
                                    return " $i ";
        }, $this->op ) ;
    }

    public function normalize(string $sub): string
    {
        return str_replace($this->op, $this->opMatch,$sub);
    }

    public function tokenize(string $sub)
    {
        $sub = $this->normalize($sub);
        $tokens = [];

        $nil = 0;
        while ($nil < strlen($sub)) {
            $token = $this->match(substr($sub, $nil));
            if (false === $token) {
                throw new \InvalidArgumentException(sprintf(ErrorMessages::PARSE_ERR, $sub));
            }
            $nil += $token->size;
            $tokens[] = $token;
        }

        return $tokens;
    }

    public function match($sub)
    {
        foreach (Token::$valTks as $name => $pattern) {
            $matches = [];
            #die($pattern);
            if (preg_match($pattern . 'A', $sub, $matches) === 1) {
                return new Token($name, strlen($matches[0]), $matches[1]);
            }
        }

        return false;
    }
}
