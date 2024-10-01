<?php

namespace App\Http\Controllers;

use App\Models\MasterBerita;
use Illuminate\Http\Request;

class MasterBeritaController extends Controller
{
    // Menampilkan daftar berita
    public function index()
    {
        $master_berita = MasterBerita::all();
        return view('master_berita', compact('master_berita'));
    }

    // Menampilkan form untuk menambahkan berita baru
    public function create()
    {
        return view('berita.create');
    }

    // Menyimpan berita baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'content' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tgl_publish' => 'required|date',
            'author_id' => 'required|integer',
            'kategori_id' => 'required|integer',
        ]);

        $berita = new MasterBerita();
        $berita->judul = $request->judul;
        $berita->content = $request->content;
        $berita->tgl_publish = $request->tgl_publish;
        $berita->author_id = $request->author_id;
        $berita->kategori_id = $request->kategori_id;

        // Menyimpan gambar jika ada
        if ($request->hasFile('gambar')) {
            $berita->gambar = $request->file('gambar')->store('images', 'public');
        }

        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit berita
    public function edit($id)
    {
        $berita = MasterBerita::findOrFail($id);
        return view('berita.edit', compact('berita'));
    }

    // Mengupdate berita yang sudah ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'content' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tgl_publish' => 'required|date',
            'author_id' => 'required|integer',
            'kategori_id' => 'required|integer',
        ]);

        $berita = MasterBerita::findOrFail($id);
        $berita->judul = $request->judul;
        $berita->content = $request->content;
        $berita->tgl_publish = $request->tgl_publish;
        $berita->author_id = $request->author_id;
        $berita->kategori_id = $request->kategori_id;

        // Menyimpan gambar jika ada
        if ($request->hasFile('gambar')) {
            $berita->gambar = $request->file('gambar')->store('images', 'public');
        }

        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    // Menghapus berita dari database
    public function destroy($id)
    {
        $berita = MasterBerita::findOrFail($id);
        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
