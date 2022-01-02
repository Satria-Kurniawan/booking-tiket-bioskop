@extends('layouts.frontapp')

@section('content')

<div class="container">
    <div class="row mt-3">
        @foreach ($datafilm as $item)
        <div class="col-3">
            <form class="form" action="order-tiket/{{ $item->id }}">
                <div class="card-transparent text-center mt-3">
                    <div class="card-header p-0">
                        <h5>{{ $item->judul }}</h5>
                    </div>
                    <div class="card-body p-0 mt-2">
                        <a href="konten-film/{{ $item->id }}" class="text-dark">
                            @if (!empty($item->image))
                            <img src="{{ asset($item->image) }}" class="img-fluid w-75 h-100">
                            @else
                            No image available
                            @endif
                        </a>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Get Ticket</button>
                </div>
            </form>
        </div>
        @endforeach
    </div>
</div>

@endsection