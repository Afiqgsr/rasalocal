<?php

namespace App\Http\Controllers;

use App\Models\Menus;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMenuRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Spatie\Permission\Models\Role;

class MenuController extends Controller
{

    public function makeAdmin()
    {
        // Cari user dengan ID 1
        $user = User::find(1);

        // Cek apakah role admin sudah ada, jika belum buat
        $role = Role::firstOrCreate(['name' => 'admin']);

        // Assign role admin ke user
        $user->assignRole($role);

        return "User dengan ID 1 telah menjadi admin.";
    }
    // Tampilkan halaman menu
    public function index()
    {
        $menuItems = Menus::all();  // Ambil semua data dari tabel `menus`
        return view('pages.menu', compact('menuItems'));  // Kirim data ke tampilan
    }

    // Simpan data menu
    public function store(StoreMenuRequest $request)
    {
        $validated = $request->validated();

        // Upload file gambar jika ada
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        }

        Menus::create($validated);
        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan.');
    }

    // Tampilkan form edit
    public function edit(Menus $menu)
    {
        return view('menu-edit', compact('menu'));
    }

    // Update data menu
    public function update(StoreMenuRequest $request, Menus $menu)
    {
        $validated = $request->validated();

        // Periksa apakah ada file gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if (file_exists(public_path('images/' . $menu->image))) {
                unlink(public_path('images/' . $menu->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        }

        $menu->update($validated);
        return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui.');
    }

    // Hapus menu
    public function destroy(Menus $menu)
    {
        // Hapus file gambar jika ada
        if (file_exists(public_path('images/' . $menu->image))) {
            unlink(public_path('images/' . $menu->image));
        }

        $menu->delete();
        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus.');
    }

     // Pencarian menu (untuk AJAX)
     public function search(Request $request)
     {
         $query = $request->input('query');
         $menuItems = Menus::where('title', 'LIKE', "%{$query}%")
             ->orWhere('description', 'LIKE', "%{$query}%")
             ->orderBy('created_at', 'desc')
             ->get();
 
         return response()->json($menuItems);
     }

     // Tampilkan daftar menu (CRUD)
     public function crudIndex()
     {
         $menuItems = Menus::all(); // Ambil semua data dari tabel `menus`
         return view('pages.crud', compact('menuItems'));// Kirim data ke tampilan `crud.blade.php`
     }

     // Tampilkan form untuk menambahkan menu baru
     public function crudCreate()
     {
         return view('pages.crud-create'); // Mengarah ke view yang berada di folder 'page'
     }

     // Simpan data menu baru ke database
     public function crudStore(Request $request)
     {
         // Validasi input dari formulir
         $validated = $request->validate([
             'title' => 'required|string|max:255',
             'description' => 'nullable|string',
             'price' => 'required|numeric',
             'image' => 'nullable|image|max:2048', // Validasi gambar
         ]);

         // Jika ada file gambar, simpan ke folder 'menu-images'
         if ($request->hasFile('image')) {
             $validated['image'] = $request->file('image')->store('menu-images', 'public');
         }

         // Simpan data menu baru ke dalam database
         Menus::create($validated);

         // Redirect ke halaman index dengan pesan sukses
         return redirect()->route('crud.index')->with('success', 'Menu berhasil ditambahkan.');
     }

     // Tampilkan form edit menu
     public function crudEdit(Menus $menu)
     {
         return view('pages.crud-edit', compact('menu')); // Ganti nama view sesuai file form Anda
     }

     // Update data menu di database
     public function crudUpdate(Request $request, Menus $menu)
     {
         $validated = $request->validate([
             'title' => 'required|string|max:255',
             'description' => 'nullable|string',
             'price' => 'required|numeric',
             'image' => 'nullable|image|max:2048',
         ]);

         if ($request->hasFile('image')) {
             if ($menu->image) {
                 Storage::disk('public')->delete($menu->image); // Hapus gambar lama
             }
             $validated['image'] = $request->file('image')->store('menu-images', 'public');
         }

         $menu->update($validated);
         return redirect()->route('crud.index')->with('success', 'Menu berhasil diperbarui.');
     }

     // Hapus menu dari database
     public function crudDestroy(Menus $menu)
     {
         if ($menu->image) {
             Storage::disk('public')->delete($menu->image); // Hapus gambar
         }
         $menu->delete();
         return redirect()->route('crud.index')->with('success', 'Menu berhasil dihapus.');
     }
}
