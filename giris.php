<?php
$ad = $_POST['ad'];
$mail = $_POST['mail'];
$sifre=$_POST['sifre'];

session_start();
if (isset($_SESSION['ad'])) {
	header("Location=anasayfa.php");
	exit;
}

$connect = mysqli_connect("127.0.0.1","root","","odevdb");

$query = $connect->execute_query(
	"SELECT * FROM kullanicilar WHERE ad = ? and sifre = ? and mail = ?",
	[$ad, $sifre, $mail]
);


if ($query->num_rows) {
	$_SESSION['ad'] = $ad;
	$_SESSION['sifre'] = $sifre;
	$_SESSION['mail'] = $mail;
	echo "Hoşgeldiniz";
	header("Refresh:2; url=anasayfa.php");
}
else{
	if ($ad=="" or $sifre=="" or $mail=="") {
		echo "Boş olamaz";
		header("Refresh:2; url=gir.php");
	}
	else{
		echo "Girdiğiniz bilgiler yanlış";
		header("Refresh:2; url=gir.php");		
	}
}
?>