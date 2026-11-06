<?php
session_start();
if (@$_SESSION['ad']=="admin") {
	@$ad=$_POST['ad'];
	@$sifre = $_POST['sifre'];
	@$mail = $_POST['mail'];

	if ($ad =="" or $mail =="" or $sifre=="" or $_POST['dtarih']=="" or $_POST['soyad']=="") {
		echo "Boş olamaz";
		header("Refresh:1; url=admin-kayit-ekle.php");
	}

	else {
		$connect = mysqli_connect("localhost","root","","odevdb");
		$select = $connect->execute_query(
			"SELECT 1 FROM kullanicilar WHERE ad = ? and mail = ? LIMIT 1",
			[$ad, $mail]
		);

		if($select->num_rows == 1){
			echo "Zaten var";
			header("Refresh:2; url=admin-kayit-ekle.php");
		}

		else {
			$insert = $connect->execute_query(
				"INSERT INTO kullanicilar (ad,soyad,mail,dtarih,sifre) VALUES(?, ?, ?, ?, ?)",
				[$ad, $_POST['soyad'], $mail, $_POST['dtarih'], $sifre]
			);


			if ($insert) {
				echo "Başarılı";
				header("Refresh:1; url=admin.php");
			}
			else {
				header("Refresh:2; url=admin-kayit-ekle.php");
			}
		}	
	}
}

else {
	header("Refresh:0; url=index.php");
}

?>