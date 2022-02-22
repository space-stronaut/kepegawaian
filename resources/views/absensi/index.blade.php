@extends('layouts.mazer')

@section('heading')
    Absensi
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    
                </span>
                <span>
                    @if (App\Models\Absensi::where('user_id', Auth::user()->id)->where('date', Carbon\Carbon::today())->first() != NULL)
                    <button disabled class="btn btn-success">Kamu Sudah Absen Masuk</button>
                    @elseif(App\Models\Absensi::where('user_id', Auth::user()->id)->where('date', Carbon\Carbon::today())->where('clock_in', '!=' , NULL)->first() == NULL && Carbon\Carbon::now()->format('H : i') < '08 : 00')
                    <button disabled class="btn btn-info">Absen Belum Dibuka</button>
                    @else
                    <form action="{{ route('absensi.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="clock_in" value="{{ now() }}">
                        <input type="hidden" name="date" value="{{ now() }}">
                        <button class="btn btn-outline-primary">Absen</button>
                    </form>
                    @endif
                    {{-- {{Carbon\Carbon::today()->format('Y-m-d')}} --}}
                </span>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama</th>
                            <th>Absen Masuk</th>
                            <th>Absen Keluar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($absensis as $item)
                            <tr>
                                <td>
                                    {{$item->user->name}}
                                </td>
                                <td>
                                    {{ Carbon\Carbon::parse($item->clock_in)->format('H : i') }}
                                </td>
                                <td>
                                    @if ($item->user_id == Auth::user()->id && Carbon\Carbon::today()->format('Y-d-m') == $item->date && $item->clock_out == NULL && Carbon\Carbon::now()->format('H : i') >= '16:00')
                                        <form action="{{ route('absensi.update',$item->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="clock_out" value="{{ now() }}">
                                            <button class="btn btn-outline-warning">Absen Keluar</button>
                                        </form>
                                    @else
                                        {{ $item->clock_out == NULL ? '-' : Carbon\Carbon::parse($item->clock_out)->format('H : i') }}
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