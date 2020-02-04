<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tes extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();


    //     $this->load->model('stok_model', 'stok');
    // }
    public function index()
    {
        echo "tes";
        $this->db->select('t.tanggal_stok,t.awal,t.akhir,p.nama_produk,p.banding,p.harga');
        $this->db->from('transaksi t');
        $this->db->join('produk p', 'p.kode=t.kode_produk', 'left');
        $this->db->where('t.status', 'Pending');
        $this->db->where('t.nomor_stok', 'COBA1');
        $this->db->group_by('t.kode_produk');
        $data = $this->db->get();
        $no = 1;
        $total = 0;
        $terjual = 0;
        $total = 0;
        $banding = 0;
        $dos = 0;
        $bks = 0;
        $res = 0;
        $ados = 0;
        $abks = 0;
        $ares = 0;
        $tdos = 0;
        $tbks = 0;
        $tres = 0;
        echo '
        <table class="table table-sm table-bordered">
                <thead>
                    <th>#</th>
                    <th>Produk</th>
                    <th>Awal</th>
                    <th>Akhir</th>
                    <th>Terjual</th>
                    <th>Total</th>
                </thead>
                <tbody>
        
        ';
        if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $r) {
                $terjual = $r['awal'] - $r['akhir'];
                $total = $terjual * $r['harga'];
                $banding = $r['banding'];
                if ($r['awal'] >= $banding) {
                    $dos = floor($r['awal'] / $banding);
                    $res = $banding * $dos;
                    $bks = $r['awal'] - $res;
                } else {
                    $dos = 0;
                    $bks = $r['awal'];
                }

                if ($r['akhir'] >= $banding) {
                    $ados = floor($r['akhir'] / $banding);
                    $ares = $banding * $ados;
                    $abks = $r['akhir'] - $ares;
                } else {
                    $ados = 0;
                    $abks = $r['akhir'];
                }
                if ($terjual >= $banding) {
                    $tdos = floor($terjual / $banding);
                    $tres = $banding * $tdos;
                    $tbks = $terjual - $tres;
                } else {
                    $tdos = 0;
                    $tbks = $terjual;
                }

                echo '
<tr>
<td>' . $no++ . '</td>
<td>' . $r['nama_produk'] . '</td>
<td>' . $r['awal'] . '=' . $dos . 'Dos /' . $bks . ' Bks</td>
<td>' . $r['akhir'] . '=' . $ados . 'Dos /' . $abks . ' Bks</td>
<td>' . $terjual . '=' . $tdos . 'Dos /' . $tbks . ' Bks</td>
<td>' . number_format($total, 0, ',', '.') . '</td>
</tr>

';
            }
        } else {
            echo '
            <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
            
            ';
        }
        echo '    </tbody>
                </table>
        ';
    }
}
