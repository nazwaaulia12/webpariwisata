@extends('adminlte::page')
@section('title', 'List Daftar Reservasi')
@section('content_header')
<h1 class="m-0 text-dark">List Daftar Reservasi</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card overflow-scroll">
            <div class="card-body">
                <a href="/exportpdf" class="btn btn-primary mb-2">
                    Export
                </a>
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead bgcolor = #ADD8E6>
                        <tr>
                            <th>No.</th>
                            <th>ID Pelanggan</th>
                            <th>ID Daftar Paket</th>
                            <th>Tanggal Reservasi</th>
                            <th>Harga</th>
                            <th>Jumlah Peserta</th>
                            <th>Diskon</th>
                            <th>Nilai Diskon</th>
                            <th>Total Bayar</th>
                            <th>Bukti Transfer</th>
                            <th>Status Reservasi</th>
                            <!-- <th>Opsi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservasi as $key => $rs)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td id={{$key+1}} >{{$rs->fpelanggan->id}}</td>
                            <td id={{$key+1}} >{{$rs->fdaftarpaket->id}}</td>
                            <td>{{$rs->tanggal_reservasi_wisata}}</td>
                            <td>{{$rs->harga}}</td>
                            <td>{{$rs->jumlah_peserta}}</td>
                            <td>{{$rs->diskon}}</td>
                            <td>{{$rs->nilai_diskon}}</td>
                            <td>{{$rs->total_bayar}}</td>
                            <td>
                                <img src="storage/{{$rs->file_bukti_tf}}" alt="{{$rs->file_bukti_tf}} tidak tampil"
                                    class="img-thumbnail">
                            </td>
                            <td>{{$rs->status_reservasi_wisata}}</td>
                            <!-- <td>
                                <a href="{{route('reservasi.edit', $rs)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('reservasi.destroy', $rs)}}" onclick="notificationBeforeDelete(event, this, <?php echo $key + 1; ?>)" class="btn btn-danger btn-xs">
                                    Delete
                                </a>
                            </td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
@push('js')
<form action=" " id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<script>
    $('#example2').DataTable({
        "responsive": true,
    });

    function notificationBeforeDelete(event, el, dt) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus data reservasi \"' + document.getElementById(dt).innerHTML + '\" ?')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }
</script>
@endpush