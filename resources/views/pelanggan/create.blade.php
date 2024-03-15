@extends('adminlte::page')
@section('title', 'Tambah Daftar Pelanggan')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Daftar Pelanggan</h1>
@stop
@section('content')
<form action="{{route('pelanggan.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap Pelanggan</label>
                        <input type="text" class="form-control 
@error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" placeholder="Nama Lengkap Pelanggan" name="nama_lengkap"
                            value="{{old('nama_lengkap')}}">
                        @error('nama_lengkap') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Nomor Handphone</label>
                        <input type="text" class="form-control 
@error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Nomor Handphone" name="no_hp" value="{{old('no_hp')}}">
                        @error('no_hp') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control 
@error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" name="alamat" value="{{old('alamat')}}">
                        @error('alamat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto" class="form-label">Foto Pelanggan</label>
                        <img src="/img/no-image.png" class="img-preview img-fluid mb-3 col-sm-5 d-block" style="width: 100px;" name="tampil" alt="..." width="15%"
                            id="tampil" >
                        <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto"
                            name="foto">
                        @error('foto') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_user">ID User</label>
                        <div class="input-group">
                            <input type="hidden" name="id_user" id="id_user" value="{{old('id_user')}}">
                            <input type="text" class="form-control
                    @error('name') is-invalid @enderror" placeholder="ID User" id="name" name="name"
                                value="{{old('name')}}" arialabel="ID User" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop"></i>
                                Cari Data User</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{route('pelanggan.index')}}" class="btn btn-default">
                    Batal
                </a>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Users</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>ID User</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Aktif</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $us)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$us->name}}</td>
                                <td>{{$us->email}}</td>
                                <td>{{$us->level}}</td>
                                <td>{{$us->aktif}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-xs"
                                        onclick="pilih('{{$us->id}}', '{{$us->name}}')" data-bs-dismiss="modal">
                                        Pilih
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
    @stop
    @push('js')
    <script>
        function readURL(input){
        if(input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
        $('#tampil').attr('src', e.target.result);
        } 
        reader.readAsDataURL(input.files[0]);
        } 
        } 
        $("#foto").change(function(){
        readURL(this);
        //$('#hasil').show();
        });
        </script>
    <script>
    $('#example2').DataTable({
        "responsive": true,
    });
    //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Bidang Studi dari Modal ke form tambah

    function pilih(id, buser) {
        document.getElementById('id_user').value = id
        document.getElementById('name').value = buser
    }
    </script>
    @endpush