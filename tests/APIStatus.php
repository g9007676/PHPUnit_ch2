<?php
/**
 * Created by PhpStorm.
 * User: adbert
 * Date: 2017/10/4
 * Time: 下午2:43
 */

namespace Tests;


class APIStatus
{

    public function indexStatus()
    {
        return [
            'status' => 200,
            'code' => 200,
            'msg' => [
                'zheyu'
            ]
        ];
    }
}