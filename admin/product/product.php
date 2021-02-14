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
    <nav class="navbar navbar-expand-sm bg-success ">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" href="#">محصولات</a>
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
<div class="card">
    <h2 class="my-3">مدیریت محصولات</h2>
    <div class="container" style="direction: rtl">
        <?php
        if (isset($_GET['deleteProduct']))
            echo "<div class='alert alert-success my-3'>اطلاعات با موفقیت حذف گردید</div>";
        if (isset($_GET['submit']))
            echo "<div class='alert alert-success my-3'>محصول با موفقیت ثبت گردید</div>";
        if (isset($_GET['edit']))
            echo "<div class='alert alert-success my-3'>محصول با موفقیت ویرایش شد</div>";
        ?>
        <div class="row " style="direction: rtl">
            <a class="btn btn-success  " href="insertProduct.php">
                ثبت محصول جدید
            </a>
            <table style="border:1px solid #0055ff" class="table bg-dark text-white">
                <tr>
                    <td class="border">ردیف</td>
                    <td class="border">نام</td>
                    <td class="border">قیمت</td>
                    <td class="border">تصویر</td>
                    <td class="border">ابزار</td>
                </tr>
                <?php
                $host = 'localhost';
                $user = 'root';
                $pass = "";
                $db = 'fft-db';
                $mySql = new mysqli($host, $user, $pass, $db);

                if ($mySql->connect_errno) {
                    echo "error in connect " . $mySql->connect_error;
                    exit();
                }

                $sql = "SELECT * FROM `product`";

                if ($result = $mySql->query($sql)) {
                    while ($row = $result->fetch_row()) {
                        ?>
                        <tr>
                            <td class="border"><?php echo $row[0] ?></td>
                            <td class="border"><?php echo $row[1] ?></td>
                            <td class="border"><?php echo $row[2] ?></td>
                            <td class="border"><img src="../../img2/<?php echo $row[3]; ?> " class="mt-0"
                                     style="width: 100px;height: 50px ; "></td>
                            <td class="border"><a class="text-white" href="deleteProduct.php?idProduct=<?php echo $row[0] ?>">حذف</a> |
                                <a class="text-white" href="editProduct.php?idProduct=<?php echo $row[0] ?>">ویرایش</a>
                            </td>
                        </tr>
                        <?php
                    }
                    $result->free_result();
                }
                ?>

            </table>
            <?php
            $mySql->close();
            ?>

        </div>
    </div>

</div>
<br>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
