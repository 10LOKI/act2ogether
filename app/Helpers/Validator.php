<?php
namespace App\Helpers;

class Validator
{
    public static function required($value)
    {
        return trim($value) !== '';
    }
}
