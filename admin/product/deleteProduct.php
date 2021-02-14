<?php
include "../config.php";
if(isset($_GET['idProduct']))
{
    $query= "DELETE FROM `product` WHERE `ID` = ?";
    $delete=$connect->prepare($query);
    $delete->bindValue(1,$_GET['idProduct']);
    $delete->execute();
    if($delete)
    {
        header('location:product.php?deleteProduct=222551');
        exit();
    }
}

else
{
header('location:product.php');
exit();
}
