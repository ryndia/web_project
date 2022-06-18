
<head>
    <link rel="stylesheet" href="login_style.css">
    <script src="https://kit.fontawesome.com/1d7f9e02d8.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <div class="form-box">
            <div class="title">
                <h2>Log In</h2>
            </div>
            <!--div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In </button>
                <button type="button" class="toggle-btn" onclick="register()">Register </button>
            </div>-->
            <div class="social-icons">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-whatsapp"></i>
                <i class="fa-brands fa-instagram"></i>
            </div>
            <form id="login" class="input-group" action="login.php" method = "POST">
                <input type="text" class="input-field" placeholder="User ID or Mail" required name= "log">
                <input type="password" class="input-field" placeholder="Password" required name = "password">
                <input type="checkbox" class="check-box"><span>Remember Password</span>
                <button type="submit" class="submit-btn">Log In</button>
                <button class="submit-btn"><a href = "register_form.php">Sign Up</a></button>
            </form>
            <!--form id="register" class="input-group">
            <mett register form ici ek uncomment bann comment lor form>
            </form>-->
        </div>
    </div>

    <!--script> 
        var x = Login.getElementById("login");
        var y = Login.getElementById("register");
        var z = Login.getElementById("btn");

        function register(){
            x.login_style.left = ""; 
            y.login_style.left = "";
            z.login_style.left = "";
        }

        function login(){
            x.login_style.left = "";
            y.login_style.left = "";
            z.login_style.left = "";
        }

    </script>-->
</body>
</html>