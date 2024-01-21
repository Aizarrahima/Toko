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
                TotalPenjualan - TotalPembelian AS Selisih, 
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

    public function getProductCombination() {
        $this->db->query(
            "SELECT 
                Penjualan.IdBarang,
                NamaBarang,
                HargaJual - HargaBeli AS Keuntungan
            FROM (
                SELECT IdPengguna AS IdBarang, MAX(HargaJual) AS HargaJual
                FROM penjualan
                GROUP BY IdPengguna
            ) Penjualan LEFT JOIN (
                SELECT IdPengguna AS IdBarang, MAX(HargaBeli) AS HargaBeli
                FROM pembelian
                GROUP BY IdPengguna
            ) Pembelian ON Penjualan.IdBarang = Pembelian.IdBarang
            LEFT JOIN barang ON barang.IdBarang = Pembelian.IdBarang
            WHERE HargaJual - HargaBeli > 0"
        );
        $result = $this->db->resultSet();

        $combinations = [];
        for ($i = 0; $i < count($result); $i++) {
            for ($j = 2; $j <= count($result); $j++) {
                if ($i + $j > count($result)) continue;

                $products = array_slice($result, $i, $j);
                $profit = array_sum(
                    array_map(function($product) { return $product["Keuntungan"]; }, $products)
                );
                array_push($combinations, ["products" => $products, "profit" => $profit]);
            }
        }

        return $combinations;
    }
}