<!DOCTYPE html>
<html>
<head>
	<title>
		Yayasan Diannanda
	</title>
  <link rel="icon" href="<?= base_url('assets/img/xto.ico'); ?>">



	<style media="print">
 @page {
  size: auto;
  margin: 0;
       }
</style>
	<title></title>
</head>
<body style="font-size:9pt;">

<div class="table-responsive">
        <table class="table table-striped dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th width="30">No.</th>
                    <th>Tgl Input</th>
                    <th>Nama Perkiraan</th>
                    <th>Bagian</th>
                    <th>Nama Realisasi</th>
                    <th>Saldo Awal</th>
                    <th>Total Saldo</th>
                    <th>Biaya Realisasi</th>
                    <th>Sisa Saldo</th>
                    <th>No Coa</th>
                    <th>No Sub Coa 1</th>
                    <th>No Sub Coa 2</th>
                    <!-- <th>Aksi</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($dataprint) :
                    foreach ($dataprint as $dataprintt) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= date('d-m-Y', strtotime($dataprintt->TGL_INPUT)); ?></td>
                            <td><?= $dataprintt->NAMA_PERKIRAAN ?></td>
                            <td><?= $dataprintt->BAGIAN ?></td>
                            <td><?= $dataprintt->NAMA_REALISASI ?></td>
                            <td>Rp. <?= number_format($dataprintt->SALDO_AWAL,0,',','.'); ?></td>
                            <td>Rp. <?= number_format($dataprintt->TOTAL_SALDO,0,',','.'); ?></td>

                            <td>Rp. <?= number_format($dataprintt->BIAYA_REALISASI,0,',','.'); ?></td>
                            <td>Rp. <?= number_format($dataprintt->SISA_SALDO,0,',','.'); ?></td>
                            <td><?= $dataprintt->NO_COA ?></td>
                            <td><?= $dataprintt->NO_SUB_COA_1 ?></td>
                            <td><?= $dataprintt->NO_SUB_COA_2 ?></td>
                           
                             
                        </tr>
                    <?php endforeach;
                    else : ?>
                    <tr>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
	

</body>
</html>
<script>
var dt = new Date();
document.getElementById("tanggalwaktu").innerHTML = dt.toLocaleDateString();
</script>

<!-- <p>Waktu: <span id="tanggawaktu"></span></p>
 --><script>
var dt = new Date();
document.getElementById("tanggawaktu").innerHTML = dt.toLocaleTimeString();
</script>


<!-- 
	<script type="text/javascript">
		window.print();
        
	</script> -->