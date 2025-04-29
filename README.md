# PhascolarctosCinereus
Not a snake, nor a panda and also not a bear: 
the elephant in the room will be filtering data with PHP 8.4+

Namespace will be <code>Koalas\\*</code>

## Motivation 

Just reimplement that stuff


### Convention

1. We use short hand variable names (dta, col, fn, clj, flr) for (data, column, filename, closure, filter) etc., but 'speaking' class names (e.G: <code>ListClass</code>), and method/function names (e.G: <code>parseAs*(...$arg)</code>)

2. Classes wrapping funtionality for native PHP data types will be named like <code>StringClass</code> as in <code>stdClass</code>, but <i>ucfirst</i>-style

3. Global functions borrowed from the snake, but also existing in <kbd>PHP</kbd>, will be prefixed by <code>k</code> as in <code>kprint</code>

so: be consulted by <code>dct.txt/dtadct.md </code>
