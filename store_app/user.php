<?php
session_start();
?>
<!DOCTYPE html>
<html lang = "tr">  
   <head>  
      <meta charset = "utf-8">  
      <meta name = "viewport" content = "width = device-width, initial-scale = 1, shrink-to-fit = no">  
      <title>Müşteri Sayfası</title>
  
       <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="css/style_user.css">

<script>

function sil(id){
  $.ajax({
       type: "POST",
       url: "delete.php",
       data: 'id='+ id ,
       cache: false,
       success: function(response)
       {
        window.location.reload();
        alert("Silme işlemi başarılı");
       }, error:function(){
        alert("Güncelleme başarısız");
       }
     }); 
}


</script>

<body> 

<div id="wrapper">  
   <div class="overlay"></div>  
   <?php include ('include/menu.php'); ?> 
         
        <div id="page-content-wrapper">  
            <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">  
                <span class="hamb-top"></span>  
                <span class="hamb-middle"></span>  
                <span class="hamb-bottom"></span>  
            </button>  
            <div class="container">
  <h2>İlanlarım</h2>
  <p>Eklediğim ilanlar...</p>   
  <span><button type="button" class="btn btn-primary">İlan Ekle</button></span>         
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Başlık</th>
        <th>Resim</th>
        <th>Kategori</th>
        <th>Tarih</th>
        <th>Fiyat</th>
        <th>İl</th>
        <th>İlçe</th>
        <th>Sil</th>
        <th>Güncelle</th>
        <th>Detay</th>

      </tr>
    </thead>
    <tbody>
     
      <?php 
    include ('db/baglan.php');    
$sorgu = "SELECT * FROM emlak_tbl ";
if ($res = mysqli_query($baglan, $sorgu)) {
    if (mysqli_num_rows($res) > 0) {
      
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>".$row['baslik']."</td>";
            echo "<td> <img src='images/". $row['resim'] ."' height='50' width='50' style='border-radius: 3px; border:1px solid black ;' alt=''></td>";
            echo "<td>".$row['kategori']."</td>";
            echo "<td>".$row['ilan_tarihi']."</td>";
            echo "<td>".$row['fiyat']."</td>";
            echo "<td>".$row['il']."</td>";
            echo "<td>".$row['ilce']."</td>";
            echo "<td><button type='button' onclick='sil(".$row['id'].")'  class='btn btn-danger'>Sil</button></td>";
            echo "<td><button type='button' class='btn btn-success'>Güncelle</button></td>";
            echo "<td><button type='button' class='btn btn-info'>Detay</button></td>";
            echo "</tr>"; 
   
        }
        echo "</table>";
        mysqli_free_result($res);
    }
    else {
        echo "No matching records are found.";
    }
}
else {
    echo "ERROR: Could not able to execute $sql. "
                                .mysqli_error($link);
}
mysqli_close($baglan);
?>
        
     
      
    </tbody>
  </table>
</div>
        </div>    
    </div>  
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"> </script>  
    <script src="js/user.js"></script>
</body>  
</html>  