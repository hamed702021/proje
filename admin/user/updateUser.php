<?php
include '../config.php';
if(isset($_POST['editUser']))
{

    $query="UPDATE `users` SET `firstname` = ?, `lastname` =?, `phonenumber` = ? WHERE `users`.`ID` = ?;";
            $insert=$connect->prepare($query);
            $insert->bindValue(1,$_POST['name']);
            $insert->bindValue(2,$_POST['family']);
            $insert->bindValue(3,$_POST['phone']);
            $insert->bindValue(4,$_POST['id']);
            $insert->execute();

            if($insert)
            {
                header("location:user.php?edit=123");
                exit();
            }

}
