# Architecture File

## Global stuff

1. The global instance of <code>Koalas\Core\Base</code> named <code>$koalas</code> will always exists - but never mind, it is
    - Lazy loding
    - Needed anyway

## Indexing, Slicing

Ok, we can *not* access (<code>ArrayAccess</code> implementing types) the snaky way by 
 - <code>$a[1:2]</code>
 - <code>$a[3:]</code>
 - <code>$a[:4]</code>

 directly, because indices or keys may only be of type <code>string|int</code>

 So we are making a little tradeoff here, by slicing this way (resulting in short handed <kbd>*::slice()</kbd>):

 - <code>$a['1:2']</code>
 - <code>$a['3:']</code>
 - <code>$a[':4']</code>