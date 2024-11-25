<?php
// Kết nối cơ sở dữ liệu
include 'db_connect.php';

// Kiểm tra nếu có dữ liệu từ form gửi đến
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy giá trị từ form
    $name = $_POST['name'];
    $price = $_POST['price'];
    $id = rand(0,999);

    // Kiểm tra nếu tên và giá không rỗng
    if (!empty($name) && !empty($price)) {
        // Truy vấn SQL để thêm sản phẩm vào bảng 'product'
        $sql = "INSERT INTO product (name, price, id) VALUES ('$name', '$price', '$id')";

        // Thực hiện truy vấn và kiểm tra nếu thành công
        if ($conection->query($sql) === TRUE) {
            echo "Sản phẩm đã được thêm thành công!";
            // Chuyển hướng về trang chính (index.php) sau khi thêm sản phẩm thành công
            header("Location: index.php");
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conection->error;
        }
    } else {
        echo "Vui lòng điền đầy đủ thông tin sản phẩm!";
    }
}

// Đóng kết nối
$conn->close();
?>
