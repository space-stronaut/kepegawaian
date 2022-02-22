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
                <form action="{{ route('task.update', $task->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Nama Task</label>
                        <input value="{{ $task->nama_task }}" type="text" name="nama_task" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Catatan</label>
                        <input type="text" name="catatan" id="" value="{{ $task->catatan }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Target</label>
                        <input type="number" name="target" value="{{ $task->target }}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Penerima Task</label>
                        <select name="penerima" id="" class="form-control">
                            <option value="">Pilih...</option>
                            <option value="pramusaji" class="text-uppercase" {{$task->penerima == 'pramusaji' ? 'selected' : ''}}>Pramusaji</option>
                            <option value="dapur" class="text-uppercase" {{$task->penerima == 'dapur' ? 'selected' : ''}}>dapur</option>
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