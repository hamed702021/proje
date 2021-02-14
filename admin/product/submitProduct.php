<?php
include '../config.php';
if (isset($_POST['insertProduct'])) {
    $imageName = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    $type = $_FILES['image']['type'];

    if (is_uploaded_file($tmp)) {
        $hash = time() . rand(100, 999) . $imageName;
        $location = "../../img2/" . $hash;
        $move = move_uploaded_file($tmp, $location);
        if ($move) {
            $query = "INSERT INTO `product` (`ID`, `name`, `price`, `img`) VALUES (NULL, ?, ?,?);";
            $insert = $connect->prepare($query);
            $insert->bindValue(1, $_POST['name']);
            $insert->bindValue(2, $_POST['price']);
            $insert->bindValue(3, $hash);
            $insert->execute();
            if ($insert) {
                header("location:product.php?submit=123");
                exit();
            }
        }
    }
    else {
        header("location:insertProduct.php?error=1222");
        exit();
    }
}
