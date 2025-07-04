<?php

declare(strict_types=1);

require_once __DIR__ . "/config/debug.php";

use App\Kernel;

const BASE_PATH = __DIR__;

spl_autoload_register(require BASE_PATH . "/config/autoload.php");

$kernel = Kernel::create();
