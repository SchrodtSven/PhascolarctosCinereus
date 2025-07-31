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
 * 
 */

namespace Koalas\Internal;

use Koalas\Type\Token;

class Lexer
{


    public function tokenize($sub)
    {
        $tokens = [];

        $offset = 0;
        while ($offset < strlen($sub)) {
            $token = $this->match(substr($sub, $offset));
            if (false === $token) {
                throw new \InvalidArgumentException(sprintf(ErrorMessages::PARSE_ERR, $sub));
            }
            $offset += $token->size;
            $tokens[] = $token;
        }

        return $tokens;
    }

    public function match($sub)
    {
        foreach (Token::$valTks as $name => $pattern) {
            $matches = [];
            if (preg_match($pattern . 'A', $sub, $matches) ===1) {
                return new Token($name, strlen($matches[0]), $matches[1]);
            }
        }

        return false;
    }
}
