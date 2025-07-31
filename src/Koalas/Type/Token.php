<?php declare(strict_types=1);
/**
 * Class for Token instances used by:
 * - Koalas\Internal\Lexer
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/PhascolarctosCinereus
 * @package 
 * @version 0.1
 * @since 2025-04-29
 */

namespace Koalas\Type;

class Token
{
    // Stic public array for valid Tokens with corresponding PCRE pattern
    public static array $valTks = [
        'TKN_QUT' => '/\s*"(([^"\\\\]|\\\\\\\\|\\\\"|\\\\)+)"?(\s+|$)/',
        'TKN_MLT' => '/\s*(\*)/',
        'TKN_EQS' => '/\s*(\=)/',
        'TKN_LT' => '/\s*(\<)/',
        'TKN_GT' => '/\s*(\>)/',
        'TKN_OR' => '/\s*(or)(\s+|$)/',
        'TKN_AND' => '/\s*(and)(\s+|$)/',
        'TKN_WRD' => '/\s*([^ \t\r\n\v\f\*]+)(\s*|$)/'
    ];

    public int $strlen;

    public function __construct(public string $name, public int $size, public mixed $value)
    {
        //@TODO ??
        $this->strlen=strlen($value);
        if(is_numeric($value))
            $this->value = (float) $value; 
            if ($this->value == (int) $value)
                $this->value = (int) $value;
    }
}
