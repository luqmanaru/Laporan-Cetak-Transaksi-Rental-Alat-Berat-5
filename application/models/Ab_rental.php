<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ab_rental extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // ... fungsi CRUD sebelumnya ...

    // Fungsi untuk mendapatkan laporan transaksi berdasarkan periode
    public function get_laporan_transaksi($dari, $sampai)
    {
        $this->db->select('t.*, c.nama_customer, a.nama_alat');
        $this->db->from('transaksi t');
        $this->db->join('customer c', 'c.id_customer = t.id_customer');
        $this->db->join('alat_berat a', 'a.id_alat = t.id_alat');
        $this->db->where('t.tanggal_sewa >=', $dari);
        $this->db->where('t.tanggal_sewa <=', $sampai);
        $this->db->order_by('t.tanggal_sewa', 'DESC');
        return $this->db->get()->result();
    }

    // Fungsi untuk mendapatkan total pendapatan berdasarkan periode
    public function get_total_pendapatan($dari, $sampai)
    {
        $this->db->select_sum('total_bayar');
        $this->db->from('transaksi');
        $this->db->where('tanggal_sewa >=', $dari);
        $this->db->where('tanggal_sewa <=', $sampai);
        $this->db->where('status', 'selesai');
        $result = $this->db->get()->row();
        return $result->total_bayar ? $result->total_bayar : 0;
    }
}
?>
