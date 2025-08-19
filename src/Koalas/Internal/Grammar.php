<?php

declare(strict_types=1);
/**
 * Class defining grammar for lexing purpose
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/PhascolarctosCinereus
 * @package 
 * @version 0.1
 * @since 2025-08-01
 * 
 */

namespace Koalas\Internal;



class Grammar
{

    // Constant array with noticed operators
    public const array OP = [
                            '>=',
                            '<=',
                            '=',
                            '>',
                            '<',
                            '*',
                            '+',
                            '-',
                            'and',
                            'or'
    ];
}
