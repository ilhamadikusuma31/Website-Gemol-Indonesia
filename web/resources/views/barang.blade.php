@extends('layouts/main')
@section('isi konten')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Barang</h1>

        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Unduh Rekap</a>
    </div>


    <!-- Content Row -->
    <div class="row">
        <div class="col mb-4">
            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="#"> <button type="button" class="btn btn-info">Tambah</button></a>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-bordered display responsive" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar:</th>
                                        <th>Nama:</th>
                                        <th>Jenis:</th>
                                        <th>Berat(gr):</th>
                                        <th>Harga:</th>
                                        <th>Status:</th>
                                        <th>Aksi:</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{-- <?php foreach($raws as $r): ?>
                                    <tr>
                                        <td><?= $angka++ ?></td>
                                        <td><img src ="<?= $path_img; ?>/<?= $r['foto_barang']  ?>" width="150px" /></td>
                                        <td><?= $r['nama_barang']  ?></td>
                                        <td><?= $r['nama_jenis_barang']  ?></td>
                                        <td><?= $r['berat_barang']  ?></td>
                                        <td><?= $r['harga_barang']  ?></td>
                                        <td><?= $r['nama_status']  ?></td>
                                        <td>
                                            <a href="<?= $path_edit_brg; ?>?id=<?= $r['barang_id']  ?>"><button type="button" class="btn btn-sm btn-warning mt-1">edit⠀</button></a>
                                            <a href="<?= $path_hapus_brg; ?>?id=<?= $r['barang_id']  ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')"><button type="button" class="btn btn-danger btn-sm mt-1">hapus</button></a>
                                        </td>
                                    </tr>
                                    <?php endforeach ?> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
