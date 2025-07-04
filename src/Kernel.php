<?php

namespace App;

final class Kernel
{

    private static Kernel $shared;

    private function __construct()
    {
    }

    public static function create(): self
    {
        if (isset(self::$shared) === false)
        {
            self::$shared = new self();
        }
        return self::$shared;
    }

}
