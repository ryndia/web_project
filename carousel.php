<html>
  <head>
    <link href="carousel.css" rel="stylesheet">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--Bootstrap-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
      
      <!-- JavaScript Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      
      <!--font-->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet"> 
  </head>

  <body>
    <h1 class="title d-flex justify-content-center py-3">New Arrival in our Shop</h1>
    <div id="demo" class="carousel slide" data-bs-ride="carousel">
      <!-- Indicators/dots -->
    
      <!-- The slideshow/carousel -->
      <?php
        require_once "db_connect.php";
        $sql = 'SELECT * FROM product ORDER BY entry_date DESC limit 5';
        $prep = $conn->prepare($sql);
        $row_num = $prep->execute();
        $first_row = $prep->fetch();
        $result = $prep->fetchAll();
        $first_row['product_Image'] = substr($first_row['product_Image'], 0, -3);
        $first_row['product_Image'] = $first_row['product_Image']."png";
      ?>

      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row d-flex justify-content-center">
            <div class="col-6 carousel_image">
              <img src = "<?php echo $first_row['product_Image'];?>" class = "d-block w-100">
            </div>
            <div class="col product_title">
              <p class="prduct"><?php echo $first_row['product_name'];?></p>
            </div>
            <div class="col-3 d-flex justify-content-end align-items-end pb-5">
              <h1 class = "price">$<?php echo $first_row['price'];?></h1>
            </div>
          </div>
        </div>
      
      <?php
        foreach ($result as $row){
          $row['product_Image'] = substr($row['product_Image'], 0, -3);
          $row['product_Image'] = $row['product_Image']."png";
      ?>

        <div class="carousel-item">
          <div class="row d-flex justify-content-center">
            <div class="col-6 carousel_image">
              <img src = "<?php echo $row['product_Image'];?>" class = "d-block w-100">
            </div>
            <div class="col product_title">
              <h1 class="prduct"><?php echo $row['product_name'];?></h1>
            </div>
            <div class="col-3 d-flex justify-content-end align-items-end pb-5">
              <h1 class = "price">$<?php echo $row['price'];?></h1>
            </div>
          </div>
        </div>
      </div>
      <?php }?>

            <!-- Left and right controls/icons -->
      <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#000000" class="bi bi-chevron-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
</svg>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#000000" class="bi bi-chevron-right" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
      </svg>
      </button>
    </div>
  </body>
</html>