<?php
ob_start();
class Pembelian extends Controller
{
    public function index()
    {
        $data['judul'] = 'Pembelian';
        $data['pembelian'] = $this->model('pembelian_model')->getAllPembelian();

        $this->view('templates/header', $data);
        $this->view('pembelian/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Pembelian';
        $data['pembelian'] = $this->model('pembelian_model')->getPembelianById($id);

        $this->view('templates/header', $data);
        $this->view('pembelian/detail', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit Pembelian';
        $data['pembelian'] = $this->model('pembelian_model')->getPembelianById($id);
        $data['pengguna'] = $this->model('pengguna_model')->getAllPengguna();

        $this->view('templates/header', $data);
        $this->view('pembelian/edit', $data);
        $this->view('templates/footer');
    }

    public function edit_submit()
    {
        if ($this->model('pembelian_model')->updateDataPembelian($_POST) > 0) {
            Flasher::flash('Berhasil', 'diubah');
            header('Location: ' . ROUTE_URL . '/pembelian'); // apabila pembelian berhasil diupdate
            exit;
        } else {
            Flasher::flash('Gagal', 'diubah');
            header('Location: ' . ROUTE_URL . '/pembelian'); // apabila pembelian gagal diupdate 
            exit;
        }
    }

    public function create()
    {
        $data['judul'] = 'Pembelian';
        $data['pengguna'] = $this->model('pengguna_model')->getAllPengguna();

        $this->view('templates/header', $data);
        $this->view('pembelian/create', $data);
        $this->view('templates/footer');

        if ($this->model('pembelian_model')->tambahDataPembelian($_POST) > 0) {
            Flasher::flash('Berhasil', 'ditambahkan');
            header('Location: ' . ROUTE_URL . '/pembelian'); // apabila pembelian berhasil ditambahkan
            exit;
        } else {
            Flasher::flash('Gagal', 'ditambahkan');
            header('Location: ' . ROUTE_URL . '/pembelian'); // apabila pembelian gagal ditambahkan 
            exit;
        }
    }

    public function hapus($IdPembelian)
    {
        if ($this->model('pembelian_model')->hapusDataPembelian($IdPembelian) > 0) {
            Flasher::flash('Berhasil', 'dihapus');
            header('Location: ' . ROUTE_URL . '/pembelian'); // apabila pembelian berhasil dihapus
            exit;
        } else {
            Flasher::flash('Gagal', 'dihapus');
            header('Location: ' . ROUTE_URL . '/pembelian'); // apabila pembelian gagal dihapus
        }
    }
}
