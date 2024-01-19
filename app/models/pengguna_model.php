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
}
