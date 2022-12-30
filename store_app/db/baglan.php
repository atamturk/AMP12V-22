<?php
$baglan = mysqli_connect("localhost","root","","satisdb");
// Bağlantıyı kontrol et
if (mysqli_connect_errno()) {
  echo "Bağlantı hatası oluştu:" . mysqli_connect_error();
  exit();
}
if($baglan){
   // echo "Veritabanı bağlantısı başarılı!!!";
}
?>