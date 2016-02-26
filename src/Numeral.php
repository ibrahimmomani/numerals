<?php

namespace Ibrahimmomani\Numerals;

/**
 * Class Numeral
 * @package Ibrahimmomani\Numerals
 */
class Numeral
{
    /**
     * Simple Numeral factory
     *
     * @param $type
     * @param $value
     * @return mixed
     */
    public static function factory($type, $value)
    {
        $className = __NAMESPACE__.'\\'.ucfirst($type);
        if (!class_exists($className)) {
            throw new \InvalidArgumentException('Missing class.');
        }
        return new $className($value);
    }
}