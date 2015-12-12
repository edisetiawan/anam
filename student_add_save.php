<?php
include "inc_db.php"; /*buka koneksi database*/
include "inc_session.php"; /*validasi halaman*/
include "inc_level_student.php"; /*validasi halaman*/

if(!empty($_POST['add'])){
   /*simpan data post ke dalam variable*/
   $v_nim      = $_POST['nim'];
   $v_name     = $_POST['name'];
   $v_phone    = $_POST['phone'];
   $v_address  = $_POST['address'];
   $error      = 0;

   /*nim tidak boleh kosong*/
   if(empty($v_nim)){
      $error = 1;
   }

   /*nim harus 10 karakter*/
   if(strlen($v_nim) != 10){
      $error = 4;
   }

   /*nama tidak boleh kosong*/
   if(empty($v_name)){
      $error = 2;
   }

   /*check nim tidak boleh ada yang sama*/
   $sql_check_nim = "
      SELECT student_nim FROM tb_student WHERE student_nim = '{$v_nim}'
   ";

   $result_check_nim = mysql_query($sql_check_nim);
   $total_check_nim = mysql_num_rows($result_check_nim);

   if($total_check_nim != 0){
      $error = 3;
   }

   if($error != 0){
      switch ($error) {
         case 1:
            $error_msg = "NIM cant't be empty";
            break;
         case 2:
            $error_msg = "NAME cant't be empty";
            break;
         case 3:
            $error_msg = "NIM already exist";
            break;
         case 4:
            $error_msg = "NIM must be 10 characters (".$v_nim." = ".strlen($v_nim)." character)";
            break;
      }
      echo "<h3>$error_msg</h3>";
      echo "<a href='student_add.php'>BACK</a>";
      exit;
   }

   /*query insert ke table tb_student*/
   $sql = "
      INSERT INTO tb_student
         (student_nim, student_name, student_phone, student_address)
      VALUES
         ('{$v_nim}', '{$v_name}', '{$v_phone}', '{$v_address}')
   ";

   /*eksekusi query*/
   $result = mysql_query($sql);

   /*check hasil query dan berikan keterangan*/
   if($result == true){
      echo "<h3>Data has been saved</h3>";
      echo "<a href='student.php'>Back To Student Page</a> | <a href='student_add.php'>Add More</a>";
   } else {
      echo "<h3>Failed to save data</h3>";
      echo "<a href='student.php'>Back To Student Page</a> | <a href='student_add.php'>Add More</a>";
   }
}
?>