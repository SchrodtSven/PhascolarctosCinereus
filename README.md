# PhascolarctosCinereus 🐨
Not a snake, nor a panda and also not a bear!

The <bigger>🐘<bigger> (not PHP) in the room - we want:

- [ ] access operators for slicing; stepping like
  - `[2:]` (third elemnt to end)
  - `[0::2]` (from start to end, stepped by 2)
- [ ]filtering data with PHP 8.4+ the snaky way 🐍.
  - tbh: also and more important: the [🐼, 🐼] way.

> **DISCLAIMER**

This is a <abbr title="Proof of concept">POC</abbr>, <abbr title="Work in progress">WIP</abbr>, <abbr title="Where to fly?">WTF</abbr> and only for myself with
no mile stones or deadline.





 

## Motivation 

Just reimplement that stuff, having fun, learning things

## Code examples

[More example code for basic usage](doc/README.md)

## "Simple" slicing [] operations

### List
```php
use Koalas\Type\ListClass;
use Koalas\Internal\AccessParser;
$ap = new AccessParser;
$foo = new ListClass(['Werner', 'Herbert', 'Franzy']);

# MASPIP - Make array sclicing possible in PHP like so:
var_dump($foo['1:2']);

```

```sh
array(3) {
  [0]=>
  string(7) "Herbert"
  [1]=>
  string(6) "Franzy"
} 
```

### Dict

```php
use Koalas\Type\DictClass;
 
$test = [
    "id" => 2,
    "first_name"=>"Karolina",
    "last_name"=>"Francesch",
    "email"=>"kfrancesch1@harvard.edu",
    "gender"=>"Female",
    "country"=>"China"
];

$fooDict = new DictClass($test);

# Cutting "columns" from dict like  🐍([🐼, 🐼])
print_r($fooDict[['id', 'gender']]);
```
```sh
Array
(
    [id] => 2
    [gender] => Female
)
```

## 🐘 - pain, or  PH(P)un?

I do not know, how you like it, but the elephant (Pun intended) in the room will be:
 - reading from different re|sources
 - filtering 
 - manipulating
 - exporting/transforming to different data types/formats
 - doing <abbr title="to be defined">tbd</abbr> stuff
 
 on <b>data</b> with <i>PHP 8.4+</i>

## <abbr title="Design& rchitecture Dossier">DAD</abbr> 

### Conventions

1. We use short hand variable names (dta, col, fn, clj, flr) for (data, column, filename, closure, filter) etc., but 'speaking' class names (e.G: <code>ListClass</code>), and method/function names (e.G: <code>parseAs*(...$arg)</code>)

2. Classes wrapping funtionality for native PHP data types will be named like <code>StringClass</code> as in <code>stdClass</code>, but <i>ucfirst</i>-style

3. Global function names borrowed from the snake, but also existing in <kbd>PHP</kbd>, will be prefixed by <code>k</code> as in <code>kprint</code>

so: be consulted by <code>doc/dct.txt and/or doc/dtadct.md </code>

4. ```Namespace``` will be <code>Koalas\\*</code>

### 