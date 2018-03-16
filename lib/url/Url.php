<?php

namespace lib\url;

use lib\base\BaseObject;

class Url extends BaseObject
{
    public $response;
    public $controllerPath;
    public $paramsAction;
    public $method;

    /**
     * Create routing to controller and action
     */
    public function routing()
    {
        $url_elements = explode('/', $_SERVER['PATH_INFO']);
        $controller_name = $this->controllerPath . ucfirst($url_elements[1]) . 'Controller';

        if (class_exists($controller_name)) {
            $controller = new $controller_name();
            $action_name = strtolower($this->method) . 'Action';
            $this->paramsAction = (isset($url_elements[2]) && !empty($url_elements[2])) ?
                ['id' => $url_elements[2]] :
                [];

            $this->response->getResponse($controller->$action_name());
        } else {
            $this->response->getResponseException(404, "Controller not found");
        }
    }
}