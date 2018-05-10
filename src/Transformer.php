<?php

namespace Kregel\Transform;

use Kregel\Transform\Contracts\TransformerContract;
use Kregel\Transform\Traits\Transformable;

abstract class Transformer implements TransformerContract
{
    use Transformable;
}