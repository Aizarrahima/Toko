<?php

class pengguna_model
{
    private $table = 'Pengguna'; // tabel yang digunakan
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function getAllPengguna()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPenggunaById($IdPengguna)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE IdPengguna =:IdPengguna');
        $this->db->bind('IdPengguna', $IdPengguna);
        return $this->db->single();
    }

    public function tambahDataPengguna($data)
    {
        $query = "INSERT INTO Pengguna VALUES (0, :NamaPengguna, :Password, :NamaDepan, :NamaBelakang, :NoHP, :Alamat, :IdAkses) ";

        $this->db->query($query);

        $this->db->bind('NamaPengguna', $data['NamaPengguna']);
        $this->db->bind('Password', $data['Password']);
        $this->db->bind('NamaDepan', $data['NamaDepan']);
        $this->db->bind('NamaBelakang', $data['NamaBelakang']);
        $this->db->bind('NoHP', $data['NoHP']);
        $this->db->bind('Alamat', $data['Alamat']);
        $this->db->bind('IdAkses', $data['IdAkses']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataPengguna($data)
    {
        $query = "UPDATE Pengguna SET 
        NamaPengguna = :NamaPengguna,
        Password = :Password,
        NamaDepan = :NamaDepan,
        NamaBelakang = :NamaBelakang,
        NoHP = :NoHP,
        Alamat = :Alamat,
        IdAkses = :IdAkses
        WHERE IdPengguna = :IdPengguna";

        $this->db->query($query);

        $this->db->bind('NamaPengguna', $data['NamaPengguna']);
        $this->db->bind('Password', $data['Password']);
        $this->db->bind('NamaDepan', $data['NamaDepan']);
        $this->db->bind('NamaBelakang', $data['NamaBelakang']);
        $this->db->bind('NoHP', $data['NoHP']);
        $this->db->bind('Alamat', $data['Alamat']);
        $this->db->bind('IdAkses', $data['IdAkses']);
        $this->db->bind('IdPengguna', $data['IdPengguna']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPengguna($IdPengguna)
    {
        $query = "DELETE FROM Pengguna WHERE IdPengguna = :IdPengguna";
        $this->db->query($query);
        $this->db->bind('IdPengguna', $IdPengguna);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
