<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KendaraanController extends Controller
{
    public function index(): View
    {
        $kendaraan = Kendaraan::all();
        return view('kendaraan.index_kendaraan', compact('kendaraan'));
    }

    public function getTambah(): View
    {
        return view('kendaraan.tambah_kendaraan');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_kendaraan' => 'required',
            'konsumsi_bbm' => 'required',
            'plat_nomor' => 'required',
            'jadwal_service' => 'required',
            'riwayat_pemakaian' => 'required',
        ]);

        Kendaraan::create([
            'nama_kendaraan' => $request->nama_kendaraan,
            'konsumsi_bbm' => $request->konsumsi_bbm,
            'plat_nomor' => $request->plat_nomor,
            'jadwal_service' => $request->jadwal_service,
            'riwayat_pemakaian' => $request->riwayat_pemakaian,
        ]);

        return redirect('dashboard');
    }

    public function getEdit($id): View
    {
        $kendaraan = Kendaraan::findOrFail($id);
        return view('kendaraan.edit_kendaraan', compact('kendaraan'));
    }

    public function update(Request $request)
    {
        $kendaraan_id = $request->id;

        $request->validate([
            'nama_kendaraan' => 'required',
            'konsumsi_bbm' => 'required',
            'plat_nomor' => 'required',
            'jadwal_service' => 'required',
            'riwayat_pemakaian' => 'required',
        ]);

        Kendaraan::findOrFail($kendaraan_id)->update([
            'nama_kendaraan' => $request->nama_kendaraan,
            'konsumsi_bbm' => $request->konsumsi_bbm,
            'plat_nomor' => $request->plat_nomor,
            'jadwal_service' => $request->jadwal_service,
            'riwayat_pemakaian' => $request->riwayat_pemakaian,
        ]);

        return redirect('dashboard');
    }

    public function destroy(Request $request)
    {
        $kendaraan_id = $request->id;
        Kendaraan::findOrFail($kendaraan_id)->delete();
        return redirect('dashboard');
    }
}
