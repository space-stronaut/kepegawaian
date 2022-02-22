@extends('layouts.mazer')

@section('heading')
    Task Management
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('task.index') }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-body">
                <form action="{{ route('task.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Task</label>
                        <input type="text" name="nama_task" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Catatan</label>
                        <input type="text" name="catatan" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Target <small class="text-danger">Kosongkan bila penerima adalah pramusaji</small></label>
                        <input type="number" name="target" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Penerima Task</label>
                        <select name="penerima" id="" class="form-control">
                            <option value="">Pilih...</option>
                            <option value="pramusaji" class="text-uppercase">Pramusaji</option>
                            <option value="dapur" class="text-uppercase">dapur</option>
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