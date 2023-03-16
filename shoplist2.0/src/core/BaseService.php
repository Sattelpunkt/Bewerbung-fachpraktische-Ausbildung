<?php

namespace Core;


class BaseService
{
    public object $response;

    public function __construct()
    {
        $this->response = new BaseResponse();
    }

}