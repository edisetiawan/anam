<div style="width:80%;margin-left:auto;margin-right:auto;">
<h2>Login Area</h2>
<?php
	$inisapiku = (empty($_GET['sapi']))?'':$_GET['sapi'];

	// jika parameter sapi bernilai kosong
	switch ($inisapiku) {
		case '':
			echo "<h3>Mari masuk gan...!!!</h3>";
			break;
		case 'failed':
			echo "<h3>Coba lagi gan..!!!</h3>";
			break;
		default:
			echo "<h3>Gan, harus login dulu..!!!</h3>";
			break;
	}
?>
<form action="login_check.php" method="post">
<p>
   Username<br/>
   <input type="text" name="username" value=""><br/>
</p>

	<p>
	   Password<br/>
	   <input type="password" name="password" value=""><br/>
	</p>
   <input type="submit" value="Login" name="login">
</form> 
</div>