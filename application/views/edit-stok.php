<!-- Begin Page Content -->
<div class="container-fluid p-1 mt-n3" id="panel-item">

    <!-- Page Heading -->


    <h5 class="h6 mb-2 text-gray-800 nomor_stok">Nomor Stok : <?= $nomor['nomor_transaksi']; ?></h5>
    <input type="hidden" name="sts" id="sts" value="<?= $this->session->userdata('sts'); ?>">
    <input type="hidden" name="nomor" id="nomor" value="<?= $nomor['nomor_transaksi']; ?>">
    <input type="hidden" name="id_pj" id="id_pj" value="<?= $nomor['id_pj']; ?>">
    <input type="hidden" name="id_sales" id="id_sales" value="<?= $nomor['id_sales']; ?>">
    <input type="hidden" name="nama_sales" id="nama_sales" value="<?= $nomor['nama_sales']; ?>">
    <input type="hidden" name="pst_area" id="pst_area" value="<?= $nomor['pst']; ?>">
    <input type="text" class="form-control form-control-sm my-2 datepicker" name="tanggal" id="tanggal" value="<?= date('d-m-Y', strtotime($nomor['tanggal'])); ?>">
    <select name="area" id="area" class="form-control form-control-sm mb-1">
        <option value="<?= $nomor['area']; ?>"><?= $nomor['nama_area']; ?></option>
        <?php foreach ($area as $ar) : ?>
            <option value="<?= $ar['kode_area']; ?>"><?= $ar['nama_area']; ?></option>
        <?php endforeach; ?>
    </select>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <p class="m-0 font-weight-bold text-primary nama_sales">Nama : <?= $nomor['nama_sales']; ?></p>
            <div class="d-flex justify-content-end mt-n4">
                <span><a class="btn btn-sm btn-warning mb-n2 shadow mr-1" href="javascript:;" id="simpan">Ubah Stok</a>
                </span>
            </div>
        </div>
        <div class="card-body p-3">

            <div class="table-responsive">
                <table class="table table-sm " id="table-stok" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Produk</th>
                            <th>Dos</th>
                            <th>Bks</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="detil">

                    </tbody>
                </table>
            </div>

            <div class="tool-tambahan">
                <a href="javascript:;" class="btn btn-sm btn-secondary retur"> Retur</a>
                <a href="javascript:;" class="btn btn-sm btn-info catatan"> Catatan</a>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->




<div class="modal fade" id="modal-stok" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title ml-5">Masukan Stok Akhir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pl-5 pr-5 pb-5 pt-2">
                <div class="row justify-content-center">
                    <div class="col-md-8 ">

                        <input type="hidden" name="id_detil">
                        <input type="hidden" name="banding">
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Dos</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control " id="dos" name="dos">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Bks</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control " id="bks" name="bks">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn  btn-primary btn-block" id="update">Simpan</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modal-produk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLabel">Pilih Produk</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-1" id="panel-item">
                <div class="table-responsive">
                    <table class="table table-sm  table-app" width="100%" cellspacing="0" id="table-produk">

                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($produk as $p) : ?>
                                <tr>
                                    <td width="50px"><img src="<?= base_url('assets/img/icon/box.png'); ?>" alt=""></td>
                                    <td> <a href="javascript:;" class="mr-2 item-nama" data-kode="<?= $p['kode']; ?>" data-banding="<?= $p['banding']; ?>" data-harga="<?= $p['harga']; ?>"><?= $p['alias']; ?></a></td>
                                    <td class="text-right">
                                        <a href="javascript:;" class="mr-2 item-pilih" data-kode="<?= $p['kode']; ?>" data-banding="<?= $p['banding']; ?>" data-harga="<?= $p['harga']; ?>"><i class="fas fa-check mr-3"></i></a>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modal-retur" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title ml-5">Masukan Retur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pl-5 pr-5 pb-5 pt-2">
                <div class="row justify-content-center">
                    <div class="col-md-8 ">
                        <input type="hidden" name="kodeRetur">
                        <input type="hidden" name="hargaRetur">
                        <input type="hidden" name="bandingRetur">
                        <div class="form-group row my-1">
                            <label for="dos" class="col-sm-3 col-form-label">Dos</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control " id="dosRetur" name="dosRetur">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bks" class="col-sm-3 col-form-label">Bks</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control " id="bksRetur" name="bksRetur">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn  btn-success btn-block" onclick="simpanRetur()">Simpan</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal Catatan -->
