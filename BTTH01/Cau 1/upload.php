<?php

include 'flowers.php';


$target_dir = "images/";
$name = $_POST['name'];
$description = $_POST['des'];

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
echo "Tệp ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " đã được tải lên.";
$newflower = [
  'name' => $name, 'image' => $target_file, 'description' => $description
];
$flowerList[] = $newflower;

$fileContent = "<?php\n\$flowerList = " . var_export($flowerList, true) . ";\n?>";
file_put_contents('flowers.php', $fileContent);

header("Location: index.php");
} else {
echo "Lỗi, không tải được tệp.";
}

?>