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

    public function edit($id)
    {
        $data['judul'] = 'Edit User';
        $data['pengguna'] = $this->model('pengguna_model')->getPenggunaById($id);

        $this->view('templates/header', $data);
        $this->view('pengguna/edit', $data);
        $this->view('templates/footer');
    }

    public function create()
    {
        $data['judul'] = 'Tambah Pengguna';

        $this->view('templates/header', $data);
        $this->view('pengguna/create');
        $this->view('templates/footer');

        if ($this->model('pengguna_model')->tambahDataPengguna($_POST) > 0) {
            header('Location: http://localhost/Toko/public/pengguna'); // apabila pengguna berhasil ditambahkan maka diarahkan ke halaman pengguna
            exit;
        }
    }
}
