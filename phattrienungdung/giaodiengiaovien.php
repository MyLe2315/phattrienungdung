<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['mataikhoan']) && isset($_SESSION['matkhau'])) {
	include("class/classlogin.php");
	$q = new login();
	$q->confirmlogin($_SESSION['id'], $_SESSION['mataikhoan'], $_SESSION['matkhau']);
} else {
	header("location:login.php");
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
                <input type="text" nme="search-box" id="search" placeholder="Nhập những gì bạn muốn tìm">
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
                 <input type="submit" name="button" class="button" id="button" value="ADMIN">
               </div>
               </form>
        </div>
        </div>
        <div class="menu sticky-top">
            <ul>
                <li class="abc">
                    <a href="#">
                        <i class="fa-solid fa-house-chimney-window"></i>
                        TRANG CHỦ
                    </a></li>
                <li class="abc">
                    <a href="#">
                        <i class="fa-solid fa-earth-americas"></i>
                        KIẾN THỨC
                    </a>
                </li>
                <li class="abc">
                    <a href="#">
                        <i class="fa-solid fa-newspaper"></i>
                        TIN TỨC
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
                        LIÊN HỆ
                    </a>
                </li>
            </ul>
        </div>
        
       <div class="container">
            <div class="row border" style="height:auto;">
                <div class="col-3 border-right" >
             		<a href="#"><i  class="fa fa-fw fa-user" style="margin-top: 20px;" ></i>ADMIN</a><br> <br>
                    <a href="1" class="btn btn-primary active btn-block" role="button" data-bs-toggle="button" aria-pressed="true" ><p>Danh sách học sinh</p></a>
                    <a href="" class="btn btn-primary btn-block" role="button" data-bs-toggle="button"> <p>Tạo bài kiểm tra</p></a>
                    <a href="" class="btn btn-primary btn-block" role="button" data-bs-toggle="button"><p>Thống kê bài kiểmtra </p></a>
                    <a href="" class="btn btn-primary btn-block" role="button" data-bs-toggle="button"><p>Chấm nhập điểm, thêm đánh giá</p></a>
                     <a href="" class="btn btn-primary btn-block" role="button" data-bs-toggle="button"><p>Tạo câu hỏi</p></a>
                      <a href="" class="btn btn-primary btn-block" role="button" data-bs-toggle="button"><p>Chỉnh sửa điểm</p></a>
            <form action="" method="post" class="mt-4">
            <div class="form-group" >
                 <input type="submit" name="button" class="btn btn-primary btn-block" id="button" value="Đăng xuất">
             </div>
             <?php
    switch($_POST['button'])
    {
        case 'Đăng xuất':
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
                <li><a href="#">HỖ TRỢ HỌC SINH</a></li>
                <li><a href="#">CÂU HỎI THƯỜNG GẶP</a></li>
                <li><a href="#">CẢM NHẬN HỌC SINH</a></li>
            </ul>
            <ul class="ul2">
                <li><a href="#">CHÍNH SÁCH ĐIỀU KHOẢN</a></li>
                <li><a href="#">ĐIỀU KHOẢN DỊCH VỤ</a></li>
                <li><a href="#">CHÍNH SÁCH BẢO MẬT</a></li>
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