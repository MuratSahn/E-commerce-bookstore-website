<?php

session_start();
if ($_SESSION['ad'] != "admin") {
	header("Refresh:0; url=anasayfa.php");
}

else{
	if (empty($_POST['sil'])){
		echo "Boş olamaz";
	}
	else{
		$conn = mysqli_connect("localhost","root","","odevdb");
		$kont = $conn->execute_query(
			"SELECT 1 FROM resimler where id=? LIMIT 1",
			[$_POST['sil']]
		);

		if($kont->num_rows == 0){
			echo "Bu ID numarasına sahip bir kitap yok";
		}

		else{
			$query = $conn->execute_query(
				"DELETE FROM resimler WHERE id=?",
				[$_POST['sil']]
			);

			if ($query) {
				echo "Başarılı";
			}
			else {
				echo "Başarısız";
			}
		}
		
	}
}


?>