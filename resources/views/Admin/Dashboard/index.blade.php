@extends('admin.templates.layout')
@section('content')
    <h1>Dashboard</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($kosts as $kost)
            <div class="col">
                <div class="card mb-3 w-60" style="background-color: #F7F5EB">
                    <img src="{{ $kost->foto }}" class="card-img-top" alt="Foto Kost">
                    <div class="card-body">
                        <h5 class="card-title">{{ $kost->nama }}</h5>
                        <p class="card-text"><i class="bi bi-geo"></i> {{ $kost->alamat }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="bi bi-person-square"></i> {{ $kost->pemilik_kost_id }}</li>
                        <li class="list-group-item"><i class="bi bi-telephone"></i> {{ $kost->no_telp }}</li>
                        <li class="list-group-item"><i class="bi bi-tag"></i> Rp.{{ $kost->harga }} / Bulan</li>
                    </ul>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary"><i class="bi bi-eye"></i> Lihat</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <nav aria-label="...">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link">Sebelumnya</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item" aria-current="page">
                <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Selanjutnya</a>
            </li>
        </ul>
    </nav>
@endsection
