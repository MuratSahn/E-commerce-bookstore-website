<?php
session_start();
if (@$_SESSION) {
	header("Location=anasayfa.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Giriş</title>
	<style type="text/css">
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
			height: 40%;
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

	</style>
</head>
<body>
<header class="">
	<div class="container">
		<nav id="navbar">
			<h1 class="heading-small">LOGO</h1>
			<ul>
				<li><a href="index.php">Ana Sayfa</a></li>
				<li><a href="kayit.php">Kayıt Ol</a></li>					
			</ul>
		</nav>
	</div>
</header>

<div class="form">
	<form action="giris.php" method="POST">
		<h3>Giriş</h3>
		<label for="ad">Ad: </label><input type="text" name="ad" id="ad">
		<label for="mail">E-mail: </label><input type="email" name="mail" id="mail">
		<label for="mail">Şifre: </label><input type="password" name="sifre" id="sifre">
		<input type="submit" name="giris" value="Giriş" id="giris">
	</form>
</div>
</body>
</html>