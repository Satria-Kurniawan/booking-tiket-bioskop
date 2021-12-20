@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-7">
                <div class="card rounded-0">
                    <div class="card-body">
                        <form action="/category" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="genre" class="form-label">Genre :</label>
                                <input type="text" class="form-control" id="genre" name="genre" placeholder="Enter genre">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="card rounded-0">
                    <div class="card-body">
                        <table class="table border-b">
                            <tr>
                                <th>Genre</th>
                                <th>Operation</th>
                            </tr>
                            @foreach ($datacategory as $item)
                                <tr>
                                    <td>{{ $item->genre }}</td>
                                    <td>
                                        <a href="edit-category/{{ $item->id }}" style="color: blue">
                                            <i class="fas fa-edit"></i>
                                        </a>|
                                        <a href="delete-category/{{ $item->id }}" style="color: red"
                                            onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
