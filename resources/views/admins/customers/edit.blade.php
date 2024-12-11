@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Edit Customer</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('customers.update', ['customer' => $customer->id]) }}" method="post" enctype="multipart/form-data" >
                @csrf
                @method('put')
                <div class="form-group" >
                    <label for="name">Nama Customer</label>
                    <input type="text" name="name" class="form-control" value="{{ $customer->name }}">
                </div>
                <div class="form-group" >
                    <label for="address">Alamat Indekos</label>
                    {{-- textarea --}}
                    <textarea name="address" class="form-control" >
                        {{ $customer->address }}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="phone">Nomor Telepon</label>
                    <input type="text" name="phone" class="form-control" value="{{ $customer->phone }}" >
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