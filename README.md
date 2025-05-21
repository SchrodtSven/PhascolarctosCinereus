# PhascolarctosCinereus
Not a snake, nor a panda and also not a bear!

The elephant in the room: we want  filtering data with PHP 8.4+ the snaky way 🐍

## DISCLAIMER 
This is a <abbr title="Proof of concept">POC</abbr>, <abbr title="Work in progress">WIP</abbr>, <abbr title="Where to fly?">WTF</abbr> and only for myself...

## 🐘 - pain, or  PH(P)un?

I do not know, how you like it, but the elephant (Pun intended) in the room will be:
 - reading from different re|sources
 - filtering 
 - manipulating
 - exporting/transforming to different data types/formats
 - tbd stuff
 
 <b>data</b> with <i>PHP 8.4+</i>


- Namespace will be <code>Koalas\\*</code>
 

## Motivation 

Just reimplement that stuff, having fun, learning things

## Code examples

```php
use Koalas\Type\Lst;
use Koalas\Internal\AccessParser;
$ap = new AccessParser;
$foo = new Lst(['Werner', 'Herbert', 'Franzy']);
# MASPIP - Make array sclicing possible in PHP like so:
var_dump($foo['1:2']);
/* array(3) {
  [0]=>
  string(7) "Herbert"
  [1]=>
  string(6) "Franzy"
} */
```

### Convention

1. We use short hand variable names (dta, col, fn, clj, flr) for (data, column, filename, closure, filter) etc., but 'speaking' class names (e.G: <code>ListClass</code>), and method/function names (e.G: <code>parseAs*(...$arg)</code>)

2. Classes wrapping funtionality for native PHP data types will be named like <code>StringClass</code> as in <code>stdClass</code>, but <i>ucfirst</i>-style

3. Global function names borrowed from the snake, but also existing in <kbd>PHP</kbd>, will be prefixed by <code>k</code> as in <code>kprint</code>

so: be consulted by <code>doc/dct.txt and/or doc/dtadct.md </code>


### 