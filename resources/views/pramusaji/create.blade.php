@extends('layouts.mazer')


@section('heading')
    Kinerja Preamusaji
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('pramusaji.index') }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-body">
                <form action="{{ route('pramusaji.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    @if (Request::get('task_id'))
                        <input type="hidden" name="task_id" value="{{ Request::get('task_id') }}">
                    @endif
                    <div class="form-group">
                        <label for="">Nama Kamu</label>
                        <input type="text" name="user_id" value="{{ Auth::user()->name }}" disabled id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" name="foto" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Catatan</label>
                        <textarea name="catatan" id="" cols="30" rows="10" class="form-control"></textarea>
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