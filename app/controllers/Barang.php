<?php
ob_start();
class Barang extends Controller
{
    public function index()
    {
        $data['judul'] = 'List Barang';
        $data['barang'] = $this->model('barang_model')->getAllBarang();

        $this->view('templates/header', $data);
        $this->view('barang/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Barang';
        $data['barang'] = $this->model('barang_model')->getBarangById($id);

        $this->view('templates/header', $data);
        $this->view('barang/detail', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit Barang';
        $data['barang'] = $this->model('barang_model')->getBarangById($id);
        $data['pengguna'] = $this->model('pengguna_model')->getAllPengguna();

        $this->view('templates/header', $data);
        $this->view('barang/edit', $data);
        $this->view('templates/footer');
    }

    public function edit_submit()
    {
        if ($this->model('barang_model')->updateDataBarang($_POST) > 0) {
            Flasher::flash('Berhasil', 'diubah');
            header('Location: ' . ROUTE_URL . '/barang'); // apabila barang berhasil diupdate
            exit;
        } else {
            Flasher::flash('Gagal', 'diubah');
            header('Location: ' . ROUTE_URL . '/barang'); // apabila barang gagal diupdate 
            exit;
        }
    }

    public function create()
    {
        $data['judul'] = 'Tambah Barang';
        $data['pengguna'] = $this->model('pengguna_model')->getAllPengguna();

        $this->view('templates/header', $data);
        $this->view('barang/create', $data);
        $this->view('templates/footer');

        if ($this->model('barang_model')->tambahDataBarang($_POST) > 0) {
            Flasher::flash('Berhasil', 'ditambahkan');
            header('Location: ' . ROUTE_URL . '/barang'); // apabila barang berhasil ditambahkan
            exit;
        } else {
            Flasher::flash('Gagal', 'ditambahkan');
            header('Location: ' . ROUTE_URL . '/barang'); // apabila barang gagal ditambahkan 
            exit;
        }
    }

    public function hapus($IdBarang)
    {
        if ($this->model('barang_model')->hapusDataBarang($IdBarang) > 0) {
            Flasher::flash('Berhasil', 'dihapus');
            header('Location: ' . ROUTE_URL . '/barang'); // apabila barang berhasil dihapus
            exit;
        } else {
            Flasher::flash('Gagal', 'dihapus');
            header('Location: ' . ROUTE_URL . '/barang'); // apabila barang gagal dihapus
        }
    }
}
