@extends('layouts.mazer')

@section('heading')
    Product Management
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('product.index') }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-body">
                <form action="{{ route('product.update', $product->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" value="{{ $product->nama }}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Sub Kategori</label>
                        <select name="category_id" id="" class="form-control">
                            <option value="">Pilih...</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}" {{$product->category_id == $item->id ? 'selected' : ''}}>{{ $item->nama }}</option>
                            @endforeach
                        </select>
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