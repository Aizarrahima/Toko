<?php

class barang_model
{
    private $table = 'Barang'; // tabel yang digunakan
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllBarang()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getBarangById($IdBarang)
    {
        $this->db->query('SELECT * FROM Barang JOIN Pengguna on Pengguna.IdPengguna = Barang.IdPengguna WHERE IdBarang =:IdBarang');
        $this->db->bind('IdBarang', $IdBarang);
        return $this->db->single();
    }

    public function tambahDataBarang($data)
    {
        $query = "INSERT INTO Barang VALUES (0, :NamaBarang, :Keterangan, :Satuan, :IdPengguna) ";

        $this->db->query($query);

        $this->db->bind('NamaBarang', $data['NamaBarang']);
        $this->db->bind('Keterangan', $data['Keterangan']);
        $this->db->bind('Satuan', $data['Satuan']);
        $this->db->bind('IdPengguna', $data['IdPengguna']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataBarang($data)
    {
        $query = "UPDATE Barang SET 
        NamaBarang = :NamaBarang,
        Keterangan = :Keterangan,
        Satuan = :Satuan,
        IdPengguna = :IdPengguna
        WHERE IdBarang = :IdBarang";

        $this->db->query($query);

        $this->db->bind('NamaBarang', $data['NamaBarang']);
        $this->db->bind('Keterangan', $data['Keterangan']);
        $this->db->bind('Satuan', $data['Satuan']);
        $this->db->bind('IdPengguna', $data['IdPengguna']);
        $this->db->bind('IdBarang', $data['IdBarang']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataBarang($IdBarang)
    {
        $query = "DELETE FROM Barang WHERE IdBarang = :IdBarang";
        $this->db->query($query);
        $this->db->bind('IdBarang', $IdBarang);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
