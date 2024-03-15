@extends('adminlte::page')
@section('title', 'List Paket Wisata')
@section('content_header')
<h1 class="m-0 text-dark">List Paket Wisata</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card overflow-scroll">
            <div class="card-body">
                <a href="{{route('paket_wisata.create')}}" class="btn btn-primary mb-2">
                    Tambah
                </a>
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead bgcolor = #ADD8E6>
                        <tr>
                            <th>Id Paket Wisata</th>
                            <th>Nama Paket</th>
                            <th>Deskripsi</th>
                            <th>Fasilitas</th>
                            <th>Itinerary</th>
                            <th>Diskon</th>
                            <th>Foto 1</th>
                            <th>Foto 2</th>
                            <th>Foto 3</th>
                            <th>Foto 4</th>
                            <th>Foto 5</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($paketwisata as $key => $pw)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$pw->nama_paket}}</td>
                            <td>{{$pw->deskripsi}}</td>
                            <td>{{$pw->fasilitas}}</td>
                            <td>{{$pw->itinerary}}</td>
                            <td>{{$pw->diskon}}</td>
                            <td>
                                <img src="storage/{{$pw->foto1}}" alt="{{$pw->foto1}} tidak tampil"
                                    class="img-thumbnail">
                            </td>
                            <td>
                                <img src="storage/{{$pw->foto2}}" alt="{{$pw->foto2}} tidak tampil"
                                    class="img-thumbnail">
                            </td>
                            <td>
                                <img src="storage/{{$pw->foto3}}" alt="{{$pw->foto3}} tidak tampil"
                                    class="img-thumbnail">
                            </td>
                            <td>
                                <img src="storage/{{$pw->foto4}}" alt="{{$pw->foto4}} tidak tampil"
                                    class="img-thumbnail">
                            </td>
                            <td>
                                <img src="storage/{{$pw->foto5}}" alt="{{$pw->foto5}} tidak tampil"
                                    class="img-thumbnail">
                            </td>
                            <td>
                                <a href="{{route('paket_wisata.edit', $pw)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('paket_wisata.destroy', $pw)}}" onclick="notificationBeforeDelete(event, this, <?php echo 
$key+1; ?>)" class="btn btn-danger btn-xs">
                                    Delete
                                </a>
                            </td>
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
    if (confirm('Apakah anda yakin akan menghapus data Guru \"' +
            document.getElementById(dt).innerHTML + '\" ?')) {
        $("#delete-form").attr('action', $(el).attr('href'));
        $("#delete-form").submit();
    }
}
</script>
@endpush