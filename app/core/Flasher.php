<?php

class Flasher
{
    public static function setFlash($pesan, $aksi, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
        Data Siswa<strong> ' . $_SESSION['flash']['pesan'] . '</strong>' . $_SESSION['flash']['aksi'] . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
            unset($_SESSION['flash']);
        }
    }

    public static function flashKelas()
    {
        if (isset($_SESSION['flashKelas'])) {
            echo '<div class="alert alert-' . $_SESSION['flashKelas']['tipe'] . ' alert-dismissible fade show" role="alert">
        Data Kelas<strong> ' . $_SESSION['flashKelas']['pesan'] . '</strong>' . $_SESSION['flashKelas']['aksi'] . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
            unset($_SESSION['flashKelas']);
        }
    }
}
