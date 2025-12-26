<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirasi;

class AspirasiController extends Controller
{
    // Halaman form aspirasi
    public function index()
    {
        $aspirasis = Aspirasi::latest()->get();
        return view('pages.aspirasi', compact('aspirasis'));
    }

    // Proses simpan aspirasi
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'kategori' => 'required|string',
            'tujuan' => 'required|string',
            'pesan' => 'required|string'
        ], [
            'nama.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'kategori.required' => 'Kategori aspirasi wajib dipilih',
            'tujuan.required' => 'Tujuan aspirasi wajib dipilih',
            'pesan.required' => 'Isi aspirasi wajib diisi'
        ]);

        Aspirasi::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'kategori' => $request->kategori,
            'tujuan' => $request->tujuan,
            'pesan' => $request->pesan,
        ]);

        return back()->with('success', 'Terima kasih! Aspirasi Anda berhasil dikirim dan akan segera ditindaklanjuti.');
    }

    // Halaman daftar semua aspirasi
    public function list()
    {
        $data = Aspirasi::latest()->get();
        return view('pages.aspirasi-list', compact('data'));
    }

    // Hapus aspirasi (TAMBAHKAN METHOD INI)
    public function destroy($id)
    {
        try {
            $aspirasi = Aspirasi::findOrFail($id);
            $aspirasi->delete();

            return back()->with('success', 'Aspirasi berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus aspirasi!');
        }
    }
}
