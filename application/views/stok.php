<!-- Begin Page Content -->
<div class="container-fluid p-1">

    <!-- Page Heading -->


    <h5 class="h6 mb-2 text-gray-800">Nomor Stok : </h5>
    <input type="text" class="form-control form-control-sm my-2" value="<?= date('d-m-Y'); ?>">
    <!-- <div class="input-group input-group-sm mb-3">
        <input type="text" class="form-control " placeholder="Cari/Pilih Sales" readonly>
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
        </div>
</div> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <p class="m-0 font-weight-bold text-primary"><a href="javascripts:;" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-search"></i> Cari /Pilih Sales</a></p>
            <div class="d-flex justify-content-end mt-n4">
                <a class="btn btn-sm btn-warning mb-n2 shadow" href="">Simpan</a>
            </div>
        </div>
        <div class="card-body p-1">
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


<!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLabel">Pilih Satu Sales</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-1">
                <div class="table-responsive">
                    <table class="table table-sm  table-app" width="100%" cellspacing="0">

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
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>




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