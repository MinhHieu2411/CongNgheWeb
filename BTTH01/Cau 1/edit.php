<?php
require 'flowers.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $index = $_POST['flowerIndex']; 
    $name = $_POST['flowerName'];
    $description = $_POST['flowerDes'];
    
    if (!empty($_FILES['fileToEdit']['name'])) {
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["fileToEdit"]["name"]);
        if (move_uploaded_file($_FILES["fileToEdit"]["tmp_name"], $target_file)) {
            $image = basename($_FILES["fileToEdit"]["name"]);
        } else {
            die("Lỗi upload file.");
        }
    } else {
        $image = $flowerList[$index]['image']; 
    }

    $flowerList[$index] = [
        "name" => $name,
        "description" => $description,
        "image" => $image,
    ];

    $content = "<?php\n\$flowerList = " . var_export($flowerList, true) . ";\n?>";
    file_put_contents('flowers.php', $content);

    header("Location: index.php");
    exit();
}
?>
