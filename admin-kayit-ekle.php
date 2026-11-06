<?php
session_start();
if (@$_SESSION['ad']=="admin") {
	echo "
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset='utf-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<title>Kayıt Ekle</title>
		<style type='text/css'>
			*{
				margin: 0;
				padding: 0;
			}


			a{
				text-decoration: none;
				color: white;
			}
			li{
				list-style: none;
			}

			/*Navbar*/
			#navbar{
				background: #333;
				color: white;
				display: flex;
				justify-content: space-between;
				align-items: center;
				padding: 0 0.75rem;
				height: 70px;
			}

			#navbar ul{
				display: flex;
			}
			#navbar ul li{
				padding: 0.5rem;
			}
			#navbar ul li:hover{
				border-radius: 5px;
				background: #336ea2;
			}

			.form{
				display: flex;
				flex-direction: column;
				width: 400px;
				height: 420px;
				margin: 0 auto;
				background: aqua;
				margin-top: 1%;
				border-radius: 10px;
			}
			.form form{
				display: flex;
				flex-direction: column;
				width: 50%;
				height: 60%;
				align-items: center;
				margin: 0 auto;
				margin-top: 25%;
				border: 1px solid black;
				border-radius: 5px;
				text-align: left;
			}

			.form form #giris{
				width: 40%;
				margin-top: 5%;
			}

			.form1{
				display: flex;
				flex-direction: column;
				width: 400px;
				height: 420px;
				margin: 0 auto;
				background: aqua;
				margin-top: 1%;
				border-radius: 10px;
			}
			.form1 form{
				display: flex;
				flex-direction: column;
				width: 50%;
				height: 60%;
				align-items: center;
				margin: 0 auto;
				margin-top: 25%;
				border: 1px solid black;
				border-radius: 5px;
				text-align: left;
			}

			.form1 form #giris{
				width: 40%;
				margin-top: 5%;
			}

		</style>
	</head>
	<body>
	<header class=''>
		<div class='container'>
			<nav id='navbar'>
				<h1 class='heading-small'>LOGO</h1>
				<ul>
					<li class='a'><a href='index.php'>Ana Sayfa</a></li>
					<li class='a'><a href='cikis.php'>Çıkış Yap</a></li>					
				</ul>
			</nav>
		</div>
	</header>

	<div class='form'>
		<form action='admin-kayit-islem.php' method='POST'>
			<h3>Kayıt Ol</h3>
			<label for='ad'>Ad: </label><input type='text' name='ad' id='ad'>
			<label for='soyad'>Soyad: </label><input type='text' name='soyad' id='soyad'>
			<label for='mail'>E-mail: </label><input type='email' name='mail' id='mail'>
			<label for='dtarih'>Doğum Tarihi: </label><input type='date' name='dtarih' id='dtarih'>
			<label for='sifre'>Şifre: </label><input type='password' name='sifre' id='sifre'>
			<input type='submit' name='giris' value='Kayıt Ekle' id='giris'>
		</form>
	</div>
	</body>
	</html>

	";


}
else {
	header("Refresh:0; url=index.php");
}
?>
