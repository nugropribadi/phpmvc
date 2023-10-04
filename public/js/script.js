$(function () {

    //Modal Siswa
    $('.tombolTambahData').on('click', function () {
        $('#formModalLabel').html('Tambah Data Siswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/siswa/tambah');
        $('#f_nama').val('');
        $('#f_idkelas').val('');
        $('#f_idjurusan').val('');
        $('#f_idsiswa').val('');
    });


    $('.tampilModalUbah').on('click', function () {

        $('#formModalLabel').html('Ubah Data Siswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/siswa/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/phpmvc/public/siswa/getubah',
            data: {f_idsiswa: id},
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#f_nama').val(data.f_nama);
                $('#f_idkelas').val(data.f_idkelas);
                $('#f_idjurusan').val(data.f_idjurusan);
                $('#f_idsiswa').val(data.f_idsiswa);
                console.log(data);
            }
        });

    });


    // Modal Kelas
    $('.tombolTambahDataKelas').on('click', function () {
        $('#formModalLabel').html('Tambah Data Kelas');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/kelas/tambah');
        $('#f_nama').val('');
        $('#f_idkelas').val('');
    });


    $('.tampilModalUbahKelas').on('click', function () {

        $('#formModalLabel').html('Ubah Data Kelas');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/kelas/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/phpmvc/public/kelas/getubah',
            data: {f_idkelas: id},
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#f_nama').val(data.f_nama);
                $('#f_idkelas').val(data.f_idkelas);
            }
        });

    });

});