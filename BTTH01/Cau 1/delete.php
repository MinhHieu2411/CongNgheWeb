<?php
require 'flowers.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $index = $_POST['flowerIndex'];
    if (isset($flowerList[$index])) {
        unset($flowerList[$index]);

        $flowerList = array_values($flowerList);

        $content = "<?php\n\$flowerList = " . var_export($flowerList, true) . ";\n?>";
        file_put_contents('flowers.php', $content);

        header("Location: index.php");
        exit();
    } else {
        echo "Không thể xóa";
    }
}
?>
