<?php

$conn = mysqli_connect("localhost", "root", "", "crud_test");
// Kiểm tra nếu có POST request và có product_id
if (isset($_POST['product_id'])) {
    // Lấy ID sản phẩm
    $product_id = $_POST['product_id'];

    // Xóa sản phẩm khỏi cơ sở dữ liệu
    $query = "DELETE FROM product WHERE id = $product_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: product_list.php");
        exit;
    } else {
        echo "Xóa sản phẩm không thành công.";
    }
}
?>
