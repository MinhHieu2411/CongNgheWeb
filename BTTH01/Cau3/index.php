
<?php
// Đường dẫn tới file CSV
$filename = "students.csv";

// Mảng chứa dữ liệu sinh viên
$sinhvien = [];
// sửa lỗi đọc trường id file csv có kí tự lạ
$fileContents = file_get_contents($filename);
$fileContents = preg_replace('/^\xEF\xBB\xBF/', '', $fileContents);
file_put_contents($filename, $fileContents);

// Mở file CSV
if (($handle = fopen($filename, "r")) !== FALSE) {
    // Đọc dòng đầu tiên (tiêu đề)
    $headers = fgetcsv($handle, 1000, ",");

    // Đọc từng dòng dữ liệu
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $sinhvien[] = array_combine($headers, $data);
    }

    fclose($handle);
}

// In mảng sinh viên (chỉ để kiểm tra)
print_r($sinhvien);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Danh sách sinh viên</h1>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Họ</th>
                    <th>Tên</th>
                  <!--  <th>Ngày sinh</th> -->
                    <th>Lớp</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  foreach($sinhvien as $sv):?>
                  <tr>
                    <td><?= htmlspecialchars($sv['id'])?></td>
                    <td><?= htmlspecialchars($sv['lastname'])?></td>
                    <td><?= htmlspecialchars($sv['firstname'])?></td>
                    <td><?= htmlspecialchars($sv['city'])?></td>
                    <td><?= htmlspecialchars($sv['email'])?></td>
                  </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>