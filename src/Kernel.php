<?php

namespace App;

use App\Http\Router;

/**
 * The core application kernel.
 *
 * This class implements the singleton pattern and is responsible for initializing and
 * holding global application services.
 */
final class Kernel
{

    /**
     * @var Kernel $instance The single instance of the Kernel.
     */
    private static Kernel $instance;

    /**
     * @var Router $router The application's router instance, responsible for route registration and dispatching.
     */
    public readonly Router $router;

    /**
     * Private constructor to prevent direct instantiation.
     *
     * Initializes the router instance.
     */
    private function __construct()
    {
        $this->router = new Router();
    }

    /**
     * Returns the single instance of the Kernel.
     *
     * @return self The global Kernel instance.
     */
    public static function getInstance(): self
    {
        if (isset(self::$instance) === false)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

}
