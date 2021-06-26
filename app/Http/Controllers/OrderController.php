<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Mail;

class OrderController extends Controller
{
    public function ship(Request $request, $orderId) {
        $order = Order::findOrFail($orderId);
        Mail::to($request->user())->send(new OrderShipped($order));
    }
}
