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
        $result = mysqli_query($connect, "SELECT * FROM taikhoan WHERE mataikhoan = '$id'");
        $row = mysqli_fetch_array($result);
        $num_of_product = 0; 
        if(isset($_SESSION['ma'])){
            $cart = $_SESSION['ma'];
            if(array_key_exists($id,$cart))
            {
                $amount = (int)$_SESSION['ma'][$id]['mataikhoan']; 
            }
        }
    }
}
include("class/class_sua.php");
	$m = new quanli();

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
                 <input type="submit" name="button" class="button" id="button" value="<?php echo $row['tentaikhoan'] ?>">
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
        <div class="col-12">
            <div class="row border" style="height:auto;">
                <div class="col-2 border-right" >
                <a href="#"><i  class="fa fa-fw fa-user" style="margin-top: 20px;" ></i><?php echo $row['tentaikhoan'] ?></a><br> <br>
                    <a href="giaodienqtvcaptruong.php?id=<?php echo $row['mataikhoan']?>&cn=1" class="btn btn-primary  btn-block" role="button" data-bs-toggle="button" aria-pressed="true" ><p>Quản lý giáo viên</p></a>
                    <a href="giaodienqtvcaptruong.php?id=<?php echo $row['mataikhoan']?>&cn=2" class="btn btn-primary btn-block" role="button" data-bs-toggle="button"> <p>Cấp tài khoản</p></a>
                    <a href="giaodienqtvcaptruong.php?id=<?php echo $row['mataikhoan']?>&cn=3" class="btn btn-primary btn-block" role="button" data-bs-toggle="button"><p>Quản lý danh sách lớp</p></a>
                    <a href="giaodienqtvcaptruong.php?id=<?php echo $row['mataikhoan']?>&cn=4" class="btn btn-primary btn-block" role="button" data-bs-toggle="button"><p>Quản lý học sinh</p></a>
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
                <div class="col-10" style="margin-top:20px">
