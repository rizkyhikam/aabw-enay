<html>
<head>
<style type="text/css">
.aturkiri {
    text-align: left;
}
.aturkanan {
    text-align: right;
}
.aturtengah {
    text-align: center;
}
.judul {
    font-style: italic;
    font-size: 20px;
}
</style>
</head>
<body>

<p class="judul">Posting</p>
Periode : <?= date('d F Y', strtotime($tglawal)) . " s/d " . date('d F Y', strtotime($tglakhir)) ?>
<br />
<br />

<table border="0.1px" class="table table-bordered">
    <thead>
        <tr>
            <td class="text-center" rowspan="2" width="45px">Tanggal</td>
            <td class="text-center" rowspan="2" width="25px">Keterangan</td>
            <td class="text-center" rowspan="2" width="200px">Ref</td>
            <td class="text-center" rowspan="2" width="50px">Debit</td>
            <td class="text-center" rowspan="2" width="50px">Kredit</td>
            <td class="text-center" colspan="2" width="50px">Saldo</td>
        </tr>
        <tr>
            <td>Debit</td>
            <td>Kredit</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $dtb = 0;
        ?>
        <?php foreach ($dttransaksi as $key => $value) : ?>
        <?php
        if ($value->debit) {
            $dtb = $dtb + $value->debit;
        } else {
            $dtb = $dtb - $value->kredit;
        }

        $ndbt1 = $dtb >= 0 ? $dtb : 0;
        $ndbt2 = $dtb < 0 ? $dtb : 0;
        ?>

        <tr>
            <td class="text-center" width="45px"><?= $value->tanggal ?></td>
            <td class="aturtengah" width="50px"><?= $value->kode_akun3 ?></td>
            <td class="aturkiri" width="200px"><?= $value->ketjurnal ?></td>
            <td class="aturangka" width="50px"><?= number_format($value->debit, 0, ",", ".") ?></td>
            <td class="aturangka" width="50px"><?= number_format($value->kredit, 0, ",", ".") ?></td>
            <td class="aturangka" width="50px"><?= number_format($ndbt1, 0, ",", ".") ?></td>
            <td class="aturangka" width="50px"><?= number_format(abs($ndbt2), 0, ",", ".") ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
