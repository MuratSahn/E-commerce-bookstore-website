<?php
session_start();
if (!$_SESSION) {
	session_destroy();
	header("Refresh:0; url=index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Çocuk Kitapları</title>
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--Phone-->
	<link rel="stylesheet" type="text/css" media="(max-width: 700px)" href="css/phone.css">
	<style type="text/css">
		#kitap #kitap-k{
			height: auto;

		}
		#kitap #kitap-k .kitap-kitap {
			margin: 2rem;
		}

		@media(max-width: 1000px){
			#kitap{
				margin-top: 15%;
				margin-bottom: 5%;
			}
			#kitap-k{
				width: 80%;
				margin-left: auto;
				margin-right: auto;
				flex-direction: column;
				height: auto;
				border: 1px solid black;
			}
			#kitap-k .kitap-kitap{
				width: 40%;
			}
			.kategori{
				width: 100%;
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
				<li><a href="anasayfa.php">Ana Sayfa</a></li>
				<li><a href="cikis.php">Çıkış Yap</a></li>					
			</ul>
		</nav>
	</div>
</header>

<!--Çocuk-->

<section id="kitap">
	<h1 class="text-center heading-big">Çocuk Kitapları</h1>
	<div id="kitap-k">
		<?php
			$baglanti=mysqli_connect("localhost","root","","odevdb");
			$sonuc=mysqli_query($baglanti,"SELECT * FROM resimler WHERE resim_turu = 'çocuk'");
			mysqli_set_charset($baglanti, "utf8");
			$row = mysqli_fetch_row($sonuc);
			if ($row = mysqli_fetch_row($sonuc)) {
				foreach ($sonuc as $row) {
					echo "<div class='kitap-kitap'><img src='$row[resim_ad]'><div class='aciklama'><p>$row[aciklama]</p></div><div class='fiyat'><p>Fiyat:</p>$row[fiyat]<p>TL</p></div></div>";
				}
			}
			else {
				echo "Resim yok";
			}
			mysqli_close($baglanti)
		?>
	</div>
</section>

<!--Footer-->
	<div class="footer">
		<div class="footer_container">
			<div id="kutu">
				<b>Sayfalar</b>
				<ul>
					<li><a href="anasayfa.php">Ana Sayfa</a></li>
					<li><a href="bilgisayar.php">Bilgisayar</a></li>
					<li><a href="akademik.php">Akademik</a></li>
					<li><a href="çocuk.php">Çocuk</a></li>
					<li><a href="roman.php">Roman</a></li>
					<li><a href="sinav.php">Sınav</a></li>
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
