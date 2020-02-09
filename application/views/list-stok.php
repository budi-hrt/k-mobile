<!-- Begin Page Content -->
<div class="container-fluid p-1" id="panel-item">

    <!-- Page Heading -->
    <h1 class="h6 mb-2 text-gray-800">Data Stok</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <!-- <div class="card-header py-3">
            <p class="m-0 font-weight-bold text-primary">List Sales</p>
            <div class="d-flex justify-content-end mt-n4">
                <a class="btn btn-sm btn-success mb-n2 shadow" href="">Tambah</a>
            </div>
        </div> -->
        <div class="card-body p-1">
            <div class="table-responsive">
                <table class="table table-sm  table-app" width="100%" cellspacing="0" id="table-stok">
                    <thead class="thead-light">
                        <tr>

                            <th>Tanggal</th>
                            <th>Nama Sales</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($stok as $s) : ?>
                            <tr>
                                <td><?= date('d-m-Y', strtotime($s['tanggal'])); ?></td>
                                <td><?= $s['nama_sales']; ?></td>
                                <td class="text-right">
                                    <a href="javascript:;" class="mr-3 item-detil" data-id="<?= $s['id_pj']; ?>" data-nmr="<?= $s['nomor_transaksi']; ?>"><i class="fas fa-eye"></i></a>
                                    <a href="javascript:;" class="mr-3 item-print" data-nmr="<?= $s['nomor_transaksi']; ?>"><i class="fas text-info fa-print"></i></a>
                                    <a href="javascript:;" class="mr-2 item-edit" data-id="<?= $s['id_pj']; ?>" data-nmr="<?= $s['nomor_transaksi']; ?>" data-tgl="<?= $s['tanggal']; ?>"><i class="fas fa-pencil-alt text-success"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- loader -->
<div id="throbber" class="modal" role="dialog" style="display:none; position:relative;  background-color:white;">
    <img style="width:100px" class="spiner" src="<?= base_url('assets'); ?>/img/gif/kotak1.gif" />
</div>




<!-- Modal Detil -->
<div class="modal fade" id="modal-detil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content ">
            <div class="modal-body p-0">
                <table class="table table-sm table-app">
                    <thead class="thead-light">
                        <th>Produk</th>
                        <th>Awal</th>
                        <th>Akhir</th>
                        <th>Terjual</th>
                        <th class="text-right">Total</th>
                    </thead>
                    <tbody id="tampil">

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!-- Modal Simpan -->
<div class="modal fade" id="modal-tutup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content ">
            <div class="modal-body text-center">
                <i class="fas fa-exclamation-triangle text-warning fa-2x"></i> Data Tidak Bisa Di Ubah, Karna Sudah Tutup Buku.
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-sm" type="button" data-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>
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
        $('#table-stok').DataTable({
            "processing": true,
            "ordering": false,
            "bLengthChange": false,
            "info": false
        });
    });



    $('.item-detil').on('click', function() {
        const nomor = $(this).attr('data-nmr');
        $.ajax({
            type: 'get',
            url: base_url + 'stok/tampil_penjualan',
            data: {
                nomor: nomor
            },
            success: function(html) {
                $('#tampil').html(html);
                $('#modal-detil').modal('show');
            }
        });

    });

    $('.item-print').on('click', function() {
        block();
        const nomor = $(this).attr('data-nmr');
        setTimeout(function() {
            unblock();
            window.location.href = base_url + 'stok/penjualan/' + nomor;
        }, 1000);
    });

    $('.item-edit').on('click', function() {
        const nomor = $(this).attr('data-nmr');
        const tgl = $(this).attr('data-tgl');
        $.ajax({
            type: 'get',
            url: base_url + 'stok/cek_edit',
            data: {
                tgl: tgl
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    if (response.type == 'tutup') {
                        $('#modal-tutup').modal('show');
                    } else if (response.type == 'buka') {
                        block();
                        session_status();
                        setTimeout(function() {
                            unblock();
                            window.location.href = base_url + 'stok/edit/' + nomor;
                        }, 1000);
                    }
                }

            }
        });
    });


    function session_status() {
        const status = 'ubah';
        $.ajax({
            type: 'post',
            url: base_url + 'stok/session_status',
            data: {
                status: status
            },
            success: function() {
                window.location.href = base_url + 'stok/edit/' + nomor;

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