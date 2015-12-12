<?php
include "inc_db.php"; /*buka koneksi database*/
include "inc_session.php"; /*validasi halaman*/
include "inc_level_student.php"; /*validasi halaman*/

if(!empty($_POST['edit'])){
   /*simpan data post ke dalam variable*/
   $v_hidden_nim  = $_POST['hidden_nim']; /*variable untuk syarat update*/
   $v_new_nim     = $_POST['nim']; /*variable untuk disimpan sebagai nim baru*/
   $v_name        = $_POST['name'];
   $v_phone       = $_POST['phone'];
   $v_address     = htmlentities($_POST['address'], ENT_QUOTES);
   $error         = 0;

   /*nim tidak boleh kosong*/
   if(empty($v_new_nim)){
      $error = 1;
   }

   /*nim harus 10 karakter*/
   if(strlen($v_new_nim) != 10){
      $error = 4;
   }

   /*nama tidak boleh kosong*/
   if(empty($v_name)){
      $error = 2;
   }

   /*jika nim baru tidak sama dengan nim lama, maka lakukan pengecekan nim baru*/
   if($v_new_nim != $v_hidden_nim){

      /*check nim tidak boleh ada yang sama*/
      $sql_check_nim = "
         SELECT student_nim FROM tb_student WHERE student_nim = '{$v_new_nim}'
      ";
      $result_check_nim = mysql_query($sql_check_nim);
      $total_check_nim = mysql_num_rows($result_check_nim);

      if($total_check_nim != 0){
         $error = 3;
      }
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
            $error_msg = "NIM must be 10 characters (".$v_new_nim." = ".strlen($v_new_nim)." character)";
            break;
      }
      echo "<h3>$error_msg</h3>";
      echo "<a href='student_edit.php?nim=$v_hidden_nim'>BACK</a>";
      exit;
   }

   /*query update ke table tb_student*/
   $sql = "
      UPDATE tb_student SET
         student_nim = '{$v_new_nim}', 
         student_name = '{$v_name}', 
         student_phone = '{$v_phone}', 
         student_address = '{$v_address}'
      WHERE
         student_nim = '{$v_hidden_nim}'
   ";

   /*eksekusi query*/
   $result = mysql_query($sql);

   /*check hasil query dan berikan keterangan*/
   if($result == true){
      echo "<h3>Data has been updated</h3>";
      echo "<a href='student.php'>Back To Student Page</a>";
   } else {
      echo "<h3>Failed to update data</h3>";
      echo "<a href='student.php'>Back To Student Page</a>";
   }
}
?>