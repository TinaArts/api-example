<?php

namespace lib\response;

interface ResponseInterface
{
    /**
     * Get response body
     * @param $data
     */
    public function getResponse($data);

    /**
     * Get exception based on http code.
     * @param $code
     * @param string $status
     */
    public function getResponseException(int $code, $status = '');

}