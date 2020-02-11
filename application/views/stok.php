<!-- Begin Page Content -->
<div class="container-fluid p-1 mt-n3">

    <!-- Page Heading -->


    <h5 class="h6 mb-2 text-gray-800 nomor_stok">Nomor Stok : <?= $this->session->userdata('nmr'); ?></h5>
    <input type="hidden" name="nomor" id="nomor" value="<?= $this->session->userdata('nmr'); ?>">
    <input type="hidden" name="id_sales" id="id_sales" value="<?= $this->session->userdata('id_sls'); ?>">
    <input type="hidden" name="nama_sales" id="nama_sales" value="<?= $this->session->userdata('nm_sales'); ?>">
    <input type="text" class="form-control form-control-sm my-2 datepicker" name="tanggal" id="tanggal" value="<?= date('d-m-Y'); ?>">
    <input type="hidden" name="pst_area" id="pst_area">
    <select name="area" id="area" class="form-control form-control-sm mb-1">
        <option value="">Pilih Daerah...</option>
        <?php foreach ($area as $ar) : ?>
            <option value="<?= $ar['kode_area']; ?>"><?= $ar['nama_area']; ?></option>
        <?php endforeach; ?>
    </select>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <p class="m-0 font-weight-bold text-primary nama_sales">Nama : <?= $this->session->userdata('nm_sales'); ?></p>
            <div class="d-flex justify-content-end mt-n4">
                <span><a class="btn btn-sm btn-warning mb-n2 shadow mr-1" href="javascript:;" id="simpan" style="display: none">Simpan</a>
                    <a class="btn btn-sm btn-success mb-n2  shadow" href="javascript:;" data-toggle="modal" data-target="#modal-sales" id="baru">Baru</a>
                    <a class="btn btn-sm btn-danger mb-n2 shadow" href="javascript:;" id="kosongkan">Reset</a></span>
            </div>
        </div>
        <div class="card-body p-3">

            <div class="table-responsive">
                <table class="table table-sm " id="table-stok" width="100%" cellspacing="0" style="display: none">
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
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- modal -->
<div class="modal fade" id="modal-sales" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLabel">Pilih Satu Sales</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-1" id="panel-item">
                <div class="table-responsive">
                    <table class="table table-sm  table-app" width="100%" cellspacing="0" id="table-sales">

                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($sales as $s) : ?>
                                <tr>
                                    <td width="50px"><img src="<?= base_url('assets/img/icon/user.png'); ?>" alt=""></td>
                                    <td><?= $s['kode_sales']; ?></td>
                                    <td> <a href="javascript:;" class="mr-2 item-nama" data-id="<?= $s['id']; ?>" data-nama="<?= $s['nama_sales']; ?>"><?= $s['nama_sales']; ?></a></td>
                                    <td class="text-right">
                                        <a href="javascript:;" class="mr-2 item-pilih" data-id="<?= $s['id']; ?>" data-nama="<?= $s['nama_sales']; ?>"><i class="fas fa-check mr-3"></i></a>

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
                        <div class="form-group row my-1">
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

