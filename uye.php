<?php
session_start();

if (($_SESSION['ad'] ?? null) !== "admin") {
    header("Location: index.php");
    exit;
}

$con = mysqli_connect("localhost", "root", "", "odevdb");
mysqli_set_charset($con, "utf8mb4");
$query = mysqli_query($con, "SELECT * FROM kullanicilar");
$sayac = 0;

echo '
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Üyeler</title>
    <style>
        table {
            background: aqua;
        }
    </style>
</head>
<body>

<table align="center" border="1" width="600">
    <tr align="center">
        <td>Sıra No</td>
        <td>Üye No</td>
        <td>Ad</td>
        <td>E Posta</td>
        <td>Doğum Tarihi</td>
    </tr>
';

while ($satir = mysqli_fetch_row($query)) {
    $sayac++;

    echo "<tr>
        <td>".$sayac."</td>
        <td>".htmlspecialchars((string)$satir[0])."</td>
        <td>".htmlspecialchars((string)$satir[1])."</td>
        <td>".htmlspecialchars((string)$satir[3])."</td>
        <td>".htmlspecialchars((string)$satir[4])."</td>
    </tr>";
}

echo '
</table>
</body>
</html>
';

mysqli_close($con);
?>