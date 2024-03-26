<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table class="table">
    <thead>
    <tr>
        <th>Nama Pengendara</th>
        <th>Nama Admin yang menginputkan</th>
        <th>Kendaraan yang akan dipakai</th>
        <th>Persetujuan Admin</th>
        <th>Persetujuan Atasan</th>
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
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
