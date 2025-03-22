<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store()
    {
        $user = Auth::user();

        $cartItems = $user->cart()->with('course')->get();

        if ($cartItems -> isEmpty()) {
            return redirect()->back()->with('error', 'Ваша корзина пуста');
        }

        foreach ($cartItems as $item){
            Order::create([
                'user_id' => $user->id,
                'course_id' => $item->course_id,
                'total_price' => $item->course->price * $item->quantity,
                'status' => 'Рассмотрение'
            ]);
        }

        $user->cart()->delete();

        return redirect()->route('cart.index')->with('success', 'Заказ успешно оформлен.');

    }
}
