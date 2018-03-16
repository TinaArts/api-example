<?php

namespace lib\auth;

class Auth
{
    /**
     * Default user login
     * @var string
     */
    private $login = 'root';

    /**
     * Default user password
     * @var string
     */
    private $password = 'root';

    /**
     * @var string
     */
    private $auth = '';

    /**
     * Auth constructor.
     */
    function __construct()
    {
        $this->auth = 'Basic ' . base64_encode($this->login . ':' . $this->password);
    }

    /**
     * @param $hash
     * @return bool
     */
    public function verify($hash)
    {
        return $hash == $this->auth ? true : false;
    }
}