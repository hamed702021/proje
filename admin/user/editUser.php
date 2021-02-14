<?php
include '../config.php';
if(isset($_GET['idUser']))
{
    $id = $_GET['idUser'];
    $query = $connect->prepare("SELECT * FROM `users` WHERE ID=:id");
    $query->execute(array(':id' => $id));
    $row = $query->fetch();
    $name = $row['firstname'];
    $family= $row['lastname'];
    $phone=$row['phonenumber'];
}
?>
<!DOCTYPE html>
<html>
<header>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style.css">
</header>

<body>
<div class="header">
    <nav class="navbar navbar-expand-sm bg-success  ">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" href="../product/product.php" >محصولات</a>
            </li>
            <li class="nav-item text-dark">
                <a class="nav-link text-white" href="#">کاربران</a>
            </li>
            <li class="nav-item text-dark">
                <a class="nav-link text-white" href="../payment/payment.php">پرداخت ها</a>
            </li>
        </ul>
    </nav>
</div>
<br>
<div class="container mt-5">
    <div class="card">
        <form method="post" action="updateUser.php" enctype="multipart/form-data">
            <div class="card-header alert-success">
                <h3>ویرایش کاربر</h3>
            </div>
            <div class="card-body">
                <div class="mr-5" >
                    <label for="name">نام</label>
                    <input name="name" type="text" value="<?=$name ?>">
                </div>
                <div>
                    <label for="price">نام خانوادگی</label>
                    <input type="text" name="family" value="<?= $family ?>">
                </div>
                <div>
                    <label for="phone">شماره تماس</label>
                    <input type="number" name="phone" value="<?= $phone ?>">
                </div>
                <div>
                    <input name="id" type="hidden" value="<?= $id ?>">
                    <button type="submit" name="editUser" class="btn btn-success mt-3 mr-5">ویرایش کاربر</button>
                </div>
            </div>
        </form>

    </div>
</div>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

