<div style="width:80%;margin-left:auto;margin-right:auto;">
<?php
	include "inc_db.php"; /* koneksi ke database */
	include "inc_session.php";

   // request query string dari halaman student.php
   $v_get_nim = (empty($_GET['nim']))?'':$_GET['nim'];

   //query untuk menampilkan data yang akan di edit dengan syarat $v_get_nim
   $sql_edit = "
      SELECT
         student_nim,
         student_name,
         student_address,
         student_phone
      FROM tb_student
      WHERE student_nim = '{$v_get_nim}'
   ";

   // eksekusi query
   $result_edit = mysql_query($sql_edit);

   // simpan hasil query pada $data_edit untuk di tampilkan
   $data_edit = mysql_fetch_array($result_edit);
?>
<h2>STUDENT PAGE | EDIT</h2>
<div style="text-align:right">
	<a href="student.php">BACK</a>
</div>

<form action="student_edit_save.php" method="post">
<p>
   NIM :<br/>
   <input type="text" name="nim" value="<?php echo $data_edit['student_nim']?>">
</p>

<p>
   NAME : <br/>
   <input type="text" name="name" value="<?php echo $data_edit['student_name']?>"><br/>
</p>

<p>
   PHONE : <br/>
   <input type="text" name="phone" value="<?php echo $data_edit['student_phone']?>"><br/>
</p>

<p>
   ADDRESS : <br/>
   <textarea name="address" cols="40px" rows="10px"><?php echo $data_edit['student_address']?></textarea>
   <br/>
</p>
   <input type="hidden" name="hidden_nim" value="<?php echo $data_edit['student_nim']?>">
   <button type="submit" name="edit" value="edit">Edit</button>
</form> 
</div>