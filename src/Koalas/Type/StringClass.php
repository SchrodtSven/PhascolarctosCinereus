<?php declare(strict_types=1);
/**
 * Class for managing native strings as instances
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/PhascolarctosCinereus
 * @package 
 * @version 0.1
 * @since 2025-04-29
 */
namespace Koalas\Type;

use ErrorException;

class StringClass
{
    public function __construct(protected string  $dta = '')
    {
        # print('FOOO' . self::class);
    }

    public function prepend(string|StringClass $prefix): static
    {
        $this->dta = (string) $prefix . $this->dta;
        return $this;
    }

    public function append(string|StringClass $suffix): static
    {
        $this->dta = $this->dta . (string) $suffix ;
        return $this;
    }

    public function __toString(): string
    {
        return $this->dta;
    }


    public static function createFromFile(string $fn): static
    {
        if (! file_exists($fn)) throw new ErrorException('404: ' . $fn);
        return new static(file_get_contents($fn));
    }

    public function raw(): string
    {
        return $this->dta;
    }
}