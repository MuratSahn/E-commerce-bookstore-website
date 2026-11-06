
<?php
session_start();
if($_SESSION['ad'] != "admin"){
    header("Refresh:0; url=index.php");
}
else{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        exit("Form gönderilmedi.");
    }

    // Form bilgilerini kontrol et
    if (!isset($_FILES['resim'], $_POST['aciklama'],
            $_POST['fiyat'], $_POST['tür'])) {
        exit("Eksik bilgi var.");
    }

    $aciklama = trim($_POST['aciklama']);
    $fiyat = trim($_POST['fiyat']);
    $tur = trim($_POST['tür']);

    if ($aciklama === "" || $fiyat === "" || $tur === "") {
        exit("Alanlar boş olamaz.");
    }

    if (!is_numeric($fiyat) || $fiyat < 0) {
        exit("Geçerli bir fiyat girin.");
    }

    // Dosya yükleme kontrolü
    if ($_FILES['resim']['error'] !== UPLOAD_ERR_OK) {
        exit("Dosya yüklenirken hata oluştu.");
    }

    if ($_FILES['resim']['size'] > 1024 * 1024 ||
        $_FILES['resim']['size'] == 0) {
        exit("Dosya boyutu 0 ile 1 MB arasında olmalı.");
    }

    // Gerçek dosya türünü kontrol et
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $tip = $finfo->file($_FILES['resim']['tmp_name']);

    if ($tip !== "image/jpeg") {
        exit("Sadece JPEG dosyaları kabul edilir.");
    }

    // Benzersiz dosya ismi oluştur
    $yeniad = "resimler/" . bin2hex(random_bytes(16)) . ".jpg";

    // Dosyayı yükle
    if (!move_uploaded_file($_FILES['resim']['tmp_name'], $yeniad)) {
        exit("Dosya yüklenemedi.");
    }

    // Veritabanına kaydet
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        $connect = mysqli_connect("localhost", "root", "", "odevdb");
        $connect->set_charset("utf8mb4");

        $query = $connect->execute_query(
            "INSERT INTO resimler
            (resim_ad, resim_turu, aciklama, fiyat)
            VALUES (?, ?, ?, ?)",
            [$yeniad, $tur, $aciklama, $fiyat]
        );

        header("Location: anasayfa.php");
        exit;

    } catch (mysqli_sql_exception $e) {
        unlink($yeniad);
        error_log($e->getMessage());
        exit("Veritabanına kayıt yapılamadı.");
    }
}

?>
