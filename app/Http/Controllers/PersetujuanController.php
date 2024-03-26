<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Pengendara;
use App\Models\Persetujuan;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PersetujuanExport;

class PersetujuanController extends Controller
{
    public function dashboard(): View
    {
        $kendaraan = Kendaraan::query()->count();
        $pengendara = Pengendara::query()->count();
        $persetujuan = Persetujuan::query()->count();
        $user = User::query()->count();
        return view('dashboard', compact('kendaraan', 'pengendara', 'persetujuan', 'user'));
    }

    public function index(): View
    {
        $persetujuan = Persetujuan::all();
        return view('pemesanan.index_persetujuan', compact('persetujuan'));
    }

    public function indexAtasan(): View
    {
        $persetujuan = Persetujuan::all();
        return view('pemesanan.index_persetujuan_atasan', compact('persetujuan'));
    }

    public function getTambah(): View
    {
        $pengendara = Pengendara::latest()->get();
        $kendaraan = Kendaraan::latest()->get();
        return view('pemesanan.tambah_pemesanan', compact('pengendara', 'kendaraan'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id_users' => 'required',
            'id_kendaraan' => 'required',
            'id_pengendara' => 'required',
            'persetujuan_admin' => 'required',
            'persetujuan_atasan' => 'required',
            'admin_menanggapi' => 'required',
            'atasan_menanggapi' => 'required',
        ]);

        Persetujuan::create([
            'id_users' => $request->id_users,
            'id_pengendara' => $request->id_pengendara,
            'id_kendaraan' => $request->id_kendaraan,
            'persetujuan_admin' => $request->persetujuan_admin,
            'persetujuan_atasan' => $request->persetujuan_atasan,
            'admin_menanggapi' => $request->admin_menanggapi,
            'atasan_menanggapi' => $request->atasan_menanggapi,
        ]);

        return redirect()->route('pemesanan.index');
    }

    public function setujuAdmin(Request $request): RedirectResponse
    {
        $persetujuan_id = $request->id;

        Persetujuan::findOrFail($persetujuan_id)->update([
           'persetujuan_admin' => 1,
            'admin_menanggapi' => 1
        ]);

        return redirect()->route('pemesanan.index');
    }

    public function setujuAtasan(Request $request): RedirectResponse
    {
        $persetujuan_id = $request->id;

        Persetujuan::findOrFail($persetujuan_id)->update([
            'persetujuan_atasan' => 1,
            'atasan_menanggapi' => 1
        ]);

        return redirect()->route('pemesanan.index.atasan');
    }

    public function tidaksetujuAdmin(Request $request): RedirectResponse
    {
        $persetujuan_id = $request->id;

        Persetujuan::findOrFail($persetujuan_id)->update([
            'persetujuan_admin' => 0,
            'admin_menanggapi' => 1
        ]);

        return redirect()->route('pemesanan.index');
    }

    public function tidaksetujuAtasan(Request $request): RedirectResponse
    {
        $persetujuan_id = $request->id;

        Persetujuan::findOrFail($persetujuan_id)->update([
            'persetujuan_atasan' => 0,
            'atasan_menanggapi' => 1
        ]);

        return redirect()->route('pemesanan.index.atasan');
    }

    public function export()
    {
        return Excel::download(new PersetujuanExport, 'persetujuan.xlsx');
    }
}
