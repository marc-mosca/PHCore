<?php

declare(strict_types=1);

use App\Kernel;

const BASE_PATH = __DIR__;

require_once BASE_PATH . '/config/autoload.php';
require_once BASE_PATH . "/config/debug.php";

$kernel = new Kernel();
