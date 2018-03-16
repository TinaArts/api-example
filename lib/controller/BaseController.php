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
    public $auth = true;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        if ($this->auth) {
            if (!$this->verify()) {
                App::getCore()->url->response->getResponseException(401);
            }
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