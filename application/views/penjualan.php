<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="<?= base_url('assets/css/print.css'); ?>">
    <title>Hello, world!</title>

    <style>
        body {
            font-family: 'Open Sans Condensed', sans-serif;
            font-size: 16px;
            font-weight: 100;
            margin: 20;
        }

        thead tr th {
            border-bottom: 1px solid #000;
            border-top: 1px solid #000;
            border-collapse: separate;
            border-spacing: 5px 5px;
            font-weight: 500;
        }

        h3 {

            font-weight: 300;
        }
    </style>

    <script>
        const base_url = '<?= base_url(); ?>';
    </script>
</head>

<body>
    <?php
    date_default_timezone_set('Asia/Makassar');; ?>
    <div style="margin-left: 100px;margin-top:30px;">
        <h3>Laporan Penjualan Kanvas</h3>
    </div>
    <table>
        <tr>
            <td style="padding:0px;">Nomor</td>
            <td style="padding:0px;">:</td>
            <input type="hidden" name="nomor" id="nomor" value="<?= $nomor['nomor_transaksi']; ?>">
            <td style="padding:0px;"><?= $nomor['nomor_transaksi']; ?></td>
        </tr>
        <tr>
            <td style="padding:0px;">Tanggal</td>
            <td style="padding:0px;">:</td>
            <td style="padding:0px;"><?= date('d F Y H:i:s', $nomor['date_created']); ?></td>
        </tr>
        <tr>
            <td style="padding:0px;">Nama</td>
            <td style="padding:0px;">:</td>
            <td style="padding:0px;"><?= $nomor['nama_sales']; ?></td>

        </tr>
        <tr>
            <td style="padding:0px;">Area</td>
            <td style="padding:0px;">:</td>
            <td style="padding:0px;"><?= $nomor['nama_area']; ?></td>
        </tr>
    </table>

    <table width="350px">
        <thead>
            <th width="90px">Produk</th>
            <th width="50px">Awal</th>
            <th width="50px">Akhir</th>
            <th width="50px">Terjual</th>
            <th>Total</th>
        </thead>

        <tbody id="tampil">



        </tbody>
    </table>

    Admin <?= $nomor['status_penjualan']; ?> : <?= $nomor['nama_user']; ?>, <?= date('d F Y H:i:s', $nomor['date_update']); ?> , Status : <?= $nomor['status_penjualan']; ?> <br>
    <small style="margin-left: 10px;">- App by Budi Harto -</small>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>

    <script>
        $(document).ready(function() {

            tampil_penjualan();

        });

        function tampil_penjualan() {
            const nomor = $('#nomor').val();
            $.ajax({
                type: 'get',
                url: base_url + 'stok/tampil_penjualan',
                data: {
                    nomor: nomor
                },
                success: function(html) {
                    $('#tampil').html(html);
                    window.print();
                }
            });
        }
    </script>
</body>

</html>