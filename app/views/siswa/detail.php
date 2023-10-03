<div class="container d-flex justify-content-center align-items-center mt-4" style="height: 80vh;">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title mb-4"><?= $data['t_siswa']['f_nama']; ?></h5>
            <p class="card-subtitle">Id Siswa: <?= $data['t_siswa']['f_idsiswa']; ?></p>
            <p class="card-text m-0">Kelas: <?= $data['t_siswa']['f_idkelas']; ?></p>
            <p class="card-text">Jurusan: <?= $data['t_siswa']['f_idjurusan']; ?></p>
            <a href="<?= BASEURL; ?>siswa" class="card-link">Kembali</a>
        </div>
    </div>
</div>