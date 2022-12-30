<?php
session_start();
include ('db/baglan.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $email = $_POST['mail'];
    $sifre = $_POST['sifre'];
    $sorgu= mysqli_query($baglan,"SELECT * from user_tbl WHERE email='$email' 
    AND sifre='$sifre'") ;
    $kayit = mysqli_num_rows($sorgu);
    if($kayit > 0 ){
        $satir=mysqli_fetch_array($sorgu);
            $_SESSION['id'] = $satir['id'];
            if($satir['role'] == 'user'){
                header( "Location: user.php" );
             }else if($satir['role'] == 'admin'){
                header( "Location: admin.php" );
             }
    }
    else{
        //echo "Kullanıcı girişi veya parola hatalı!!!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> <title>Document</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="login">
        <h3 class="text-center text-white pt-5">Giriş Formu</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="#" method="post">
                            <h3 class="text-center text-info">Giriş Yap</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Kullanıcı Adı:</label><br>
                                <input type="text" name="mail" required placeholder="Mailinizi Giriniz..." id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Şifre:</label><br>
                                <input type="password" name="sifre" required id="password" placeholder="Şifrenizi Giriniz..." class="form-control">
                            </div>
                            <div class="form-group">
                                <!-- <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label> -->
                                <br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Giriş Yap">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="#" class="text-info">Kayıt Ol</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>