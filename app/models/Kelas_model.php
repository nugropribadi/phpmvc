<?php

class Kelas_model
{
    private $table = 't_kelas';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllKelas()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getKelasById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE f_idkelas=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataKelas($data)
    {
        $query = "INSERT INTO t_kelas 
        VALUES ('', :f_nama, :f_idkelas, :f_idjurusan)";

        $this->db->query($query);
        $this->db->bind('f_nama', $data['f_nama']);
        $this->db->bind('f_idkelas', $data['f_idkelas']);
        $this->db->bind('f_idjurusan', $data['f_idjurusan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataKelas($id)
    {
        $query = "DELETE FROM t_kelas WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataKelas($data)
    {
        $query = "UPDATE t_kelas SET 
        nama = :nama,
        umur = :umur,
        kelas = :kelas,
        jurusan = :jurusan
        WHERE id = :id";

        $this->db->query($query);
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':umur', $data['umur']);
        $this->db->bind(':kelas', $data['kelas']);
        $this->db->bind(':jurusan', $data['jurusan']);
        $this->db->bind(':id', $data['id']);

        try {
            $this->db->execute();
            return $this->db->rowCount();
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function cariDataKelas()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM t_kelas WHERE f_nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
