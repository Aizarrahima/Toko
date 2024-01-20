<?php

class dashboard_model {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAnalytic() {
        $this->db->query(
            "SELECT 
                TotalPenjualan.IdPengguna AS IdBarang,
                Barang.NamaBarang,
                TotalPenjualan, 
                TotalPembelian, 
                TotalPenjualan - TotalPembelian AS Laba, 
                CASE
                    WHEN TotalPenjualan - TotalPembelian > 0 THEN 'Untung'
                    WHEN TotalPenjualan - TotalPembelian < 0 THEN 'Rugi'
                    WHEN TotalPenjualan - TotalPembelian = 0 THEN 'Balik Modal'
                END AS Status
            FROM (
                SELECT IdPengguna, SUM(JumlahPenjualan * HargaJual) AS TotalPenjualan
                FROM penjualan
                GROUP BY IdPengguna
            ) TotalPenjualan LEFT JOIN (
                SELECT IdPengguna, SUM(JumlahPembelian * HargaBeli) AS TotalPembelian
                FROM pembelian
                GROUP BY IdPengguna
            ) TotalPembelian ON TotalPenjualan.IdPengguna = TotalPembelian.IdPengguna
            LEFT JOIN barang ON barang.IdBarang = TotalPembelian.IdPengguna"
        );
        return $this->db->resultSet();
    }
}