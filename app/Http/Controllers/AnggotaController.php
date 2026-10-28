<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();

        return view('anggota.index', compact('anggota'));
    }

    public function create()
    {
        return view('anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tipe' => 'required|in:Mahasiswa,Dosen,Umum',
            'status' => 'required|in:Aktif,Tidak Aktif',
        ], [
            'nama.required' => 'Nama anggota wajib diisi.',
        ]);

        Anggota::create([
            'nama' => $request->nama,
            'tipe' => $request->tipe,
            'status' => $request->status,
        ]);

        return redirect()->route('anggota.index');
    }

    public function edit(Anggota $anggota)
    {
        return view('anggota.edit', compact('anggota'));
    }

    public function update(Request $request, Anggota $anggota)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tipe' => 'required|in:Mahasiswa,Dosen,Umum',
            'status' => 'required|in:Aktif,Tidak Aktif',
        ], [
            'nama.required' => 'Nama anggota wajib diisi.',
        ]);

        $anggota->update([
            'nama' => $request->nama,
            'tipe' => $request->tipe,
            'status' => $request->status,
        ]);

        return redirect()->route('anggota.index');
    }
    
    public function destroy(Anggota $anggota)
    {
        $anggota->delete();

        return redirect()->route('anggota.index');
    }
    
    public function kartu(Anggota $anggota)
    {
        return view('anggota.kartu', compact('anggota'));
    }
}
