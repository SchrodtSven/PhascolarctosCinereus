<?php declare(strict_types=1);
/**
 * Class managing native lists as instances
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/PhascolarctosCinereus
 * @package 
 * @version 0.1
 * @since 2025-04-29
 */

namespace Koalas\Type;

use Koalas\Core\StdIO;

class ListClass implements \Countable, \Stringable
{
    public function __construct(protected array $dta = [])
    {
        # print('FOOO' . self::class);
    }

    public function col(string $col): self
    {
        return new self(array_column($this->dta, $col));
    }

    public static function fromJson(string $fn): self
    {
        $class = static::class;
        return new $class(json_decode(file_get_contents($fn)));
    }

    public function filter(callable $clj): self
    {
        return new self(array_filter($this->dta, $clj));
    }

    public function map(callable $clj): self
    {
        return new self(array_map($this->dta, $clj));
    }

    public function walk(callable $clj): self
    {
        array_walk($this->dta, $clj);
        return $this;
    }

    public function join(string|StringClass $glue): StringClass
    {
        return new StringClass(implode($glue, $this->dta));
    }
    
    public function count(): int
    {
        return count($this->dta);
    }

    public function slice(int $offset, int $length)
    {
        return array_slice($this->dta, $offset, $length);
    }

    public function head(int $number)
    {
        return $this->slice(0, $number);
    }

    public function tail(int $number)
    {
        return $this->slice(count($this->dta), $number*-1);
    }

    public function __toString(): string
    {
        return var_export($this->dta, true);
    }
}
