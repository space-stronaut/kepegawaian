@extends('layouts.mazer')

@section('heading')
    Kinerja Dapur
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Export
            </div>
            <div class="card-body">
                <form action="{{ route('dapur.export') }}" method="get">
                    <div class="form-group">
                        <label for="">Dari</label>
                        <input type="date" name="awal" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Sampai</label>
                        <input type="date" name="akhir" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Export</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                </span>
                <span>
                    <a href="{{ route('dapur.create') }}" class="btn btn-primary">Buat Laporan</a>
                </span>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama</th>
                            <th>Product</th>
                            <th>Sub Kategori</th>
                            <th>Total Masak</th>
                            <th>Poin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reports as $item)
                            <tr>
                                <td>
                                    {{$item->user->name}}
                                </td>
                                <td>
                                    {{$item->product->nama}}
                                </td>
                                <td>
                                    {{$item->product->category->nama}}
                                </td>
                                <td>
                                    {{$item->total_masak}}
                                </td>
                                <td>
                                    {{$item->poin ? $item->poin : '-'}}
                                </td>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('dapur.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                    <form action="{{ route('dapur.destroy', $item->id) }}" method="post">
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