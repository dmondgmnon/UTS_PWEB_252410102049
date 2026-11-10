<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Data bahan baku (disimpan di controller, tanpa database)
    private function dataBahan(): array
    {
        $data = [
            ['id' => 1,  'nama' => 'Beras Premium',  'kategori' => 'Bahan Pokok',       'stok' => 120, 'satuan' => 'kg',    'minimum' => 50, 'supplier' => 'CV Tani Makmur'],
            ['id' => 2,  'nama' => 'Ayam Potong',    'kategori' => 'Daging & Unggas',   'stok' => 18,  'satuan' => 'kg',    'minimum' => 25, 'supplier' => 'UD Berkah Unggas'],
            ['id' => 3,  'nama' => 'Daging Sapi',    'kategori' => 'Daging & Unggas',   'stok' => 12,  'satuan' => 'kg',    'minimum' => 15, 'supplier' => 'UD Berkah Unggas'],
            ['id' => 4,  'nama' => 'Telur Ayam',     'kategori' => 'Protein',           'stok' => 30,  'satuan' => 'kg',    'minimum' => 20, 'supplier' => 'Peternakan Sumber Rejeki'],
            ['id' => 5,  'nama' => 'Minyak Goreng',  'kategori' => 'Bumbu & Minyak',    'stok' => 40,  'satuan' => 'liter', 'minimum' => 30, 'supplier' => 'PT Sinar Pangan'],
            ['id' => 6,  'nama' => 'Bawang Merah',   'kategori' => 'Sayur & Bumbu',     'stok' => 8,   'satuan' => 'kg',    'minimum' => 10, 'supplier' => 'Pasar Induk Tanjung'],
            ['id' => 7,  'nama' => 'Cabai Rawit',    'kategori' => 'Sayur & Bumbu',     'stok' => 15,  'satuan' => 'kg',    'minimum' => 10, 'supplier' => 'Pasar Induk Tanjung'],
            ['id' => 8,  'nama' => 'Tepung Terigu',  'kategori' => 'Bahan Pokok',       'stok' => 60,  'satuan' => 'kg',    'minimum' => 25, 'supplier' => 'CV Tani Makmur'],
            ['id' => 9,  'nama' => 'Gula Pasir',     'kategori' => 'Bahan Pokok',       'stok' => 45,  'satuan' => 'kg',    'minimum' => 20, 'supplier' => 'PT Sinar Pangan'],
            ['id' => 10, 'nama' => 'Susu Cair',      'kategori' => 'Minuman',           'stok' => 22,  'satuan' => 'liter', 'minimum' => 24, 'supplier' => 'PT Segar Dairy'],
        ];

        // Tambahkan status otomatis: Menipis jika stok <= minimum
        return array_map(function ($item) {
            $item = (object) $item;
            $item->status = $item->stok <= $item->minimum ? 'Menipis' : 'Aman';
            return $item;
        }, $data);
    }

    public function login()
    {
        if (session('username')) {
            return redirect()->route('dashboard');
        }

        return view('login');
    }

    public function proses(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:30',
            'password' => 'required|string',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        // Simulasi login: password tetap "123"
        if ($request->password !== '123') {
            return back()
                ->withInput($request->only('username'))
                ->withErrors(['password' => 'Password salah. Coba lagi.']);
        }

        // Simpan username agar bisa dipakai di Dashboard dan Profile
        session(['username' => $request->username]);

        return redirect()->route('dashboard');
    }

    public function dashboard()
    {
        if (! session('username')) {
            return redirect()->route('login');
        }

        $bahan = $this->dataBahan();

        return view('dashboard', [
            'username'       => session('username'),
            'total'          => count($bahan),
            'menipis'        => array_filter($bahan, fn ($b) => $b->status === 'Menipis'),
            'jumlahKategori' => collect($bahan)->pluck('kategori')->unique()->count(),
        ]);
    }

    public function pengelolaan(Request $request)
    {
        if (! session('username')) {
            return redirect()->route('login');
        }

        $bahan = $this->dataBahan();
        $cari  = $request->query('cari');

        if ($cari) {
            $bahan = array_filter($bahan, fn ($b) =>
                stripos($b->nama, $cari) !== false || stripos($b->kategori, $cari) !== false
            );
        }

        return view('pengelolaan', compact('bahan', 'cari'));
    }

    public function profile()
    {
        if (! session('username')) {
            return redirect()->route('login');
        }

        return view('profile', [
            'username' => session('username'),
            'role'     => 'Admin Gudang',
            'total'    => count($this->dataBahan()),
        ]);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect()->route('login');
    }
}
