<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->get('search');
        $kategoris = Kategori::where('nama_kategori', 'like', "%$query%")
            ->orWhere('deskripsi', 'like', "%$query%")
            ->paginate(5);

        return view('kategori.index', compact('kategoris', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = validator($request->all(), [
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ])->validate();

        $kategori = new Kategori($validatedData);
        $kategori->save();

        return redirect(route('kategori.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $kategori = Kategori::findOrFail($id);
    return view('kategori.edit', [
       'kategori' => $kategori
       ]);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validatedData = validator($request->all(), [
    'nama_kategori' => 'required|string|max:255',
    'deskripsi' => 'required|string',
    ])->validate();

    $kategori = Kategori::findOrFail($id);

    $kategori->update([
    'nama_kategori' => $request->nama_kategori,
    'deskripsi'     => $request->deskripsi
    ]);

    return redirect(route('kategori.index'));
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $kategori = Kategori::findOrFail($id);
    $kategori->delete();
    return redirect(route('kategori.index'));
}
}
