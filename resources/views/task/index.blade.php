@extends('layouts.mazer')

@section('heading')
    Task Management
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('task.create') }}" class="btn btn-primary">Buat Task</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama Task</th>
                            <th>Catatan</th>
                            <th>Target</th>
                            <th>Penerima Task</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tasks as $item)
                            <tr>
                                <td>
                                    {{$item->nama_task}}
                                </td>
                                <td>
                                    {{$item->catatan}}
                                </td>
                                <td>
                                    {{$item->target}}
                                </td>
                                <td>
                                    <div class="badge bg-info text-uppercase">
                                        {{$item->penerima}}
                                    </div>
                                </td>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('task.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                    <form action="{{ route('task.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger ms-2">Hapus</button>
                                    </form>
                                    @if ($item->penerima == 'pramusaji')
                                        @if (App\Models\PramusajiReport::where('task_id', $item->id)->where('user_id', Auth::user()->id)->first() == NULL)
                                        <a href="/pramusaji/create?task_id={{ $item->id }}" class="btn btn-warning ms-2">Kerjakan</a>
                                            
                                        @endif
                                    @else
                                        @if (App\Models\DapurReport::where('task_id', $item->id)->where('user_id', Auth::user()->id)->first() == NULL)
                                        <a href="/dapur/create?task_id={{ $item->id }}" class="btn btn-warning ms-2">Kerjakan</a>
                                            
                                        @endif
                                    @endif
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