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
    public function get_area()
    {
        $this->db->where('is_active', 1);
        $query =  $this->db->get('area');
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
        $area = $this->input->post('area');
        $id_user = $this->input->post('id_user');
        $data = array(
            'tanggal' => $tanggal,
            'kode_area' => $area,
            'jumlah' => $jumlah,
            'date_created' => time(),
            'date_update' => time(),
            'id_user' => $id_user,
            'status_penjualan' => 'Stok'
        );
        $this->db->where('nomor_transaksi', $nomor);
        $this->db->update('penjualan', $data);
    }


    public function get_penjualan($nomor)
    {
        $this->db->select('p.id as id_pj,p.tanggal,p.nomor_transaksi,s.nama_sales,u.nama_user,p.date_update,p.date_created,p.status_penjualan,a.nama_area,p.kode_area as area');
        $this->db->from('penjualan p');
        $this->db->join('sales s', 's.id=p.id_sales', 'left');
        $this->db->join('user u', 'u.id_user=p.id_user', 'left');
        $this->db->join('area a', 'a.kode_area=p.kode_area', 'left');
        $this->db->where('p.nomor_transaksi', $nomor);
        $query = $this->db->get();
        return $query;
    }


    public function get_allStok()
    {
        $this->db->select('p.id as id_pj,p.tanggal,p.nomor_transaksi,s.nama_sales');
        $this->db->from('penjualan p');
        $this->db->join('sales s', 's.id=p.id_sales', 'left');
        $this->db->where('status_penjualan<>', 'Pending');
        $this->db->order_by('p.id', 'desc');
        $query = $this->db->get();
        return $query;
    }


    public function ubah_tb()
    {

        $jumlah = $this->input->post('subttl');
        $id = $this->input->post('id');
        $area = $this->input->post('area');
        $id_user = $this->input->post('id_user');
        $data = array(
            'kode_area' => $area,
            'jumlah' => $jumlah,
            'date_update' => time(),
            'id_user' => $id_user,
            'status_penjualan' => 'Koreksi'
        );
        $this->db->where('id', $id);
        $this->db->update('penjualan', $data);
    }
}
