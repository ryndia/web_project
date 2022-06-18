<?php
  session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet"> 
        <!--Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link href="cart.css" rel="stylesheet">
    </head>
    <?php 
            if(isset($_SESSION['loginName'])){
                include_once("navbar_Member.php");
            }
            else
            {
                include_once("navbar.php");
            }
            include_once "header.php";
        ?>
    <body>

        <div class="container-fluid back_cart">
            <div class="row">
            <div class="col-8">
        <?php
                require_once "db_connect.php";
                if(isset($_SESSION['loginName']))
                {
                    $sql = 'SELECT product_Image,prod_desc,price,Qty FROM cart c join cart_item ci on c.cartID = ci.cartID join product p on p.productID = ci.productID WHERE c.custID = :custId';
                    $prep = $conn->prepare($sql);
                    $prep->bindParam(':custId', $_SESSION['custID']);
                    $row_num = $prep->execute();
                    $result = $prep->fetchAll();
                    $total = 0;
                    foreach ($result as $row) {
                        $total = $total + ((int)$row['price'] * $row['Qty']);
        ?>
                        <div class="row">
                            <div class=" mx-2 my-4 py-4 bg-dark d-flex cart_product_holder">
                                <img src="<?php echo $row['product_Image']; ?>" class = " col-3 product_cart_image">
                                <div class="col-9">
                                    <div class="row align-items-center pt-5">
                                        <h3 class="text-light ps-3"><?php echo $row['prod_desc'];?></h3>
                                    </div>
                                    <div class="d-flex align">
                                        <h4 class="text-light ps-2 col">Price: $<?php echo $row['price'];?></h4>
                                        <h4 class="text-light col ps-5">Quantity: <?php echo $row['Qty'];?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
        <?php
                    }
                }
                else{
        ?>
            <div class="row">
                <div class=" mx-2 my-4 py-4 bg-dark d-flex cart_product_holder">
                    <div class="col-9">
                        <div class="row align-items-center ">
                            <h3 class="text-light ps-3">No Product Added</h3>
                        </div>
                    </div>
                </div>
            </div>
        <?php
                }
        ?>
</div>
            <div class="col-4">
                <div class="mx-2 my-4 px-4">
                <div class="bg-dark cart_product_holder row">
                    <h2 class="text-light pt-3"><center>Order Summary</center></h2>
                    <div class="row pt-5 pb-3">
                        <p class="text-light col">subtotal: </p>
                        <p class="text-light col justify-content-end">$ <?php echo $total;?></p>
                    </div>
                    <button class="btn-lg btn btn-danger proceed_btn" id = "ship"><a href = "#" class = "text-decoration-none link-light">Proceed to Shipping</a></button> 
                </div>
                </div>
            </div>
            </div>
        </div>
        <?php
                include_once "footer.php";
        ?>
    </body>
</html>