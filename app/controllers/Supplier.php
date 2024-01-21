<?php
ob_start();
class Supplier extends Controller
{
    public function index()
    {
        $data['judul'] = 'List Supplier';
        $data['supplier'] = $this->model('supplier_model')->getAllSupplier();

        $this->view('templates/header', $data);
        $this->view('supplier/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Supplier';
        $data['supplier'] = $this->model('supplier_model')->getSupplierById($id);

        $this->view('templates/header', $data);
        $this->view('supplier/detail', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit Supplier';
        $data['supplier'] = $this->model('supplier_model')->getSupplierById($id);
        $data['barang'] = $this->model('barang_model')->getAllBarang();

        $this->view('templates/header', $data);
        $this->view('supplier/edit', $data);
        $this->view('templates/footer');
    }

    public function edit_submit()
    {
        if ($this->model('supplier_model')->updateDataSupplier($_POST) > 0) {
            Flasher::flash('Berhasil', 'diubah');
            header('Location: ' . ROUTE_URL . '/supplier'); // apabila supplier berhasil diupdate
            exit;
        } else {
            Flasher::flash('Gagal', 'diubah');
            header('Location: ' . ROUTE_URL . '/supplier'); // apabila supplier gagal diupdate 
            exit;
        }
    }

    public function create()
    {
        $data['judul'] = 'Add Supplier';
        $data['barang'] = $this->model('barang_model')->getAllBarang();

        $this->view('templates/header', $data);
        $this->view('supplier/create', $data);
        $this->view('templates/footer');

        if ($this->model('supplier_model')->tambahDataSupplier($_POST) > 0) {
            Flasher::flash('Berhasil', 'ditambahkan');
            header('Location: ' . ROUTE_URL . '/supplier'); // apabila supplier berhasil ditambahkan
            exit;
        } else {
            Flasher::flash('Gagal', 'ditambahkan');
            header('Location: ' . ROUTE_URL . '/supplier'); // apabila supplier gagal ditambahkan 
            exit;
        }
    }

    public function hapus($IdSupplier)
    {
        if ($this->model('supplier_model')->hapusDataSupplier($IdSupplier) > 0) {
            Flasher::flash('Berhasil', 'dihapus');
            header('Location: ' . ROUTE_URL . '/supplier'); // apabila supplier berhasil dihapus
            exit;
        } else {
            Flasher::flash('Gagal', 'dihapus');
            header('Location: ' . ROUTE_URL . '/supplier'); // apabila supplier gagal dihapus
        }
    }
}
