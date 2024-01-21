<?php

class supplier_model
{
    private $table = 'Supplier'; // tabel yang digunakan
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSupplier()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getSupplierById($IdSupplier)
    {
        $this->db->query('SELECT * FROM Supplier JOIN Barang on Barang.IdBarang = Supplier.IdBarang WHERE IdSupplier =:IdSupplier');
        $this->db->bind('IdSupplier', $IdSupplier);
        return $this->db->single();
    }

    public function tambahDataSupplier($data)
    {
        $query = "INSERT INTO Supplier VALUES (0, :IdBarang, :NamaSupplier, :Alamat, :NoHP) ";

        $this->db->query($query);

        $this->db->bind('IdBarang', $data['IdBarang']);
        $this->db->bind('NamaSupplier', $data['NamaSupplier']);
        $this->db->bind('Alamat', $data['Alamat']);
        $this->db->bind('NoHP', $data['NoHP']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataSupplier($data)
    {
        $query = "UPDATE Supplier SET 
        NamaSupplier = :NamaSupplier,
        Alamat = :Alamat,
        NoHP = :NoHP,
        IdBarang = :IdBarang
        WHERE IdSupplier = :IdSupplier";

        $this->db->query($query);

        $this->db->bind('IdBarang', $data['IdBarang']);
        $this->db->bind('NamaSupplier', $data['NamaSupplier']);
        $this->db->bind('Alamat', $data['Alamat']);
        $this->db->bind('NoHP', $data['NoHP']);
        $this->db->bind('IdSupplier', $data['IdSupplier']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataSupplier($IdSupplier)
    {
        $query = "DELETE FROM Supplier WHERE IdSupplier = :IdSupplier";
        $this->db->query($query);
        $this->db->bind('IdSupplier', $IdSupplier);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
