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
    <nav class="navbar navbar-expand-sm bg-success">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" href="#" >محصولات</a>
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
      <form method="post" action="submitProduct.php" enctype="multipart/form-data">
          <div class="card-header">
              <h3>ثبت محصول جدید</h3>
          </div>
          <div class="card-body">
              <div class="ml-1">
                  <label for="name">نام محصول</label>
                  <input name="name" type="text">
              </div>
              <div class="mr-4">
                  <label for="price">قیمت</label>
                  <input type="number" name="price">
              </div>
              <div class="mt-4 mr-5 ">
                  <label for="image">تصویر محصول</label>
                  <input name="image" type="file">
              </div>
              <div>
                  <button type="submit" name="insertProduct" class="btn btn-success">ثبت محصول</button>
              </div>
          </div>
      </form>

  </div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

