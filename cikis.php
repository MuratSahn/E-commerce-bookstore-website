<?php
session_start();
session_destroy();	
echo "Ana sayfaya yönlendiriliyorsunuz";
header("Refresh:2; url=index.php")
?>