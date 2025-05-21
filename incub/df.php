<?php
/**
 * Developing / testing DataFrame class
 */

class DataFrame
{

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

    public function __toString(): string
    {
        
        return 'ff';
    }

}

$data = [
    "calories" => [420, 380, 390],
    "duration" => [50, 40, 45],
    "name" => [55,66,77,99]
];
try {
    $foo = new DataFrame($data, columns:['Kalorien', 'Dauer', 'Namen']);
} catch(Exception $e) {
    echo $e->getMessage();
}

print_r($foo);

try {
    $bar = new DataFrame($data);
} catch(Exception $e) {
    echo $e->getMessage();
}

print_r($bar);

