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
        <h5>Laporan Data Daftar Paket Nazwa Travel</h5>
        <h6><a target="_blank" href="#">www.nazwatour.com</a></h5>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr bgcolor = #ADD8E6>
                <th>No.</th>
                <th>Nama Paket</th>
                <th>Id Paket Wisata</th>
                <th>Jumlah Peserta</th>
                <th>Harga Paket</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach($daftarpaket as $key => $dp)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$dp->nama_paket}}</td>
                <td id={{$key+1}}>{{$dp->fpaketwisata->id}}</td>
                <td>{{$dp->jumlah_peserta}}</td>
                <td>{{$dp->harga_paket}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>