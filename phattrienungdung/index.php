<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAPPYBOOK</title>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/931242865e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
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
                <i class="fa-solid fa-phone mr-2" >&#173; 0911990099</i>
                <i class="fa-solid fa-envelope  mr-2">&#173; happybook@gmail.com</i>
            </div>
            <form action="login.php" method="post">
            <div class="form-group" >
                 <input type="submit" name="button" class="button" id="button" value="Đăng nhập">
               </div>
               </form>
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
        <div id="demo" class="carousel slide" data-ride="carousel">
          <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            
          </ul>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="img/bgbanner.jpg" alt="Los Angeles" width="1100" height="500">
              <div class="carousel-caption">
                <h2>Hệ Thống kiểm tra trực tuyến</h2>
                <p>Đổi mới, nâng tầm cao mới - Năng động, hội nhập toàn cầu</p>
              </div>   
            </div>
            <div class="carousel-item">
              <img src="img/bg.jpg" alt="Chicago" width="1100" height="500">
              <div class="carousel-caption">
                <h2>Thay đổi phương pháp học tập để thích nghi với hiện tại</h2>
                <p>Đổi mới, nâng tầm cao mới - Năng động, hội nhập toàn cầu</p>
              </div>   
            </div>	
          </div>
          <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
        </div>
        <div class="content">
            <div class="tieude">
                <h2>VÌ SAO HỌC NÊN HỌC TẠI HAPPYBOOK?</h2>
            </div> <br>
            <div class="left">
                <i class="fa-solid fa-user-check">
                    <a>ĐÃ ĐÀO TẠO OFFLINE TỪ 2017 <br>
                    Kinh nghiệm 4 năm đào tạo Offline + Zoom <br>
                    Hơn 50 lớp với hơn 1000 học sinh
                    </a>
                </i> <br> <br>
                <i class="fa-solid fa-person-chalkboard">
                    <a>
                        GIÁO VIÊN KINH NGHIỆM <br>
                        Giáo viên đang làm việc tại Hawee, KTV <br>
                        Giáo viên chứng chỉ Autodesk Professional
                    </a>
                </i>
            </div>
            <div class="right">
                <i class="fa-solid fa-pen-nib">
                    <a>CAM KẾT KẾT QUẢ HỌC TẬP <br>
                        Được học thử miễn phí <br>
                        Cam kết thành thạo sau khóa học
                    </a>
                </i> <br> <br>
                <i class="fa-solid fa-mobile">
                    <a>HỖ TRỢ TẬN TÌNH 24/7 <br>
                        Support qua các nhóm Zalo, facebook <br>
                        Hỗ trợ 24/7 qua chat, teamview</a>
                </i>
            </div>
        </div>
        <div class="footer">
            <img src="img/HAPPYBook.png" alt="logo">
            <ul class="ul1">
                <li ><a href="#">HỖ TRỢ HỌC SINH</a></li>
                <li ><a href="#">CÂU HỎI THƯỜNG GẶP</a></li>
                <li ><a href="#">CẢM NHẬN HỌC SINH</a></li>
            </ul>
            <ul class="ul2">
                <li ><a href="#">CHÍNH SÁCH ĐIỀU KHOẢN</a></li>
                <li><a href="#">ĐIỀU KHOẢN DỊCH VỤ</a></li>
                <li ><a href="#">CHÍNH SÁCH BẢO MẬT</a></li>
            </ul>
            <div class="media ">
                <a href="#"><i class="fa-brands fa-facebook fa-3xl mr-2"></i></a>
                <a href="#"><i class="fa-brands fa-youtube mr-2"></i></a>
                <a href="#"><i class="fa-brands fa-instagram mr-2"></i></a>
                <a href="#"><i class="fa-brands fa-twitter mr-2"></i></a>
            </div>  
            
        </div>
    </div>  

</body>
</html>