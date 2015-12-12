<div style="width:80%;margin-left:auto;margin-right:auto;">
<?php
	include "inc_db.php"; /*buka koneksi database*/
	include "inc_session.php"; /*validasi halaman*/
	include "inc_level_student.php"; /*validasi halaman*/

	$keyword = (empty($_POST['keyword'])) ? '' : $_POST['keyword'];
	$address = (empty($_POST['address'])) ? '' : $_POST['address'];

	// tentukan default atau batas data yang akan dimunculkan
	$limit = 4;

	// cek apakah halaman kosong atau tidak
	$page= (empty($_GET['page'])) ? 0 : $_GET['page'];
	if(empty($page)){
	   $start = 0;
	   $page = 1;
	} else {
		// jika halaman tidak kosong maka tentukan nilai posisi page
		// contoh : jika di page 2, maka (2-1) * 4
	   $start = ($page-1) * $limit;
	}

	// tampilkan data dengan start dan limit halaman
	$sql = "
		SELECT
			SQL_CALC_FOUND_ROWS
		  	student_id,
		  	student_nim,
		  	student_name,
		  	student_address,
		  	student_phone
		FROM tb_student
		WHERE 
			(student_name LIKE '%{$keyword}%' OR student_nim = '{$keyword}')  AND 
			student_address LIKE '%{$address}%'
		LIMIT {$start}, {$limit}
	";

	$result = mysql_query($sql);
	$total_row = mysql_num_rows($result); /*mencari total data*/

	// tampilkan total keseluruhan jumlah data
	$sql_count = "
		SELECT FOUND_ROWS() AS total
	";
	$result_count = mysql_query($sql_count);
	$data_page = mysql_fetch_array($result_count);
	$total_page = $data_page['total'];

	// cari jumlah halaman 
	$page_count = ceil($total_page/$limit);
?>
<h2>STUDENT PAGE</h2>
<h3>SEARCH</h3>
<form action="student.php" method="POST">
	<p>
		NIM / NAME : <br/>
		<input type="text" name="keyword" value="<?php echo $keyword?>">
	</p>
	<p>
		ALAMAT : <br/>
		<input type="text" name="address" value="<?php echo $address?>">
	</p>
	<p>
		<button type="submit" name="btnsearch" value="search">Search</button>
		<a href="student.php"><button type="button">Reset</button></a>
	</p>
</form>

<!-- baris ini untuk panel back dan add -->
<div style="text-align:right">
	<a href="admin_area.php"><button>BACK</button></a> <a href="student_add.php"><button>ADD</button></a>
</div>

	<table border="1px" width="100%">
		<tr>
			<th width="">NOMOR</th>
			<th>ACTION</th>
			<th width="20%">NIM</th>
			<th width="20%">NAME</th>
			<th width="20%">ADDRESS</th>
			<th width="17%">PHONE</th>
		</tr>
	<?php
		if($total_row == 0){ /*check jika total data kosong*/
	?>
		<tr>
			<th colspan="6" style="text-align:center">-- Data Tidak Ditemukan --</th>
		</tr>
	<?php
		} else {
			/*jika data tidak kosong, tampilkan data 
			dalam perulangan while*/
			$no = $start + 1;
			while ($data = mysql_fetch_array($result)){
	?>
		<tr>
			<td style="text-align:center"><?php echo $no ?></td>
			<td>
				<a href="student_edit.php?nim=<?php echo $data['student_nim']?>"><button>EDIT</button></a> 
				<a href="student_delete.php?nim=<?php echo $data['student_nim']?>"><button>DELETE</button></a>
			</td>
			<td><?php echo $data['student_nim']?></td>
			<td><?php echo $data['student_name']?></td>
			<td><?php echo $data['student_address']?></td>
			<td><?php echo $data['student_phone']?></td>
		</tr>
	<?php
				$no++;
			} /* end of while*/
		} /* end of if*/
	?>
	</table>
	<br/>
	<h4>VERSI 1</h4>
	Page : 
	<?php
		for($i=1;$i<=$page_count;$i++){
			if($i != $page){
				echo "<a href='?page={$i}'>{$i}</a> | ";
		   } else {
				echo "<b>{$i}</b> | ";
		   }
		}
		
		echo "<br/>Total Record : <b>{$total_page}</b>";
	?>
	<h4>VERSI 2</h4>
	Data : 
	<?php
		if($page > 1){
			echo "<a href='?page=".($page-1)."'>Prev</a> | ";
		} else {
			echo "Prev | ";
		}

		$begin = ($total_page != 0) ? $start + 1 : $start;
		$end = (($start + $limit) < $total_page) ? $start + $limit : $total_page;

		echo "<b>".($begin)." - ".($end)."</b> dari <b>{$total_page}</b> data";

		if($page < $page_count){
			echo " | <a href='?page=".($page+1)."	'>Next</a> ";
		} else {
			echo " | Next";
		}
	?>
</div>