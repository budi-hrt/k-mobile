<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();


        $this->load->model('stok_model', 'stok');
    }
    public function index()
    {
        $this->load->model('m_security');
        $this->m_security->getsecurity();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['produk'] = $this->stok->get_all()->result_array();
        $data['sales'] = $this->stok->get_sales()->result_array();
        $data['area'] = $this->stok->get_area()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('stok', $data);
    }


    public function get_stok()
    {
        $msg['success'] = false;
        $id_sales = $this->input->get('id_sls');
        $status = 'Pending';
        $cek = $this->db->get_where('penjualan', ['id_sales' => $id_sales, 'status_penjualan' => $status]);
        if ($cek->num_rows() < 1) {
            $msg['success'] = true;
            $msg['type'] = 'kosong';

            echo json_encode($msg);
        } else {
            $data = $cek->row_array();
            $msg['success'] = true;
            $msg['type'] = 'ada';
            $msg['nomor'] = $data['nomor_transaksi'];
            echo json_encode($msg);
        }
    }

    public function get_area()
    {
        $data = $this->stok->get_pstarea();
        echo json_encode($data);
    }

    public function simpan_session_sales()
    {
        $array = array('id_sls', 'nm_sales', 'nmr');
        $this->session->unset_userdata($array);
        $id = $this->input->post('id_sales');
        $nama = $this->input->post('nama_sales');
        $nomor = $this->input->post('nomor');
        $sls = [
            'id_sls' => $id,
            'nm_sales' => $nama,
            'nmr' => $nomor
        ];
        $this->session->set_userdata($sls);
    }


    public function tampil_stok()
    {
        $nomor = $this->input->get('nomor');
        $this->db->select('t.id as id_detil,t.awal,t.akhir,t.kode_produk,p.nama_produk,p.banding,t.harga_produk,p.alias,t.retur');
        $this->db->from('transaksi t');
        $this->db->join('produk p', 'p.kode=t.kode_produk', 'left');
        $this->db->where('t.nomor_stok', $nomor);
        $data = $this->db->get();
        $no = 1;
        $total = 0;
        $terjual = 0;
        $total = 0;
        $subttl = 0;
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
        if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $r) {
                $terjual = $r['awal'] - $r['akhir'];
                $total = $terjual * $r['harga_produk'];
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
                <input type="hidden" class="id_trs" value="' . $r['id_detil'] . '">';

                if ($r['retur'] == 'True') {

                    echo '<td class="text-danger">' . $r['alias'] . '</td>
                        <td class="text-danger">' . $ados . '</td>
                         <td class="text-danger">' . $abks . '</td>';
                } else {

                    echo '<td>' . $r['alias'] . '</td>
                            <td>' . $ados . '</td>
                            <td>' . $abks . '</td>';
                }

                echo ' <td class="text-center"><a href="javascript:;" class="item-edit" data-id="' . $r['id_detil'] . '" data-banding="' . $r['banding'] . '"  data-dos="' . $ados . '" data-bks="' . $abks . '" data-nama="' . $r['alias'] . '"><i class="fas fa-pencil-alt text-success"></i></a></td>
                <input type="hidden" class="total" value="' . $total . '">
                </tr>
                ';
                $subttl += $total;
            }
            echo '<input type="hidden" name="item" value="1">
            <input type="hidden" name="subttl" value="' . $subttl . '">
            ';
        } else {
            echo '
                <tr>
                <input type="hidden" name="item" >
                <td colspan="7" rowspan="3" class="text-center"> Belum Ada Stok</td>
                
                </tr>


                ';
        }
    }


    public function update_akhir()
    {
        $this->stok->update_akhir();
    }

    public function cekProdukRetur()
    {
        $msg['success'] = false;
        $nomorStok = $this->input->get('nomor');
        $kodeProduk = $this->input->get('kodeProduk');
        $cek = $this->db->get_where('transaksi', ['nomor_stok' => $nomorStok, 'kode_produk' => $kodeProduk]);
        if ($cek->num_rows() > 0) {

            echo json_encode($msg);
        } else {
            $msg['success'] = true;
            echo json_encode($msg);
        }
    }
    public function simpanRetur()
    {
        $this->stok->simpanRetur();
    }






    public function hapus_session_sales()
    {
        $array = array('id_sls', 'nm_sales', 'nmr');
        $this->session->unset_userdata($array);
    }


    public function update_tb()
    {
        $this->stok->update_tb();
    }


    public function update_detil()
    {
        $id = $_POST['id_trs'];
        $tanggal = date('Y-m-d', strtotime($_POST['tanggal']));
        $area = $_POST['area'];
        $pstarea = $_POST['pstar'];
        $status = 'Stok';
        $data = array();
        $index = 0; // Set index array awal dengan 0
        foreach ($id as $k) { // Kita buat perulangan berdasarkan nis sampai data terakhir
            array_push($data, array(
                'id' => $k,
                'tanggal_stok' => $tanggal,
                'kode_area' => $area,
                'kode_pstarea' => $pstarea,
                'status' => $status  // Ambil dan set data telepon sesuai index array dari $index
            ));

            $index++;
        }
        $this->db->update_batch('transaksi', $data, 'id');
    }

    public function penjualan($nomor)
    {
        $this->load->model('m_security');
        $this->m_security->getsecurity();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['nomor'] = $this->stok->get_penjualan($nomor)->row_array();
        $this->load->view('penjualan', $data);
    }

    public function tampil_penjualan()
    {
        $nomor = $this->input->get('nomor');
        $this->db->select('t.id as id_detil,t.awal,t.akhir,t.kode_produk,p.nama_produk,p.banding,t.harga_produk,p.alias');
        $this->db->from('transaksi t');
        $this->db->join('produk p', 'p.kode=t.kode_produk', 'left');
        $this->db->where('t.nomor_stok', $nomor);
        $data = $this->db->get();

        if ($data->num_rows() > 1) {
            // foreach ($data->result_array() as $r) {

            // }
            $dt['data'] = $data->result_array();
            $this->load->view('list-penjualan', $dt);
        } else {
            echo '
                <tr>
                <input type="hidden" name="item" >
                <td colspan="7" rowspan="3" class="text-center"> Belum Ada Stok</td>
                
                </tr>


                ';
        }
    }


    public function list_stk()
    {

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['stok'] = $this->stok->get_allStok()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('list-stok', $data);
    }

    public function cek_edit()
    {
        $msg['success'] = false;
        $tgl = $this->input->get('tgl');
        $data = $this->db->get('tutup_buku')->row_array();
        $tutup = $data['tanggal_tutup'];
        if ($tgl <= $tutup) {
            $msg['success'] = true;
            $msg['type'] = 'tutup';
            echo json_encode($msg);
        } else {
            $msg['success'] = true;
            $msg['type'] = 'buka';
            echo json_encode($msg);
        }
    }




    public function edit($nomor)
    {
        $this->load->model('m_security');
        $this->m_security->getsecurity();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['nomor'] = $this->stok->get_penjualan($nomor)->row_array();
        $data['produk'] = $this->stok->get_all()->result_array();
        $data['area'] = $this->stok->get_area()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('edit-stok', $data);
    }


    public function ubah_tb()
    {
        $this->stok->ubah_tb();
    }

    public function ubah_detil()
    {
        $id = $_POST['id_trs'];
        $area = $_POST['area'];
        $pstarea = $_POST['pstar'];
        $status = 'Koreksi';
        $data = array();
        $index = 0; // Set index array awal dengan 0
        foreach ($id as $k) { // Kita buat perulangan berdasarkan nis sampai data terakhir
            array_push($data, array(
                'id' => $k,
                'kode_area' => $area,
                'kode_pstarea' => $pstarea,
                'status' => $status  // Ambil dan set data telepon sesuai index array dari $index
            ));

            $index++;
        }
        $this->db->update_batch('transaksi', $data, 'id');
    }

    public function session_status()
    {
        $sts = 'sts';
        $this->session->unset_userdata($sts);
        $data = $this->input->post('status');
        $status = ['sts' => $data];
        $this->session->set_userdata($status);
    }

    public function hapus_session_status()
    {
        $array = 'sts';
        $this->session->unset_userdata($array);
    }


    public function simpanCatatan()
    {
        $this->stok->simpan_catatan();
    }
}
