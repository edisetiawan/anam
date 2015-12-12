<div style="width:80%;margin-left:auto;margin-right:auto;">
<?php
	include "inc_db.php";
	include "inc_session.php";
?>
<h2>STUDENT PAGE | ADD</h2>
<?php
	// $get_message = empty($_GET['sapi'])?'':$_GET['sapi'];
	// if($get_message == 'nimEmpty') {
	// 	echo "<h3>NIM and NAME can't be empty</h3>";
	// } elseif($get_message == 'nimExist') {
 //      echo "<h3>NIM already exist</h3>";
 //   }
?>
<div style="text-align:right">
	<a href="student.php">BACK</a>
</div>

<form action="student_add_save.php" method="post">
<p>
   NIM :<br/>
   <input type="text" name="nim" value=""><br/>
</p>

<p>
   NAME : <br/>
   <input type="text" name="name" value=""><br/>
</p>

<p>
   PHONE : <br/>
   <input type="text" name="phone" value=""><br/>
</p>

<p>
   ADDRESS : <br/>
   <textarea name="address" cols="40px" rows="10px"></textarea>
   <br/>
</p>

   <button type="submit" name="add" value="add">Add</button>
</form> 
</div>