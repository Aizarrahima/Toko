<?php
ob_start();
class Penjualan extends Controller
{
    public function index()
    {
        $data['judul'] = 'Penjualan';
        $data['penjualan'] = $this->model('penjualan_model')->getAllPenjualan();

        $this->view('templates/header', $data);
        $this->view('penjualan/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Penjualan';
        $data['penjualan'] = $this->model('penjualan_model')->getPenjualanById($id);

        $this->view('templates/header', $data);
        $this->view('penjualan/detail', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit Penjualan';
        $data['penjualan'] = $this->model('penjualan_model')->getPenjualanById($id);
        $data['pengguna'] = $this->model('pengguna_model')->getAllPengguna();

        $this->view('templates/header', $data);
        $this->view('penjualan/edit', $data);
        $this->view('templates/footer');
    }

    public function edit_submit()
    {
        if ($this->model('penjualan_model')->updateDataPenjualan($_POST) > 0) {
            Flasher::flash('Berhasil', 'diubah');
            header('Location: ' . ROUTE_URL . '/penjualan'); // apabila penjualan berhasil diupdate
            exit;
        } else {
            Flasher::flash('Gagal', 'diubah');
            header('Location: ' . ROUTE_URL . '/penjualan'); // apabila penjualan gagal diupdate 
            exit;
        }
    }

    public function create()
    {
        $data['judul'] = 'Penjualan';
        $data['pengguna'] = $this->model('pengguna_model')->getAllPengguna();

        $this->view('templates/header', $data);
        $this->view('penjualan/create', $data);
        $this->view('templates/footer');

        if ($this->model('penjualan_model')->tambahDataPenjualan($_POST) > 0) {
            Flasher::flash('Berhasil', 'ditambahkan');
            header('Location: ' . ROUTE_URL . '/penjualan'); // apabila penjualan berhasil ditambahkan
            exit;
        } else {
            Flasher::flash('Gagal', 'ditambahkan');
            header('Location: ' . ROUTE_URL . '/penjualan'); // apabila penjualan gagal ditambahkan 
            exit;
        }
    }

    public function hapus($IdPenjualan)
    {
        if ($this->model('penjualan_model')->hapusDataPenjualan($IdPenjualan) > 0) {
            Flasher::flash('Berhasil', 'dihapus');
            header('Location: ' . ROUTE_URL . '/penjualan'); // apabila penjualan berhasil dihapus
            exit;
        } else {
            Flasher::flash('Gagal', 'dihapus');
            header('Location: ' . ROUTE_URL . '/penjualan'); // apabila penjualan gagal dihapus
        }
    }
}
