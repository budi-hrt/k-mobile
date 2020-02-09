<!-- Begin Page Content -->
<div class="container-fluid p-1">

    <!-- Page Heading -->
    <h1 class="h6 mb-2 text-gray-800">Data Produk</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <p class="m-0 font-weight-bold text-primary">List Produk</p>
            <div class="d-flex justify-content-end mt-n4">
                <a class="btn btn-sm btn-success mb-n2 shadow" href="">Tambah</a>
            </div>
        </div>
        <div class="card-body p-1">
            <div class="table-responsive">
                <table class="table table-sm table-app" width=" 100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th></th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($produk as $p) : ?>
                            <tr>
                                <td width="50px"><img src="<?= base_url('assets/img/icon/box.png'); ?>" alt=""></td>
                                <td width="70px"><?= $p['kode']; ?></td>
                                <td><?= $p['nama_produk']; ?></td>
                                <td class="text-right">
                                    <a href="javascript:;" class="mr-2"><i class="fas fa-eye"></i></a>
                                    <a href="javascript:;" class="mr-2"><i class="fas fa-pencil-alt text-success"></i></a>
                                    <a href="javascript:;" class="mr-2"><i class="fas fa-times text-danger"></i></a>
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


<?php $this->load->view('template/footer'); ?>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
<?php $this->load->view('template/foothtml'); ?>