<div class="modal fade" id="modal-konfirm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title ml-5">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pl-5 pr-5 pb-5 pt-2">
                <h5>Belum Ada Stok Awal !</h5>
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



    $('#table-sales').on('click', '.item-nama', function() {
        const id_sls = $(this).attr('data-id');
        const nm_sales = $(this).attr('data-nama');
        $.ajax({
            type: 'get',
            url: base_url + 'stok/get_stok',
            data: {
                id_sls: id_sls
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    if (response.type == 'ada') {
                        $('input[name="nomor"]').val(response.nomor);
                        $('input[name="id_sales"]').val(id_sls);
                        $('input[name="nama_sales"]').val(nm_sales);
                        $('.nomor_stok').text('Nomor Stok : ' + response.nomor);
                        $('.nama_sales').text('Nama : ' + nm_sales);
                        block();
                        setTimeout(function() {
                            unblock();
                            $('#modal-sales').modal('hide');
                            simpan_session_sales();
                            tampil_stok();
                        }, 1000);
                    } else if (response.type == 'kosong') {
                        block();
                        setTimeout(function() {
                            unblock();
                            $('#modal-sales').modal('hide');
                            $('#modal-konfirm').modal('show');
                        }, 1000);

                    }
                }
            }
        });
    });
    $('#table-sales').on('click', '.item-pilih', function() {
        const id_sls = $(this).attr('data-id');
        const nm_sales = $(this).attr('data-nama');
        $.ajax({
            type: 'get',
            url: base_url + 'stok/get_stok',
            data: {
                id_sls: id_sls
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    if (response.type == 'ada') {

                        $('input[name="nomor"]').val(response.nomor);
                        $('input[name="id_sales"]').val(id_sls);
                        $('input[name="nama_sales"]').val(nm_sales);
                        $('.nomor_stok').text('Nomor Stok : ' + response.nomor);
                        $('.nama_sales').text('Nama : ' + nm_sales);
                        block();
                        setTimeout(function() {
                            unblock();
                            $('#modal-sales').modal('hide');
                            simpan_session_sales();
                            tampil_stok();
                        }, 1000);
                    } else if (response.type == 'kosong') {
                        block();

                        setTimeout(function() {
                            $('#modal-sales').modal('hide');
                            unblock();
                            $('#modal-konfirm').modal('show');
                        }, 1000)
                    }
                }
            }
        });
    });

    function show_hide() {
        const sls = $('input[name="id_sales"]');
        if (sls.val() == '') {
            $('#simpan').hide();
            $('#baru').show();
            $('#table-stok').hide();

        } else {
            $('#simpan').show();
            $('#baru').hide();
            $('#table-stok').show();
        }

    }

    function simpan_session_sales() {
        const id_sales = $('#id_sales').val();
        const nama_sales = $('#nama_sales').val();
        const nomor = $('#nomor').val();
        $.ajax({
            type: 'post',
            url: base_url + 'stok/simpan_session_sales',
            data: {
                nama_sales: nama_sales,
                id_sales: id_sales,
                nomor: nomor
            }
        });
    }

    function tampil_stok() {
        const nomor = $('#nomor').val();
        $.ajax({
            type: 'get',
            url: base_url + 'stok/tampil_stok',
            data: {
                nomor: nomor
            },
            success: function(html) {
                $('#detil').html(html);
                show_hide();
            }
        });
    }


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


    $('#kosongkan').on('click', function() {
        // $('#modal-loading').modal('show');
        hapus_session_sales();
        setTimeout(function() {
            // $('#modal-loading').modal('hide');
            window.location.href = base_url + "stok";
        }, 500);
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
        const nomor = $('#nomor').val();
        const tanggal = $('#tanggal').val();
        const area = $('#area option:selected').attr('value');
        const subttl = $('input[name="subttl"]').val();
        const id_user = '<?= $user['id_user']; ?>';
        $.ajax({
            type: 'post',
            url: base_url + 'stok/update_tb',
            data: {
                nomor: nomor,
                tanggal: tanggal,
                area: area,
                pstar: pstar,
                subttl: subttl,
                id_user: id_user
            },
            success: function() {
                $('#modal-simpan').modal('hide');
                hapus_session_sales();
                update_detil();
                setTimeout(function() {
                    window.location.href = base_url + 'stok/penjualan/' + nomor;
                }, 300);
            }
        });
    });




    function hapus_session_sales() {
        $.ajax({
            url: base_url + 'stok/hapus_session_sales'
        });

    }

    function update_detil() {
        const tanggal = $('#tanggal').val();
        const area = $('#area option:selected').attr('value');
        const pstar = $('input[name="pst_area"]').val();
        const id_trs = [];
        $('.id_trs').each(function() {
            id_trs.push($(this).val());
        });

        $.ajax({
            type: 'post',
            url: base_url + 'stok/update_detil',
            data: {
                id_trs: id_trs,
                tanggal: tanggal,
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
</script>
<?php $this->load->view('template/foothtml'); ?>