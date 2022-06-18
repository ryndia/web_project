<?php
    session_start();
    $first_name = trim($_POST["first_name"]);
    $last_name = trim($_POST["last_name"]);
    $login_name = trim($_POST["login_name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $v_password = trim($_POST["v_password"]);
    $contact_number = $_POST["contact"];
    $gender = trim($_POST["optgender"]);
    $house = trim($_POST["house"]);
    $street = trim($_POST["street"]);
    $city = trim($_POST["city"]);
    $postcode = $_POST["postcode"];
    $country = trim($_POST["country"]);
    $error =array();

    if (empty($first_name)) {
        $errors[] = 'You forgot to enter your first name.';
    }
    if (empty($last_name)) {
        $errors[] = 'You forgot to enter your last name.';
    }
    if (empty($login_name)) {
        $errors[] = 'You forgot to enter your login name.';
    }
    if (empty($email)) {
        $errors[] = 'You forgot to enter your email.';
    }
    if (!empty($password)) {
        if ($password !== $v_password) {
            $error[] = "Password doesn't match";
        }
    }
    else{
        $errors[] = 'You forgot to enter your password.';
    }
    if (empty($house)) {
        $errors[] = 'You forgot to enter your house number.';
    }
    if (empty($street)) {
        $errors[] = 'You forgot to enter your street.';
    }
    if (empty($city)) {
        $errors[] = 'You forgot to enter your city.';
    }
    if (empty($postcode)) {
        $errors[] = 'You forgot to enter your postcode.';
    }
    if (empty($country)) {
        $errors[] = 'You forgot to enter your country.';
    }

    if(!empty($gender))
    {
        if($gender == 'option1')
        {
            $gender = "m";
        }
        else{
            $gender = "f";
        }
    }

    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $error[] = "Incorrect mail entered";
    }
    
    if(empty($error))
    {
        try {
            $hash_password = hash('sha512',$password,false);
            echo $hash_password;
            require_once "db_connect.php";
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("INSERT INTO customer (custFname,custLname,street,house_number,city,zipcode,country,gender,custContactNum,custMail) VALUES(:custFname,:custLname,:street,:house_number,:city,:zipcode,:country,:gender,:custContactNum,:custMail)");
            $stmt->bindParam(':custFname',$first_name);
            $stmt->bindParam(':custLname',$last_name);
            $stmt->bindParam(':street',$street);
            $stmt->bindParam(':house_number',$house);
            $stmt->bindParam(':city',$city);
            $stmt->bindParam(':zipcode',$postcode);
            $stmt->bindParam(':country',$country);
            $stmt->bindParam(':gender',$gender);
            $stmt->bindParam(':custMail',$email);
            $stmt->bindParam(':custContactNum',$contact_number);
            $stmt->execute();

            $custId = $conn->lastInsertId();

            $stmt = $conn->prepare("INSERT INTO website(custID, loginName, loginPassword) VALUES(:custID, :loginName, :loginPassword)");
            $stmt->bindParam(':custID', $custId);
            $stmt->bindParam(':loginName', $login_name);
            $stmt->bindParam(':loginPassword', $hash_password);
            $stmt->execute();
            header("location: home.php");
            exit();
        }
        catch (PDOException $e){
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    else{
        $errorstring = "Error! The following error(s) occurred:<br>";
        foreach ($error as $msg) { // Print each error.
            $errorstring .= " - $msg<br>\n";
        }
        $errorstring .= "Please try again.<br>";
        echo "<p class='text-center col-sm-2' style='color:red'>$errorstring;</p>";
        header("location: register_form.php");
    }
?>