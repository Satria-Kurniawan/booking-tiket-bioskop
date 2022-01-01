@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row mt-2">
            <div class="card rounded-0" style="width: 60rem;">
                <div class="card-body">
                    <form action="{{ url('update-film/'.$datafilm->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="id" value="{{$datafilm['id']}}">
                        <div class="form-group">
                            <label>Genre</label>
                            <select class="form-control" id="category_id" name="category_id">
                                <option value disabled>Pilih</option>
                                @foreach ($ct as $item)
                                <option value="{{ $item->id }}">{{ $item->genre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul :</label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Enter judul"
                                value="{{$datafilm['judul']}}">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_tayang" class="form-label">Tanggal Tayang :</label>
                            <input type="date" class="form-control" id="tanggal_tayang" name="tanggal_tayang"
                                value="{{$datafilm['tanggal_tayang']}}">
                        </div>
                        <div class="mb-3">
                            <label for="waktu_tayang" class="form-label">Waktu Tayang :</label>
                            <input type="time" class="form-control" id="waktu_tayang" name="waktu_tayang"
                                value="{{$datafilm['waktu_tayang']}}">
                        </div>
                        <div class="form-group">
                            <label for="image">Gambar</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection