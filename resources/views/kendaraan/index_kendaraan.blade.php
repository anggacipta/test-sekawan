@extends('layouts_dashboard.main')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <form class="d-flex align-items-center mb-3">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control border-0" id="dash-daterange">
                                <span class="input-group-text bg-blue border-blue text-white">
                                                <i class="mdi mdi-calendar-range"></i>
                                            </span>
                            </div>
                            <a href="javascript: void(0);" class="btn btn-blue btn-sm ms-2">
                                <i class="mdi mdi-autorenew"></i>
                            </a>
                            <a href="javascript: void(0);" class="btn btn-blue btn-sm ms-1">
                                <i class="mdi mdi-filter-variant"></i>
                            </a>
                        </form>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body pb-2">
                        <table id="myTable" class="display">
                            <thead>
                            <tr>
                                <th>Nama Kendaraan</th>
                                <th>Konsumsi BBM</th>
                                <th>Plat Nomor</th>
                                <th>Jadwal Service</th>
                                <th>Riwayat Pemakaian</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($kendaraan as $item)
                            <tr>
                                <td>{{ $item->nama_kendaraan }}</td>
                                <td>{{ $item->konsumsi_bbm }}</td>
                                <td>{{ $item->plat_nomor }}</td>
                                <td>{{ $item->jadwal_service }}</td>
                                <td>{{ $item->riwayat_pemakaian }}</td>
                                <td>
                                    <a href="{{ route('kendaraan.edit', $item->id) }}" class="btn btn-warning my-2">Edit</a>
                                    <form action="{{ route('kendaraan.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card -->
            </div> <!-- end col-->
        </div>
        <!-- end row -->


    </div>
    <!-- container -->
@endsection
