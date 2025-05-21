<?php declare(strict_types=1);
/**
 * Formatting data for STDOUT
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/PhascolarctosCinereus
 * @package 
 * @version 0.1
 * @since 2025-03-16
 */
namespace Koalas\StdOut;

class Format
{

    /**
     * Formatting output for given $dta (structure) the sqlite way
     *
     * @param iterable $dta
     * @return string
     */
    public function sqlite(iterable $dta): string
    {
        $tmp = '';
        return $tmp;
    }

    /**
     * Formatting output for given $dta (structure) the print_r way
     *
     * @param iterable $dta
     * @return string
     */
    public function printR(iterable $dta): string
    {
        $tmp = '';
        return $tmp;
    }

    /**
     * Formatting output for given $dta (structure) the var_dump way
     *
     * @param iterable $dta
     * @return string
     */
    public function varDump(iterable $dta): string
    {
        ob_start();
        var_dump($dta);
        $tmp = ob_get_contents();
        ob_end_clean();
        return $tmp;
    }
}
