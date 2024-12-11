@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Edit Admin</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('account.update-password', ['id' => $admin->id]) }}" method="post" enctype="multipart/form-data" >
                @csrf
                @method('put')
                <div class="form-group" >
                    <label for="name">New Password</label>
                    <input type="text" name="name" class="form-control" >
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
    
@stop