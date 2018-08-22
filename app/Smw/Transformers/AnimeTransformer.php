<?php


namespace Smw\Transformers;

/**
 * Created by PhpStorm.
 * User: fabien
 * Date: 03/08/2018
 * Time: 10:04
 */

class AnimeTransformer extends Transformer
{

    public function transform($anime)
    {
        return [
            'id'             => $anime['id'],
            'title'          => $anime['title'],
            'original_title' => $anime['original_title'],
            'french_title'   => $anime['french_title'],
            'author'         => $anime['author'],
            'year'           => $anime['year'],
            'synopsis'       => $anime['synopsis'],
            'miscellaneous'  => $anime['miscellaneous'],
        ];
    }
}