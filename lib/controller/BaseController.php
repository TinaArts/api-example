<?php

/**
 * Created by PhpStorm.
 * User: tina
 * Date: 16.03.18
 * Time: 11:27
 */

namespace lib\controller;

use lib\App;
use lib\auth\Auth;

abstract class BaseController
{
    public $auth = false;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        if ($this->auth) {
            $this->verify();
        }

    }

    /**
     * @param $name
     * @param $arguments
     */
    public function __call($name, $arguments)
    {
        App::getCore()->url->response->getResponseException(404, "Method not found");
    }

    /**
     * @return bool
     */
    public function verify()
    {
        $auth = new Auth();

        return $auth->verify($_SERVER['HTTP_AUTHORIZATION']);
    }

}