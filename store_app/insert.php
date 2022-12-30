<?php
session_start();
include ('db/baglan.php');  
    $kategori =  $_POST['kategori'];
    $tur =  $_POST['tur'];
    $resim =  $_POST['resim']; 
    $adres =  $_POST['adres'];
    $fiyat =  $_POST['fiyat'];
    $aciklama =  $_POST['aciklama'];
    $baslik =  $_POST['baslik'];
    $il =  $_POST['il'];
    $ilce =  $_POST['ilce'];
    $sorgu= mysqli_query($baglan,"INSERT INTO emlak_tbl(kategori, tur, resim, adres, fiyat, aciklama, baslik, il, ilce)
    VALUES ('$kategori','$tur','$resim','$adres','$fiyat','$aciklama','$baslik','$il','$ilce')
    ") ;
    if($sorgu){
        echo 'Güncelleme başarılı';
    }else {
        echo 'Güncelleme başarısız';
    }
?>









