<?php 
	$arrData = array(
		array('tahun'=>1980, 'jumlah' => '5000'),
		array('tahun'=>1981, 'jumlah' => '4000'),
		array('tahun'=>1982, 'jumlah' => '700'),
		array('tahun'=>1983, 'jumlah' => '2000'),
		array('tahun'=>1984, 'jumlah' => '3500'),
		array('tahun'=>1985, 'jumlah' => '1250')
	);
?>
<div style="width:80%;margin-left:auto;margin-right:auto;">
<h2>Data Penduduk</h2>
<h3>Data Tabel</h3>
<table border="1px" cellpadding="0px" cellspacing="0px">
	<tr>
		<th style="width:50px">No<th>
		<th style="width:100px">Tahun<th>
		<th style="width:100px">Jumlah<th>
		<th>Panjang Grafik (n*15/100) (px)<th>
	</tr>
<?php
	if(empty($arrData)){
?>
<tr>
	<td colsplan="4"><em> -- Data Tidak Ditemukan -- </em><td>
</tr>
<?php
	} else {
		// tampilkan dalam bentuk table	
		$no = 0;
		foreach ($arrData as $key => $value) {
			$no++;
?>
	<tr>
		<td><?php echo $no;?><td>
		<td><?php echo $value['tahun'];?><td>
		<td><?php echo $value['jumlah']?><td>
		<td><?php echo $value['jumlah']*15/100?><td>
	</tr>
<?php				
		}
	}
?>
</table>
<p>
	<a href="print_excell.php" target="_blank">
		<button>Cetak Xlsx</button>
	</a>
</p>

<h3>Data Grafik</h3>
<?php
	if(!empty($arrData)){
		foreach ($arrData as $key => $value) {
			$panjang = $value['jumlah']*13/100;
			$jumlah[] = $value['jumlah'];
			echo "<div style='float:left;margin-right:10px;'>".$value['tahun']."</div>";
			echo "<div style='float:left;height:15px;width:".$panjang.";background-color:green;'></div> ".$value['jumlah']."<br/><br/>";
		}
		echo "<hr/>";
		echo "<div style='float:left;margin-right:10px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>";
		$maxnilai = max($jumlah)*13/100;
		$panjang = $maxnilai/4;
		for ($i=0; $i <= 4 ; $i++) { 
			$p = (1250*$i);
			echo "<div style='float:left;width:".$panjang.";'>|".$p."</div>";
		}
	}
?>
</div>