<div class="modal fade" id="modal-catatan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title ml-5">Catatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pl-5 pr-5 pb-5 pt-2">
                <div class="row justify-content-center">
                    <div class="col-md-8 ">
                        <form id="form-catatan" action="">
                            <input type="hidden" name="nmrstk" id="nmrstk" value="<?= $nomor['nomor_transaksi']; ?>">
                            <div class="form-group">
                                <label for="catatan">Masukan Catatan</label>
                                <textarea class="form-control" id="catatan" name="catatan" rows="5"><?= $nomor['catatan']; ?></textarea>
                            </div>
                        </form>
                    </div>
                </div>
                <button class="btn  btn-primary btn-block" id="btn_catatan">Simpan</button>
            </div>

        </div>
    </div>
</div>



<!-- loader -->
<div id="throbber" class="modal" role="dialog" style="display:none; position:relative;  background-color:white;">
    <img style="width:100px" class="spiner" src="<?= base_url('assets'); ?>/img/gif/kotak1.gif" />
</div>



<!-- Modal Simpan -->
<div class="modal fade" id="modal-simpan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content ">
            <div class="modal-body text-center">
                <i class="fas fa-exclamation-triangle text-warning fa-2x"></i> Yakin Akan Menyimpan Data ?
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-sm" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-success btn-sm" href="javascript:;" id="save">Simpan</a>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('template/footer'); ?>



<script>
    history.pushState(null, null, location.href);
    window.onpopstate = function() {
        history.go(1);
        return window.confirm('Ada Perubahan yang belum disimpan!')

    };
