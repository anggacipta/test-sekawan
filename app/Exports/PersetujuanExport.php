<?php

namespace App\Exports;

use App\Models\Persetujuan;
//use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PersetujuanExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $persetujuan = Persetujuan::all();
        return view('pemesanan.export_table', compact('persetujuan'));
    }
}
