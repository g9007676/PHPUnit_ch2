<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class HomeController extends Controller
{
    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function index()
    {
        return [
            'status' => 200,
            'code' => 200,
            'msg' => [
                'zheyu'
            ]
        ];
    }

    public function useOrder()
    {
        $this->order->create();
    }

    public function fun2($arg)
    {
        if ($arg == 2) {
            throw new \Exception();
        }

    }
}
