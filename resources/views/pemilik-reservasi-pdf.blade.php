<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Penjualan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan Data Reservasi NazwaTour and Travel</h5>
        <h6><a target="_blank" href="#">www.nazwatour.com</a></h5>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr bgcolor = #ADD8E6>
                <th>No.</th>
                <th>ID Pelanggan</th>
                <th>ID Daftar Paket</th>
                <th>Tanggal Reservasi</th>
                <th>Harga</th>
                <th>Jumlah Peserta</th>
                <th>Diskon</th>
                <th>Nilai Diskon</th>
                <th>Total Bayar</th>
                <!-- <th>Bukti Transfer</th> -->
                <th>Status Reservasi</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach($reservasi as $key => $rs)
            <tr>
                <td>{{ $i++ }}</td>
                <td id={{$key+1}} >{{$rs->fpelanggan->id}}</td>
                <td id={{$key+1}} >{{$rs->fdaftarpaket->id}}</td>
                <td>{{$rs->tanggal_reservasi_wisata}}</td>
                <td>{{$rs->harga}}</td>
                <td>{{$rs->jumlah_peserta}}</td>
                <td>{{$rs->diskon}}</td>
                <td>{{$rs->nilai_diskon}}</td>
                <td>{{$rs->total_bayar}}</td>
                <!-- <td>
                    <img src="storage/{{$rs->file_bukti_tf}}" alt="{{$rs->file_bukti_tf}} tidak tampil"
                        class="img-thumbnail">
                </td> -->
                <td>{{$rs->status_reservasi_wisata}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>