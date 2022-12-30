<?php
session_start();
include ('db/baglan.php');  
   
    $id= $_POST['id'];
       
    $sorgu= mysqli_query($baglan,"DELETE from emlak_tbl Where id = '$id'") ;
    if($sorgu){
        echo 'Silme başarılı';
    }else {
        echo 'Güncelleme başarısız';
    }
?> 