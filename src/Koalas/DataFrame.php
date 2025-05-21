<?php declare(strict_types=1);
/**
 * DataFrames like snaky bears
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/PhascolarctosCinereus
 * @package 
 * @version 0.1
 * @since 2025-04-29
 */
namespace Koalas;

class DataFrame 
{

    // @FIXME - implement functions, adjust signatures and return type defs
    public function loc(mixed $foo)  {}

    public function iloc(int $foo)  {}
    

    public function head(int $number) {}

    public function tail(int $number) {}

     public const string ERR_ARRAY_LENGTH = 'All arrays must be of the same length';

    protected array $columns;

    protected array $origKeys;

    public function __construct(protected array $dta, $columns = [])
    {
        if  (count($columns)) {
            $this->columns = $columns;
            $this->origKeys = array_keys($this->dta);
        } else {
            $this->columns = array_keys($this->dta);
            $this->origKeys = $this->columns;
        }
           $this->analyze();
    }

    public function analyze(): void
    {
        $noEle = count($this->dta);
        $row_an = [];
        
        for ($i=0;$i<$noEle;$i++) {
            $row_an[] = count($this->dta[$this->origKeys[$i]]);
        }
        if (min($row_an) != max($row_an)) {
            throw new \InvalidArgumentException(__CLASS__ .': Error - ' .self::ERR_ARRAY_LENGTH);
        }

    }
}