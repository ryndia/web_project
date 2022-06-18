<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        try {
            require_once "db_connect.php";
            $log = $_POST['log']; $password = $_POST['password'];
            $error = array();
            echo $log.$password."<br>";
            if(empty($log))
            {
                $error[] = "No User ID entered";
            }
            if(empty($password))
            {
                $error[] = "Password Required";
            }

            if(empty($error))
            {
                session_start();
                $hash_password = hash('sha512',$password,false);
                $sql = 'SELECT loginName, custID FROM website WHERE loginName = :logName AND loginPassword = :hash_password';
                $prep = $conn->prepare($sql);
                $prep->bindParam(':logName', $log);
                $prep->bindParam(':hash_password',$hash_password);
                $row = $prep->execute();
                if($row == 1)
                {
                    $singleRow = $prep->fetch();  
                    $_SESSION['custID'] = (int)$singleRow['custID'];
                    $_SESSION['loginName'] = $singleRow['loginName'];  
                    $sql = 'SELECT cartID FROM cart ca join customer cu on ca.custID = cu.custID';
                    $prep = $conn->prepare($sql);
                    $row = $prep->execute();
                    $singleRow = $prep->fetch();
                    if(empty($singleRow))
                    {   
                        $stmt = $conn->prepare("INSERT INTO cart (custID,last_edit_date) VALUES(:custId, now()");
                        $custID = $_SESSION['custID'];
                        $stmt->bindParam(':custId',$custID);
                        $stmt->execute();
                        $_SESSION['cartID'] = $conn->lastInsertId();
                        header("location: home.php");

                    }
                    else{
                        $_SESSION['cartID'] = $singleRow[0];
                        header("location: home.php");
                    }
                }
                else{
                    header(location: "login_page.php");
                }
            }
            else{
                 header(location: "login_page.php");
            }
        }
        catch(Exception $e){
         print "An Exception occurred. Message: " . $e->getMessage();
            print "The system is busy please try later";
        }
        catch(Error $e){
        print "An Error occurred. Message: " . $e->getMessage();
            print "The system is busy please try again later.";
        }
 
    }
?>