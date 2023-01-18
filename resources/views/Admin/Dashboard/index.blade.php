@extends('admin.templates.layout')
@section('content')
    <br />
    <div style="background-color: #EAE0DA; border-radius:15px">
        <div class="container mt-4 mb-4 d-inline-flex p-2 d-flex justify-content-center">
            <h1>Selamat datang di halaman Admin!</h1>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-around">
                <div class="card border-dark mb-3" style="width: 15rem; background-color:#F7F5EB">
                    <h5 class="card-header">Jumlah Kost</h5>
                    <div class="card-body">
                        <h2 class="card-title"><i class="bi bi-house"></i> {{ $kosts->count() }} Rumah</h2>
                    </div>
                </div>
                <div class="card border-dark mb-3" style="width: 15rem; background-color:#F7F5EB">
                    <h5 class="card-header">Jumlah Pemilik Kost</h5>
                    <div class="card-body">
                        <h2 class="card-title"><i class="bi bi-person-square"></i> {{ $pemilik->count() }} Orang</h2>
                    </div>
                </div>
                <div class="card border-dark mb-3" style="width: 15rem; background-color:#F7F5EB">
                    <h5 class="card-header">Jumlah Pengguna</h5>
                    <div class="card-body">
                        <h2 class="card-title"><i class="bi bi-person"></i> {{ $user->count() }} Orang</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br />
    <div style="background-color: #EAE0DA; border-radius:15px;">
        <div class="container mt-4 mb-4 d-inline-flex p-2 d-flex justify-content-center">
            <h1>Daftar Kost</h1>
        </div>
        <div class="row row-cols-1 row-cols-md-4 g-4 d-inline-flex p-2 d-flex justify-content-center">
            @foreach ($kosts as $kost)
                <div class="col">
                    <div class="card border-dark mb-3" style="background-color: #F7F5EB; width:18rem;">
                        {{-- <img src="{{ $kost->foto }}" class="card-img-top" alt="Foto Kost"> --}}
                        <img src="https://source.unsplash.com/500x400?house" class="card-img-top" alt="Foto Kost">
                        <div class="card-body">
                            <h5 class="card-title"
                                style="width: 250px;
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;">
                                {{ $kost->nama }}</h5>
                            <p class="card-text"
                                style="width: 250px;
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;">
                                <i class="bi bi-geo"></i> {{ $kost->alamat }}
                            </p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><i class="bi bi-person-square"></i> {{ $kost->pemilikkost->nama }}
                            </li>
                            <li class="list-group-item"><i class="bi bi-telephone"></i> {{ $kost->no_telp }}</li>
                            <li class="list-group-item"><i class="bi bi-tag"></i> Rp.{{ $kost->harga }} / Bulan</li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
        {{$kosts->links()}}
    </div>
    <br/>
@endsection
