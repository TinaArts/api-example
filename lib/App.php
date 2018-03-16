<?php

namespace lib;

use lib\response\Response;
use lib\url\Url;

class App
{
    private $method;
    private $rootDir;
    public $url;

    private static $core;

    /**
     * App constructor.
     */
    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->rootDir = dirname(__DIR__);
        self::$core = $this;
    }

    /**
     * @return App
     */
    public static function getCore()
    {
        return self::$core;
    }

    public function run()
    {
        $this->autoload();
        $this->initController();
    }

    /**
     * Autoload class
     */
    private function autoload()
    {
        spl_autoload_register(function ($className) {
            $className = str_replace('\\', '/', $className);
            $file = $this->rootDir . '/' . $className . ".php";

            if (is_readable($file))
                require_once $file;
        });
    }

    /**
     *
     */
    private function initController()
    {
         $this->url = new Url([
            'response' => new Response(),
            'controllerPath' =>'\app\controller\\',
            'method' => $_SERVER['REQUEST_METHOD']
        ]);

        $this->url->routing();
    }
}