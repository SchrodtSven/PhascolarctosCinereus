<?php declare(strict_types=1);
/**
 * Class for strings
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/PhascolarctosCinereus
 * @package 
 * @version 0.1
 * @since 2025-03-16
 */
namespace Koalas\Type;

class StringClass
{
    public function __construct(protected string  $dta = '')
    {
        # print('FOOO' . self::class);
    }

    public function __toString(): string
    {
        return $this->dta;
    }
}