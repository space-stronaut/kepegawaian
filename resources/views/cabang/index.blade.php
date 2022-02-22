@extends('layouts.mazer')

@section('heading')
    Cabang Management
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    
                </span>
                <span>
                    <a href="{{ route('cabang.create') }}" class="btn btn-primary">Buat Cabang</a>
                </span>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama Cabang</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cabangs as $item)
                            <tr>
                                <td>
                                    {{$item->nama_cabang}}
                                </td>
                                <td>
                                    {{$item->alamat}}
                                </td>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('cabang.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                    <form action="{{ route('cabang.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger ms-2">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>Belum Ada Data...</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection