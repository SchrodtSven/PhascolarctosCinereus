# PhascolarctosCinereus Usage Examples

## "Simple" List and Dict 
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

print_r($fooDict[['id', 'gender']]);

```
```sh
Array
(
    [id] => 2
    [gender] => Female
)
```