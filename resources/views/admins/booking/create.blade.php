@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Tambah Booking</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('booking.store') }}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="form-group" >
                    <label for="email">Nama Kos</label>
                    <select name="indekos" onchange="getRoom()" id="indekos_id" class="form-control">
                        <option value="" selected>Pilih Kos</option>
                        @foreach ($indekos as $kos)
                            <option value="{{ $kos->id }}">
                                {{ $kos->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="phone">Tipe Kamar</label>
                    <select name="room" id="room_id" disabled class="form-control">
                        <option value="">Pilih Tipe Kamar</option>
                       
                    </select>
                </div>
                <div class="form-group">
                    <label for="phone">Pemesan</label>
                    <select name="customer" class="form-control">
                        <option value="" selected>Pilih Pemesan</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">
                                {{ $customer->name ?? $customer->phone }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="phone">Status</label>
                    <select name="status" class="form-control" >
                        <option value="confirmed">Confirmed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                <div class="form-group" >
                    <label for="booking_date">Tanggal Booking</label>
                    <input type="datetime-local" name="booking_date" class="form-control" >
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-4">Simpan</button>
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
        async function getRoom() {
            //get select option value indekos_id
            const indekosId = document.getElementById('indekos_id').value;
            console.log(indekosId);

            //hit api: get rooms by indekos id
            const response = await fetch(`http://localhost:8000/api/rooms/${indekosId}`);
            const data = await response.json();
            
            // remove disabled from room_id select
            document.getElementById('room_id').removeAttribute('disabled');
            // append options to room_id select with value of data
            document.getElementById('room_id').innerHTML = data.map(room => {
                return `<option value="${room.id}">${room.name}</option>`;
            }).join('');


        }
    </script>
@stop