<?php
                   $layid=0;
                     if (isset($_REQUEST['magv']))
                     {
                         $layid=$_REQUEST['magv'];
                     }
                     $layid_lop=0;
                     if(isset($_REQUEST['malop']))
                     {
                        $layid_lop=$_REQUEST['malop'];
                     }
                     session_start();
                     $mataikhoan=$_SESSION['mataikhoan'];
                     switch($_POST['nut'])
		{  
			case'Thêm giáo viên':
			{
				$magv=$_REQUEST['magv'];
				$diachi=$_REQUEST['diachi'];
				$email=$_REQUEST['email'];
				$sdt=$_REQUEST['sdt'];
				$hodem=$_REQUEST['hodem'];
				$ten=$_REQUEST['ten'];
                $ngaysinh=$_REQUEST['ngaysinh'];
                $mamonhoc=$_REQUEST['monhoc'];
                    if($magv && $diachi && $email && $sdt && $hodem && $ten && $ngaysinh && $mamonhoc !='')
                    {
                        if(preg_match ("/^[0-9]*$/", $sdt) && strlen ($sdt) == 10)
                        {
                           if($m->themxoasua("INSERT INTO giaovien(magiaovien,diachi,email,sdt,hodem,tengiaovien,ngaysinh,idmonhoc) VALUES('$magv',' $diachi', '$email', '$sdt','$hodem','$ten', '$ngaysinh','$mamonhoc')")==1)
						{
							
                            header ('location:giaodienqtvcaptruong.php?id='.$mataikhoan.'&cn=1');
						}
						else
						{
							echo'Thêm giáo viên không thành công.';
						} 
                        }
                        else
                        {
                            echo 'Vui lòng nhập đúng định dạng số điện thoại';
                        }
                        
                    }
					else 
                    {
                        echo 'Vui lòng điền đầy đủ thông tin';
                    }
					

				break;
			}
			case 'Xoá giáo viên':
			{
				
				$idxoa=$_REQUEST['txtid'];
				if($idxoa>0)
				{
					if($m->themxoasua("delete from giaovien where magiaovien='$idxoa' limit 1")==1)
					{
                        echo 'Xóa thành công';
						header ('location:giaodienqtvcaptruong.php?id='.$mataikhoan.'&cn=1');
					}
					else
					{
						echo'Xoá không thành công. ';
					}
				}
				else
				{
					echo'vui lòng chọn giáo viên cần xoá';
				}
				break;
				
			}
			case 'Sửa giáo viên':
			{
				
				$idsua=$_REQUEST['txtid'];
				$magv=$_REQUEST['magv'];
				$diachi=$_REQUEST['diachi'];
				$email=$_REQUEST['email'];
				$sdt=$_REQUEST['sdt'];
				$hodem=$_REQUEST['hodem'];
				$ten=$_REQUEST['ten'];
                $ngaysinh=$_REQUEST['ngaysinh'];
				$mamonhoc=$_REQUEST['monhoc'];
				
				if($idsua>0)
				{
					if($m->themxoasua("UPDATE giaovien SET magiaovien='$magv',diachi='$diachi',email='$email',sdt='$sdt',hodem='$hodem',tengiaovien='$ten',ngaysinh='$ngaysinh',idmonhoc='$mamonhoc' WHERE magiaovien='$idsua' LIMIT 1")==1)
					{
                        echo 'Sửa thành công';
						header ('location:giaodienqtvcaptruong.php?id='.$mataikhoan.'&cn=1');
					}
					else
					{
						echo'Sửa không thành công';
					}
				}
				else
				{
					echo'Vui lòng chọn giáo viên cần sửa';
				}
				break;
			}
			case 'Quay về trang chủ':
			{
				header('location:index.php');	
                break;
			}
		}
        switch($_POST['nut'])
{
    case 'Thêm lớp':
        {
            $malop=$_REQUEST['malop'];
            $tenlop=$_REQUEST['tenlop'];
            $makhoi=$_REQUEST['makhoi'];
            
           
                if($malop && $tenlop && $makhoi  !='')
                {
                       if($m->themxoasua("INSERT INTO lophoc(malop,makhoi,tenlop) VALUES('$malop',' $makhoi', '$tenlop')")==1)
                    {
                        echo 'Thêm lớp thành công';
                        header('location:giaodienqtvcaptruong.php?id='.$mataikhoan.'&cn=3');
                    }
                    else
                    {
                        echo'Thêm lớp không thành công.';
                    }  
                }
                else 
                {
                   echo 'Vui lòng điền đầy đủ thông tin';
                }
                

            break;
             
        }
    case 'Xoá lớp':
            {
                
                $idxoa_lop=$_REQUEST['txtidlop'];
        if($idxoa_lop>0)
        {
            if($m->themxoasua("delete from lophoc where malop='$idxoa_lop' limit 1")==1)
            {
                
                header ('location:giaodienqtvcaptruong.php?id='.$mataikhoan.'&cn=3');
            }
            else
            {
                echo'Xoá không thành công. ';
            }
        }
        else
        {
            echo'vui lòng chọn lớp cần xoá';
        }
        break;
            }
    case 'Sửa lớp':
                {
                    
                    $idsua_lop=$_REQUEST['txtidlop'];
                    $malop=$_REQUEST['malop'];
                    $makhoi=$_REQUEST['makhoi'];
                    $tenlop=$_REQUEST['tenlop'];
                   
                    
                    if($idsua_lop>0)
                    {
                        if($m->themxoasua("UPDATE lophoc SET malop='$malop',makhoi='$makhoi',tenlop='$tenlop' WHERE malop='$idsua_lop' LIMIT 1")==1)
                        {
                            echo 'Sửa thành công';
                            header ('location:giaodienqtvcaptruong.php?id='.$mataikhoan.'&cn=3');
                        }
                        else
                        {
                            echo'Sửa không thành công';
                        }
                    }
                    else
                    {
                        echo'Vui lòng chọn lớp cần sửa';
                    }
                    break;
                }
}
                   switch($_GET['cn'])
                   {
                       case '1':
                        {
							
                            echo '<form action="" method="post" enctype="multipart/form-data" name="myfm" id="myfm">
                            <table width="800" border="1" align="center" cellpadding="5" cellspacing="0">
                              <tr>
                                <td colspan="2" align="center" valign="middle">QUẢN LÝ GIÁO VIÊN</td>
                              </tr>
                              <tr>
                                <td width="173" align="center" valign="middle">Mã giáo viên</td>
                                <td style="padding:10px" width="601" align="left" valign="middle">
                                <label for="magv"></label>
                                <input name="magv" type="text" id="magv" value="';echo $m->laycot("select magiaovien from giaovien where magiaovien='$layid' limit 1");echo'" />
                                <label for="txtid"></label>
                                <input name="txtid" type="hidden" id="txtid" value="'.$layid.'" /></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle">Địa chỉ</td>
                                <td style="padding:10px" align="left" valign="middle"><label for="diachi"></label>
                                <input name="diachi" type="text" id="diachi" value="';echo $m->laycot("select diachi from giaovien where magiaovien='$layid' limit 1");echo'" /></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle">Email</td>
                                <td style="padding:10px" align="left" valign="middle"><label for="email"></label>
                                <input name="email" type="email" id="email" value="';echo $m->laycot("select email from giaovien where magiaovien='$layid' limit 1");echo'" /></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle">Số điện thoại</td>
                                <td style="padding:10px" align="left" valign="middle"><label for="sdt"></label>
                                <input name="sdt" type="text" id="sdt" value="';echo $m->laycot("select sdt from giaovien where magiaovien='$layid' limit 1");echo'" /></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle">Họ đệm</td>
                                <td style="padding:10px" align="left" valign="middle"><label for="hodem"></label>
                                <input name="hodem" type="text" id="hodem" value="';echo $m->laycot("select hodem from giaovien where magiaovien='$layid' limit 1");echo'" /></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle">Tên</td>
                                <td style="padding:10px" align="left" valign="middle"><label for="ten"></label>
                                <input name="ten" type="text" id="ten" value="';echo $m->laycot("select tengiaovien from giaovien where magiaovien='$layid' limit 1");echo'" /></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle">Ngày sinh</td>
                                <td style="padding:10px" align="left" valign="middle"><label for="ngaysinh"></label>
                                <input name="ngaysinh" type="text" id="ngaysinh" value="';echo $m->laycot("select ngaysinh from giaovien where magiaovien='$layid' limit 1");echo'" /></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle">Mã môn học</td>
                                <td style="padding:10px" align="left" valign="middle"><label for="monhoc"></label>
                                <input name="monhoc" type="text" id="monhoc" value="';echo $m->laycot("select idmonhoc from giaovien where magiaovien='$layid' limit 1");echo'" /></td>
                              </tr>
                               <tr>
                                <td style="padding:10px" colspan="2" align="center" valign="middle"><label for="">
                                  <input type="submit" name="nut" id="nut" value="Thêm giáo viên" />
                                  <input type="submit" name="nut" id="nut" value="Xoá giáo viên" />
                                  <input type="submit" name="nut" id="nut" value="Sửa giáo viên" />
                                  <input type="reset" name="nut" id="nut" value="Hủy" />
                                  <input type="submit" name="nut" id="nut" value="Quay về trang chủ" />
                                </label></td>
                              </tr>
                            </table>';
                       
                
           
		
        }
        $m->load_ds_giaovien("select * from giaovien order by magiaovien asc");
        echo '</form>';
        break;
     
     case '3':
        {
            echo '<form action="" method="post" enctype="multipart/form-data" name="myfm" id="myfm">
                            <table width="800" border="1" align="center" cellpadding="5" cellspacing="0">
                              <tr>
                                <td colspan="2" align="center" valign="middle">QUẢN LÝ DANH SÁCH LỚP</td>
                              </tr>
                              <tr>
                                <td width="173" align="center" valign="middle">Khối(từ 6 đến 9)</td>
                                <td style="padding:10px" width="601" align="left" valign="middle">
                                <label for="makhoi"></label>
                                <input name="makhoi" type="number" min="6" max="9" id="makhoi" value="';echo $m->laycot("select makhoi from lophoc where malop='$layid_lop' limit 1");echo'" />
                                <label for="txtidlop"></label>
                                <input name="txtidlop" type="hidden" id="txtidlop" value="'.$layid_lop.'" /></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle">Mã lớp</td>
                                <td style="padding:10px" align="left" valign="middle"><label for="malop"></label>
                                <input name="malop" type="text" id="malop" value="';echo $m->laycot("select malop from lophoc where malop='$layid_lop' limit 1");echo'" /></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle">Tên lớp</td>
                                <td style="padding:10px" align="left" valign="middle"><label for="tenlop"></label>
                                <input name="tenlop" type="text" id="tenlop" value="';echo $m->laycot("select tenlop from lophoc where malop='$layid_lop' limit 1");echo'" /></td>
                              </tr>
                               <tr>
                                <td style="padding:10px" colspan="2" align="center" valign="middle"><label for="">
                                  <input type="submit" name="nut" id="nut" value="Thêm lớp" />
                                  <input type="submit" name="nut" id="nut" value="Xoá lớp" />
                                  <input type="submit" name="nut" id="nut" value="Sửa lớp" />
                                  <input type="reset" name="nut" id="nut" value="Hủy" />
                                  <input type="submit" name="nut" id="nut" value="Quay về trang chủ" />
                                </label></td>
                              </tr>
                            </table>';

}
 $m->load_ds_lop("select * from lophoc order by makhoi asc");
                     echo '</form>';
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