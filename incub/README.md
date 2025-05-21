# Incub

- Files not yet mature for being part of ```src```


## Code examples


```php
$data = [
    "calories" => [420, 380, 390],
    "duration" => [50, 40, 45],
    "name" => [55,66,77]
];
$foo = new DataFrame($data, columns:['Kalorien', 'Dauer', 'Namen']);

```

```php
$data = [
    "calories" => [420, 380, 390], # count(): 3
    "duration" => [50, 40, 45],    # count(): 3
    "name" => [55,66,77, 99]       # count():  4
];
$foo = new DataFrame($data, columns:['Kalorien', 'Dauer', 'Namen']);
# DataFrame: Error - All arrays must be of the same length
```