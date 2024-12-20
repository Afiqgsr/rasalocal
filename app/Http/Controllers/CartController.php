<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CartController extends Controller
{
    // Mendapatkan data keranjang
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'Anda harus login untuk melihat keranjang.'], 403);
        }

        // Mengambil data keranjang untuk pengguna yang sedang login
        $cartItems = Cart::where('user_id', $user->id)->get();

        // Mengirimkan data ke view 'cart'
        return view('pages.cart', compact('cartItems')); // Pastikan menggunakan view cart.blade.php
    }

    public function store(Request $request)
{
    $user = Auth::user();

    if (!$user) {
        return response()->json(['message' => 'Anda harus login untuk menambahkan ke keranjang.'], 403);
    }

    $request->validate([
        'menu_id' => 'required|exists:menus,id',
        'title' => 'required|string',
        'price' => 'required|numeric',
        'quantity' => 'required|integer|min:1',
    ]);

    // Menambahkan item ke keranjang atau memperbarui jumlah jika item sudah ada
    DB::table('carts')->updateOrInsert(
        [
            'user_id' => $user->id,
            'menu_id' => $request->menu_id,
        ],
        [
            'title' => $request->title,
            'price' => $request->price,
            'quantity' => DB::raw('quantity + ' . $request->quantity),
            'updated_at' => now(),
        ]
    );

    return response()->json(['message' => 'Item berhasil ditambahkan ke keranjang.']);
}


    // Menambahkan item ke keranjang
    public function update(Request $request, $id)
    {
        $user = Auth::user();
    
        if (!$user) {
            return redirect('/login')->with('error', 'Anda harus login untuk mengupdate item di keranjang.');
        }
    
        // Validasi untuk memastikan quantity yang dimasukkan adalah angka yang valid
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);
    
        // Mengupdate jumlah item di tabel 'carts'
        DB::table('carts')
            ->where('id', $id)
            ->where('user_id', $user->id)
            ->update([
                'quantity' => $request->quantity,
                'updated_at' => now(),
            ]);
    
        return redirect()->route('cart.index')->with('success', 'Jumlah item berhasil diperbarui.');
    }

    // Menghapus item dari keranjang
    public function destroy($id)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login')->with('error', 'Anda harus login untuk menghapus item dari keranjang.');
        }

        DB::table('carts')
            ->where('id', $id)
            ->where('user_id', $user->id)
            ->delete();

        return redirect()->route('cart.index')->with('success', 'Item berhasil dihapus dari keranjang.');
    }

    // Fungsi untuk melakukan checkout
    public function checkout(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'Anda harus login untuk melakukan checkout.'], 403);
        }

        $request->validate([
            'cart' => 'required|array',
            'cart.*.menu_id' => 'required|exists:menus,id',
            'cart.*.quantity' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0',
        ]);

        // Proses checkout, misalnya menghapus item dari keranjang setelah checkout
        $cart = $request->input('cart');
        $total = $request->input('total');

        foreach ($cart as $item) {
            DB::table('carts')->where('user_id', $user->id)->where('menu_id', $item['menu_id'])->delete();
        }

        return response()->json(['message' => 'Checkout berhasil, total harga: Rp ' . number_format($total, 0, ',', '.')]);
    }

    // Mengambil data keranjang untuk digunakan di frontend (API)
    public function getCart()
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'Anda harus login untuk melihat keranjang.'], 403);
        }

        $cartItems = Cart::where('user_id', $user->id)->get();

        return response()->json($cartItems);
    }
}
