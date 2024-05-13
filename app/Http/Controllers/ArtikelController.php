<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->get('search');
        $artikels = Artikel::with('kategori')
            ->where('judul', 'like', "%$query%")
            ->orWhereHas('kategori', function ($q) use ($query) {
                $q->where('nama_kategori', 'like', "%$query%");
            })
            ->paginate(5);

        return view('artikel.index', compact('artikels', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('artikel.create', [
            'kategoris' => $kategoris
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'kategori_id' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // tambahkan validasi untuk gambar
        ]);

        // Upload gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time() . '.' . $gambar->getClientOriginalExtension();
            $path = $gambar->storeAs('public/images', $nama_gambar);
            $validatedData['gambar'] = 'images/' . $nama_gambar;
        }

        Artikel::create($validatedData);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(Artikel $artikel)
    {
        // return view('artikel.detail', [
        //     'artikel' => $artikel
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artikel $artikel)
    {
        $kategoris = Kategori::all();
        return view('artikel.edit', [
            'artikel' => $artikel,
            'kategoris'=> $kategoris
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artikel $artikel)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'kategori_id' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // tambahkan validasi untuk gambar
        ]);

        // Upload gambar jika ada perubahan
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time() . '.' . $gambar->getClientOriginalExtension();
            $path = $gambar->storeAs('public/images', $nama_gambar);
            $validatedData['gambar'] = 'images/' . $nama_gambar;

            // Hapus gambar lama jika ada
            if ($artikel->gambar && Storage::exists($artikel->gambar)) {
                Storage::delete($artikel->gambar);
            }
        }

        $artikel->update($validatedData);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artikel $artikel)
    {
        $artikel->delete();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus');
    }
}
