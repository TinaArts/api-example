<?php

namespace lib\base;

class BaseObject
{
    public function __construct(array $params)
    {
        self::set($this, $params);
    }

    public static function set($object, $params)
    {
        foreach ($params as $key => $item) {
            $object->$key = $item;
        }
    }
}