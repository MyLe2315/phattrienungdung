<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['mataikhoan']) && isset($_SESSION['matkhau'])) {
	include("class/classlogin.php");
	$q = new login();
	$q->confirmlogin($_SESSION['id'], $_SESSION['mataikhoan'], $_SESSION['matkhau']);
} else {
	header("location:login.php");
}
include('class/data.php');
$amount = 1;
if (isset($_COOKIE['mataikhoan'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = mysqli_query($connect, "SELECT * FROM taikhoan WHERE id = '$id'");
       
        $row = mysqli_fetch_array($result);
       
        if(isset($_SESSION['ma'])){
            $cart = $_SESSION['ma'];
            if(array_key_exists($id,$cart)){
                $amount = (int)$_SESSION['ma'][$id]['mataikhoan'];
            }
        }
       
    }
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = mysqli_query($connect, "SELECT * FROM taikhoan WHERE id = '$id'");
        $row = mysqli_fetch_array($result);
        $num_of_product = 0; 
        if(isset($_SESSION['ma'])){
            $cart = $_SESSION['ma'];
            if(array_key_exists($id,$cart)){
                $amount = (int)$_SESSION['ma'][$id]['mataikhoan'];
              
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAPPYBOOK</title>
     <script src="https://kit.fontawesome.com/931242865e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <div class="main">
        <div class="header">
            <img src="img/HAPPYBook.png" alt="logo">
            <div class="search-box">
                <input type="text" nme="search-box" id="search" placeholder="Nh???p nh???ng g?? b???n mu???n t??m">
                <a href="#" class="search-btn" style="text-decoration: none;">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>
            </div>
            <div class="contact">
                <i class="fa-solid fa-phone mr-2" >&#173; 0911990099</i>
                <i class="fa-solid fa-envelope  mr-2">&#173; happybook@gmail.com</i>
            </div>
            <form action="" method="post">
            <div class="form-group" >
                 <input type="submit" name="button" class="button" id="button" value="<?php echo $row['tentaikhoan']?>">
               </div>
               </form>
        </div>
        </div>
        <div class="menu sticky-top">
            <ul>
                <li class="abc">
                    <a href="#">
                        <i class="fa-solid fa-house-chimney-window"></i>
                        TRANG CH???
                    </a></li>
                <li class="abc">
                    <a href="#">
                        <i class="fa-solid fa-earth-americas"></i>
                        KI???N TH???C
                    </a>
                </li>
                <li class="abc">
                    <a href="#">
                        <i class="fa-solid fa-newspaper"></i>
                        TIN T???C
                    </a></li>
                <li class="abc">
                    <a href="#">
                        <i class="fa-solid fa-user"></i>
                        ABOUT US
                    </a>
                </li>
                <li class="abc">
                    <a href="#">
                        <i class="fa-solid fa-address-card"></i>
                        LI??N H???
                    </a>
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="row border" style="height:550px;">
                <div class="col-3 border-right" >
             		<a href="#"><i  class="fa fa-fw fa-user" style="margin-top: 20px;" ></i> <?php echo $row['tentaikhoan'] ?></a><br> <br>
                   
                    <a href="chucnangquantri.php?id=3" class="btn btn-primary btn-block" role="button" data-bs-toggle="button"> <p>C???p t??i kho???n qu???n tr??? c???p tr?????ng</p></a>
            <form action="" method="post" class="mt-4">
            <div class="form-group" >
                 <input type="submit" name="button" class="btn btn-primary btn-block" id="button" value="????ng xu???t">
             </div>
             <?php
    switch($_POST['button'])
    {
        case '????ng xu???t':
            {
                session_start(); 
                
                if (isset($_SESSION['mataikhoan']))
                {
                    unset($_SESSION['mataikhoan']);
                    unset($_SESSION['matkhau']);
                    unset($_SESSION['id']);
                    header('location:index.php');
                }
                break;
            }
    }
     
 ?>
               </form>
                </div>
                <div class="col-9">
                   <?php
                   switch($_GET['id'])
                   {
                       case '1':
                        {
                            echo 'aaa';
                        }
                        break;
                   }
                   ?>
                </div>
            </div>
        </div>
    
        <div class="footer">
            <img src="img/HAPPYBook.png" alt="logo">
            <ul class="ul1">
                <li><a href="#">H??? TR??? H???C SINH</a></li>
                <li><a href="#">C??U H???I TH?????NG G???P</a></li>
                <li><a href="#">C???M NH???N H???C SINH</a></li>
            </ul>
            <ul class="ul2">
                <li><a href="#">CH??NH S??CH ??I???U KHO???N</a></li>
                <li><a href="#">??I???U KHO???N D???CH V???</a></li>
                <li><a href="#">CH??NH S??CH B???O M???T</a></li>
            </ul>
            <div class="media">
                <a href="#"><i class="fa-brands fa-facebook fa-3xl mr-2"></i></a>
                <a href="#"><i class="fa-brands fa-youtube mr-2"></i></a>
                <a href="#"><i class="fa-brands fa-instagram mr-2"></i></a>
                <a href="#"><i class="fa-brands fa-twitter mr-2"></i></a>
            </div>
            </div>  
            
        </div>
    </div>
</body>
</html>