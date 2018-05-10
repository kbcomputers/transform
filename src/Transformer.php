<?php

namespace Kregel\Transform;

use Kregel\Transform\Contracts\TransformerContract;
use Kregel\Transform\Traits\Transformable;

abstract class Transformer implements TransformerContract
{
    use Transformable;

    /**
     * Transformer constructor.
     * @param array $originalFeed
     * @param array $keys
     */
    public function __construct(array $originalFeed, array $keys)
    {
        $this->setOriginalFeed($originalFeed);

        $this->setKeys($keys);
    }
}