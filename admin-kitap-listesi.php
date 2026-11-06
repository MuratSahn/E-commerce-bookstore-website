<?php
session_start();
if($_SESSION['ad'] != "admin"){
    header("Refresh:0; url=index.php");
}
else{
	$con = mysqli_connect("localhost","root","","odevdb");
	mysqli_set_charset($con,"utf8");
	$query = mysqli_query($con, "SELECT * FROM resimler");
	$sayac = 0;

	echo '
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Kitaplar</title>
			<style>
				table{
					background: aqua;
				}
			</style>
		</head>
		<body>
		<table align="center" border="1" bgcolor="blue" width="600">
			<tr align="center">
				<td>Sıra No</td><td>Kitap No</td><td>Kitap Yolu</td><td>Tür</td><td>Açıklama</td><td>Fiyat</td>
			</tr>
			';
			
	while ($satir = mysqli_fetch_row($query)) {
		$sayac+=1;
		echo "<tr>
			<td>".$sayac."</td>
			<td>".htmlspecialchars((string)$satir[0])."</td>
			<td>".htmlspecialchars((string)$satir[1])."</td>
			<td>".htmlspecialchars((string)$satir[2])."</td>
			<td>".htmlspecialchars((string)$satir[4])."</td>
			<td>".htmlspecialchars((string)$satir[5])."</td>
		</tr>";
	}
	mysqli_close($con);
		echo'
		</table>
		</body>
		</html>
	';
}

?>

