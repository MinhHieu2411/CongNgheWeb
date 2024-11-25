<?php
// Kết nối cơ sở dữ liệu
$conn = new mysqli("localhost", "root", "", "crud_test");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Kiểm tra nếu có dữ liệu từ form
if (isset($_POST['product_id']) && isset($_POST['name']) && isset($_POST['price'])) {
    // Lấy dữ liệu từ form
    $productId = $_POST['product_id'];
    $productName = $_POST['name'];
    $productPrice = $_POST['price'];

    // Chuẩn bị câu lệnh SQL với placeholders
    $stmt = $conn->prepare("UPDATE product SET name = $productName, price = $productPrice WHERE id = $productId");
    
    // Gắn giá trị vào placeholders (kiểu dữ liệu 's' cho string và 'd' cho double)
    $stmt->bind_param("sdi", $productName, $productPrice, $productId);

    // Thực thi câu lệnh SQL
    if ($stmt->execute()) {
        // Nếu cập nhật thành công, chuyển hướng đến trang danh sách sản phẩm
        header("Location: index.php");
        exit;
    } else {
        echo "Cập nhật sản phẩm không thành công: " . $stmt->error;
    }

    // Đóng statement
    $stmt->close();
} else {
    echo "Dữ liệu không hợp lệ.";
}

// Đóng kết nối
$conn->close();
?>
