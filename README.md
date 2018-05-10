# What is this package?
This package is meant to take an array of data and "transform" it to match the pattern of another array.

## How do I use it?

```php
use Kregel\Transform\Transformer;

$dataTransformer = new Transformer([
    'NAME' => 'Austin Kregel
], [
    'NAME' => 'full_name'
]);

$dataTransformer->transform();
```
Then transform will return an array
```
[
    'full_name' => 'Austin Kregel'
]
```