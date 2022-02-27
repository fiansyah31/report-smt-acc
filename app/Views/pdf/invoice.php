<p style="font-size:18pt;text-align:right">Laporan</p>
<table cellpadding="0" >
    <tr>
        <th>ID Karyawan</th>
        <th>: <strong><?= $details['idkaryawan'];?></strong></th>
    </tr>
    <tr>
        <th>Nama</th>
        <th>: <strong><?= $details['nama'];?></strong></th>
    </tr>
    <tr>
        <th>Tanggal</th>
        <th>: <strong><?= $details['tanggal'];?></strong></th>
    </tr>
</table>
<p></p>
<table id="tb-item" cellpadding="4" >
    <tr style="background-color:#a9a9a9">
        <th  >Mesin</th>
        <th  >Result</th>
        <th  >Judgement</th>
    </tr>
    <?php foreach($keterangan as $k) : ?>
    <tr>
        <td ><?= $k['nama_mesin']; ?></td>
        <td ><?= $k['result']; ?></td>
        <td><?= $k['judgement']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<p>&nbsp;</p>
<table cellpadding="4" >
    <tr>
        <td width="50%" style="height: 20px;text-align:center">
            <p>&nbsp;</p>
        </td>
        <td width="50%" style="height: 20px;text-align:center">
            <p>Malang, 28 Sept 2021</p>
            <p>Hormat kami,</p>
            <p></p>
            <p></p>
            <p></p>
            <p>Admin</p>
        </td>
    </tr>
</table>