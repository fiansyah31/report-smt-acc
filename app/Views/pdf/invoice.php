<style>
    table { 
	width: 100%; 
	border-collapse: collapse; 
	margin:50px auto;
	}

/* Zebra striping */
tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #3498db; 
	color: white; 
	font-weight: bold; 
	}

td, th { 
	padding: 20px; 
	border: 1px solid #ccc; 
	text-align: left; 
}
.container {
    padding: 20px;
    width: 100%;
}
.head {
    border:  none;
}
/* 
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/

</style>
    <h2 style="font-size:18pt;text-align:center">Weekly Inspection Report</h2>    
    <p style="font-size:12pt;text-align:center">Anode Changing Crane</p>
    <table cellpadding="4">
        <thead>
            <tr>
                <th  style="width:100px" class="head">
                    ID Karyawan
                </th>
                <th  style="width:100px" class="head">: <?= $details['idkaryawan'];?></th>
            </tr>
            <tr>
                <th  style="width:100px" class="head">
                   Nama
                </th>
                <th  style="width:100px" class="head">: <?= $details['nama'];?></th>
            </tr>
            <tr>
                <th  style="width:100px" class="head">
                   ACC
                </th>
                <th  style="width:100px" class="head">: <?= $details['acc'];?></th>
            </tr>
            <tr>
                <th  style="width:100px" class="head">
                   Tanggal
                </th>
                <th  style="width:100px" class="head">: <?= $details['tanggal'];?></th>
            </tr>
            <tr>
                <th  style="width:100px" class="head">
                   Jam mulai
                </th>
                <th  style="width:100px" class="head">: <?= $details['jam_mulai'];?></th>
            </tr>
            <tr>
                <th  style="width:100px" class="head">
                   Jam selesai
                </th>
                <th  style="width:100px" class="head">: <?= $details['jam_selesai'];?></th>
            </tr>
        </thead>
    </table>
    <div class="spaser"></div>
    <table cellpadding="10">
      <thead>
        <tr>
          <th><b>  Nama Mesin</b></th>
          <th><b>  Temuan Tambahan</b></th>
          <th><b>  Result</b></th>
          <th><b>  judgement</b></th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($keterangan as $k) : ?>
        <tr>
          <td data-column="Nama Mesin"><?= $k['nama_mesin']; ?></td>
          <td data-column="Nama Mesin"><?= $k['temuan']; ?></td>
          <td data-column="Result"><?= $k['result']; ?></td>
          <td data-column="Judgement"><?= $k['judgement']; ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    
    <p>&nbsp;</p>
    <table>
    <tr>
            <td style="text-align:center;border:none;">
            <p>Kuala Tanjung ,<?= date('d-M-Y')?></p>
            </td>
        </tr>
    </table>
    <table cellpadding="4" >
      
        <tr>
            <td style="text-align:center;border:none;">
               
                <p>Diketahui</p>
                <p></p>
                <p></p>
                <p></p>
                <p>PIC</p>
            </td>
            <td style="text-align:center;border:none;">
               
                <p>Diketahui</p>
                <p></p>
                <p></p>
                <p></p>
                <p>Staff</p>
            </td>
            <td style="text-align:center;border:none;">
               
                <p>Diketahui</p>
                <p></p>
                <p></p>
                <p></p>
                <p>Manager</p>
            </td>
           
        </tr>
    </table>
