@extends('admin.templates.layout')
@section('content')
    <br />
    <div style="background-color: #EAE0DA; border-radius: 15px; padding: 10px">
        <div class="container d-inline-flex p-2 d-flex d-flex justify-content-between">
            <h1>Data Kost</h1>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal"><i
                    class="bi bi-plus-lg"></i> Kost</button>
        </div>
        <!-- Modal Create -->
        <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="createModal" tabindex="-1"
            aria-labelledby="createModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content" style="background-color: #EAE0DA;">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="createModalLabel">Tambah Kost</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/kost/store" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Kost</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Nama Kost">
                            </div>
                            <div class="mb-3">
                                <label for="pemilik_kost_id" class="form-label">Nama Pemilik Kost</label>
                                <input type="text" class="form-control" id="pemilik_kost_id" name="pemilik_kost_id"
                                    placeholder="Nama Pemilik Kost">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat Kost</label>
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    placeholder="Alamat Kost">
                            </div>
                            <div class="mb-3">
                                <label for="no_telp" class="form-label">No Telepon</label>
                                <input type="number" class="form-control" id="no_telp" name="no_telp"
                                    placeholder="No Telepon">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <input class="form-control" type="file" id="foto" name="foto">
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" class="form-control" id="harga" name="harga"
                                    placeholder="Harga">
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" aria-label="Default select example" id="status"
                                    name="status">
                                    <option selected>Pilih Status</option>
                                    <option value="Tersedia">Tersedia</option>
                                    <option value="Tidak Tersedia">Terisi</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tipe" class="form-label">Tipe</label>
                                <select class="form-select" aria-label="Default select example" id="tipe"
                                    name="tipe">
                                    <option selected>Pilih Tipe</option>
                                    <option value="Putra">Putra</option>
                                    <option value="Putri">Putri</option>
                                    <option value="Campur">Campur</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br />
    <div style="background-color: #EAE0DA; border-radius:15px; padding: 20px;">
        <table id="myTable" class="table table-striped table-hover border table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kost</th>
                    <th>Nama Pemilik</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Tipe</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kosts as $kost)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kost->nama }}</td>
                        <td>{{ $kost->pemilikkost->nama }}</td>
                        <td>{{ $kost->alamat }}</td>
                        <td>{{ $kost->no_telp }}</td>
                        <td>{{ $kost->deskripsi }}</td>
                        <td>Rp.{{ $kost->harga }}</td>
                        <td>{{ $kost->status }}</td>
                        <td>{{ $kost->tipe }}</td>
                        {{-- <td><img src="{{ asset('foto_kost/' . $kost->foto) }}" alt="" width="100px"></td> --}}
                        <td><img src="https://source.unsplash.com/500x400?house" alt="" width="100px"></td>
                        <td>
                            {{-- delete button --}}
                            <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $kost->id }}"><i class="bi bi-trash3"></i></button>
                            {{-- modal delete --}}
                            <div class="modal fade
                            @if ($errors->any()) show @endif
                            "
                                data-bs-backdrop="static" data-bs-keyboard="false" id="deleteModal{{ $kost->id }}"
                                tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="background-color: #EAE0DA;">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Delete Kost</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div
                                            class="modal-body
                                        @if ($errors->any()) d-block @endif
                                        ">
                                            <form action="kost/delete/{{ $kost->id }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <p>Yakin ingin menghapus pengguna ini?</p>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- edit button --}}
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $kost->id }}"><i
                                    class="bi bi-pencil-square"></i></button>
                            {{-- Modal Edit --}}
                            <div class="modal fade
                                @if ($errors->any()) show @endif
                                "
                                data-bs-backdrop="static" data-bs-keyboard="false" id="editModal{{ $kost->id }}"
                                tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content" style="background-color: #EAE0DA;">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="editModalLabel">Edit Kost</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div
                                            class="modal-body
                                            @if ($errors->any()) d-block @endif
                                            ">
                                            <form action="kost/update/{{ $kost->id }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama Kost</label>
                                                    <input type="text"
                                                        class="form-control @error('nama') is-invalid @enderror"
                                                        id="nama" name="nama" value="{{ $kost->nama }}">
                                                    @error('nama')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="pemilik_kost_id"
                                                        class="form-label
                                                        @error('pemilik_kost_id') is-invalid @enderror">Nama
                                                        Pemilik</label>
                                                    <select
                                                        class="form-select @error('pemilik_kost_id') is-invalid @enderror"
                                                        id="pemilik_kost_id" name="pemilik_kost_id">
                                                        <option selected disabled>Pilih Pemilik</option>
                                                        @foreach ($pemilik as $pem)
                                                            <option value="{{ $pem->id }}"
                                                                {{ $pem->id == $kost->pemilik_kost_id ? 'selected' : '' }}>
                                                                {{ $pem->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('pemilik_kost_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <input type="text"
                                                        class="form-control @error('alamat') is-invalid @enderror"
                                                        id="alamat" name="alamat" value="{{ $kost->alamat }}">
                                                    @error('alamat')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="no_telp" class="form-label">No Telepon</label>
                                                    <input type="number"
                                                        class="form-control @error('no_telp') is-invalid @enderror"
                                                        id="no_telp" name="no_telp" value="{{ $kost->no_telp }}">
                                                    @error('no_telp')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi"
                                                        rows="3">{{ $kost->deskripsi }}</textarea>
                                                    @error('deskripsi')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="foto" class="form-label">Foto</label>
                                                    @if ($kost->foto)
                                                        <img src="{{ asset('foto_kost/' . $kost->foto) }}"
                                                            class="img-thumbnail img-preview">
                                                    @else
                                                        <img src="{{ asset('img/default.png') }}"
                                                            class="img-thumbnail img-preview">
                                                    @endif
                                                    <input class="form-control @error('foto') is-invalid @enderror"
                                                        type="file" id="foto" name="foto">
                                                    @error('foto')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="harga" class="form-label">Harga</label>
                                                    <input type="number"
                                                        class="form-control @error('harga') is-invalid @enderror"
                                                        id="harga" name="harga" value="{{ $kost->harga }}">
                                                    @error('harga')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="status" class="form-label">Status</label>
                                                    <select class="form-select" aria-label="Default select example"
                                                        id="status" name="status">
                                                        <option value="Tersedia"
                                                            @if ($kost->status == 'Tersedia') selected @endif>
                                                            Tersedia</option>
                                                        <option value="Terisi"
                                                            @if ($kost->status == 'Terisi') selected @endif>
                                                            Terisi</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tipe" class="form-label">Tipe</label>
                                                    <select class="form-select" aria-label="Default select example"
                                                        id="tipe" name="tipe">
                                                        <option value="Putra"
                                                            @if ($kost->tipe == 'Putra') selected @endif>Putra
                                                        </option>
                                                        <option value="Putri"
                                                            @if ($kost->tipe == 'Putri') selected @endif>Putri
                                                        </option>
                                                        <option value="Campur"
                                                            @if ($kost->tipe == 'Campur') selected @endif>Campur
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save
                                                        changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br />
@endsection
