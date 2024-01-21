<?php

class role_model
{
    private $table = 'HakAkses'; // tabel yang digunakan
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function getAllRole()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getRoleById($IdAkses)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE IdAkses =:IdAkses');
        $this->db->bind('IdAkses', $IdAkses);
        return $this->db->single();
    }

    public function tambahDataRole($data)
    {
        $query = "INSERT INTO HakAkses VALUES (0, :NamaAkses, :Keterangan) ";

        $this->db->query($query);

        $this->db->bind('NamaAkses', $data['NamaAkses']);
        $this->db->bind('Keterangan', $data['Keterangan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataRole($data)
    {
        $query = "UPDATE HakAkses SET 
        NamaAkses = :NamaAkses,
        Keterangan = :Keterangan
        WHERE IdAkses = :IdAkses";

        $this->db->query($query);

        $this->db->bind('NamaAkses', $data['NamaAkses']);
        $this->db->bind('Keterangan', $data['Keterangan']);
        $this->db->bind('IdAkses', $data['IdAkses']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataRole($IdAkses)
    {
        $query = "DELETE FROM HakAkses WHERE IdAkses = :IdAkses";
        $this->db->query($query);
        $this->db->bind('IdAkses', $IdAkses);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
