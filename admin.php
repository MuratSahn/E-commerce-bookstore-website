<?php
session_start();
if (@$_SESSION['ad']=="admin") {
	echo "
<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<title>Admin</title>
	<style type='text/css'>
		.tablo{
			width: 700px;
			height: 200px;
			border: 1px solid black;
			margin: 0 auto;
		}
		.tablo td {
			background: aqua;
			font-size: 12px;
		}
	</style>
</head>
<body>
<table class='tablo'>
	<tr><td colspan='2' align='center' height='25'>
		<h2>Admin Sistemi</h2>
	</td></tr>

	<tr><td width='100' valign='top'>
		<a href='anasayfa.php'>Anasayfa</a><br>
		<a href='uye.php'>Üyeler</a><br>
		<a href='admin-kayit-ekle.php'>Yeni Kayıt</a><br>
		<a href='sil.php'>Üye Sil</a><br>
		<a href='admin-kitap-listesi.php'>Kitaplar</a><br>
		<a href='resim-yukle.php'>Kitap Ekle</a><br>
		<a href='kitapsil.php'>Kitap Sil</a><br>
	</td>
		<td width='600' valign='top' align='center'>
			<h2>Üye ve kitap işlemleri</h2>
		</td>

	</tr>

</table>
</body>
</html>

	";
}

else {
	echo "";
	header("Refresh:0; url=anasayfa.php");
}
?>

