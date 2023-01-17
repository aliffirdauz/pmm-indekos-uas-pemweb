@extends('admin.templates.layout')
@section('content')
    <h1>Data Pemilik Kost</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal"><i
            class="bi bi-plus-lg"></i> Pemilik Kost</button>
    <!-- Modal Create -->
    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="createModal" tabindex="-1"
        aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createModalLabel">Tambah Pemilik Kost</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/pemilik-kost/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                        </div>
                        <div class="mb-3">
                            <label for="no_telp" class="form-label">No Telepon</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="No Telepon">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
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
    <br />
    <br />

    <table id="myTable" class="table table-striped table-hover border table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Email</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pemiliks as $pemilik)
                <tr>
                    <td>{{ $loop->iteration }}</td>                    
                    <td>{{ $pemilik->nama }}</td>
                    <td>{{ $pemilik->alamat }}</td>
                    <td>{{ $pemilik->no_telp }}</td>
                    <td>{{ $pemilik->email }}</td>
                    <td>{{ $pemilik->password }}</td>
                    <td>
                        {{-- delete button --}}
                        <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $pemilik->id }}"><i class="bi bi-trash3"></i></button>
                        {{-- modal delete --}}
                        <div class="modal fade
                            @if ($errors->any()) show @endif
                            "
                            data-bs-backdrop="static" data-bs-keyboard="false" id="deleteModal{{ $pemilik->id }}"
                            tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Delete Pemilik Kost</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div
                                        class="modal-body
                                        @if ($errors->any()) d-block @endif
                                        ">
                                        <form action="pemilik-kost/delete/{{ $pemilik->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <p>Yakin ingin menghapus pemilik kost ini?</p>
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
                            data-bs-target="#editModal{{ $pemilik->id }}"><i class="bi bi-pencil-square"></i></button>
                        {{-- Modal Edit --}}
                        <div class="modal fade
                                @if ($errors->any()) show @endif
                                "
                            data-bs-backdrop="static" data-bs-keyboard="false" id="editModal{{ $pemilik->id }}"
                            tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editModalLabel">Edit Pemilik Kost</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div
                                        class="modal-body
                                            @if ($errors->any()) d-block @endif
                                            ">
                                        <form action="pemilik-kost/update/{{ $pemilik->id }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="mb-3">
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama</label>
                                                    <input type="text"
                                                        class="form-control @error('nama') is-invalid @enderror"
                                                        id="nama" name="nama" value="{{ $pemilik->nama }}">
                                                    @error('nama')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <input type="text"
                                                        class="form-control @error('alamat') is-invalid @enderror"
                                                        id="alamat" name="alamat" value="{{ $pemilik->alamat }}">
                                                    @error('alamat')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                <div class="mb-3">
                                                    <label for="no_telp" class="form-label">No Telepon</label>
                                                    <input type="number"
                                                        class="form-control @error('no_telp') is-invalid @enderror"
                                                        id="no_telp" name="no_telp" value="{{ $pemilik->no_telp }}">
                                                    @error('no_telp')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        id="email" name="email" value="{{ $pemilik->email }}">
                                                    @error('email')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        id="password" name="password" value={{ $pemilik->password }}>
                                                    @error('password')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
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
@endsection
