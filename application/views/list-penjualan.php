<?php
$no = 1;
$total = 0;
$terjual = 0;
$total = 0;
$subttl = 0;
$banding = 0;
$dos = 0;
$bks = 0;
$res = 0;
$ados = 0;
$abks = 0;
$ares = 0;
$tdos = 0;
$tbks = 0;
$tres = 0;

foreach ($data as $r) : ?>
    <?php


    $terjual = $r['awal'] - $r['akhir'];

    $total = $terjual * $r['harga'];
    $banding = $r['banding'];
    if ($r['awal'] >= $banding) {
        $dos = floor($r['awal'] / $banding);
        $res = $banding * $dos;
        $bks = $r['awal'] - $res;
    } else {
        $dos = 0;
        $bks = $r['awal'];
    }

    if ($r['akhir'] >= $banding) {
        $ados = floor($r['akhir'] / $banding);
        $ares = $banding * $ados;
        $abks = $r['akhir'] - $ares;
    } else {
        $ados = 0;
        $abks = $r['akhir'];
    }
    if ($terjual >= $banding) {
        $tdos = floor($terjual / $banding);
        $tres = $banding * $tdos;
        $tbks = $terjual - $tres;
    } else {
        $tdos = 0;
        $tbks = $terjual;
    }; ?>

    <tr>
        <?php if ($r['awal'] == 0 && $r['akhir'] == 0) {
            echo '
            <td style="display: none">' . $r['alias'] . '</td>
            <td style="display: none">' . $dos . '/' . $bks . '</td>
            <td style="display: none">' . $ados . ' /' . $abks . '</td>
            <td style="display: none">' . $tdos . ' /' . $tbks . '</td>
            <td style="display: none">' . number_format($total, 0, ',', '.') . '</td>
            ';
        } else {
            echo '
            <td>' . $r['alias'] . '</td>
            <td align="center">' . $dos . '/' . $bks . '</td>
            <td align="center">' . $ados . ' /' . $abks . '</td>
            <td align="center">' . $tdos . ' /' . $tbks . '</td>
            <td align="right">' . number_format($total, 0, ',', '.') . '</td>
            ';
        }; ?>
        <!-- <td><?= $r['alias']; ?></td>
        <td align="center"><?= $dos; ?> /<?= $bks; ?></td>
        <td align="center"><?= $ados; ?> /<?= $abks; ?></td>
        <td align="center"><?= $tdos; ?> /<?= $tbks; ?></td>
        <td align="right"><?= number_format($total, 0, ',', '.'); ?></td> -->
    </tr>

    <?php
    $subttl += $total;; ?>


<?php endforeach; ?>


<tr>
    <td colspan="2"></td>
    <td colspan="2"> Total Penjualan :</td>
    <td align="right">
        <h3><b><?= number_format($subttl, 0, ',', '.'); ?></b></h3>
    </td>
</tr>