<?php declare(strict_types=1);
/**
 * Class managing snaky lists - sssth
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/PhascolarctosCinereus
 * @package 
 * @version 0.1
 * @since 2025-04-29
 */

namespace Koalas\Type;

use Koalas\Core\StdIO;
use Koalas\Internal\AccessParser;
use Koalas\Type\Dry\ListAccess; 

class ListClass implements \Countable, \Stringable, \Iterator, \ArrayAccess
{
    use ListAccess;
    protected int $position;

    public function __construct(protected array $dta = [])
    {
        if(!array_is_list($dta)) {
            throw new \InvalidArgumentException('This is not a list!');
        }
    }

    public function col(string $col,  int|string|null $indexKey = null): static
    {
        return new self(array_column($this->dta, $col, $indexKey));
    }

    public static function readJson(string $fn): static
    {
        #$class = static::class;
        #die($class);
        return new static(json_decode(file_get_contents($fn)));
    }

    public function filter(callable $clj): static
    {
        return new self(array_filter($this->dta, $clj));
    }

    public function map(callable $clj): static
    {
        return new self(array_map($this->dta, $clj));
    }

    public function walk(callable $clj): static
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

    /**
     * @FIXME implement support for $step param
     *
     * @param integer $offset
     * @param integer $length
     * @param integer $step
     * @return void
     */
    public function slice(int $offset, int $length, int $step=1)
    {
        return array_slice($this->dta, $offset, $length);
    }

    public function head(int $number=5)
    {
        return $this->slice(0, $number);
    }

    public function tail(int $number=5)
    {
        return $this->slice(count($this->dta), $number*-1);
    }

    public function __toString(): string
    {
        return var_export($this->dta, true);
    }


    public function keys(): static
    {
        return new static(array_keys($this->dta));
    }


    /**
     * Pop the element off the end of array
     */
    public function pop(): mixed
    {
        return array_pop($this->dta);
    }

    /**
     * 
     */
    public function push(mixed $value): self
    {
        array_push($this->dta, $value);
        return $this;
    }

    /**
     * Shift an element off the beginning of array
     */
    public function shift(): mixed
    {
        return array_shift($this->dta);
    }


    // Implementing Iterator

    public function rewind(): void
    {

        $this->position = 0;
    }

     
    public function current(): mixed
    {

        return $this->dta[$this->position];
    }

  
    public function key(): mixed
    {

        return $this->position;
    }

    public function next(): void
    {

        ++$this->position;
    }

    public function valid(): bool
    {

        return isset($this->dta[$this->position]);
    }

    public function unique(int $flags = \SORT_STRING): static
    {
        return new static (array_unique($this->dta, $flags));
    }

    public function sum(): int|float
    {
        return array_sum($this->dta);

    }

 
}   
