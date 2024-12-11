@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
    <h3>Data Indekos</h3>
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <a href="{{ route('indekos.create') }}" class="btn btn-primary">Tambah Indekos</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Kos</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Nama Owner</th>
                    <th scope="col">Nomor Telepon Owner</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($indekos as $item)
                      <tr>
                          <th scope="row">{{ $loop->iteration }}</th>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->address }}</td>
                          <td>{{ $item->owner_name }}</td>
                        <td>{{ $item->owner_phone ?? '' }}</td>
                          <td>
                              <a href="{{ route('indekos.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                              <form action="{{ route('indekos.destroy', $item->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                              </form>
                          </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
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