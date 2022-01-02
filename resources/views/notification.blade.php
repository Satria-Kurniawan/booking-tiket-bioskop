@extends('layouts.frontapp')

@section('title', 'Notifikasi')

@section('content')

<div class="container mt-3">
    <h3 class="text-center border-bottom">Notifikasi</h3>
    @forelse ($filtered as $item)
        <div class="border-bottom">
            <p><h3>{{ $item['req_id'] }}</h3></p>
            <p><h3>{{ $item['title'] }}</h3></p>
            <p>{{ $item['description'] }}</p>
            <p>
                Tanggal {{ $item['createdAt'] }}
                <a href="delete-notification/{{ $item['_id'] }}" class="ml-3" onclick="return confirm('Are you sure?')">
                    <button type="button" class="btn btn-outline-danger">
                        Delete <i class="fas fa-trash-alt"></i></button>
                </a>
            </p>
            {{-- <p>{{ $item['user'] }}</p> --}}
        </div>
    @empty
        <h1 class="mt-3 text-center">Kosong!</h1>
    @endforelse
</div>

@endsection