@extends('layouts.frontapp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card rounded-0">
                    <div class="card-body">
                        <form action="/order" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <input type="hidden" class="form-control" id="film_id" name="film_id"
                                                    value="{{ $datafilm->id }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name :</label>
                                                <input readonly class="form-control" id="user_id" name="user_id"
                                                    value="{{ Auth::user()->name }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Judul Film</label>
                                                <input readonly class="form-control" value="{{ $datafilm->judul }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Tanggal Tayang</label>
                                                <input readonly class="form-control" value="{{ $datafilm->tanggal_tayang }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Waktu Tayang</label>
                                                <input readonly class="form-control" value="{{ $datafilm->waktu_tayang }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <img src="{{ asset('images/' . $datafilm->image) }}" class="img-fluid w-75 h-100">
                                        </div>
                                    </div>
                                    
                                </div>
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
