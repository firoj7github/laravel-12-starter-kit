<?php

namespace App\Traits;

trait ReturnFormatTrait
{
    protected function responseSuccess($message = '', $data = [], int $status_code = 200)
    {
        return [
            'status'        => true,
            'message'       => $message,
            'data'          => $data,
            'status_code'   => $status_code,
        ];
    }

    protected function responseError($message = '', $data = [], int $status_code = 400)
    {
        return [
            'status'        => false,
            'message'       => $message,
            'data'          => $data,
            'status_code'   => $status_code,
        ];
    }
}
