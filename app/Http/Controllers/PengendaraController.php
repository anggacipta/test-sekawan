<?php

namespace App\Http\Controllers;

use App\Models\Pengendara;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PengendaraController extends Controller
{
    public function index(): View
    {
        $pengendara = Pengendara::all();
        return view('pengendara.index_pengendara', compact('pengendara'));
    }

    public function getTambah(): View
    {
        return view('pengendara.tambah_pengendara');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
        ]);

        Pengendara::create([
            'nama' => $request->nama,
            'ttl' => $request->ttl,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('pengendara.index');
    }

    public function getEdit($id): View
    {
        $pengendara = Pengendara::findOrFail($id);
        return view('pengendara.edit_pengendara', compact('pengendara'));
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
        ]);

        Pengendara::findOrFail($request->id)->update([
            'nama' => $request->nama,
            'ttl' => $request->ttl,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('pengendara.index');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $id = $request->id;
        Pengendara::findOrFail($id)->delete();
        return redirect()->route('pengendara.index');
    }
}
