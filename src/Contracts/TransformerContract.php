<?php

namespace Kregel\Transform\Contracts;

interface TransformerContract
{
    /**
     * @param array $input
     * @return TransformerContract
     */
    function setOriginalFeed(array $input): TransformerContract;

    /**
     * @param array $output
     * @return TransformerContract
     */
    function setKeys(array $output): TransformerContract;

    /**
     * @return array
     */
    function transform(): array;

    /**
     * @return array
     */
    function getOriginalFeed(): array;

    /**
     * @return array
     */
    function getKeys(): array;

    /**
     * @return array
     */
    function getConvertedFeed(): array;

    /**
     * @param array $array
     * @return mixed
     */
    function setConvertedFeed(array $array);
}
