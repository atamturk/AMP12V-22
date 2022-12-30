<?php
session_start();
include ('db/baglan.php');
  
    $uid = $_SESSION['id'];
    $satir='';
    $sorgu= mysqli_query($baglan,"SELECT * from user_tbl WHERE id='$uid'") ;
    $kayit = mysqli_num_rows($sorgu);
    if($kayit > 0 ){
        $satir=mysqli_fetch_array($sorgu);
    }
    else{
        //echo "Kullanıcı girişi veya parola hatalı!!!";
    }

?>
<!DOCTYPE html>
<html lang = "tr">  
   <head>  
      <meta charset = "utf-8">  
      <meta name = "viewport" content = "width = device-width, initial-scale = 1, shrink-to-fit = no">  
      <title>İlan Ekleme Sayfası</title>
  
       <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/style_user.css">
<script>
  let kategori , tur, resim, adres, fiyat,aciklama, baslik, il, ilce;
function kaydet() {
      kategori = document.getElementById('kategori');
      tur = document.getElementById('tur');
      resim = document.getElementById('resim');
      adres = document.getElementById('adres');
      fiyat = document.getElementById('fiyat');
      aciklama = document.getElementById('ilan-bilgi');
      baslik = document.getElementById('baslik');
      il = document.getElementById('il');
      ilce = document.getElementById('ilce');
     
      $.ajax({
       type: "POST",
       url: "insert.php",
       data: 'kategori='+ kategori.value + '&tur=' 
       + tur.value + '&resim=' + resim.files[0].name + 
       '&adres='+ adres.value + '&fiyat=' + fiyat.value + 
       '&aciklama='+ aciklama.value +
       '&baslik='+ baslik.value + '&il=' + il.value +
       '&ilce='+ ilce.value ,
       cache: false,
       success: function(response)
       {
        window.location.reload();
        alert("Güncelleme başarılı");
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
  <h2>İlan Ekle</h2>
  <form action="#" class="needs-validation"  enctype="multipart/form-data">

<div class="row">
<div class="form-group col-5">
    <label for="pwd">İlan Başlık:</label>
    <input class="form-control" type="text" name="baslik" id="baslik">
    <div class="valid-feedback">Geçerli.</div>
    <div class="invalid-feedback">Lütfen bu alanı doldurunuz.</div>
  </div>

  <div class="form-group col-5">
    <label for="uname">Kategori:</label>
    <select class="form-control" name="kategori" id="kategori">
      <option value="Emlak">Emlak</option>
      <option value="Arsa">Arsa</option>
      <option value="Vasıta">Vasıta</option>
    </select>
    <div class="valid-feedback">Geçerli.</div>
    <div class="invalid-feedback">Lütfen bu alanı doldurunuz.</div>
  </div>
  <div class="form-group col-5">
    <label for="pwd">Tür:</label>
    <select class="form-control" name="tur" id="tur">
      <option value="daire">Daire</option>
      <option value="villa">Villa</option>
      <option value="müstakil">Müstakil</option>
    </select>
    <div class="valid-feedback">Geçerli.</div>
    <div class="invalid-feedback">Lütfen bu alanı doldurunuz.</div>
  </div>
  <div class="form-group col-5">
    <label for="pwd">Resim Yükle:</label>
    <input type="file"  name="resim" id="resim">
    <div class="valid-feedback">Geçerli.</div>
    <div class="invalid-feedback">Lütfen bu alanı doldurunuz.</div>
  </div>

<div class="form-group col-5">
    <label for="uname">İl:</label>
    <select class="form-control" name="il" id="il">
      <option value="Kocaeli">Kocaeli</option>
      <option value="İstanbul">İstanbul</option>
      <option value="Bursa">Bursa</option>
    </select>
    <div class="valid-feedback">Geçerli.</div>
    <div class="invalid-feedback">Lütfen bu alanı doldurunuz.</div>
  </div>

  <div class="form-group col-5">
    <label for="uname">İlçe:</label>
    <select class="form-control" name="ilce" id="ilce">
      <option value="İzmit">İzmit</option>
      <option value="Başiskele">Başiskele</option>
      <option value="Kartepe">Kartepe</option>
    </select>
    <div class="valid-feedback">Geçerli.</div>
    <div class="invalid-feedback">Lütfen bu alanı doldurunuz.</div>
  </div>

  <div class="form-group col-5">
    <label for="pwd">Adres:</label>
    <textarea class="form-control" placeholder="Lütfen adresi giriniz." name="adres" id="adres" cols="30" rows="5">
      
    </textarea>
    <div class="valid-feedback">Geçerli.</div>
    <div class="invalid-feedback">Lütfen bu alanı doldurunuz.</div>
  </div>

  <div class="form-group col-5">
    <label for="pwd">Fiyat:</label>
    <input class="form-control" type="text" name="fiyat" id="fiyat">
    <div class="valid-feedback">Geçerli.</div>
    <div class="invalid-feedback">Lütfen bu alanı doldurunuz.</div>
  </div>

  <div class="form-group col-5">
    <label for="pwd">Açıklama:</label>
    <textarea class="form-control"  name="ilan-bilgi" placeholder="İlan hakkında bilgi" id="ilan-bilgi" cols="30" rows="5">
      
    </textarea>
    <div class="valid-feedback">Geçerli.</div>
    <div class="invalid-feedback">Lütfen bu alanı doldurunuz.</div>
  </div>
</div>


 

  <input type="button" onclick="kaydet()" id="sbmtBtn" class="btn btn-success" value="Kaydet">
</form>  
</div>
        </div>    
    </div>  
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"> </script>  
    <script src="js/user.js"></script>
    <script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
</body>  
</html>  