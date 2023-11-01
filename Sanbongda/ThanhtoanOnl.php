<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán Online</title>
    <!-- Link tới Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Thanh Toán qua Mã QR MoMo</h2>
                <img src="images/Momo.jpg" class="img-fluid" alt="QR Momo">
            </div>
            <div class="col-md-6">
                <h2>QR Ngân hàng</h2>
                <img src="images/vcb.jpg" class="img-fluid" alt="QR Ngân Hàng">
                <div id="paragraph">
                    <h4>1038922451</h4>
                </div>
                <button class="btn btn-primary" onclick="copyParagraph()">Copy SỐ TÀI KHOẢN NGÂN HÀNG</button>
            </div>
    <script>
        function copyParagraph() {
            // Lấy nội dung của đoạn văn bản
            var paragraph = document.getElementById("paragraph");
            var text = paragraph.textContent || paragraph.innerText;

            // Tạo một thẻ textarea ẩn để chứa nội dung cần copy
            var textarea = document.createElement("textarea");
            textarea.value = text;
            document.body.appendChild(textarea);

            // Chọn và copy nội dung trong thẻ textarea
            textarea.select();
            document.execCommand("copy");

            // Xóa thẻ textarea sau khi đã copy xong
            document.body.removeChild(textarea);

            // Thông báo cho người dùng biết rằng nội dung đã được copy
            alert("Đã copy SỐ TÀI KHOẢN NGÂN HÀNG!");
        }
    </script>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
