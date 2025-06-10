<?php declare(strict_types=1);
/**
 * DataFrames Columns worked the snaky bears
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/PhascolarctosCinereus
 * @package 
 * @version 0.1
 * @since 2025-05-22
 */
namespace Koalas;

class DataFrameColumn 
{

    
    public function __construct(protected array $dta, string $columnName)
    {
        $this->analyze();
    }


    public function apply(callable $clj): self
    {
        // doing stuff like :
        // df["category"] = df['category'].apply(lambda x: html.unescape(x))
        
        $this->dta = array_map($clj, $this->dta);
        return $this;
    }

    public function analyze(): void
    {

    }
}