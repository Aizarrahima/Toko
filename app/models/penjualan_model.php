<?php

class penjualan_model
{
    private $table = 'Penjualan'; // tabel yang digunakan
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPenjualan()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPenjualanById($IdPenjualan)
    {
        $this->db->query('SELECT * FROM Penjualan JOIN Pengguna on Pengguna.IdPengguna = Penjualan.IdPengguna WHERE IdPenjualan =:IdPenjualan');
        $this->db->bind('IdPenjualan', $IdPenjualan);
        return $this->db->single();
    }

    public function tambahDataPenjualan($data)
    {
        $query = "INSERT INTO Penjualan VALUES (0, :JumlahPenjualan, :HargaJual, :IdPengguna) ";

        $this->db->query($query);

        $this->db->bind('JumlahPenjualan', $data['JumlahPenjualan']);
        $this->db->bind('HargaJual', $data['HargaJual']);
        $this->db->bind('IdPengguna', $data['IdPengguna']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataPenjualan($data)
    {
        $query = "UPDATE Penjualan SET 
        JumlahPenjualan = :JumlahPenjualan,
        HargaJual = :HargaJual,
        IdPengguna = :IdPengguna
        WHERE IdPenjualan = :IdPenjualan";

        $this->db->query($query);

        $this->db->bind('JumlahPenjualan', $data['JumlahPenjualan']);
        $this->db->bind('HargaJual', $data['HargaJual']);
        $this->db->bind('IdPengguna', $data['IdPengguna']);
        $this->db->bind('IdPenjualan', $data['IdPenjualan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPenjualan($IdPenjualan)
    {
        $query = "DELETE FROM Penjualan WHERE IdPenjualan = :IdPenjualan";
        $this->db->query($query);
        $this->db->bind('IdPenjualan', $IdPenjualan);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
