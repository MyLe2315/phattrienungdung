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
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAPPYBOOK</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <!-- Latest compiled and minified CSS -->

    <!-- Optional theme -->

    <!-- Latest compiled and minified JavaScript -->
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
        <div class="container">
            <div class="row border">
                <div class="col-3 border-right" style="height:477px;">

                    <input type="submit" class="btn btn-primary btn-block" role="button" data-bs-toggle="button" aria-pressed="true" style="font-size: 16px;" value="<?php echo $row['tentaikhoan'] ?>">
                    <br>
                    <br>
                    <a href="" class="btn btn-primary active btn-block" role="button" data-bs-toggle="button" aria-pressed="true" style="font-size: 16px;">
                        <p>Làm bài kiểm tra</p>
                    </a>
                    <a href="" class="btn btn-primary btn-block" role="button" data-bs-toggle="button" style="font-size: 16px;">
                        <p>Xem điểm</p>
                    </a>
                    <a href="" class="btn btn-primary btn-block" role="button" data-bs-toggle="button">
                        <p>Tạo bài kiểm tra</p>
                    </a>
                    <a href="" class="btn btn-primary btn-block" role="button" data-bs-toggle="button" >
                        <p>Nộp bài kiểm tra</p>
                    </a>
                    <a href="" class="btn btn-primary btn-block" role="button" data-bs-toggle="button" style=" font-size: 16px;">
                        <p></p>Xem đánh giá
                    </a>
                    <form action="" method="post" class="mt-4">
                        <div class="form-group">
                            <input type="submit" name="button" class="btn btn-primary btn-block" id="button" style="font-size: 15px;" value="Đăng xuất">
                        </div>

                    </form>
                </div>

                <div class="col-9 border">
                    <div class="container">
                        <div class="row border-bottom ">
                            <div class="col-5 ">
                            <div class="panel-he ading text-primary">
                                   <h5 style="margin-top: 5px;"> Đề thi: Tin học lớp 8</h5>  
                                   <p>Số câu 20 câu</p>
                                   <p>Thời gian: 30p</p>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="text-primary">
                                   <p style="margin-top: 5px;">Làm bài xong Reload, F5 để thoát khỏi bài làm </p>
                                   <p>Chúc các bạn thi tốt</p>
                                </div>
                            </div>
                            
                            <div class="panel panel-primary">
                               
                               
                        </div>


                        <div class="panel-group">
                        <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-12 text-left">
                                            <button type="button" name="button" class="btn btn-success" style="font-size: 15px;" id="btnStart">Bắt đầu</button>
                                        </div>
                                    </div>
                                    <div id="questions"> </div>
                                    <div class="row">
                                        <div class="col-sm-12 text-center">
                                            <button type="button" class="btn btn-warning" id="btnFinish" style="font-size: 15px;">Kết thúc bài thi</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 text-center">
                                            <h4 id='mark' class="text-info"></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>




                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('#btnFinish').hide();
                        });
                        var questions; //biến toàn cục để lưu danh sách câu hỏi
                        $('#btnStart').click(function() {
                            GetQuestions();
                            $('#btnFinish').show();
                            $(this).hide();
                        });

                        $('#btnFinish').click(function() {
                            $(this).hide();
                            $('#btnStart').show();
                            CheckResult();
                        });

                        function CheckResult() {
                            let mark = 0;
                            $('#questions div.row').each(function(k, v) {
                                //bước 1: lấy đáp án đúng của câu hỏi
                                let id = $(v).find('h5').attr('id');
                                let question = questions.find(x => x.id == id); //tìm câu hỏi trong mảng questions dựa vào id đã có ở trên
                                let answer = question['answer']; //lấy đáp án đúng của câu hỏi


                                //bước 2: lấy đáp án của người dùng ~ thằng radio được check
                                let choice = $(v).find('fieldset input[type="radio"]:checked').attr('class');

                                if (choice == answer) {
                                    mark += 0.5; //mỗi câu đúng được cộng 2 điểm
                                } else {
                                    console.log('Câu có id: ' + id + ' sai');
                                }

                                //bước 3: đánh dấu đáp án đúng để người dùng đối chiếu

                                $('#question_' + id + ' > fieldset > div > label.' + answer).css("background-color", "yellow");

                            });

                            $('#mark').text('Điểm của bạn là: ' + mark);
                        }

                        function GetQuestions() {
                            $.ajax({
                                url: 'questions.php',
                                type: 'get',
                                success: function(data) {
                                    questions = jQuery.parseJSON(data);
                                    let index = 1;
                                    let d = '';
                                    $.each(questions, function(k, v) {
                                        d += '<div class="row" style = "margin-left:10px;" id="question_' + v['id'] + '"> ';
                                        d += '<h5 style="font-weight:bold;" id="' + v['id'] + '"> <span class="text-danger">Câu ' + index + ': </span>' + v['question'] + '</h5>';

                                        d += '<fieldset>';
                                        d += '<div class="radio col-md-12 ">';
                                        d += '<label class = "A"><input type="radio" class="A" name = "' + v['id'] + '"><span class="text-danger">A: </span>' + v['option_a'] + '</label>';
                                        d += '</div>';

                                        d += ' <div class="radio col-md-12">';
                                        d += '<label class = "B"><input type="radio" class="B" name = "' + v['id'] + '"><span class="text-danger">B: </span>' + v['option_b'] + '</label>';
                                        d += '</div>';

                                        d += '<div class="radio  col-md-12">';
                                        d += '<label class = "C"><input type="radio"  class="C" name = "' + v['id'] + '"><span class="text-danger">C: </span>' + v['option_c'] + '</label>';
                                        d += '</div>';

                                        d += '<div class="radio col-md-12">';
                                        d += '<label class = "D"><input type="radio" class="D" name = "' + v['id'] + '"><span class="text-danger">D: </span>' + v['option_d'] + '</label>';
                                        d += '</div>';
                                        d += '</fieldset>';
                                        d += '</div>';
                                        index++;
                                    });
                                    $('#questions').html(d);
                                }
                            });
                        }
                    </script>




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