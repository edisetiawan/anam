<?php
include "inc_db.php"; /*buka koneksi database*/
include "inc_session.php"; /*validasi halaman*/
include "inc_level_student.php"; /*validasi halaman*/

/*simpan data post ke dalam variable*/
$v_get_nim       = (empty($_GET['nim']))?'':$_GET['nim'];

/*query delete data table tb_student*/
$sql = "
   DELETE FROM tb_student WHERE student_nim = '{$v_get_nim}'
";

/*eksekusi query*/
$result = mysql_query($sql);

/*check hasil query dan berikan keterangan*/
if($result == true){
   echo "<h3>Data has been deleted</h3>";
   echo "<a href='student.php'>Back To Student Page</a>";
} else {
   echo "<h3>Failed to delete data</h3>";
   echo "<a href='student.php'>Back To Student Page</a>";
}
?>