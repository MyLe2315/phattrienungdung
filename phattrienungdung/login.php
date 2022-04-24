<?php
include("class/classlogin.php");
$p=new login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form đăng nhập</title> 
    <link rel="stylesheet" href="css/login.css">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <script src="//code.jquery.com/jquery.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body class="body">
        <div class="container inner" >
         <div class="title">
                    <h1 class="login"  >Hệ Thống Kiểm Tra Trực Tuyến</h1>
                </div>
            <form action="" method="post">
               <div class="form-group">
               		<h2 class="login" style="margin:50px; font-size:40px;">ĐĂNG NHẬP</h2>
               </div>
               <div class="form-group " align="center">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Mã Đăng Nhâp">
               </div>
               <div class="form-group " align="center">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Nhập mật khẩu">
               </div>
               <div class="text-right">
                     <a href="#">Quên mật khẩu?</a>
               </div>
               <div class="form-group">
                   <input type="submit" name="button" class="button" id="button" value="Đăng nhập">
               </div>
                <div align="center">
				 <?php
                 switch ($_POST['button'])
                  {
                      case'Đăng nhập':
                      {
						   session_start();
						   if(isset($_SESSION['id'])){
           						$id = $_SESSION['id'];
								$_SESSION['mataikhoan']=$user;
								$_SESSION['matkhau']=$pass;
						   }
                          $user=$_REQUEST['name'];
                          $pass=$_REQUEST['password'];
                          if($user!='' && $pass!='')
                          {
                              if($p->mylogin($user,$pass)==1)
                              {
								  
								  {
                                 	 header('location:giaodiengiaovien.php?id='.$user);
								  }
                              }
							  if ($p->myloginhs($user,$pass)==1)
                              {
								  
								  {
                                 	 header('location:giaodienhocsinh.php?id='.$user);
								  }
                              }
							   if ($p->myloginqtv($user,$pass)==1)
                              {
								  
								  {
                                 	 header('location:giaodienqtvcaptruong.php?id='.$user);
								  }
                              }
                              else
                              {
                                  echo 'Đăng nhập không thành công';
                              }
                          }
                          else
                          {
                              echo'Vui lòng nhập đầy đủ thông tin';
                          }
                          break;
                      }
                  }
                 
 				?>
            </form>
            <div class="mt-4" style="color:#039">
                <a href="index.php" class="backhome text-primary ">Quay lại trang chủ</a>
                
           </div>
        </div>
    
 

       
    
    </div>
    </div>
</body>
</html>