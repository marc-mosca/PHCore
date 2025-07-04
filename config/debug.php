<?php

function dd(mixed $value): void
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";
    die();
}
