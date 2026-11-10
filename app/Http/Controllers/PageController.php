<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function masuk(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:50',
            'password' => 'required|string',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $usernameBenar = 'admin';
        $passwordBenar = '123';

        if ($request->username !== $usernameBenar || $request->password !== $passwordBenar) {
            return back()
                ->withErrors(['login' => 'Username atau password salah.'])
                ->withInput($request->only('username'));
        }

        return redirect()->route('dashboard', ['username' => $request->username]);
    }

    public function dashboard(Request $request)
    {
        return view('dashboard', [
            'username' => $request->query('username', 'Tamu'),
        ]);
    }

    public function pengelolaan(Request $request)
    {
        $bahan = [
            ['nama' => 'Beras',         'jumlah' => 25,  'satuan' => 'kg'],
            ['nama' => 'Minyak Goreng', 'jumlah' => 12,  'satuan' => 'liter'],
            ['nama' => 'Telur Ayam',    'jumlah' => 120, 'satuan' => 'butir'],
        ];

        return view('pengelolaan', [
            'username' => $request->query('username', 'Tamu'),
            'bahan'    => $bahan,
        ]);
    }

    public function profile(Request $request)
    {
        return view('profile', [
            'username' => $request->query('username', 'Tamu'),
            'peran'    => 'Staf Gudang',
            'tempat'   => 'Gudang Bahan Baku Restoran',
        ]);
    }
}
