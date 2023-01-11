<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Data Kost</title>
</head>

<body>
    <div class="container">
        <h1>Data Kost</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal"><i
                class="bi bi-plus-lg"></i> Kost</button>
        <br />
        <br />

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
                        <td>{{ $kost->nama_pemilik }}</td>
                        <td>{{ $kost->alamat }}</td>
                        <td>{{ $kost->no_telp }}</td>
                        <td>{{ $kost->deskripsi }}</td>
                        <td>Rp.{{ $kost->harga }}</td>
                        <td>{{ $kost->status }}</td>
                        <td>{{ $kost->tipe }}</td>
                        <td><img src="{{ asset('foto_kost/' . $kost->foto) }}" alt="" width="100px"></td>
                        <td>
                            <button type="button" class="btn btn-warning"><i class="bi bi-pencil"></i></button>
                            <form action="kost/delete/{{ $kost->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus?')"><i
                                        class="bi bi-trash3"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

<!-- Modal Create -->
<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="createModal" tabindex="-1"
    aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
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
                        <label for="nama_pemilik" class="form-label">Nama Pemilik Kost</label>
                        <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik"
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
                            <option value="1">Tersedia</option>
                            <option value="0">Tidak Tersedia</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tipe" class="form-label">Tipe</label>
                        <select class="form-select" aria-label="Default select example"
                            id="
                    tipe" name="tipe">
                            <option selected>Pilih Tipe</option>
                            <option value="1">Putra</option>
                            <option value="2">Putri</option>
                            <option value="3">Campur</option>
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

</html>
