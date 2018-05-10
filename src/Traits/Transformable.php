<?php

namespace Kregel\Transform\Traits;

trait Transformable
{
    /**
     * @var array
     */
    protected $__transformedFeed = [];

    /**
     * @var array
     */
    protected $__convertedFeed = [];

    /**
     * @var array
     */
    protected $__keys = [];

    /**
     * @var array
     */
    protected $__originalFeed = [];

    /**
     * @param array $data
     * @param array $keys
     * @return array
     */
    protected function transformRecursive(array $data, array $keys = [])
    {
        $newData = [];

        foreach($keys as $oldKey => $newKey) {
            $keyExistsInExistingData = array_key_exists($oldKey, $data);

            // If the key is suffixed with the array handle, get the key and transform the old data.
            if (array_key_exists($oldKey.'|array', $keys) && $keyExistsInExistingData && is_array($data[$oldKey])) {
                $newData[$keys[$oldKey.'|array']] = $this->transformRecursive($data[$oldKey], $keys[$oldKey]);
                // Check if the key exists in the dataset and then transform the old data.
            } elseif ($keyExistsInExistingData && is_array($data[$oldKey])) {
                $newData[$newKey] = $this->transformRecursive($data[$oldKey], $keys[$oldKey]);
                // If it's not an array and the key exists in the dataset then set it equal to the new transformed data.
            } elseif ($keyExistsInExistingData){
                $newData[$newKey] = $data[$oldKey];
            }
        }

        return $newData;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function transform(): array
    {
        if (empty($this->getOriginalFeed())) {
            throw new \Exception('The input feed was not set');
        }

        if (empty($this->getKeys())) {
            throw new \Exception('The output feed conversion was not set');
        }

        $this->setConvertedFeed(
            $this->transformRecursive(
                $this->getOriginalFeed(),
                $this->getKeys()
            )
        );

        return $this->getConvertedFeed();
    }
}