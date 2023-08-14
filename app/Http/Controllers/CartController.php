<?php

namespace App\Http\Controllers; // Pastikan namespace sesuai dengan struktur direktori

use App\Models\Cart;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart(Request $request, $bookId)
    {
        $user = auth()->user();

        $cart = Cart::where('user_id', $user->id)
            ->where('book_id', $bookId)
            ->first();

        if ($cart) {
            $cart->qty += 1;
            $cart->save();
        } else {
            $cart = new Cart([
                'user_id' => $user->id,
                'book_id' => $bookId,
                'qty' => 1,
            ]);
            $cart->save();
        }

        return redirect()->route('user.books')->with('success', 'Buku ditambahkan ke cart.');
    }

    public function removeFromCart($cartId)
    {
        $cart = Cart::findOrFail($cartId);
        $cart->delete();

        return redirect()->route('user.cart')->with('success', 'Buku dihapus dari cart.');
    }

    public function getTotalPrice($userId)
    {
        return Cart::where('user_id', $userId)
            ->sum(DB::raw('qty * books.price'));
    }
}
