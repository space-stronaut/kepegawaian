@extends('layouts.mazer')

@section('heading')
    SubCategory Management
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('category.index') }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-body">
                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" id="" class="form-control">
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