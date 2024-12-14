@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Notifikasi</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('post.notification') }}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                    {{-- gambar --}}
                    <label for="name">Gambar (opsional)</label>
                    <input type="file" name="image" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="name">Judul</label>
                    <input type="text" name="title" class="form-control" >
                </div>
                <div class="form-group" >
                    <label for="name">Pesan</label>
                    <textarea name="message" class="form-control" rows="5"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary btn-block">Publish</button>
            </form>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    
@stop