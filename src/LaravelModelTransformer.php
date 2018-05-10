<?php
/**
 * Created by PhpStorm.
 * User: austinkregel
 * Date: 5/9/18
 * Time: 10:49 PM
 */

namespace Kregel\Transform;


use Illuminate\Database\Eloquent\Model;
use Kregel\Transform\Contracts\TransformerContract;
use Kregel\Transform\Traits\Transformable;

class LaravelModelTransformer extends Model implements TransformerContract
{
    use Transformable;

    /**
     * @param array $input
     * @return TransformerContract
     */
    public function setOriginalFeed(array $input): TransformerContract
    {

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
        return $this->getAttributes();
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
        return $this->__transformedFeed = $array;
    }
}
