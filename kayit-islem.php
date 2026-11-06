<?php
if ($_POST) {
	session_start();

	$ad=$_POST['ad'];
	$mail=$_POST['mail'];
	$sifre=$_POST['sifre'];

	if ($ad =="" or $mail =="" or $sifre=="" or $_POST['dtarih']=="" or $_POST['soyad']=="") {
		echo "Boş olamaz";
		header("Refresh:1; url=kayit.php");
	}

	else {
		$connect = mysqli_connect("127.0.0.1","root","","odevdb");
		$kontrol = $connect->execute_query(
			"SELECT 1 FROM kullanicilar WHERE ad=? OR mail=? LIMIT 1",
			[$ad, $mail]
		);

		if ($kontrol->num_rows==1) {
			echo "Bilgiler daha önce alınmış";
			header("Refresh:2; url=kayit.php");
			exit;
		}
		else {
			$query = $connect->execute_query(
				"INSERT INTO kullanicilar (ad,soyad,mail,dtarih,sifre) VALUES(?, ?, ?, ?, ?)",
				[$ad, $_POST['soyad'], $mail, $_POST['dtarih'], $sifre]
			);

			if ($query) {
				$_SESSION['ad'] = $ad;
				$_SESSION['mail'] = $mail;
				echo "Başarılı";
				header("Refresh:2; url=anasayfa.php");
			}

			else {
				echo "Başarısız";
			}
		}		
	}	
}

else {
	header("Refresh:0; url=index.php");
}

?>