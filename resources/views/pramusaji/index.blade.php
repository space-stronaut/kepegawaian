@extends('layouts.mazer')

@section('heading')
    Kinerja Pramusaji
@endsection
@section('content')
@php
    $i = 0;
    foreach ($reports as $item) {
        $i += $item->poin;
    }
@endphp
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    Poin Harianmu : <span class="text-primary text-bold">{{ $i }}</span>
                </span>
                <span>
                    <a href="{{ route('pramusaji.create') }}" class="btn btn-primary">Buat Laporan</a>
                </span>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama</th>
                            <th>Catatan</th>
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
                                    {{$item->catatan}}
                                </td>
                                <td>
                                    {{$item->poin ? $item->poin : '-'}}
                                </td>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('pramusaji.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                    <form action="{{ route('pramusaji.destroy', $item->id) }}" method="post">
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