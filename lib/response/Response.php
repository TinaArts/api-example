<?php

namespace lib\response;

class Response implements ResponseInterface
{
    /**
     * Base HTTP Code
     * @var array
     */
    private $code = [
        '200' => 'OK',
        '401' => 'Unauthorized',
        '404' => 'Not Found',
        '405' => 'Method Not Allowed',
        '500' => 'Internal Server Error',
    ];

    /**
     * Response constructor.
     * Set headers for CORS.
     */
    public function __construct()
    {
        header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: *");
        header("Content-Type: application/json");
    }

    /**
     * @param int $code
     * @param $status
     */
    private function setHeaderCode($code, $status)
    {
        header("HTTP/1.0 {$code} {$status}", true, $code);
    }

    /**
     * @param $data
     */
    public function getResponse($data)
    {
        echo json_encode($data);
    }

    /**
     * @param int $code
     * @param string $status
     */
    public function getResponseException(int $code, $status = '')
    {
        if ($status) {
            $message = $status;
        } else {
            $message = isset($this->code[$code]) ?
                $this->code[$code] :
                'Error without message';
        }

        $this->setHeaderCode($code, $message);

        echo json_encode(['message' => $message]);
        exit;
    }
}