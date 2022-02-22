@extends('layouts.mazer')

@section('heading')
    Home
@endsection
@section('content')
<div class="container" style="width: 40rem">
    <div class="card">
        <div class="card-header">
            Grafik Bulan : {{ date('M') }}
        </div>
        <div class="card-body">
            <canvas id="myChart" width="300" height="300"></canvas>

        </div>
    </div>
</div>
<script src="{{ asset('js/index.js') }}"></script>
@endsection
