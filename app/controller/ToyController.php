<?php

namespace app\controller;

use app\model\ToyModel;
use lib\App;
use lib\controller\BaseController;

class ToyController extends BaseController
{
    /**
     * @return array|mixed|null
     */
    public function getAction()
    {
        $data = new ToyModel();
        $params = App::getCore()->url->paramsAction;

        if(isset($params['id'])) {
            return $data->getOne($params['id']);
        }

        return $data->getAll();
    }
}