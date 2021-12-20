@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card rounded-0">
                    <div class=" card-body">
                        <table class="table border-b text-center">
                            <thead>
                                <tr>
                                    <th>Invoice</th>
                                    <th>Film</th>
                                    <th>Tanggal Tayang</th>
                                    <th>Waktu Tayang</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactdetail as $item)
                                    <tr>
                                        <td>{{ $item->invoice }}</td>
                                        <td>{{ $item->film->judul }}</td>
                                        <td>{{ $item->film->tanggal_tayang }}</td>
                                        <td>{{ $item->film->waktu_tayang }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
