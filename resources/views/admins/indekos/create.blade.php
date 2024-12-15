@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Tambah Indekos</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('indekos.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group" >
                    {{-- star red for indicating required --}}
                    <label for="name">Nama Indekos  <span class="text-red font-bold">*</span> </label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" >
                </div>
                <div class="form-group" >
                    <label for="address">Alamat Indekos <span class="text-red font-bold">*</span></label>
                    {{-- textarea --}}
                    <textarea name="address" class="form-control" >
                        {{ old('address') }}
                    </textarea>
                </div>
                <div class="form-group" >
                    <label for="owner">Pemilik Kos <span class="text-red font-bold">*</span></label>
                    <input type="text" name="owner" class="form-control" value="{{ old('owner') }}" >
                </div>
                <hr>
                

                <div class="d-flex">
                    <button type="button" class="btn btn-primary ml-auto" id="add-room">Tambah Tipe Kamar</button>
                </div>
                <div class="card mt-2" id="rooms-indekos">

                    <div class="accordion" id="accordionExample">
                        <div class="card">
                          <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                              <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h3>Tipe Kamar 1</h3>
                              </button>
                            </h2>
                          </div>
                      
                          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="room_name">Nama <span class="text-red font-bold">*</span></label>
                                    <input type="text" name="room_name[]" class="form-control" placeholder="Kamar Tipe A" >
                                </div>
                                <div class="form-group">
                                    <label for="room_name">Foto</label>
                                    <input type="file" name="room_image[]" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="price">Harga/bulan <span class="text-red font-bold">*</span></label>
                                    <input type="text" name="price[]" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="room">Jumlah Kamar <span class="text-red font-bold">*</span></label>
                                    <input type="number" name="room[]" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="available">Kamar Tersedia <span class="text-red font-bold">*</span></label>
                                    <input type="number" name="available[]" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="description">Deskripsi</label>
                                    <textarea name="description[]" class="form-control" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="room_type">Tipe Kamar <span class="text-red font-bold">*</span></label>
                                    <select name="room_type_id[]" id="room_type" class="form-control">
                                        <option value="">Pilih Tipe Kamar</option>
                                        @foreach ($room_types as $room_type)
                                            <option value="{{ $room_type->id }}">{{ $room_type->type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <h3>Faslitas</h3>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group" id="facility-indekos">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="fasilitas">Fasilitas</label>
                                                        <input type="text" name="facility[0][]" class="form-control" id="fasilitas">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group" >
                                                        <label for="image">Gambar</label>
                                                        <input type="file" name="image[0][]" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary" id="add-facility">Tambah Fasilitas</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                          </div>
                        </div>
                        
                    </div>
                    {{-- append here --}}
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
    <script>
        // Add here extra scripts
        var room = 0;
        $(document).ready(function() {
            $('#add-room').click(function() {
                $('#rooms-indekos').append(`

                    <div class="accordion" id="accordionExample${++room}">
                        <div class="card">
                          <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                              <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse${room}" aria-expanded="true" aria-controls="collapse${room}">
                                <h3>Tipe Kamar ${room + 1}</h3>
                              </button>
                            </h2>
                          </div>
                      
                          <div id="collapse${room}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample${room}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="room_name">Nama</label>
                                    <input type="text" name="room_name[]" class="form-control" placeholder="Kamar Tipe A" >
                                </div>
                                <div class="form-group">
                                    <label for="room_name">Foto</label>
                                    <input type="file" name="room_image[]" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="price">Harga/bulan</label>
                                    <input type="text" name="price[]" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="room">Jumlah Kamar</label>
                                    <input type="number" name="room[]" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="available">Kamar Tersedia</label>
                                    <input type="number" name="available[]" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="description">Deskripsi</label>
                                    <textarea name="description[]" class="form-control" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="room_type">Tipe Kamar</label>
                                    <select name="room_type_id[]" id="room_type" class="form-control">
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
                                                        <input type="text" name="facility[${room}][]" class="form-control" id="fasilitas">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    {{-- image --}}
                                                    <div class="form-group" >
                                                        <label for="image">Gambar</label>
                                                        <input type="file" name="image[${room}][]" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary" id="add-facility">Tambah Fasilitas</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                          </div>
                        </div>
                        
                    </div>
                `);
            });

            $('#rooms-indekos').on('click', '#add-facility', function() {
                $(this).parent().prepend(`
                    <div class="row mt-2">
                        <div class="col">
                            <div class="form-group
                            ">
                                <label for="fasilitas">Fasilitas</label>
                                <input type="text" name="facility[${room}][]" class="form-control" id="fasilitas">
                            </div>
                        </div>
                        <div class="col">
                            {{-- image --}}
                            <div class="form-group
                            ">
                                <label for="image">Gambar</label>
                                <input type="file" name="image[${room}][]" class="form-control" >
                            </div>
                        </div>
                    </div>
                `);
            });
        });
    </script>
@stop