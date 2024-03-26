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
                        <h3>Form Tambah Pemesanan</h3>
                        <form action="{{ route('pemesanan.store') }}" method="POST">
                            @csrf
                           <div class="mb-3">
                               <label for="simpleinput">Masukkan Pengendara</label>
                               <select id="simpleinput" class="form-control" name="id_pengendara">
                                      <option value="">Pilih Pengendara</option>
                                      @foreach($pengendara as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                      @endforeach
                               </select>
                           </div>
                            <div class="mb-3">
                                <label for="simpleinput">Masukkan Kendaraan</label>
                                <select id="simpleinput" class="form-control" name="id_kendaraan">
                                    <option value="">Pilih Kendaraan</option>
                                    @foreach($kendaraan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_kendaraan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="id_users" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                            <input type="hidden" name="persetujuan_admin" value="0">
                            <input type="hidden" name="persetujuan_atasan" value="0">
                            <input type="hidden" name="admin_menanggapi" value="0">
                            <input type="hidden" name="atasan_menanggapi" value="0">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div> <!-- end card -->
            </div> <!-- end col-->
        </div>
        <!-- end row -->


    </div>
    <!-- container -->
@endsection
