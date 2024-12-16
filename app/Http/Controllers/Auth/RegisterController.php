<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // Tampilkan Form Registrasi Pengguna
    public function showUserRegistrationForm()
    {
        return view('auth.register_user'); // Pastikan file ini ada
    }

    // Tangani Registrasi Pengguna
    public function registerUser(Request $request)
    {
        // Logika registrasi pengguna
        // Validasi, simpan ke database, dll.
        return redirect()->route('login')->with('success', 'Registrasi pengguna berhasil!');
    }

    // Tampilkan Form Registrasi Admin
    public function showAdminRegistrationForm()
    {
        return view('auth.register_admin'); // Pastikan file ini ada
    }

    // Tangani Registrasi Admin
    public function registerAdmin(Request $request)
    {
        // Logika registrasi admin
        // Validasi, simpan ke database, dll.
        return redirect()->route('login')->with('success', 'Registrasi admin berhasil!');
    }
}

