<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lại mật khẩu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
    require_once "Connect.php";
    // require_once "./send_mail.php";

    $error = '';
    $user = '';
    $oldpass = '';
    $pass = '';
    $pass_confirm = '';

    if (isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['pass_confirm']) && isset($_POST['oldpass']))
    {

        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $oldpass = $_POST['oldpass'];
        $pass_confirm = $_POST['pass_confirm'];


        if (empty($user)) {
            $error = 'Vui lòng nhập tên tài khoản';
        }
        else if (empty($oldpass)) {
            $error = 'Vui lòng nhập mật khẩu hiện tại';
        }
        else if (empty($pass)) {
            $error = 'Vui lòng nhập mật khẩu mới';
        }
        else if (strlen($pass) < 6) {
            $error = 'Bạn phải có ít nhất 6 ký tự';
        }
        else if ($pass != $pass_confirm) {
            $error = 'Mật khẩu mới không khớp';
        }
        else {
            // register a new account
            $sql ="select * from taikhoan where TenDN ='$user' and MatKhau = '$oldpass'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $sqlinsert = "UPDATE taikhoan SET MatKhau = '$pass' where TenDN ='$user'";
                if ($conn->query($sqlinsert) === true) {
                    header('Location: SanbongdaTiTeo.php');
                    exit();
                }
                else{
                    $error ='Đổi mật khẩu thất bại';
                }
            }
            else {     
                $error ='Tên đăng nhập ';
            }

        }
    }
?>

    <!---main-->
    <form method="post" action="">
            <div class="container d-flex justify-content-center align-items-center min-vh-100" style="border-radius: 5%s;">

        <!--Login-->
            <div class="row border rounder-5 p-3 bg-white shadow box-area ">

        <!--Left box-->
                <div class="col-md-6 rounder-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: rgb(19, 19, 19);">
                    <div class="featured-image mb-3">
                        <img src="images/cc.jpg" class="img-fluid" style="width: 250px;">
                    </div>
                    <!-- <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Be verified</p>
                    <small class="text-white text-wrap text-center" style= "width: 17rem;font-family: 'Courier New', Courier, monospace;">cc</small> -->
                </div>
        <!--right box-->
                <div class="col-md-6 right-box">
                    <div class="row align-items-center">
                        <div class="header-text mb-4">
                            <h2 style="font-family: 'Roboto', sans-serif; font-size: 40px">Đổi mật khẩu</h2>                           
                        </div>
                        
                    </div>
                    <div class="input-group mb-3">
                        <input value="<?= $user ?>" name="user" id="user" type="text" class="form-control form-control-lg bg-light fs-6"  placeholder="Tên đăng nhập">
                    </div>
                    <div class="input-group mb-3">
                        <input value="<?= $oldpass?>" name="oldpass" required class="form-control" id="oldpass" type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Mật khẩu cũ">
                    </div>
                    <div class="input-group mb-3">
                        <input value="<?= $pass?>" name="pass" required class="form-control" id="pass" type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Mật khẩu mới">
                    </div>
                    <div class="input-group mb-3">
                        <input value="<?= $pass_confirm?>" name="pass_confirm" required class="form-control" id="pass_confirm" type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Nhập lại mật khẩu">
                    </div>
                    
                    <div class="input-group mb-3">
                        <?php
                            if (!empty($error)) {
                                echo "<div class='alert alert-danger'>$error</div>";
                            }
                        ?>
                        <button class="btn btn-lg btn-primary w-100 fs-6" >Đổi mật khẩu</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
</body>
</html>