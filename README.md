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
or

```php
use Kregel\Transform\Transformer;

$dataTransformer = new Transformer;

$dataTransformer->setOriginalFeed([
    'NAME' => 'Austin Kregel'
])

$dataTransformer->setKeys([
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

If you're using laravel you can use the `LaravelModelTransformer` to get the same functionality for your models.


```php
class User extends LaravelModelTransformer 
{
    public $fillable = [
        'full_name'
    ];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getKeys()
    {
        return [
            'full_name' => 'name',
            'posts' => 'blogPosts'
        ];
    }
}
```
Then you could use
```php
$user = User::first();

$user->transform();
```

## What could this be used for?
Well, what you _could_ use it for is a list unmeasurable... What I plan on doing with it, is build an API that gracefully ages.
Much like the way Stripe supports older versions of their api. This allows us as developers to change the data we receive and
put it into the format we need. So long as we control it, the api could be upgraded as many times as we need, and we only need
to remap the inputs/outputs to the respective values for it to work.