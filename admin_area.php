<div style="width:80%;margin-left:auto;margin-right:auto;">
<?php
	include "inc_session.php";
?>
	<h2>Admin Area<h2>
	<h3>Selamat datang <?php echo $_SESSION['tiketku'];?>, kamu login sebagai <?php echo $_SESSION['aksesnya']?></h3>	
	<p>
<?php
	switch ($_SESSION['aksesnya']) {
		case 'student':
			echo "
				<a href='student.php'>Mahasiswa</a> | 
				<a href='#'>Nilai</a> | 
			";
			break;
		case 'lecturer':
			echo "
				<a href='lecturer'>Lecturer</a> | 
				<a href='#'>Nilai</a> | 
				<a href='#'>Jadwal</a> |
			";
			break;
		case 'chairman':
			echo "
				<a href='#'>Mahasiswa</a> | 
				<a href='#'>Dosen</a> | 
				<a href='#'>Jadwal</a> | 
				<a href='#'>Matakuliah</a> |
			";
			break;
		default:
			echo "Username kamu ngga punya akses mas bro!!!";
			break;
	}
?>
	<a href='logout.php'>Logout</a>
	</p>
</div>