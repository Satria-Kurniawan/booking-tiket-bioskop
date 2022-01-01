@extends('layouts.frontapp')

@section('content')

@foreach ($filtered as $item)
    <div class="border-bottom">
        <p><h3>{{ $item['req_id'] }}</h3></p>
        <p><h3>{{ $item['title'] }}</h3></p>
        <p>{{ $item['description'] }}</p>
        <p>Tanggal {{ $item['createdAt'] }}</p>
        {{-- <p>{{ $item['user'] }}</p> --}}
    </div>
@endforeach

@endsection