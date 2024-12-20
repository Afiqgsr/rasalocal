<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menus;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Menampilkan semua menu
    public function index()
    {
        return response()->json(Menus::all(), 200);
    }

    // Menambahkan menu baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|string',
        ]);

        $menu = Menus::create($request->all());
        return response()->json($menu, 201);
    }

    // Menampilkan satu menu
    public function show($id)
    {
        $menu = Menus::findOrFail($id);
        return response()->json($menu, 200);
    }

    // Mengupdate menu
    public function update(Request $request, $id)
    {
        $menu = Menus::findOrFail($id);
        $menu->update($request->all());
        return response()->json($menu, 200);
    }

    // Menghapus menu
    public function destroy($id)
    {
        $menu = Menus::findOrFail($id);
        $menu->delete();
        return response()->json(['message' => 'Menu berhasil dihapus'], 200);
    }
}