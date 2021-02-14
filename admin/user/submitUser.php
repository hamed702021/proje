<?php
include '../config.php';
if (isset($_POST['insertUser'])) {
    $query = "INSERT INTO `users` (`ID`, `firstname`, `lastname`, `phonenumber`) VALUES (NULL, ?, ?,?);";
    $insert = $connect->prepare($query);
    $insert->bindValue(1, $_POST['name']);
    $insert->bindValue(2, $_POST['family']);
    $insert->bindValue(3, $_POST['phone']);
    $insert->execute();
    if ($insert) {
        header("location:user.php?submit=123");
        exit();
    }

}
