<?php

namespace Tests\Transform;

use Kregel\Transform\Contracts\TransformerContract;
use Kregel\Transform\Transformer;

class Profile extends Transformer
{
    /**
     * @param array $input
     * @return TransformerContract
     */
    public function setOriginalFeed(array $input): TransformerContract
    {
        $this->__originalFeed = $input;

        return $this;
    }

    /**
     * @param array $output
     * @return TransformerContract
     */
    public function setKeys(array $output): TransformerContract
    {
        $this->__keys = $output;

        return $this;
    }

    /**
     * @return array
     */
    public function getOriginalFeed(): array
    {
        return $this->__originalFeed;
    }

    /**
     * @return array
     */
    public function getKeys(): array
    {
        return $this->__keys;
    }

    /**
     * @return array
     */
    public function getConvertedFeed(): array
    {
        return $this->__convertedFeed;
    }

    /**
     * @param array $array
     * @return array
     */
    public function setConvertedFeed(array $array = []): array
    {
        return $this->__convertedFeed = $array;
    }
}