</script>
<script>
    $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true
        });

        tampil_stok();
    });


    $('#area').on('change', function() {

        const pstArea = this.value;

        $.ajax({
            type: 'get',
            url: base_url + 'stok/get_area',
            data: {
                pstArea: pstArea
            },
            dataType: 'json',
            success: function(data) {
                $('input[name="pst_area"]').val(data.kode_pstarea);
                console.log(data);
            }
        })
    });




    function tampil_stok() {
        const sts = $('#sts').val();
        const nomor = $('#nomor').val();
        if (sts == '') {
            window.location.href = base_url + 'stok/list_stk';
        } else {

            $.ajax({
                type: 'get',
                url: base_url + 'stok/tampil_stok',
                data: {
                    nomor: nomor
                },
                success: function(html) {
                    $('#detil').html(html);

                }
            });
        }
    }


    // Catatan
    $('.catatan').on('click', function() {
        // $('input[name="nmrstk"]').val(nomor);
        $('#form-catatan').attr('action', base_url + 'stok/simpancatatan');
        $('#modal-catatan').modal('show');

    });

    $('#btn_catatan').on('click', function() {
        const url = $('#form-catatan').attr('action');
        const data = $('#form-catatan').serialize();
        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function() {
                $('#modal-catatan').modal('hide');
            }
        });

    });
    // Akhir catatan



    // Retur
    $('.retur').on('click', function() {
        $('#modal-produk').modal('show');
    })


    $('#table-produk').on('click', '.item-pilih', function() {
        const nomor = $('#nomor').val();
        const kodeProduk = $(this).attr('data-kode');
        const bandingProduk = $(this).attr('data-banding');
        const hargaProduk = $(this).attr('data-harga');
        $.ajax({
            type: 'get',
            url: base_url + 'stok/cekProdukRetur',
            data: {
                nomor: nomor,
                kodeProduk: kodeProduk
            },
            dataType: 'json',
            success: function(response) {
                if (response.success === false) {
                    alert('Produk sudah ada di table stok!');
                    return false;
                } else {
                    $('[name="kodeRetur"]').val(kodeProduk);
                    $('[name="bandingRetur"]').val(bandingProduk);
                    $('[name="hargaRetur"]').val(hargaProduk);
                    $('#modal-produk').modal('hide');
                    $('#modal-retur').modal('show');
                }
            }
        })

    })


    const simpanRetur = () => {
        const nomor = $('#nomor').val();
        const idSales = $('[name="id_sales"]').val();
        const kodeProduk = $('[name="kodeRetur"]').val();
        const bandingProduk = $('[name="bandingRetur"]').val();
        const hargaProduk = $('[name="hargaRetur"]').val();
        const dos = $('input[name="dosRetur"]').val();
        const bks = $('input[name="bksRetur"]').val();
        const idUser = '<?= $user['id_user']; ?>';
        $.ajax({
            type: 'post',
            url: base_url + 'stok/simpanRetur',
            data: {
                nomor: nomor,
                idSales: idSales,
                kode: kodeProduk,
                banding: bandingProduk,
                harga: hargaProduk,
                dos: dos,
                bks: bks,
                idUser: idUser
            },
            success: function() {
                $('#modal-retur').modal('hide');
                tampil_stok();
            }
        });
    }

    // akhir retur



    $('#detil').on('click', '.item-edit', function() {
        const id = $(this).attr('data-id');
        const banding = $(this).attr('data-banding');
        const dos = $(this).attr('data-dos');
        const bks = $(this).attr('data-bks');
        const alias = $(this).attr('data-nama');
        $('input[name="id_detil"]').val(id);
        $('input[name="banding"]').val(banding);
        $('input[name="dos"]').val(dos);
        $('input[name="bks"]').val(bks);

        $('#modal-stok').find('.modal-title').text(alias);
        $('#modal-stok').modal('show');
    });


    $('#update').on('click', function() {
        const id = $('input[name="id_detil"]').val();
        const banding = $('input[name="banding"]').val();
        const dos = $('input[name="dos"]').val();
        const bks = $('input[name="bks"]').val();
        $.ajax({
            type: 'post',
            url: base_url + 'stok/update_akhir',
            data: {
                id: id,
                banding: banding,
                dos: dos,
                bks: bks
            },
            success: function() {
                $('#modal-stok').modal('hide');
                tampil_stok();
            }
        });
    });



    $('#simpan').on('click', function() {
        const area = $('#area option:selected').attr('value');
        if (area == '') {
            alert('area belum dipilih');
        } else {

            $('#modal-simpan').modal('show');
        }
    });

    $('#save').on('click', function() {
        const pstar = $('input[name="pst_area"]').val();
        const area = $('#area option:selected').attr('value');
        const nomor = $('#nomor').val();
        const id = $('#id_pj').val();
        const subttl = $('input[name="subttl"]').val();
        const id_user = '<?= $user['id_user']; ?>';
        $.ajax({
            type: 'post',
            url: base_url + 'stok/ubah_tb',
            data: {
                nomor: nomor,
                id: id,
                area: area,
                pstar: pstar,
                subttl: subttl,
                id_user: id_user
            },
            success: function() {
                $('#modal-simpan').modal('hide');
                block();
                hapus_session_status();
                update_detil();
                setTimeout(function() {
                    unblock();
                    window.location.href = base_url + 'stok/penjualan/' + nomor;
                }, 1000);
            }
        });
    });






    function update_detil() {
        const area = $('#area option:selected').attr('value');
        const pstar = $('input[name="pst_area"]').val();
        const id_trs = [];
        $('.id_trs').each(function() {
            id_trs.push($(this).val());
        });

        $.ajax({
            type: 'post',
            url: base_url + 'stok/ubah_detil',
            data: {
                id_trs: id_trs,
                area: area,
                pstar: pstar

            }
        });
    }




    // Loader
    function block() {
        var body = $('#panel-item');
        var w = body.css("width");
        var h = body.css("height");
        var trb = $('#throbber');
        var position = body.offset(); // top and left coord, related to document

        trb.css({
            width: w,
            height: h,
            opacity: 0.7,
            position: 'absolute',
            top: position.top,
            left: position.left
        });
        trb.show();
    }

    function unblock() {
        var trb = $('#throbber');
        trb.hide();
    }


    function hapus_session_status() {
        $.ajax({
            url: base_url + 'stok/hapus_session_status'
        });

    }
</script>
<?php $this->load->view('template/foothtml'); ?>