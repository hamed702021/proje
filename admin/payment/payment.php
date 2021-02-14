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
                <a class="nav-link text-white" href="#">پرداخت ها</a>
            </li>
        </ul>
    </nav>
</div>
<div class="card">
    <div class="container" style="direction: rtl">
        <h2 class="my-3">پرداخت ها</h2>
        <div class="row mt-2 " style="direction: rtl">
            <table style="border:1px solid #0055ff" class="table bg-dark text-white">
                <tr>
                    <td class="border">ردیف</td>
                    <td class="border">نام کاربر</td>
                    <td class="border">نام محصول</td>
                    <td class="border">تاریخ</td>
                    <td class="border">درگاه</td>
                    <td class="border">کد تخفیف</td>
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

                $sql="SELECT * FROM `payments`";

                if($result=$mySql->query($sql)){
                    while($row=$result->fetch_row()) {
                        $user="SELECT * FROM `users` WHERE ID=".$row[1];
                        $findUser= $mySql->query($user);
                        $rowUser=$findUser->fetch_row();
                        $user="SELECT * FROM `product` WHERE ID=".$row[2];
                        $findProduct= $mySql->query($user);
                        $rowProduct=$findProduct->fetch_row();
                        ?>
                        <tr>
                            <td class="border" ><?php echo $row[0] ?></td>
                            <td class="border" ><?php echo $rowUser[1].$rowUser[2] ?></td>
                            <td class="border" ><?php echo $rowProduct[1] ?></td>
                            <td class="border" ><?php echo $row[3] ?></td>
                            <td class="border" ><?php echo $row[4] ?></td>
                            <td class="border" ><?php echo $row[5] ?></td>
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



</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
