<?php

namespace App\Services;

use App\Events\PaymentConfirmed;
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
        $order = Order::query()
            ->where('refference', $data['reference'])
            ->first();

        if ($order) {
            $order->update(['status' => 'success']);
            event(new PaymentConfirmed($order));
        }
    }
}
