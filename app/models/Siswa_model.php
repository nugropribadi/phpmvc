<?php

class Siswa_model
{
    private $table = 't_siswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSiswa()
    {
        $this->db->query('SELECT * FROM t_siswa ORDER BY f_nama');
        return $this->db->resultSet();
    }

    public function getSiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE f_idsiswa=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataSiswa($data)
    {
        $query = "INSERT INTO t_siswa 
        VALUES ('', :f_nama, :f_idkelas, :f_idjurusan)";

        $this->db->query($query);
        $this->db->bind('f_nama', $data['f_nama']);
        $this->db->bind('f_idkelas', $data['f_idkelas']);
        $this->db->bind('f_idjurusan', $data['f_idjurusan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataSiswa($id)
    {
        $query = "DELETE FROM t_siswa WHERE f_idsiswa = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataSiswa($data)
    {
        $query = "UPDATE t_siswa SET 
        f_nama = :f_nama,
        f_idkelas = :f_idkelas,
        f_idjurusan = :f_idjurusan
        WHERE f_idsiswa = :f_idsiswa";

        $this->db->query($query);
        $this->db->bind(':f_nama', $data['f_nama']);
        $this->db->bind(':f_idkelas', $data['f_idkelas']);
        $this->db->bind(':f_idjurusan', $data['f_idjurusan']);
        $this->db->bind(':f_idsiswa', $data['f_idsiswa']);

        try {
            $this->db->execute();
            return $this->db->rowCount();
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function cariDataSiswa()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM t_siswa WHERE f_nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
