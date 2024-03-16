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
  <link href="node_modules/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


  <title>Book Category</title>
</head>

<body>

  <?php include 'index_header.php' ?>

  <div class="containerr" id="firstbanner">
    <h1>Magical</h1>
    <p class="slang">All the scenarios become real at once </p>
    <button id="btnlearn">Learn more</button>
  </div>

  <div class="container text-center" id="book_container">
    <h1 class="arrival_magic">New Arrival</h1>
    <div class="row">
      <?php
      $sql = "SELECT * FROM book_info WHERE category LIKE 'Magic'";
      $data = $conn->query($sql);

      if ($data->num_rows > 0) {
        while ($row = $data->fetch_assoc()) {
          $title = $row['title'];
          $book_cover = $row['image'];
          $book_bid = $row['bid'];
          $price = $row['price'];

          echo '
        
            <div class="col">
              <div class="container" id="product_card">
              <a href="local">
                <img  src="bookspicture/' . $book_cover . '" >
              </a>

                <h4>' . $title . '</h4> 
                <p>' . $price . '$</p>
              </div>
            </div>
          ';
        }
      }
      ?>

    </div>
  </div>

  <?php include 'index_footer.php'; ?>

</body>

</html>
