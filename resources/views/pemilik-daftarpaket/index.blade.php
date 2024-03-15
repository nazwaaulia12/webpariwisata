@extends('adminlte::page')
@section('title', 'List Daftar Paket')
@section('content_header')
<h1 class="m-0 text-dark">List Daftar Paket</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="/exportpdf2" class="btn btn-primary mb-2">
                    Export
                </a>
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead bgcolor = #ADD8E6>
                        <tr>
                            <th>No.</th>
                            <th>Nama Paket</th>
                            <th>Id Paket Wisata</th>
                            <th>Jumlah Peserta</th>
                            <th>Harga Paket</th>
                            <!-- <th>Opsi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($daftarpaket as $key => $dp)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$dp->nama_paket}}</td>
                            <td id={{$key+1}}>{{$dp->fpaketwisata->id}}</td>
                            <td>{{$dp->jumlah_peserta}}</td>
                            <td>{{$dp->harga_paket}}</td>
                            <!-- <td>
                                <a href="{{route('daftar_paket.edit', $dp)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('daftar_paket.destroy', $dp)}}" onclick="notificationBeforeDelete(event, this, <?php echo $key + 1; ?>)" class="btn btn-danger btn-xs">
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
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<script>
    $('#example2').DataTable({
        "responsive": true,
    });

    function notificationBeforeDelete(event, el, dt) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus daftar paket \"' + document.getElementById(dt).innerHTML + '\" ?')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }
</script>
@endpush