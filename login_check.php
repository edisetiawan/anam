<?php
// Aambil file koneksi dengan perintah include
include "inc_db.php";

//ambil nilai yang dikirimkan dari login.php
$var_username = mysql_escape_string($_POST['username']);

//enkripsi password dengan md5
$var_password = md5($_POST['password']); 

//query untuk mengambil data user dari table tb_admin
$sql = "
	SELECT
	  	admin_id,
	  	admin_name,
	  	admin_username,
	  	admin_password,
	  	admin_level
	FROM 
		tb_admin
	WHERE 
		admin_username = '{$var_username}' 
		AND admin_password = '{$var_password}'
";

//eksekusi query
$result = mysql_query($sql);

//tampilkan total data dari hasil eksekusi query
$total_row = mysql_num_rows($result);// or die('Query ada yang error');

//jika tidak ada data dari query lempar ke halaman login
if($total_row == 0){
	header("location:login.php?sapi=failed");
} else {
	session_start();
	//tampilkan data dari hasil query
	$data = mysql_fetch_array($result);

	//ambil data dari field admin_id, admin_name, admin_level
	//kemudian simpan kedalam variable session
	$_SESSION['idnya'] = $data['admin_id']; 
	$_SESSION['tiketku'] = $data['admin_name'];
	$_SESSION['aksesnya'] = $data['admin_level'];	
	header("location:admin_area.php");
}
?>