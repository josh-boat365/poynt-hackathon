<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderService
{
    public function __construct()
    {
    }


    public function confirmOrder($data)
    {
        Order::query()
            ->where('refference', $data['reference'])
            ->update([
                "status" => "success",
            ]);

    }
}
