<?php

class pembelian_model
{
    private $table = 'Pembelian'; // tabel yang digunakan
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPembelian()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPembelianById($IdPembelian)
    {
        $this->db->query('SELECT * FROM Pembelian JOIN Pengguna on Pengguna.IdPengguna = Pembelian.IdPengguna WHERE IdPembelian =:IdPembelian');
        $this->db->bind('IdPembelian', $IdPembelian);
        return $this->db->single();
    }

    public function tambahDataPembelian($data)
    {
        $query = "INSERT INTO Pembelian VALUES (0, :JumlahPembelian, :HargaBeli, :IdPengguna) ";

        $this->db->query($query);

        $this->db->bind('JumlahPembelian', $data['JumlahPembelian']);
        $this->db->bind('HargaBeli', $data['HargaBeli']);
        $this->db->bind('IdPengguna', $data['IdPengguna']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataPembelian($data)
    {
        $query = "UPDATE Pembelian SET 
        JumlahPembelian = :JumlahPembelian,
        HargaBeli = :HargaBeli,
        IdPengguna = :IdPengguna
        WHERE IdPembelian = :IdPembelian";

        $this->db->query($query);

        $this->db->bind('JumlahPembelian', $data['JumlahPembelian']);
        $this->db->bind('HargaBeli', $data['HargaBeli']);
        $this->db->bind('IdPengguna', $data['IdPengguna']);
        $this->db->bind('IdPembelian', $data['IdPembelian']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPembelian($IdPembelian)
    {
        $query = "DELETE FROM Pembelian WHERE IdPembelian = :IdPembelian";
        $this->db->query($query);
        $this->db->bind('IdPembelian', $IdPembelian);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
