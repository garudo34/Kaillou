<?php

namespace Smw\Transformers;

/**
 * Created by PhpStorm.
 * User: fabien
 * Date: 03/08/2018
 * Time: 11:34
 */
abstract class Transformer
{
    public function transformCollection(array $item)
    {
        return array_map([$this, 'transform'], $item);
    }

    public abstract function transform($item);
}