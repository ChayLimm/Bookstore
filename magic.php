<?php
  include 'config.php';
  session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Book Category</title>
</head>

<body>
  
      <?php include 'index_header.php' ?>

      <div class="containerr" id="firstbanner">
          <h1>Magical</h1>
          <p class="slang">All the scenario become real at once</p>
          <button id="btnlearn">Learn more</button>

      </div>
      <div>
        <h1 class="arrival_magic">New Arrival</h1>
      </div>
      <div class="container text-center" id="book_container">
        <div class="row">
          <div class="col">
            <div class="container" id="product_card">
            <img src="bookspicture/gf.jpg" >
            <h4>Capture the crown</h3> 
            <p>30$</p>
            <button class="padd">Add to cart</button>
                        <button class="pbuy">Buy</button>

          </div>
          </div>
          <div class="col">
            <div class="container" id="product_card">
            <img src="bookspicture/gf.jpg" >
            <h4>Capture the crown</h3> 
            <p>30$</p>
            <button class="padd">Add to cart</button>
                        <button class="pbuy">Buy</button>

          </div>
          </div>
          <div class="col">
            <div class="container" id="product_card">
            <img src="bookspicture/gf.jpg" >
            <h4>Capture the crown</h3> 
            <p>30$</p>
            <button class="padd">Add to cart</button>
                        <button class="pbuy">Buy</button>

          </div>
          </div>
          <div class="col">
            <div class="container" id="product_card">
            <img src="bookspicture/gf.jpg" >
            <h4>Capture the crown</h3> 
            <p>30$</p>
            <button class="padd">Add to cart</button>
                        <button class="pbuy">Buy</button>

          </div>
          </div>
        </div>
        

        </div>
      </div>

      <?php include 'index_footer.php'; ?>
  
</body>
</html>