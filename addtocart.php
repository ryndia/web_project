<?php
    session_start();
    require_once "db_connect.php";
    if($_GET['qty'] > 0)
    {
        $sql = 'SELECT Qty from cart_item WHERE productID = :prod';
        $prep = $conn->prepare($sql);
        $prep->bindParam(':prod', $_GET['productId']);
        $prep->execute();
        $arr = $prep->fetchAll();
        print_r($arr);
        if(!empty($arr))
        {
            $arr[0][0] = $arr[0][0] +  $_GET['qty'];
            echo $arr[0][0];
            $sql = 'UPDATE cart_item SET Qty = :qty WHERE productID = :prod AND cartID = :cartId';
            $prep = $conn->prepare($sql);
            $prep->bindParam(':prod', $_GET['productId']);
            $prep->bindParam(':qty', $arr[0][0]);
            $prep->bindParam(':cartId', $_SESSION['cartID']);
            $prep->execute();
            header( "location: product_card.php");
        }
        else{
            $stmt = $conn->prepare("INSERT INTO cart_item(cartID, productID, Qty) VALUES(:cartID, :prodID, :q)");
            $stmt->bindParam(':cartID', $_SESSION['cartID']);
            $stmt->bindParam(':prodID', $_GET['productId']);
            $stmt->bindParam(':q', $_GET['qty']);
            $stmt->execute();
            header( "location: product_card.php");
        }
    }
    else{
        header( "location:product_card.php");
    }
?>