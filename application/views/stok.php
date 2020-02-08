<!-- Begin Page Content -->
<div class="container-fluid p-1">

    <!-- Page Heading -->


    <h5 class="h6 mb-2 text-gray-800 nomor_stok">Nomor Stok : <?= $this->session->userdata('nmr'); ?></h5>
    <input type="hidden" name="nomor" id="nomor" value="<?= $this->session->userdata('nmr'); ?>">
    <input type="hidden" name="id_sales" id="id_sales" value="<?= $this->session->userdata('id_sls'); ?>">
    <input type="hidden" name="nama_sales" id="nama_sales" value="<?= $this->session->userdata('nm_sales'); ?>">
    <input type="text" class="form-control form-control-sm my-2 datepicker" name="tanggal" id="tanggal" value="<?= date('d-m-Y'); ?>">

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
            <div class="modal-body p-1">
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
<!-- modal-loading -->
<div class="modal bd-example-modal-sm " id="modal-loading" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-loading-2" role="document">
        <div class="modal-content text-center shadow">
            <!-- <div class="modal-body text-center"> -->
            <label id="label-info">Please wait...</label>
            <!-- </div> -->

        </div>
    </div>
</div>




<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Budi Harto 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->
<?php $this->load->view('template/footer'); ?>
<script>
    $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true
        });

        tampil_stok();
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
                        $('#modal-loading').modal('show');
                        setTimeout(function() {
                            $('#modal-sales').modal('hide');
                            $('#modal-loading').modal('hide');
                            simpan_session_sales();
                            tampil_stok();
                        }, 1000);
                    } else if (response.type == 'kosong') {
                        $('#modal-loading').modal('show');
                        setTimeout(function() {
                            $('#modal-sales').modal('hide');
                            $('#modal-loading').modal('hide');
                            $('#modal-konfirm').modal('show');
                        }, 500);
                        // simpan_detil();
                        // simpan_session_sales();
                        // setTimeout(function() {
                        //     tampil_stok();
                        //     $('#simpan').show();
                        //     $('#buat').hide();
                        // }, 500)
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
                        $('#modal-sales').modal('hide');
                        $('input[name="nomor"]').val(response.nomor);
                        $('input[name="id_sales"]').val(id_sls);
                        $('input[name="nama_sales"]').val(nm_sales);
                        $('.nomor_stok').text('Nomor Stok : ' + response.nomor);
                        $('.nama_sales').text('Nama : ' + nm_sales);
                        setTimeout(function() {
                            // alert('ada');
                            simpan_session_sales();
                            tampil_stok();
                        }, 300);
                    } else if (response.type == 'kosong') {
                        $('#modal-sales').modal('hide');
                        alert('Stok Awal Belum Ada !');
                        // simpan_detil();
                        // simpan_session_sales();
                        // setTimeout(function() {
                        //     tampil_stok();
                        //     $('#simpan').show();
                        //     $('#buat').hide();
                        // }, 500)
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
        const nomor = $('#nomor').val();
        const tanggal = $('#tanggal').val();
        const subttl = $('input[name="subttl"]').val();
        const id_user = '<?= $user['id_user']; ?>';
        $.ajax({
            type: 'post',
            url: base_url + 'stok/update_tb',
            data: {
                nomor: nomor,
                tanggal: tanggal,
                subttl: subttl,
                id_user: id_user
            },
            success: function() {
                hapus_session_sales();
                update_detil();
                // $('#modal-loading').modal('show');
                setTimeout(function() {
                    // $('#modal-loading').modal('hide');
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
        const id_trs = [];
        $('.id_trs').each(function() {
            id_trs.push($(this).val());
        });

        $.ajax({
            type: 'post',
            url: base_url + 'stok/update_detil',
            data: {
                id_trs: id_trs

            }
        });
    }
</script>
<?php $this->load->view('template/foothtml'); ?>