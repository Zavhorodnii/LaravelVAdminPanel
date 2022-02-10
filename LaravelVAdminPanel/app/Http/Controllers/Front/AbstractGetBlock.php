<?php


namespace App\Http\Controllers\Front;


abstract class AbstractGetBlock
{
    protected static array $fields;
    abstract public static function getFields($post_id) : array;
}
