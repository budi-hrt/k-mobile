<!-- Begin Page Content -->
<div class="container-fluid p-1">

    <!-- Page Heading -->
    <h1 class="h6 mb-2 text-gray-800">Data Sales</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <p class="m-0 font-weight-bold text-primary">List Sales</p>
            <div class="d-flex justify-content-end mt-n4">
                <a class="btn btn-sm btn-success mb-n2 shadow" href="">Tambah</a>
            </div>
        </div>
        <div class="card-body p-1">
            <div class="table-responsive">
                <table class="table table-sm  table-app" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th></th>
                            <th width="50px">Kode</th>
                            <th>Nama</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($sales as $s) : ?>
                            <tr>
                                <td width="50px"><img src="<?= base_url('assets/img/icon/user.png'); ?>" alt=""></td>
                                <td><?= $s['kode_sales']; ?></td>
                                <td><?= $s['nama_sales']; ?></td>
                                <td class="text-right">
                                    <a href="javascript:;" class="mr-2"><i class="fas fa-eye"></i></a>
                                    <a href="javascript:;" class="mr-2"><i class="fas fa-pencil-alt text-success"></i></a>
                                    <a href="javascript:;" class="mr-1"><i class="fas fa-times text-danger"></i></a>
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

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->
<?php $this->load->view('template/footer'); ?>
<script>
    $(document).ready(function() {
        // $('#dataTable').DataTable();
    });
</script>
<?php $this->load->view('template/foothtml'); ?>