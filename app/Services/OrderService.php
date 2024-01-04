<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderService 
{
    public function __construct(protected Request $request)
    {
        
    }


    public function confirmOrder()
    {
        // verify signature

        if (!$this->request->event == "paymentrequest.success"  && !$this->request->data->paid) {
            return response()->json(status: Response::HTTP_BAD_REQUEST);
        }
        Order::query()
        ->where('refference', $this->request->customer)
        ->update([
         "status" => "success",
        ]); 
        return response()->json(status: Response::HTTP_OK);
    }
}