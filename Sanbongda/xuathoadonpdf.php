<?php
require 'C:\xampp\htdocs\BaocaoWeb\fpdf186\fpdf.php';
  require_once "Connect.php";
  session_start();
  $taikhoanht = $_SESSION['hovaten'];
  class PDF extends FPDF
{
    // Hàm Header: Được gọi khi bắt đầu một trang mới
    function Header()
    {
        // Tiêu đề của trang PDF
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, 'Hóa Đơn Khách Hàng', 0, 1, 'C');
    }

    // Hàm Footer: Được gọi khi kết thúc một trang
    function Footer()
    {
        // Chèn số trang vào cuối trang PDF
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Trang ' . $this->PageNo(), 0, 0, 'C');
    }
}

 


// Kết nối cơ sở dữ liệu và truy vấn dữ liệu lịch sử đặt sân của khách hàng
      $query = "SELECT DISTINCT * from khachhang where Hovaten = '$taikhoanht'";
      $result = mysqli_query($conn, $query);
      if (isset($_POST['xuatpdf'])) {
        $pdf = new PDF('L');
        $pdf->AddPage();

// Thêm nội dung vào trang PDF
        $pdf->SetFont('Arial', '', 12);
        // Xuất dữ liệu vào bảng
        while ($row = $result->fetch_assoc()) {
            $pdf->Cell(20, 10, $row['Hovaten'], 0, 1);
            $pdf->Cell(40, 10, $row['SDT'], 0, 1);
            $pdf->Cell(40, 10, $row['Ngaydat'], 0, 1);
            $pdf->Cell(20, 10, $row['Thoigiandat'], 0, 1);
            $pdf->Cell(20, 10, $row['Giatien'], 0, 1);
            $pdf->Cell(40, 10, $row['Loaisan'], 0, 1);
            $pdf->Cell(20, 10, $row['Tensan'], 0, 1);
            $pdf->Cell(50, 10, $row['Pttt'], 0, 1);
            // Thêm các cột khác tùy theo cấu trúc của bảng trong cơ sở dữ liệu
            $pdf->Ln(); // Xuống dòng
        }
      
        // Xuất tệp PDF ra trình duyệt với tên file là example.pdf
        $pdf->Output('example.pdf', 'D');
      }
    ?>
