<?php
session_start();
if (@$_SESSION) {
	header("Refresh:0; url=anasayfa.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ödev</title>
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--Phone-->
	<link rel="stylesheet" type="text/css" media="(max-width: 700px)" href="css/phone.css">
	<style type="text/css">
		@media(max-width: 800px){
			#kitap-k{
				flex-direction: column;
				height: auto;
			}
			#kitap-k .kitap-kitap{
				width: 40%;
			}
		}
	</style>
</head>
<body>

<!--Navbar-->

<header>
	<div class="container">
		<nav id="navbar">
			<h1 class="heading-small">LOGO</h1>
			<ul>
				<li><a href="index.php">Ana Sayfa</a></li>
				<li><a href="gir.php">Giriş</a></li>
				<li><a href="kayit.php">Kayıt Ol</a></li>					
			</ul>
		</nav>
	</div>

</header>

<!--Son 5 kitap-->

<section id="kitap">
	<h1 class="text-center heading-big"> Son Eklenen Kitaplar</h1>
	<div id="kitap-k">
		<?php
			$baglanti=mysqli_connect("localhost","root","","odevdb");
			$sorgu=mysqli_query($baglanti,"SELECT * FROM resimler ORDER BY resim_ad asc limit 5");
			mysqli_set_charset($baglanti, "utf8");
			$row = mysqli_fetch_row($sorgu);
			if ($row = mysqli_fetch_row($sorgu)) {
				foreach ($sorgu as $row) {
					echo "<div class='kitap-kitap'><img src='$row[resim_ad]'><div class='aciklama'><p>$row[aciklama]</p></div><div class='fiyat'><p>Fiyat:</p><p>$row[fiyat]</p><p>TL</p></div></div>";
				}
			}
			else {
				echo "Resim yok";
			}
			mysqli_close($baglanti);
		?>
	</div>
</section>

<!--Footer-->
	<div class="footer">
		<div class="footer_container">
			<div id="kutu">
				<b>Sayfalar</b>
				<ul>
					<li><a href="index.php">Ana Sayfa</a></li>
					<li><a href="gir.php">Giriş</a></li>
					<li><a href="kayit.php">Kayıt Ol</a></li>
				</ul>
			</div>
			<div id="kutu" style="margin-left:110px;">
				<b>Ortaklarımız</b>
				<ul>
					<li>Ortaklarımız</li>
					<li>Ortaklarımız</li>
					<li>Ortaklarımız</li>
				</ul>
			</div>
			<div id="kutu" style="margin-left:110px">
				<b>Sosyal Medya</b>
				<ul>
					<li><img src="img/instagram.png" width="30px" alt=""></li>
					<li><img src="img/twitter.png" width="30px" alt=""></li>
					<li><img src="img/facebook.png" width="30px" alt=""></li>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>