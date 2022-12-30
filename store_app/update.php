<?php
session_start();
include ('db/baglan.php');  
    $uid = $_SESSION['id'];
    $kad= $_POST['k_ad'];
    $email= $_POST['email'];
    $sifre= $_POST['sifre'];    
    $sorgu= mysqli_query($baglan,"UPDATE user_tbl 
    SET k_ad='$kad', email='$email', sifre ='$sifre'
     WHERE id='$uid'") ;
    if($sorgu){
        echo 'Güncelleme başarılı';
    }else {
        echo 'Güncelleme başarısız';
    }
?>