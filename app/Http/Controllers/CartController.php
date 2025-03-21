<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        // Удаляем записи с несуществующими курсами
        Auth::user()->cart()->whereDoesntHave('course')->delete();

        // Загружаем корзину с курсами
        $cartItems = Auth::user()->cart()->with('course')->get();

        $totalPrice = $cartItems->sum(function ($item) {
            $price = $item->course->price;
            $discount = $item->course->discount; // Скидка в процентах
            $discountedPrice = $price * (1 - $discount / 100); // Цена со скидкой
            return $discountedPrice * $item->quantity;
        });

        return view('cart.index', compact('cartItems', 'totalPrice'));
    }

    public function add(Course $course)
    {
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('course_id', $course->id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'course_id' => $course->id,
                'quantity' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Курс добавлен в корзину');
    }

    public function remove(Cart $cart)
    {
        $cart->delete();
        return redirect()->back()->with('success', 'Курс убран из корзины');
    }

    public function update(Request $request, Cart $cart)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart->update([
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('cart.index')->with('success', 'Количество обновлено');
    }
}
