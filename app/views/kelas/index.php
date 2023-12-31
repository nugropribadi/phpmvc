<div class="container mt-4">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flashKelas(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahDataKelas" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah Data Kelas
            </button>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>kelas/cari" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="cari kelas..." name="keyword" id="keyword" aria-describedby="button-addon" autocomplete="off">
                    <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <br><br>
    <h1>Daftar Kelas</h1>
    <ul class="list-group">
        <?php foreach ($data['t_kelas'] as $kelas) : ?>
            <li class="list-group-item d-flex flex-row justify-content-between">
                <?= $kelas['f_nama']; ?>
                <div class="d-flex gap-2">
                    <a href="<?= BASEURL; ?>kelas/detail/<?= $kelas['f_idkelas'] ?>" class="badge text-bg-primary text-decoration-none float-right">detail</a>
                    <a href="<?= BASEURL; ?>kelas/ubah/<?= $kelas['f_idkelas'] ?>" class="badge text-bg-success text-decoration-none float-right tampilModalUbahKelas" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $kelas['f_idkelas']; ?>">ubah</a>
                    <a href="<?= BASEURL; ?>kelas/hapus/<?= $kelas['f_idkelas'] ?>" class="badge text-bg-danger text-decoration-none float-right" onclick="return confirm('apakah anda yakin ingin mengahapus kelas <?= $kelas['f_nama'] ?>')">hapus</a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
</div>
</div>

<!-- Modal -->
<div class=" modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formModalLabel">Tambah Data kelas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>kelas/tambah" method="post">

                    <input type="hidden" name="f_idkelas" id="f_idkelas">

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kelas: </label>
                        <input type="text" class="form-control" id="f_nama" name="f_nama">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>