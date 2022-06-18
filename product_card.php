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
        <link href="product.css" rel="stylesheet">
    </head>
    <body class = "back_product">
        <?php
            if(isset($_SESSION['loginName'])){
                include_once("navbar_Member.php");
            }
            else
            {
                include_once("navbar.php");
            }
            include_once "product.php";
        ?>
        <div class="container">
                <?php
                    require_once "db_connect.php";
                    if(isset($_GET['search']))
                    {
                        $search = $_GET['search'];
                        $prod = "%$search%";
                        $sql = 'SELECT * FROM product WHERE prod_desc LIKE :prod ORDER BY entry_date DESC';
                        $prep = $conn->prepare($sql);
                        $prep->bindParam(':prod', $prod);
                    }
                    else
                    {
                        $sql = 'SELECT * FROM product ORDER BY entry_date DESC';
                        $prep = $conn->prepare($sql);
                    }
                    $row_num = $prep->execute();
                    $result = $prep->fetchAll();
                    if(empty($result))
                    {
                        echo "<div class=\"col product_card mx-2 my-5\">
                                <div class=\"d-flex justify-content-center pt-3\">
                                    <h1 class = \"text-light\">No Product Found </h1>
                                </div>
                            </div>";
                    }
                    echo "<div class = \"row d-flex justify-content-center\">";
                    foreach($result as $record){
                        $image = $record['product_Image'];
                        $product_title = $record['prod_desc'];
                        $product_price = $record['price'];
                        $product_type = $record['product_type'];
                        $productID = $record['productID'];
                        echo   "<div class=\"col col-md-4	col-lg-3 col-xl-3 col-xxl-2 product_card mx-2 my-5\">
                                    <div class=\"d-flex justify-content-center pt-3\">
                                        <img src = \"$image\" class=\"img_product\">
                                    </div>
                                    <div class=\"row pt-2\">
                                        <p class=\"d-flex justify-content-center title\">$product_title</p><h3 class=\"col d-flex price justify-content-center\">$$product_price</h3>
                                    </div>
                                    <div class=\"row\">
                                        <h5 class=\"d-flex justify-content-center type\">$product_type</h5>
                                    </div>
                                    <div class=\"text-center py-2\">
                                        <form method = \"get\" action = \"addtocart.php?value\">
                                        <input type=\"Number\" class=\"form-control mb-3 input-sm qty_input\" id=\"qty\" name=\"qty\" row = \"1\" required min = \"0\" placeholder = \"Quantity\">
                                        <button name = \"productId\" value = $productID type=\"submit\" class=\"btn btn-outline-success btn-rounded my-1\"><svg class = \"pb-1\" xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-bag-plus\" viewBox=\"0 0 16 16\">
                                        <path fill-rule=\"evenodd\" d=\"M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z\"/>
                                        <path d=\"M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z\"/>
                                    </svg>Add to Cart</button>
                                    </form>
                                    </div>
                                </div>";
                    }
                    echo "</div>";
                ?>
            </div>
            <div class = "d-flex align-items-baseline">    
            <?php
                include_once "footer.php";
            ?>
            </div>
    </body>
</html>