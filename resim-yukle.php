<?php
session_start();
if($_SESSION['ad'] != "admin"){
    header("Refresh:0; url=index.php");
}

else{
    echo '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Resim Yükle</title>
            <style type="text/css">
                form {
                    display: flex;
                    flex-direction: column;
                    width: 20%;
                    justify-content: center;
                    align-items: center;
                }
            </style>
        </head>
        <body>
        <form action="resimyukle.php" method="POST" name="resim-yukle" enctype="multipart/form-data">
            <input type="file" name="resim">
            <label>Açıklama: </label><input type="text" name="aciklama">
            <label>Fiyat: </label><input type="fiyat" name="fiyat"><br>
            <label>Tür: </label><select name="tür">
                <option value=""></option>
                <option value="bilgisayar">bilgisayar</option>
                <option value="akademik">akademik</option>
                <option value="çocuk">çocuk</option>
                <option value="sınav">sınav</option>
                <option value="roman">roman</option>
            <input type="submit" name="gonder" value="Gönder">
            </select>
        </form>
        </body>
        </html>
    ';
}

?>