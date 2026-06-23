<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatController extends Controller
{
    public function index(Request $request)
    {
        $cats = Cat::query()
            ->when($request->search, function ($query) use ($request) {
                $query->where('nama', 'like', '%' . $request->search . '%');
            })
            ->latest()
            ->get();

        return view('cats.index', compact('cats'));
    }

    public function create()
    {
        return view('cats.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'umur' => 'required|integer',
        'jenis_kelamin' => 'required',
        'lokasi' => 'required',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $fotoPath = null;

    if ($request->hasFile('foto')) {
        $fotoPath = $request->file('foto')->store('cats', 'public');
    }

    Cat::create([
        'user_id' => Auth::id(),
        'nama' => $request->nama,
        'umur' => $request->umur,
        'jenis_kelamin' => $request->jenis_kelamin,
        'ras' => $request->ras,
        'warna' => $request->warna,
        'lokasi' => $request->lokasi,
        'foto' => $fotoPath,
        'deskripsi' => $request->deskripsi,
        'status' => 'tersedia',
    ]);

    return redirect()
        ->route('cats.index')
        ->with('success', 'Data kucing berhasil ditambahkan');
}
    public function edit(Cat $cat)
    {
        return view('cats.edit', compact('cat'));
    }

    public function update(Request $request, Cat $cat)
    {
        $request->validate([
            'nama' => 'required',
            'umur' => 'required|integer',
            'jenis_kelamin' => 'required',
            'lokasi' => 'required',
        ]);

        $cat->update([
            'nama' => $request->nama,
            'umur' => $request->umur,
            'jenis_kelamin' => $request->jenis_kelamin,
            'ras' => $request->ras,
            'warna' => $request->warna,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('cats.index')
            ->with('success', 'Data kucing berhasil diperbarui');
    }

    public function destroy(Cat $cat)
    {
        $cat->delete();

        return redirect()->route('cats.index')
            ->with('success', 'Data kucing berhasil dihapus');
    }
}