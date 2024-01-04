<?php


namespace App\Http\Controllers\V1;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Product;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {

        $order = Order::create([
            'order_date' => now(),
            'reference' => uniqid(),
            'status' => 'pending',
        ]);
        foreach ($request->products as $product) {

            $productModel = Product::find($product['product_id']);

            if($productModel) {

                OrderItem::create([
                    'product_id' => $product['product_id'],
                    'quantity' => $product['quantity'],
                    'amount'    => $productModel->price * (float) $product['quantity'],
                    'order_id' => $order->id,
                ]);
            }

        }

        return [
            "reference" => $order->reference
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order){


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {

        $order->update($request->all());
        return redirect()->route("order")->with("success","Order Updated Sucessfully");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {

        $order->delete();
        return redirect()->route("order")->with("success","Order Deleted Successfully");

    }

    public function confirmOrder(Request $request, OrderService $orderService): JsonResponse
    {
        $signature = request()->header('x-paystack-signature');
        $body = request()->getContent();

        if ($signature !== hash_hmac('sha512', $body, config('paystack.secretKey')))
            abort(401);

        if (!$request->event == "charge.success") {
            return response()->json(status: Response::HTTP_OK);
        }

        $orderService->confirmOrder($request->data);

        return response()->json(status: Response::HTTP_OK);
    }
}
