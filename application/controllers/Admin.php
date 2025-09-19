<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Cek login
        if (!$this->session->userdata('logged_in')) {
            redirect('welcome');
        }
        $this->load->model('Ab_rental');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    // ... kode CRUD sebelumnya ...

    // Fungsi untuk laporan transaksi
    public function laporan_transaksi()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/laporan_transaksi');
        $this->load->view('admin/footer');
    }

    public function laporan_print_transaksi()
    {
        // Ambil parameter filter
        $dari = $this->input->get('dari');
        $sampai = $this->input->get('sampai');
        
        // Validasi parameter
        if (empty($dari) || empty($sampai)) {
            // Jika parameter kosong, gunakan bulan ini
            $dari = date('Y-m-01');
            $sampai = date('Y-m-t');
        }
        
        // Ambil data transaksi berdasarkan filter
        $data['transaksi'] = $this->Ab_rental->get_laporan_transaksi($dari, $sampai);
        $data['dari'] = $dari;
        $data['sampai'] = $sampai;
        $data['total_pendapatan'] = $this->Ab_rental->get_total_pendapatan($dari, $sampai);
        
        // Load view untuk print
        $this->load->view('admin/laporan_print_transaksi', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('welcome');
    }
}
?>
