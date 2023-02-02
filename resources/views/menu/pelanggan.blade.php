@extends('layout')

@section('content')
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Data Pelanggan</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div style="float:right;">
                                <button data-bs-toggle="modal" data-bs-target="#tambahPelanggan" class="btn btn-primary">Tambah</button>
                            </div>
                            <table class="datatables display" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Pelanggan</th>
                                        <th>Nama</th>
                                        <th>No Telp</th>
                                        <th>Alamat</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pelanggan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->no_telp }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->status == 1 ? 'Aktif' : 'Non Aktif' }}</td>
                                        <td>
                                            @if ($item->status == 1)
                                            <a style='width:120px;' onclick="editPelanggan({{ $item->id }})" class="btn btn-primary btn-sm">Edit</a><br><br>
                                            <form action="./pelanggan/nonaktif/{{ $item->id }}" method="post" style="display:inline;">
                                                @csrf
                                                <button style='width:120px;' onclick="return confirm('Yakin ingin menonaktifkan user?')" type="submit" class="btn btn-danger btn-sm">Non Aktifkan</button>
                                            </form>
                                            @else
                                            <form action="./pelanggan/aktif/{{ $item->id }}" method="post" style="display:inline;">
                                                @csrf
                                                <button style='width:120px;' onclick="return confirm('Yakin ingin mengaktifkan user?')" type="submit" class="btn btn-success btn-sm">Aktifkan</button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="tambahPelanggan" tabindex="-1" aria-labelledby="tambahPelangganLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPelangganLabel">Tambah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="./pelanggan/tambah" method="post">
                <div class="modal-body">
                    @csrf
                    <label for="inputPelanggan" class="form-label">No Pelanggan</label>
                    <input type="text" class="form-control" id="inputPelanggan" value="{{ $last_id->username+1 }} " disabled><br>
                    <label for="inputNama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="inputNama" name="nama" required><br>
                    <label for="inputNoTelp" class="form-label">No Telp</label>
                    <input type="text" class="form-control" id="inputNoTelp" name="no_telp" required><br>
                    <label for="inputAlamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="inputAlamat" name="alamat" required><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editPelanggan" tabindex="-1" aria-labelledby="editPelangganLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPelangganLabel">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formEdit" action="./pelanggan/edit" method="post">
                <div class="modal-body">
                    @csrf
                    <label for="inputPelanggan2" class="form-label">No Pelanggan</label>
                    <input type="text" class="form-control" id="inputPelanggan2"  disabled><br>
                    <label for="inputNama2" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="inputNama2" name="nama" required><br>
                    <label for="inputNoTelp2" class="form-label">No Telp</label>
                    <input type="text" class="form-control" id="inputNoTelp2" name="no_telp" required><br>
                    <label for="inputAlamat2" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="inputAlamat2" name="alamat" required><br>
                    <input type="hidden" class="form-control" id="inputId" name="id" required><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function editPelanggan(id){

        $.ajax({
            url: './pelanggan/edit/'+id,
            type: 'GET',
            dataType: 'json',
            success: function(data){
                $('#inputPelanggan2').val(data.username);
                $('#inputNama2').val(data.nama);
                $('#inputNoTelp2').val(data.no_telp);
                $('#inputAlamat2').val(data.alamat);
                $('#inputId').val(data.id);
                $('#editPelanggan').modal('show');
            }
        });
    }
</script>
@endsection