<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
       <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="register_style.css" rel="stylesheet">
    <script src="verify_password.js"></script>
    <title>Register</title>
</head>
<body>
    <div class="container-fluid d-flex align-items-center justify-content-center pt-5 pb-5">
        <div class = "col-7 form_back">
            <form action="register.php" class="pt-2 px-3" onsubmit = "return checked();" method = "post" id = "register">
                <div class="row">
                    <div class="row">
                        <h1>Create an Account</h1>
                    </div>
                    <div class="col pt-4">
                        <div>
                            <H2>Login Details</H2>
                        </div>
                        <div class="row">
                            <div class="col pt-2">
                                <label for="first_name">First Name: </label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter your first name..." required>
                            </div>
                            <div class="col pt-2">
                                <label for="last_Name">Last Name: </label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter your last name..." required>
                            </div>
                            <div class="pt-2">
                                <label for="login_name">Login Name: </label>
                                <input type="text" class="form-control" id="login_name" name="login_name" placeholder="Enter a pseudo..." required>
                            </div>
                            <div class="pt-2">
                                <label for="email">Email: </label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your mail address..." required>
                            </div>
                            <div class="col pt-2">
                                <label for="pwd">Enter a Password: </label>
                                <input type="password" class="form-control" id="pwd" name="password" placeholder="Enter a password..." required>
                            </div>
                            <div class="col pt-2">
                                <label for="v_pwd">Confirm Password: </label>
                                <input type="password" class="form-control" id="v_pwd" name="v_password" placeholder="retype your password..." required>
                            </div>
                            <label id = "v_pass"></label>                   
                            <div class="pt-2">
                                <label for="contact_number">Contact Number:</label>
                                <input type="tel" class="form-control" id="contact_number" name="contact" placeholder="Enter your Phone Number..">
                            </div>
                            <div class="pt-2">
                                <label for="gender">Choose your Gender:</label>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="radio1" name="optgender" value="option1" checked>
                                    <label class="form-check-label" for="radio1">Male</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="radio2" name="optgender" value="option2">
                                    <label class="form-check-label" for="radio2">Female</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" disabled>
                                    <label class="form-check-label">There is only 2 genders. Bare this in mind....</label>
                                </div> 
                            </div>
                    </div>
                </div>
                <div class="col pt-4">
                    <div>
                        <h2>Contact Details</h2>
                    </div>
                    <div class="pt-2">
                        <label for="street">House Number:</label>
                        <input type="text" class="form-control" id="house" name="house" placeholder="Enter your House Number.." required>
                    </div>
                    <div class="pt-2">
                        <label for="street">Street:</label>
                        <input type="text" class="form-control" id="street" name="street" placeholder="Enter your Street name.." required>
                    </div>
                    <div class="pt-2">
                        <label for="city">City:</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter your City name.." required> 
                    </div>
                    <div class="pt-2">
                        <label for="postcode">Zip/Postal Code:</label>
                        <input type="Number" class="form-control" id="postcode" name="postcode" placeholder="Enter your Postal Code.." required>
                    </div>
                    <div class="pt-2">
                        <label for="country">Country:</label>
                        <input type="text" class="form-control" id="country" name="country" placeholder="Enter your Country.." required>
                    </div>
                    <div class = "row ps-4">
                        <div class="pt-2 row">
                            <button type="submit" class="btn-lg btn btn-danger">Register</button>
                        </div>
                        <div class = "row pt-1 pb-4">
                        <label for="sign">Already have an Account? Sign In!</label>
                            <button class="btn-lg btn btn-danger" id = "sign"><a href = "login_page.php" class = "text-decoration-none link-light">Sign in</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


    </div>
</div>
</body>
</html>