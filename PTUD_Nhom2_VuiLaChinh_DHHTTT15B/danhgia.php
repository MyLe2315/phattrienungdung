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
        $result = mysqli_query($connect, "SELECT * FROM taikhoan WHERE mataikhoan = '$id'"); // lấy của products

        $row = mysqli_fetch_array($result);

        if (isset($_SESSION['ma'])) {
            $cart = $_SESSION['ma'];
            if (array_key_exists($id, $cart)) {
                $amount = (int)$_SESSION['ma'][$id]['mataikhoan'];
            }
        }
    }
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = mysqli_query($connect, "SELECT * FROM taikhoan WHERE mataikhoan = '$id'");


        $row = mysqli_fetch_array($result);
        $num_of_product = 0;
        if (isset($_SESSION['ma'])) {
            $cart = $_SESSION['ma'];
            if (array_key_exists($id, $cart)) {
                $amount = (int)$_SESSION['ma'][$id]['mataikhoan'];
            }
        }
    }
}
include("class/class_sua.php");
$m = new quanli();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAPPYBOOK</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/931242865e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="css/style.css">


    <link rel="stylesheet" href="css/bootstrap.css">

    <script src="js/bootstrap.min.js"></script>

</head>

<body>
    <div class="main">
        <div class="header">
            <img src="img/HAPPYBook.png" alt="logo">
            <div class="search-box">
                <input type="text" name="search-box" id="search" placeholder="Nhập những gì bạn muốn tìm">
                <a href="#" class="search-btn" style="text-decoration: none;">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>
            </div>
            <div class="contact">
                <i class="fa-solid fa-phone mr-2">&#173; 0911990099</i>
                <i class="fa-solid fa-envelope  mr-2">&#173; happybook@gmail.com</i>
            </div>
            <form action="" method="post">
                <div class="form-group">
                    <input type="submit" name="button" class="button" id="button" value="<?php echo $row['tentaikhoan'] ?>" />
                </div>
            </form>
        </div>
        <?php
        switch ($_POST['button']) {
            case 'Đăng xuất': {
                    session_start();

                    if (isset($_SESSION['mataikhoan'])) {
                        unset($_SESSION['mataikhoan']);
                        unset($_SESSION['matkhau']);
                        unset($_SESSION['id']);
                        header('location:index.php');
                    }
                    break;
                }
        }
        ?>
        <div class="menu sticky-top">
            <ul>
                <li class="abc">
                    <a href="#">
                        <i class="fa-solid fa-house-chimney-window"></i>
                        TRANG CHỦ
                    </a>
                </li>
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
                    </a>
                </li>
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
        <div class="container-fluid">
            <div class="row border" style="height:auto;">
                <div class="col-2 border-right" style="height: 477px;">
                    <a href="#"><i class="fa fa-fw fa-user" style="margin-top: 20px;"></i><?php echo $row['tentaikhoan'] ?></a><br> <br>
                    <a href="giaodienhocsinh.php?id=<?php echo $row['mataikhoan'] ?>&hs=1" class="btn btn-primary btn-block">
                        <p>Làm bài kiểm tra</p>
                    </a>
                    <a href="giaodienhocsinh.php?id=<?php echo $row['mataikhoan'] ?>&hs=2" class="btn btn-primary btn-block">
                        <p>Xem điểm</p>
                    </a>
                    <a href="giaodienhocsinh.php?id=<?php echo $row['mataikhoan'] ?>&hs=3" class="btn btn-primary btn-block">
                        <p>Nộp bài kiểm tra</p>
                    </a>
                    <a href="giaodienhocsinh.php?id=<?php echo $row['mataikhoan'] ?>&hs=4" class="btn btn-primary btn-block">
                        <p>Xem đánh giá</p>
                    </a>
                    <form action="" method="post" class="mt-4">
                        <div class="form-group">
                            <input type="submit" name="button" class="btn btn-primary btn-block" id="button" style="font-size: 15px;" value="Đăng xuất">
                        </div>

                    </form>
                </div>

                <div class="col-10 border">



                    <?php
                     
                    
                    $layid_monhoc = $_REQUEST['id'];
                  
                    if ($layid_monhoc>0) {
                        $m->loaddanhgia("select * from diemvadanhgia where idmon='$layid_monhoc' order by idmon asc");
                    } else {
                        echo 'Không có đánh giá... ';
					
                    }



                    
                    
                    
                    ?>
                    <?php
 





                    //  $m->loadmon("select * from monhoc order by tenmon asc");
                    // echo '<hr>';

                    // $layid_monhoc = $_REQUEST['id'];
                    // if ($layid_monhoc > 0) {
                    //     $m->loadbaikiemtra_2("select * from baikiemtra where idmonhoc='$layid_monhoc' order by idmonhoc asc ");
                    // } else {
                    //     echo 'Vui lòng chọn môn học...';
                    // }
                    // echo '<hr>';
                     

                 

                   
                    
                    
                    ?>



                













                </div>
            </div>




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
</body>

</html>