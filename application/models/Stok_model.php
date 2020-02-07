<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok_model extends CI_model
{
    public function get_all()
    {
        $this->db->where('is_active', 1);
        $query =  $this->db->get('produk');
        return $query;
    }

    public function get_sales()
    {
        $this->db->where('is_active', 1);
        $query =  $this->db->get('sales');
        return $query;
    }


    public function update_akhir()
    {
        $id = $this->input->post('id');
        $banding = $this->input->post('banding');
        // $awal = $this->input->post('awal');
        $dos = $this->input->post('dos');
        $bks = $this->input->post('bks');
        $stok = $dos * $banding;
        $akhir = $stok + $bks;
        $data = array(
            'akhir' => $akhir
        );
        $this->db->where('id', $id);
        $this->db->update('transaksi', $data);
    }

    public function update_tb()
    {

        $jumlah = $this->input->post('subttl');
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $nomor = $this->input->post('nomor');
        $id_user = $this->input->post('id_user');
        $data = array(
            'tanggal' => $tanggal,
            'jumlah' => $jumlah,
            'date_update' => time(),
            'id_user' => $id_user,
            'status_penjualan' => 'Stok'
        );
        $this->db->where('nomor_transaksi', $nomor);
        $this->db->update('penjualan', $data);
    }


    public function get_penjualan($nomor)
    {
        $this->db->select('p.tanggal,p.nomor_transaksi,s.nama_sales,u.nama_user,p.date_update,p.date_created,p.status_penjualan');
        $this->db->from('penjualan p');
        $this->db->join('sales s', 's.id=p.id_sales', 'left');
        $this->db->join('user u', 'u.id_user=p.id_user', 'left');
        $this->db->where('p.nomor_transaksi', $nomor);
        $query = $this->db->get();
        return $query;
    }
}
