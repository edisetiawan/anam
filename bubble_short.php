<h3>
BUBBLE SHORT (ASC)
</h3>

<form action="" method="POST">
	<p>
		Input your number:
		<input type="text" name="angka" value=""> <button type="submit" name="button" value="kirim">Urutkan</button>
	</p>
</form>

<?php
	function bubbleSort(array $arr) {
	    $sorted = false;
	    while (false === $sorted) {
	        $sorted = true;
	        for ($i = 0; $i < count($arr)-1; ++$i) {
	            $current = $arr[$i];
	            $next = $arr[$i+1];
	            if ($next < $current) {
	                $arr[$i] = $next;
	                $arr[$i+1] = $current;
	                $sorted = false;
	            }
	        }
	    }
	    return $arr;
	}	

	if(!empty($_POST['button'])){
		$arr = explode(',', $_POST['angka']);
		$sortedArr = bubbleSort($arr);

		echo '<p>Input result : '. $_POST['angka'].'</p>';
		echo '<p>Output result : '.implode(',',$sortedArr).'</p>';
	}
?>