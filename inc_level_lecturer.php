<?php
	if($_SESSION['aksesnya'] != 'lecturer'){
		echo "<h3>You can't access this page!!!</h3>";
		echo "<a href='admin_area.php'>Back</a>";
		exit;
	}
?>