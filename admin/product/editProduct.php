<?php
include '../config.php';
if(isset($_GET['idProduct']))
{
    $id = $_GET['idProduct'];
    $query = $connect->prepare("SELECT * FROM `product` WHERE ID=:id");
    $query->execute(array(':id' => $id));
    $row = $query->fetch();
    $name = $row['name'];
    $price= $row['price'];
    $image='../../img2/'.$row['img'];
}
?>
<!DOCTYPE html>
<html>
<heade>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style.css">
</heade>

<body>
<div class="header">
    <nav class="navbar navbar-expand-sm bg-success ">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" href="../product/product.php" >محصولات</a>
            </li>
            <li class="nav-item text-dark">
                <a class="nav-link text-white" href="../user/user.php">کاربران</a>
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
        <?php
        if (isset($_GET['error']))
            echo "<div class='alert alert-success my-3'>عکس محصول را انتخاب کنید</div>";
        ?>
        <form method="post" action="updateProduct.php" enctype="multipart/form-data">
            <div class="card-header">
                <h3>ویرایش محصول</h3>
            </div>
            <div class="card-body">
                <div class="ml-1">
                    <label for="name">نام محصول</label>
                    <input name="name" type="text" value="<?=$name ?>">
                </div>
                <div class="mr-4">
                    <label for="price">قیمت</label>
                    <input type="number" name="price" value="<?= $price ?>">
                </div>
                <div class="mt-4 mr-5 ">
                    <label for="image">تصویر محصول</label>
                    <input name="image" type="file" value="<?= $image ?>">
                </div>
                <div>
                    <input name="id" type="hidden" value="<?= $id ?>">
                    <button type="submit" name="editProduct" class="btn btn-primary">ویرایش محصول</button>
                </div>
            </div>
        </form>

    </div>
</div>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

