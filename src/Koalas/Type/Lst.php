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

class Lst implements \Countable, \Stringable, \Iterator, \ArrayAccess
{
    protected int $position;

    public function __construct(protected array $dta = [])
    {
        if(!array_is_list($dta)) {
            throw new \InvalidArgumentException('This is not a fuckin list!');
        }
    }

    public function col(string $col): static
    {
        return new self(array_column($this->dta, $col));
    }

    public static function readJson(string $fn): static
    {
        $class = static::class;
        #die($class);
        return new $class(json_decode(file_get_contents($fn)));
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

    public function slice(int $offset, int $length)
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

    // Implementing ArrayAccess


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
        var_dump($offset);die;
        return isset($this->dta[$offset]) ? $this->dta[$offset] : null;
    }




}
