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
                        <a href="{{ route('pemesanan.export') }}" class="btn btn-success">Export Excel</a>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nama Pengendara</th>
                                <th>Nama Admin yang menginputkan</th>
                                <th>Kendaraan yang akan dipakai</th>
                                <th>Persetujuan Admin</th>
                                <th>Persetujuan Atasan</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($persetujuan as $item)
                                <tr>
                                    <td>{{ $item['pengendara']['nama'] }}</td>
                                    <td>{{ $item['pengguna']['nama'] }}</td>
                                    <td>{{ $item['kendaraans']['nama_kendaraan'] }}</td>
                                    @if($item->persetujuan_admin == 0 && $item->admin_menanggapi == 0)
                                        <td><span class="badge rounded-pill bg-warning">Menunggu persetujuan</span></td>
                                    @elseif($item->persetujuan_admin == 0 && $item->admin_menanggapi == 1)
                                        <td><span class="badge rounded-pill bg-danger">Tidak disetujui</span></td>
                                    @elseif($item->persetujuan_admin == 1 && $item->admin_menanggapi == 1)
                                        <td><span class="badge rounded-pill bg-success">Telah disetujui</span></td>
                                    @endif
                                    @if($item->persetujuan_atasan == 0 && $item->atasan_menanggapi == 0)
                                        <td><span class="badge rounded-pill bg-warning">Menunggu persetujuan</span></td>
                                    @elseif($item->persetujuan_atasan == 0 && $item->admin_menanggapi == 1)
                                        <td><span class="badge rounded-pill bg-danger">Tidak disetujui</span></td>
                                    @elseif($item->persetujuan_atasan == 1 && $item->admin_menanggapi == 1)
                                        <td><span class="badge rounded-pill bg-success">Telah disetujui</span></td>
                                    @endif
                                    <td>
                                        @if($item->persetujuan_admin == 0 && $item->admin_menanggapi == 0)
                                            <form action="{{ route('pemesanan.setuju.admin', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <button type="submit" class="btn btn-soft-success">Setuju</button>
                                            </form>
                                            <form action="{{ route('pemesanan.tidaksetuju.admin', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <button type="submit" class="btn btn-soft-danger">Tidak Setuju</button>
                                            </form>
                                        @elseif($item->persetujuan_admin == 0 && $item->admin_menanggapi == 1)

                                        @elseif($item->persetujuan_admin == 1 && $item->admin_menanggapi == 1)

                                        @endif
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
