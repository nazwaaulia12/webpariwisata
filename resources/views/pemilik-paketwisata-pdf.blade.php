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
        <h5>Laporan Data Paket Wisata Nazwa Travel</h5>
        <h6><a target="_blank" href="#">www.nazwatour.com</a></h5>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr bgcolor = #ADD8E6>
                <th>Id Paket Wisata</th>
                <th>Nama Paket</th>
                <th>Deskripsi</th>
                <th>Fasilitas</th>
                <th>Itinerary</th>
                <th>Diskon</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach($paketwisata as $key => $pw)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$pw->nama_paket}}</td>
                <td>{{$pw->deskripsi}}</td>
                <td>{{$pw->fasilitas}}</td>
                <td>{{$pw->itinerary}}</td>
                <td>{{$pw->diskon}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>