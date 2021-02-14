<?php
include '../config.php';
if(isset($_POST['editProduct']))
{
    $imageName=$_FILES['image']['name'];
    $tmp=$_FILES['image']['tmp_name'];
    $type=$_FILES['image']['type'];

    if(is_uploaded_file($tmp))
    {
        $hash=time().rand(100,999).$imageName;
        $location="../../img2/".$hash;
        $move=move_uploaded_file($tmp,$location);
        if($move)
        {
            $query="UPDATE `product` SET `name` = ?, `price` =?, `img` = ? WHERE `product`.`ID` = ?;";
            $insert=$connect->prepare($query);
            $insert->bindValue(1,$_POST['name']);
            $insert->bindValue(2,$_POST['price']);
            $insert->bindValue(3,$hash);
            $insert->bindValue(4,$_POST['id']);

            $insert->execute();
            if($insert)
            {
                header("location:product.php?edit=123");
                exit();
            }
        }
    }
    else {
        header("location:insertProduct.php?error=1222");
        exit();
    }
}
