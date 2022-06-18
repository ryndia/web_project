<?php
  session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
       	<!-- JavaScript Bundle with Popper -->
      	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link href="homeCss.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet"> 
        <title>Home</title>
    </head>
    <body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="50">
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
      <div class="container-fluid" id = "home">
        <div class="row px-5 pt-5 image">
            <div class = "col px-5 introText d-flex align-items-center">
              <div>
                <h4>Your Number 1 shop for</h4><h1 class="titleh1">Original Figure and Card</h1>
                <p>Daito Otaku Shop is a local enterprise run by enthusiast<br> and dynamic anime and geeky thing lover.<br> We bring the latest technology and original figure for our customer.</p>
                <form action="/product_card.php?search">
                  <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search a Product..." name = "search">
                  <div class="input-group-btn">
                  <button class="btn btn-default searchBtn" type="submit" method = "get">
                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                      </svg>
                  </button>
                  </div>
                </div>
                </form>
                <div class="pt-3 d-flex justify-content-center ">
                  <button type="button" class="btn btn-dark btn-rounded"><a href = "product_card.php" class = "text-decoration-none link-light">Visit our Product Page</a></button>
                </div>
              </div>
            </div>
        </div>
        <div class="row" id = "New_Arrival">
          <?php 
            include("carousel.php");
          ?>
          <div class="pt-3 d-flex justify-content-center ">
                button type="button" class="btn-lg btn-dark btn-rounded"><a href = "product_card.php" class = "text-decoration-none link-light">Visit our Product Page</a></button>
          </div>
        </div>
        <div id = "about">
        <?php 
            include("about_us.php");
          ?>
      </div>
      </div>
      <?php
        include("footer.php");
      ?>
    </body>
</html>
