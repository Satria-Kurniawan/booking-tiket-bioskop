@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {{-- @if (\Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {!! \Session::get('error') !!}
                </div>
            @endif --}}
            <div class="col-12">
                <div class="card rounded-0">
                    <div class="card-body">
                        <form action="/order" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="name" class="form-label">Name :</label>
                                <input readonly class="form-control" id="user_id" name="user_id"
                                    value="{{ Auth::user()->name }}">
                            </div>
                            <div class="form-group">
                                <label>Film</label>
                                <select class="form-control" id="film_id" name="film_id">
                                    <option value="">Pilih</option>
                                    @foreach ($ddetail as $item)
                                        <option value="{{ $item->id }}">{{ $item->judul }} {{ ' | ' }} Tanggal
                                            :{{ $item->tanggal_tayang }} {{ ' | ' }} Waktu
                                            :{{ $item->waktu_tayang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_tiket" class="form-label">Jumlah Tiket :</label>
                                <input type="number" class="form-control" id="jumlah_tiket" name="jumlah_tiket">
                            </div>
                            <button type="submit" class="btn btn-success">Order Ticket</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
