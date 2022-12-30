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
      <title>Müşteri Sayfası</title>
  
       <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/style_user.css">
<script>
  var kad ='';
  var email ='';
  var sifre ='';
function aktifEt() {
      kad = document.getElementById('uname');
      email = document.getElementById('email');
      sifre = document.getElementById('pwd');  
      kad.removeAttribute("disabled");  
      email.removeAttribute("disabled");  
      pwd.removeAttribute("disabled");
      var btn = document.getElementById("sbmtBtn");
    if (btn.value=="Güncelle"  ) 
      btn.value = "Kaydet";
    else if(btn.value == "Kaydet")
      guncelle();
    
}
function guncelle() {
  $.ajax({
       type: "POST",
       url: "update.php",
       data: 'k_ad='+ kad.value + '&email=' 
       + email.value + '&sifre=' + sifre.value,
       cache: false,
       success: function(response)
       {
        window.location.reload();
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
  <h2>Profil Bilgilerim</h2>
  <form action="#" class="needs-validation">
  <div class="form-group">
    <label for="uname">Kullanıcı Adı:</label>
    <input type="text" value="<?php echo $satir['k_ad'] ?>" class="form-control" id="uname" placeholder="Kullanıcı Adı Giriniz" name="kad" required disabled>
    <div class="valid-feedback">Geçerli.</div>
    <div class="invalid-feedback">Lütfen bu alanı doldurunuz.</div>
  </div>
  <div class="form-group">
    <label for="pwd">E-Mail:</label>
    <input type="email" value="<?php echo $satir['email'] ?>"    class="form-control" id="email" placeholder="Mail Giriniz" name="email" required disabled>
    <div class="valid-feedback">Geçerli.</div>
    <div class="invalid-feedback">Lütfen bu alanı doldurunuz.</div>
  </div>
  <div class="form-group">
    <label for="pwd">Şifre:</label>
    <input type="text" class="form-control" value="<?php echo $satir['sifre'] ?>" id="pwd" placeholder="Şifre Giriniz" name="sifre" required disabled>
    <div class="valid-feedback">Geçerli.</div>
    <div class="invalid-feedback">Lütfen bu alanı doldurunuz.</div>
  </div>
  <input type="button" onclick="aktifEt()" id="sbmtBtn" class="btn btn-success" value="Güncelle">
</form>


  
</div>
        </div>    
    </div>  
   
</body>  
</html>  