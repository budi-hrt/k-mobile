<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <h5 class="h5 mb-2 text-gray-800">Nomor Stok : </h5>
    <div class="input-group input-group-sm mb-3">
        <input type="text" class="form-control " placeholder="Cari/Pilih Sales" readonly>
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tanggal : <?= date('d-m-Y'); ?></h6>
            <div class="d-flex justify-content-end mt-n4">
                <a href="">Simpan</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0" style="display: none">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Produk</th>
                            <th>Dos</th>
                            <th>Bks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($produk as $p) : ?>
                            <tr>
                                <input type="hidden" class="id" value="<?= $p['id']; ?>">
                                <input type="hidden" class="banding" value="<?= $p['banding']; ?>">
                                <input type="hidden" class="qty">
                                <td width="150px"><?= $p['alias']; ?></td>
                                <td width="100px"><input type="number" class="form-control form-control-sm"></td>
                                <td width="100px"><input type="number" class="form-control form-control-sm"></td>
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

    });
</script>
<?php $this->load->view('template/foothtml'); ?>



<table>
    <thead>
        <th>#</th>
        <th>Produk</th>
        <th>Awal</th>
        <th>Akhir</th>
        <th>Terjual</th>
        <th>Total</th>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>