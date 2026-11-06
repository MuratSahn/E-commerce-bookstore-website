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
	<title>Anasayfa</title>
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--Phone-->
	<link rel="stylesheet" type="text/css" media="(max-width: 700px)" href="css/phone.css">
	<style type="text/css">
		.kategori {
			display: flex;
			margin-top: 10px;
			width: 90%;
			height: 50px;
			margin: 10px auto;
			background: #0066CC;
			border-radius: 5px;
		}
		.kategori ul {
			display: flex;
			margin-left: auto;
			margin-right: auto;
			align-items: center;
		}
		.kategori ul li {
			padding: 10px 15px;
			background: white;
			color: black;
			border: 1px solid #0066CC;
			border-radius: 5px;
			margin: 0 10px;
		}
		.kategori ul li:hover {
			background: #a8a8a8;
			cursor: pointer;
			border: 1px solid #a8a8a8;
		}
		body {
			background: white;
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
				<?php  
					if (@$_SESSION['ad']=="admin") {
					echo "<li><a href='admin.php'>Admin</a></li>";
				} ?>					
			</ul>
		</nav>
	</div>

	<!--Kategori-->

	<div class="kategori">
		<ul>
			<li><a href="bilgisayar.php" style="color:black;">Bilgisayar</a></li>
			<li><a href="akademik.php" style="color:black;">Akademik</a></li>
			<li><a href="çocuk.php" style="color:black;">Çocuk</a></li>
			<li><a href="roman.php" style="color:black;">Roman</a></li>
			<li><a href="sinav.php" style="color:black;">Sınav</a></li>
		</ul>
	</div>
</header>

<!--Son 5 kitap-->

<section id="kitap">
	<h1 class="text-center heading-big"> Son Eklenen Kitaplar</h1>
	<div id="kitap-k">
		<?php
			$baglanti=mysqli_connect("localhost","root","","odevdb");
			$sorgu=mysqli_query($baglanti,"SELECT * FROM resimler ORDER BY id desc limit 5");
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

<!--Bilgisayar-->
<section id="kitap">
	<h1 class="text-center heading-big"> Bilgisayar Kitapları</h1>
	<div id="kitap-k">
		<?php
			$baglanti=mysqli_connect("localhost","root","","odevdb");
			$sorgu=mysqli_query($baglanti,"SELECT * FROM resimler WHERE resim_turu = 'bilgisayar' order by resim_ad asc limit 5");
			mysqli_set_charset($baglanti, "utf8");
			$row = mysqli_fetch_row($sorgu);
			if ($row = mysqli_fetch_row($sorgu)) {
				foreach ($sorgu as $row) {
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

<!--Çocuk-->

<section id="kitap">
	<h1 class="text-center heading-big">Çocuk Kitapları</h1>
	<div id="kitap-k">
		<?php
			$baglanti=mysqli_connect("localhost","root","","odevdb");
			$sorgu=mysqli_query($baglanti,"SELECT * FROM resimler WHERE resim_turu = 'çocuk' order by resim_ad asc limit 5");
			mysqli_set_charset($baglanti, "utf8");
			$row = mysqli_fetch_row($sorgu);
			if ($row = mysqli_fetch_row($sorgu)) {
				foreach ($sorgu as $row) {
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

<!--Akademik-->

<section id="kitap">
	<h1 class="text-center heading-big">Akademik Kitaplar</h1>
	<div id="kitap-k">
		<?php
			$baglanti=mysqli_connect("localhost","root","","odevdb");
			$sorgu=mysqli_query($baglanti,"SELECT * FROM resimler WHERE resim_turu = 'akademik' order by resim_ad asc limit 5");
			mysqli_set_charset($baglanti, "utf8");
			$row = mysqli_fetch_row($sorgu);
			if ($row = mysqli_fetch_row($sorgu)) {
				foreach ($sorgu as $row) {
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

<!--Roman-->

<section id="kitap">
	<h1 class="text-center heading-big">Romanlar</h1>
	<div id="kitap-k">
		<?php
			$baglanti=mysqli_connect("localhost","root","","odevdb");
			$sorgu=mysqli_query($baglanti,"SELECT * FROM resimler WHERE resim_turu='roman' order by resim_ad asc limit 5");
			mysqli_set_charset($baglanti, "utf8");
			$row = mysqli_fetch_row($sorgu);
			if ($row = mysqli_fetch_row($sorgu)) {
				foreach ($sorgu as $row) {
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


<!--Sınav-->

<section id="kitap">
	<h1 class="text-center heading-big">Sınav Kitaplar</h1>
	<div id="kitap-k">
		<?php
			$baglanti=mysqli_connect("localhost","root","","odevdb");
			$sorgu=mysqli_query($baglanti,"SELECT * FROM resimler WHERE resim_turu='sınav' order by resim_ad asc limit 5");
			mysqli_set_charset($baglanti, "utf8");
			$row = mysqli_fetch_row($sorgu);
			if ($row = mysqli_fetch_row($sorgu)) {
				foreach ($sorgu as $row) {
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
</body>
</html>