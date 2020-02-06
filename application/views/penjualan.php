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
            font-size: 15px;
            font-weight: 300;
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
    <div style="margin-left: 100px;margin-top:30px;">
        <h3>Laporan Penjualan Kanvas</h3>
    </div>
    <table>
        <tr>
            <td>Nomor</td>
            <td>:</td>
            <input type="hidden" name="nomor" id="nomor" value="<?= $nomor['nomor_transaksi']; ?>">
            <td><?= $nomor['nomor_transaksi']; ?></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td><?= date('d F Y', strtotime($nomor['tanggal'])); ?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?= $nomor['nama_sales']; ?></td>
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
            <!-- <tr>
                <td>Potenza Filter 12</td>
                <td align="center">0 / 2</td>
                <td align="center">0 / 200</td>
                <td align="center">56.000</td>
            </tr> -->


        </tbody>
    </table>
    <table width="350px">
        <tr>
            <td align="center" width="175px">Sales</td>
            <td align="center" width="175px">Admin Stok</td>
        </tr>
        <tr>
            <td align="center" width="175px"><?= $nomor['nama_sales']; ?></td>
            <td align="center" width="175px"><?= $nomor['nama_user']; ?></td>
        </tr>
    </table>
    <table width="350">
        <tr>
            <td align="center" width="175px">..........................</td>
            <td align="center" width="175px">...........................</td>
        </tr>
    </table>
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