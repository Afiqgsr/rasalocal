<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;  // Pastikan ini ada


class CartController extends Controller
{
    // Menyimpan keranjang saat checkout
    public function checkout(Request $request)
    {
        $user = Auth::user();
    
        if (!$user) {
            return response()->json(['message' => 'Anda harus login untuk melakukan checkout.'], 403);
        }
    
        // Validasi data cart dan total
        $request->validate([
            'cart' => 'required|array',
            'cart.*.id' => 'required|exists:menus,id',
            'cart.*.title' => 'required|string',
            'cart.*.price' => 'required|numeric',
            'cart.*.quantity' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0',
        ]);
    
        $cart = $request->input('cart');
        $total = $request->input('total');
    
        foreach ($cart as $item) {
            DB::table('carts')->updateOrInsert(
                [
                    'user_id' => $user->id,
                    'menu_id' => $item['id']
                ],
                [
                    'title' => $item['title'],
                    'price' => $item['price'],
                    'quantity' => DB::raw('quantity + ' . $item['quantity']),
                    'updated_at' => now(),
                ]
            );
        }
    
        return response()->json(['message' => 'Checkout berhasil, total harga: Rp ' . number_format($total, 0, ',', '.')]);
    }
    
    // Menampilkan keranjang user
    public function getCart()
{
    $user = Auth::user();  // Ambil pengguna yang sedang login

    if (!$user) {
        return response()->json(['message' => 'Anda harus login untuk melihat keranjang.'], 403);
    }

    // Menggunakan relasi untuk mendapatkan semua item di keranjang
    $cartItems = $user->carts; // Memanfaatkan relasi yang ada di model User

    return response()->json($cartItems);
}



    // Menghapus item dari keranjang
    public function removeFromCart(Request $request)
    {
        $user = Auth::user();  // Gunakan Auth::user() di sini

        if (!$user) {
            return response()->json(['message' => 'Anda harus login untuk menghapus item dari keranjang.'], 403);
        }

        // Validasi menu_id
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
        ]);

        DB::table('carts')
            ->where('user_id', $user->id)
            ->where('menu_id', $request->menu_id)
            ->delete();

        return response()->json(['message' => 'Item berhasil dihapus dari keranjang.']);
    }
}
