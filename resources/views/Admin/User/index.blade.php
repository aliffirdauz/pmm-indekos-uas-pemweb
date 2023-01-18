@extends('admin.templates.layout')
@section('content')
    <br />
    <div style="background-color: #EAE0DA; border-radius: 15px; padding: 10px">
        <div class="container d-inline-flex p-2 d-flex justify-content-between">
            <h1>Data Pengguna</h1>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal"><i
                    class="bi bi-plus-lg"></i> Pengguna</button>
        </div>
        <!-- Modal Create -->
        <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="createModal" tabindex="-1"
            aria-labelledby="createModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content" style="background-color: #EAE0DA;">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="createModalLabel">Tambah Pengguna</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/user/store" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK">
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Nama Pengguna">
                            </div>
                            <div class="mb-3">
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                    placeholder="Tanggal Lahir">
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin"
                                    class="form-label
                                    @error('jenis_kelamin') text-danger @enderror
                                    ">Jenis
                                    Kelamin</label>
                                <select class="form-select" aria-label="Default select example" id="jenis_kelamin"
                                    name="jenis_kelamin">
                                    <option selected>Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="no_telp" class="form-label">No Telepon</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp"
                                    placeholder="No Telepon">
                            </div>
                            <div class="mb-3">
                                <label for="kota_asal"
                                    class="form-label
                                    @error('kota_asal') text-danger @enderror
                                    ">Kota
                                    Asal</label>
                                <input type="text" class="form-control" id="kota_asal" name="kota_asal"
                                    placeholder="Kota Asal">
                                @error('kota_asal')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="status"
                                    class="form-label
                                    @error('status') text-danger @enderror
                                    ">Status</label>
                                <select class="form-select" aria-label="Default select example" id="status"
                                    name="status">
                                    <option selected>Pilih Status</option>
                                    <option value="Pelajar">Pelajar</option>
                                    <option value="Pekerja">Pekerja</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Email">
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
    </div>
    <br />
    <div style="background-color: #EAE0DA; border-radius:15px; padding: 20px;">
        <table id="myTable" class="table table-striped table-hover border table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>No Telepon</th>
                    <th>Kota Asal</th>
                    <th>Status</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->nik }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->tgl_lahir }}</td>
                        <td>{{ $user->jenis_kelamin }}</td>
                        <td>{{ $user->no_telp }}</td>
                        <td>{{ $user->kota_asal }}</td>
                        <td>{{ $user->status }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
                        <td>
                            {{-- delete button --}}
                            <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $user->id }}"><i class="bi bi-trash3"></i></button>
                            {{-- modal delete --}}
                            <div class="modal fade
                            @if ($errors->any()) show @endif
                            "
                                data-bs-backdrop="static" data-bs-keyboard="false" id="deleteModal{{ $user->id }}"
                                tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="background-color: #EAE0DA;">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Delete Pengguna</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div
                                            class="modal-body
                                        @if ($errors->any()) d-block @endif
                                        ">
                                            <form action="user/delete/{{ $user->id }}" method="POST">
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
                                data-bs-target="#editModal{{ $user->id }}"><i
                                    class="bi bi-pencil-square"></i></button>
                            {{-- Modal Edit --}}
                            <div class="modal fade
                                @if ($errors->any()) show @endif
                                "
                                data-bs-backdrop="static" data-bs-keyboard="false" id="editModal{{ $user->id }}"
                                tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content" style="background-color: #EAE0DA;">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="editModalLabel">Edit Pengguna</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div
                                            class="modal-body
                                            @if ($errors->any()) d-block @endif
                                            ">
                                            <form action="user/update/{{ $user->id }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="mb-3">
                                                    <label for="nik" class="form-label">NIK</label>
                                                    <input type="text"
                                                        class="form-control @error('nik') is-invalid @enderror"
                                                        id="nik" name="nik" value="{{ $user->nik }}">
                                                    @error('nik')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <div class="mb-3">
                                                        <label for="nama" class="form-label">Nama</label>
                                                        <input type="text"
                                                            class="form-control @error('nama') is-invalid @enderror"
                                                            id="nama" name="nama" value="{{ $user->nama }}">
                                                        @error('nama')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                                        <input type="date"
                                                            class="form-control @error('tgl_lahir') is-invalid @enderror"
                                                            id="tgl_lahir" name="tgl_lahir"
                                                            value="{{ $user->tgl_lahir }}">
                                                        @error('tgl_lahir')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jenis_kelamin"
                                                            class="form-label
                                                    @error('jenis_kelamin') is-invalid @enderror
                                                    ">Jenis
                                                            Kelamin</label>
                                                        <select class="form-select" id="jenis_kelamin"
                                                            name="jenis_kelamin">
                                                            <option value="Laki-laki"
                                                                @if ($user->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki
                                                            </option>
                                                            <option value="Perempuan"
                                                                @if ($user->jenis_kelamin == 'Perempuan') selected @endif>Perempuan
                                                            </option>
                                                        </select>
                                                        @error('jenis_kelamin')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="no_telp" class="form-label">No Telepon</label>
                                                        <input type="number"
                                                            class="form-control @error('no_telp') is-invalid @enderror"
                                                            id="no_telp" name="no_telp" value="{{ $user->no_telp }}">
                                                        @error('no_telp')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="kota_asal"
                                                            class="form-label
                                                    @error('kota_asal') is-invalid @enderror
                                                    ">Kota
                                                            Asal</label>
                                                        <input type="text"
                                                            class="form-control @error('kota_asal') is-invalid @enderror"
                                                            id="kota_asal" name="kota_asal"
                                                            value="{{ $user->kota_asal }}">
                                                        @error('kota_asal')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="status"
                                                            class="form-label
                                                    @error('status') is-invalid @enderror
                                                    ">Status</label>
                                                        <select class="form-select" id="status" name="status">
                                                            <option value="Pelajar"
                                                                @if ($user->status == 'Pelajar') selected @endif>Pelajar
                                                            </option>
                                                            <option value="Pekerja"
                                                                @if ($user->status == 'Pekerja') selected @endif>Pekerja
                                                            </option>
                                                        </select>
                                                        @error('status')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            id="email" name="email" value="{{ $user->email }}">
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
                                                            id="password" name="password" value={{ $user->password }}>
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
    </div>
    <br />
@endsection
