<?php
ob_start();
class Pengguna extends Controller
{
    public function index()
    {
        $data['judul'] = 'List User';
        $data['pengguna'] = $this->model('pengguna_model')->getAllPengguna();

        $this->view('templates/header', $data);
        $this->view('pengguna/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail User';
        $data['pengguna'] = $this->model('pengguna_model')->getPenggunaById($id);

        $this->view('templates/header', $data);
        $this->view('pengguna/detail', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit User';
        $data['pengguna'] = $this->model('pengguna_model')->getPenggunaById($id);

        $this->view('templates/header', $data);
        $this->view('pengguna/edit', $data);
        $this->view('templates/footer');
    }

    public function edit_submit()
    {
        if ($this->model('pengguna_model')->updateDataPengguna($_POST) > 0) {
            Flasher::flash('Berhasil', 'ditambahkan');
            header('Location: ' . ROUTE_URL . '/pengguna'); // apabila pengguna berhasil ditambahkan
            exit;
        } else {
            Flasher::flash('Gagal', 'ditambahkan');
            header('Location: ' . ROUTE_URL . '/pengguna'); // apabila pengguna gagal ditambahkan 
            exit;
        }
    }

    public function create()
    {
        $data['judul'] = 'Tambah Pengguna';

        $this->view('templates/header', $data);
        $this->view('pengguna/create');
        $this->view('templates/footer');

        if ($this->model('pengguna_model')->tambahDataPengguna($_POST) > 0) {
            Flasher::flash('Berhasil', 'ditambahkan');
            header('Location: ' . ROUTE_URL . '/pengguna'); // apabila pengguna berhasil ditambahkan
            exit;
        } else {
            Flasher::flash('Gagal', 'ditambahkan');
            header('Location: ' . ROUTE_URL . '/pengguna'); // apabila pengguna gagal ditambahkan 
            exit;
        }
    }

    public function hapus($IdPengguna)
    {
        if ($this->model('pengguna_model')->hapusDataPengguna($IdPengguna) > 0) {
            Flasher::flash('Berhasil', 'dihapus');
            header('Location: ' . ROUTE_URL . '/pengguna'); // apabila pengguna berhasil dihapus
            exit;
        } else {
            Flasher::flash('Gagal', 'dihapus');
            header('Location: ' . ROUTE_URL . '/pengguna'); // apabila pengguna gagal dihapus
        }
    }
}
