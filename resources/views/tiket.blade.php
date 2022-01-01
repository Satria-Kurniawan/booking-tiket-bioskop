<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tiket</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.1.0/') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.1.0/') }}/dist/css/adminlte.min.css">

    {{-- Untuk Toastr --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <style>
        .stroke {
            color: black;
            font-size: 40px;
            -webkit-text-stroke-width: 2px;
            -webkit-text-stroke-color: white;
        }

    </style>
</head>

<body>
    <div class="container">
        @foreach ($transactdetail as $item)
        <div class="col-7">
            <div class="card stroke" style="background-image: url({{asset($item->film->image)}});">
                <div class="card-body">
                    @foreach ($transact as $item)
                        <h5 class="text-right">{{ $item->invoice }}</h5>
                        <h1>Name : {{ $item->user->name }}</h1>
                        <h1>Ticket for : {{ $item->jumlah_tiket }} People</h1>
                    @endforeach
                    @foreach ($transactdetail as $item)
                        <h1>Film : {{ $item->film->judul }}</h1>
                        <h1>Date : {{ $item->film->tanggal_tayang }}</h1>
                        <h1>Time : {{ $item->film->waktu_tayang }}</h1>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
</body>

</html>

<script>
    @if(Session::has('success'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.success("{{ session('success') }}");
    @endif

    @if(Session::has('error'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.warning("{{ session('warning') }}");
    @endif

</script>
