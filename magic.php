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

  <?php include 'index_header.php'; ?>

  <div id="firstbanner">
    <h1>Magical</h1>
    <p class="slang">All the scenarios become real at once </p>
    <button id="btnlearn">Learn more</button>
  </div>
  <div class="container text-center" id="book_container">
    <h1 class="arrival_magic">New Arrival</h1>
    <div class="row">
      <?php
      $sql = "SELECT * FROM book_info WHERE category = 'Magic'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $title = $row['title'];
          $book_cover = $row['image'];
          $price = $row['price'];
          $description = $row['description'];

          echo '
            <div class="col">
              <div class="container" id="product_card">
                <img src="bookspicture/' . $book_cover . '" onclick="openPopup(this)" alt="' . htmlspecialchars($title) . '">
                <h4>' . htmlspecialchars($title) . '</h4> 
                <div class="desc">

                <h7>' . htmlspecialchars($description) . '</h7></div>
                <p>' . htmlspecialchars($price) . '$</p>
              </div>
            </div>
          ';
        }
      } else {
        echo "<p>No books found</p>";
      }
      ?>
    </div>
  </div>

  <?php include 'index_footer.php'; ?>

  <!-- Popup container -->
  <div id="popup" class="popup">
    <div class="popup-content">
      <span class="close" onclick="closePopup()">&times;</span>

      <div class="row g-0">
        <div class="col-md-4">
          <img id="popup-img" class="popup-img" src="" alt="">
        </div>
        <div class="col-md-8">
          <div class="popup-details">
            <h5 id="popup-title" class="popup-title"></h5>
            <p id="popup-price"></p>
            <p id="popup-description" class="popup-price"></p>
            <button class="padd">Add to cart</button>
            <button class="pbuy">Buy</button>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function openPopup(img) {
      var title = img.alt;
      var parent = img.parentElement;
      var description = parent.querySelector('p').innerText;
      var price = parent.querySelector('h4').nextElementSibling.innerText;

      document.getElementById("popup-img").src = img.src;
      document.getElementById("popup-title").innerText = title;
      document.getElementById("popup-description").innerText = description;
      document.getElementById("popup-price").innerText = price;
      document.getElementById("popup").style.display = "block";
    }

    function closePopup() {
      document.getElementById("popup").style.display = "none";
    }
  </script>

</body>

</html>