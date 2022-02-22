@extends('layouts.mazer')


@section('heading')
    Kinerja Dapur
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('dapur.index') }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-body">
                <form action="{{ route('dapur.update', $dapur->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="hidden" name="user_id" value="{{ $dapur->user_id }}">
                    @if (isset($dapur->task_id))
                        <input type="hidden" name="task_id" value="{{ $dapur->task_id }}">
                    @endif
                    <div class="form-group">
                        <label for="">Nama Kamu</label>
                        <input type="text" name="user_id" value="{{ Auth::user()->name }}" disabled id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Produk</label>
                            <select name="product_id" id="" class="form-control">
                                <option value="">Pilih...</option>
                                @foreach ($products as $item)
                                    <option value="{{ $item->id }}" {{$item->id == $dapur->product_id ? 'selected' : ''}}>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="">Total Masak</label>
                        <input type="number" name="total_masak" value="{{ $dapur->total_masak }}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" name="foto" id="" class="form-control">
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