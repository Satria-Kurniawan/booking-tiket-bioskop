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
                                    <th>User</th>
                                    <th>Jumlah Tiket</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transact as $item)
                                    <tr>
                                        <td>{{ $item->invoice }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->jumlah_tiket }}</td>
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
