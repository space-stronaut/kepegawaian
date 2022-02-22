@extends('layouts.mazer')


@section('heading')
    Cabang Management
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('cabang.index') }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-body">
                <form action="{{ route('cabang.update', $cabang->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="">Nama Cabang</label>
                        <input type="text" value="{{ $cabang->nama_cabang }}" name="nama_cabang" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" id="" cols="30" rows="10" class="form-control">{{ $cabang->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary mt-2 w-100">
                            Store
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection