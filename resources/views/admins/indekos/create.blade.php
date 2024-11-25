@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
    <h3>Tambah Indekos</h3>
    <div class="card">
        {{-- <div class="card-header">
            <div class="card-tools">
                <a href="{{ route('indekos.create') }}" class="btn btn-primary">Tambah Indekos</a>
            </div>
        </div> --}}
        <div class="card-body">
            <form action="{{ route('indekos.store') }}" method="post">
                @csrf
                <div class="form-group" >
                    <label for="name">Nama Indekos</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group" >
                    <label for="address">Alamat Indekos</label>
                    {{-- textarea --}}
                    <textarea name="address" class="form-control" required></textarea>
                </div>
                <div class="form-group" >
                    <label for="owner">Owner Indekos</label>
                    {{-- select  --}}
                    <select name="owner" class="form-control" required>
                        <option value="">Pilih Owner</option>
                        {{-- @foreach ($owners as $owner)
                            <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                        @endforeach --}}
                    </select>
                </div>
                <hr>
                <div class="d-flex">
                    <h2>Kamar</h2>
                    <button type="button" class="btn btn-primary ml-auto" id="add-room">Tambah Tipe Kamar</button>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="room_name">Nama</label>
                            <input type="text" name="room_name" class="form-control" placeholder="Kamar Tipe A" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Harga/bulan</label>
                            <input type="text" name="price" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="room">Jumlah Kamar</label>
                            <input type="number" name="room" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="available">Kamar Tersedia</label>
                            <input type="number" name="available" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea name="description" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="room_type">Tipe Kamar</label>
                            <select name="room_type_id" id="room_type" class="form-control">
                                <option value="">Pilih Tipe Kamar</option>
                                @foreach ($room_types as $room_type)
                                    <option value="{{ $room_type->id }}">{{ $room_type->type_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <h3>Faslitas</h3>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="fasilitas">Fasilitas</label>
                                                <input type="text" name="facility" class="form-control" id="fasilitas">
                                            </div>
                                        </div>
                                        <div class="col">
                                            {{-- image --}}
                                            <div class="form-group" >
                                                <label for="image">Gambar</label>
                                                <input type="file" name="image" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary">Tambah Fasilitas</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </form>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop