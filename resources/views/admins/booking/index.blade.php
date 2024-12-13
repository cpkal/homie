@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
    <h3>Data Booking</h3>
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <a href="{{ route('booking.create') }}" class="btn btn-primary">Tambah booking</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Kos</th>
                    <th scope="col">Tipe Kamar</th>
                    <th scope="col">Pemesan</th>
                    <th scope="col">Tanggal Booking</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($bookings as $booking)
                      <tr>
                          <th scope="row">{{ $loop->iteration }}</th>
                          <td>{{ $booking->indekos->name ?? 'NULL' }}</td>
                          <td>{{ $booking->room->name }}</td>
                          <td>{{ $booking->user->name }}</td>
                          <td>{{ $booking->booking_date }}</td>
                          <td>
                                @if ($booking->status == 'cancelled')
                                    <span class="badge badge-danger">{{ $booking->status }}</span>
                                @else
                                    <span class="badge badge-success">{{ $booking->status }}</span>
                                @endif
                          </td>
                          <td>
                              {{-- <a href="{{ route('booking.edit', $booking->id) }}" class="btn btn-warning">Edit</a> --}}
                              {{-- change status --}}
                                <form action="{{ route('booking.update', $booking->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="status" value="{{ $booking->status == 'cancelled' ? 'confirmed' : 'cancelled' }}">
                                    <button type="submit" class="btn btn-info">Change Status</button>
                                </form>
                              <form action="{{ route('booking.destroy', $booking->id) }}" method="post" class="d-inline">
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
@stop