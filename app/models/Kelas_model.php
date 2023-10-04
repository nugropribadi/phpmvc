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
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE f_idkelas=:f_idkelas');
        $this->db->bind('f_idkelas', $id);
        return $this->db->single();
    }

    public function tambahDataKelas($data)
    {
        $query = "INSERT INTO t_kelas 
        VALUES ('', :nama)";

        $this->db->query($query);
        $this->db->bind('nama', $data['f_nama']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataKelas($id)
    {
        $query = "DELETE FROM t_kelas WHERE f_idkelas = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataKelas($data)
    {
        $query = "UPDATE t_kelas SET 
        f_nama = :f_nama
        WHERE f_idkelas = :f_idkelas";

        $this->db->query($query);
        $this->db->bind(':f_nama', $data['f_nama']);
        $this->db->bind(':f_idkelas', $data['f_idkelas']);

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
