<?php
include "../config.php";
if(isset($_GET['idUser']))
{
    $query= "DELETE FROM `users` WHERE `ID` = ?";
    $delete=$connect->prepare($query);
    $delete->bindValue(1,$_GET['idUser']);
    $delete->execute();

    if($delete)
    {
        header('location:User.php?deleteUser=223');
        exit();
    }
}

else
{
header('location:user.php');
exit();
}
