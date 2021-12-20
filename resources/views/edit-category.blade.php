@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row mt-2">
                <div class="card rounded-0" style="width: 60rem;">
                    <div class="card-body">
                        <form action="{{ url('update-category/'.$datacategory->id) }}" method="post">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <input type="hidden" name="id" id="id" value="{{$datacategory['id']}}">
                                <label for="genre" class="form-label">Genre :</label>
                                <input type="text" class="form-control" id="genre" name="genre" value="{{$datacategory['genre']}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
