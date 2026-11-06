<?php

session_start();

if($_SESSION['ad']!="admin"){
    header("Refresh:0; url=anasayfa.php");
}

else{
    echo '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Üye Sil</title>
            <style type="text/css">
                form {
                    padding: 5px 0px 50px 0px;
                    background: blue;
                    display: inline-block;
                    border: 1px solid black;
                    text-align: center;
                }
            </style>
        </head>
        <body>
        <form action="uye-sil.php" method="POST">
            <h4>Üye Sil</h4>
            <label for="sil">Üye ID: </label><input type="text" name="sil" id="sil">
            <input type="submit" value="Sil">
        </form>
        </body>
        </html>
    ';
}
?>