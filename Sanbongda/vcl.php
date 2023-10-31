<?php
  require 'C:\xampp\htdocs\BaocaoWeb\fpdf186\fpdf.php';
  require_once "Connect.php";
  session_start();
  $error = '';
  $tenkh = '';
  $sdt = '';
  $ngaydat = '';
  $thoigianbd = '';
  $thoigiankt = '';
  $giatien = '';
  $loaisan = '';
  $tensan = '';
  $pttt = '';
  $sussess = '';
  $thoigiandat = '';

  if (isset($_POST['tenkh']) && isset($_POST['sdt']) && isset($_POST['tensan']) && isset($_POST['thoigianbd']) && isset($_POST['thoigiankt'])
    && isset($_POST['loaisan']) && isset($_POST['ngaydat']) && isset($_POST['thoigiandat']) && isset($_POST['giatien']) && isset($_POST['pttt']))
    {
        $tenkh = $_POST['tenkh'];

        $sdt = $_POST['sdt'];
        $ngaydat = $_POST['ngaydat'];
        $thoigiandat = $_POST['thoigiandat'];
        $giatien = $_POST['giatien'];
        $pttt = $_POST['pttt'];
        $loaisan = $_POST['loaisan'];
        $tensan = $_POST['tensan'];
        $thoigianbd = $_POST['thoigianbd'];
        $thoigiankt = $_POST['thoigiankt'];
        

        if (empty($tenkh)) {
            $error = 'Vui lòng nhập tên của khách hàng';
        }
        else if (empty($sdt)) {
            $error = 'Vui lòng nhập số điện thoại';
        }
        else if (empty($tensan)) {
            $error = 'Vui lòng chọn tên sân';
        }
        else if (empty($thoigianbd)) {
          $error = 'Vui lòng nhập thời gian bắt đầu';
        }
        else if (empty($thoigiankt)) {
          $error = 'Vui lòng nhập thời gian kết thúc';
        }
        else if (empty($loaisan)) {
          $error = 'Vui lòng chọn loại sân';
        }
        else if (empty($ngaydat)) {
            $error = 'Vui lòng chọn ngày đặt';
        }
        
        else if (empty($giatien)) {
            $error = 'Vui lòng nhập giá tiền';
        }
        else{
          $sqlselect = "SELECT * FROM khachhang ";
          $result = mysqli_query($conn, $sqlselect);
          if (mysqli_num_rows($result) <= 0) {
            
            $sql = "INSERT INTO khachhang values ('$tenkh', '$sdt', '$tensan', '$loaisan', '$ngaydat', '$thoigianbd', '$thoigiankt' ,'$giatien', '$pttt')";
            if ($conn->query($sql) === true) {
              $_SESSION['tenkh'] = $tenkh;
              $sussess = 'Thêm hóa đơn mới thành công!';
            }
            else{
              $error = 'Thêm hóa đơn mới thất bại!';
            }
          }
          else{
            $sqlupdate = "UPDATE khachhang SET Tensan = '$tensan',Loaisan = '$loaisan',Ngaydat = '$ngaydat' ,Thoigianbd = '$thoigianbd', Thoigiankt = '$thoigiankt' ,Giatien = '$giatien' , Pttt = '$pttt'  where Tenkh = '$tenkh'";
            if ($conn->query($sqlupdate) === true) {
              $_SESSION['tenkh'] = $tenkh;
              $sussess = 'Cập nhật hóa đơn thành công!';
            }
            else{
              $error = 'cập nhật hóa đơn thất bại!';
            }
          }
    }
  }
  
  

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Thanh toán hóa đơn.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="styleTrangChu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
      background-color: #E8E8E8;
    }
  </style>
  </head>

  <body >
  <script>
        const accountDropdown = document.getElementById("accountDropdown");
        const dropdownMenu = document.querySelector(".dropdown-menu");

        accountDropdown.addEventListener("click", (event) => {
        event.preventDefault();
        dropdownMenu.classList.toggle("show");
        });

    </script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" >
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="TrangChuAdmin.php"><i class="fas fa-home"></i> Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="listsanAdmin.php"><i class="fas fa-futbol"></i> Quản lý sân bóng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="lichdatsan.php"><i class="fas fa-calendar-alt"></i> Lịch đặt sân</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.facebook.com/profile.php?id=100092591802235"><i class="fas fa-envelope"></i> Liên hệ</a>
                        </li>
                    </ul>
                    
                </div>
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle " href="#" role="button" id="accountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i> Tài Khoản
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                        <li><a class="dropdown-item" href="QuanLyTaiKhoanAdmin.php"><i class="fas fa-user-circle"></i> Thông tin người dùng</a></li>
                        <li><a class="dropdown-item" href="resetpass.php"><i class="fas fa-key"></i> Đổi mật khẩu</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
                    </ul>
                    </div>
            </div>
        </nav>
  
        <header class="text-center py-2 image-sandau" style="padding-top: 20px;">
        <div class="container" style="padding-top: 70px;">
            <h1 class="text-white text-shadow" style="font-size: 50px;">WEBSITE ADMIN</h1>

        </div>
    </header>
        
    <div class="container mt-4" style="padding-top: 30px">
    
      <h2 class="text-center mb-4" style="font-size: 50px; ">Tạo Hóa Đơn</h2>
      
      <form  method="post" action="ThanhtoanTT.php" novalidate>
      <div class="row">
      <div class="col-md-3">
        <h4 class="mb-3">Thông tin khách hàng</h4>
          <div class=" mb-4">
            <label for="user" class="form-label">Tên của khách hàng</label>
            <input value="<?= $tenkh?>" name="tenkh" type="text" class="form-control" id="tenkh" required>
          </div>
          <div class=" mb-6">
            <label for="sdt" class="form-label">Số điện thoại:</label>
            <input value="<?= $sdt?>" name="sdt" type="tel" class="form-control" id="sdt" pattern="[0-9]{10}" required>
          </div>
      </div>
      <div class="col-md-8">
        <div class="row">
        <h4 class="mb-3">Thông tin đơn đặt hàng</h4>
        <table class="table">
          <thead>
            <tr>
              <th style="text-align:center;" scope="col">Tên sân</th>
              <th style="text-align:center;" scope="col">Loại sân</th>
              <th style="text-align:center;" scope="col">Ngày đặt</th>
              <th style="text-align:center;" scope="col">Thời gian bắt đầu</th>
              <th style="text-align:center;" scope="col">Thời gian kết thúc</th>
              <th style="text-align:center;" scope="col">Giá tiền</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="text-align:center;">
                  <div >
                    <select class="form-control" id="tensan" name="tensan" value="<?= $tensan?>">
                    <?php $tensan2 = "SELECT Tensan from danhsachsan"; 
                          $result2 = mysqli_query($conn, $tensan2);
                    ?>
                      <?php if(mysqli_num_rows($result2) > 0) {
                          while ($row = mysqli_fetch_assoc($result2)) { ?>
                              <option ><?php echo $row['Tensan']; ?></option>
                      <?php } 
                          }
                          ?>    
                  </select>
                </div>
              </td>
              <td style="text-align:center;">
                <div>
                <select class="form-control" id="loaisan" name="loaisan" value="<?= $loaisan?>">
                    <?php $loaisan2 = "SELECT DISTINCT Loaisan from danhsachsan"; 
                          $result1 = mysqli_query($conn, $loaisan2);
                    ?>
                      <?php if(mysqli_num_rows($result1) > 0) {
                          while ($row = mysqli_fetch_assoc($result1)) { ?>
                              <option ><?php echo $row['Loaisan']; ?></option>
                      <?php } 
                          }
                          ?>    
                  </select>
                </div>
              </td>
              <td style="text-align:center;">
                <div>
                  <input value="<?= $ngaydat?>" name="ngaydat" type="date" class="form-control" id="ngaydat" required>
                </div>
              </td>
              <td style="text-align:center;">
                <div>
                  <input value="<?= $thoigianbd?>" name="thoigianbd" type="time" class="form-control" id="thoigianbd">
                </div>
              </td>
              <td style="text-align:center;">
                <div>
                  <input value="<?= $thoigiankt?>" name="thoigiankt" type="time" class="form-control" id="thoigiankt">
                </div>
              </td>
              <td style="text-align:center;">
                <div>
                  <input value="<?= $giatien?>" name="giatien" type="text" class="form-control" id="giatien">
                </div>
              </td>
            </tr>
          </tbody>
        </table>  
          
          
        </div>
        
        <div class="mb-3">
          <label for="pttt" class="form-label">Phương thức thanh toán:</label>
          <select class="form-control" id="pttt" name="pttt" value="<?= $pttt?>">
              <option >Thanh toán trực tiếp</option>
              <option >Thanh toán trực tuyến</option>
            </select>
        </div>
        <div class="text-center">
          <?php
            if (!empty($error)) {
               echo "<div class='alert alert-danger'>$error</div>";
            }
            else if(!empty($sussess)){
              echo "<div class='alert alert-success'>$sussess</div>"; 
            }
          ?>
          <button class="btn btn-primary">Lưu Hóa đơn</button>
          <a href="xemhoadon.php" class="btn btn-primary">Xem hóa đơn</a>
        </div>
        
        </div>
      </form>
      
    </div>
   
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-DUTJkclRpVGKp5TnycGd3mk+6eRoD9Kym2eX48sNr5FV9KVZP5oAM8p0m17ITs/e" crossorigin="anonymous"></script>
    
  </body>
</html>







