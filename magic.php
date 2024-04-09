<?php
include 'config.php';
session_start();
?>
<?php

include 'config.php';

error_reporting(0);
session_start();

$user_id = $_SESSION['user_id'];

if (isset($_POST['padd'])) {
    if (!isset($user_id)) {
        $message[] = 'Please Login to get your books';
    } else {
        $name = $_POST['title'];
        $id = $_POST['id'];
        $image = $_POST['image'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $total_price = number_format($book_price * $book_quantity);
        $select_book = $conn->query("SELECT * FROM cart WHERE name= '$book_name' AND user_id='$user_id' ") or die('query failed');

        if (mysqli_num_rows($select_book) > 0) {
            $message[] = 'This Book is already in your cart';
        } else {
            $conn->query("INSERT INTO cart (`book_id`,`user_id`,`name`, `price`, `image`, `quantity` ,`total`) VALUES('$id','$user_id','$name','$price','$image','$quantity', '$total_price')") or die('Add to cart Query failed');
            $message[] = 'Book Added To Cart Successfully';
        }
    }

}
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
          $bookid = $row['bid'];

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
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" value="1" min="1" max="10" id="quantity">
            <div class="buttons">

                                    <input class="hidden_input" type="hidden" name="name" value="<?php echo $fetch_book['name'] ?>">
                                    <input class="hidden_input" type="hidden" name="id" value="<?php echo $fetch_book['bid'] ?>">
                                    <input class="hidden_input" type="hidden" name="image" value="<?php echo $fetch_book['image'] ?>">
                                    <input class="hidden_input" type="hidden" name="price" value="<?php echo $fetch_book['price'] ?>">
                                    <input type="submit" name="padd" value="Add To Cart" class="btn">
                                    <!-- <input type="submit" name="add_to_cart" value="Add to cart" class="btn"> -->
                                </div>
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
    <section class="show-products">
        <div class="box-container">

            <?php
            $select_book = mysqli_query($conn, "SELECT * FROM `book_info` Where category='Magic'") or die('query failed');
            if (mysqli_num_rows($select_book) > 0) {
                while ($fetch_book = mysqli_fetch_assoc($select_book)) {
                    ?>

                    <div class="box" style="width: 255px;height: 355px;">
                        <a href="book_details.php?details=<?php echo $fetch_book['bid'];
                        echo '-name=', $fetch_book['name']; ?>"> <img
                                style="height: 200px;width: 125px;margin: auto;" class="books_images"
                                src="added_books/<?php echo $fetch_book['image']; ?>" alt=""></a>
                        <div style="text-align:left ;">

                            <div style="font-weight: 500; font-size:18px; text-align: center;" class="name">
                                <?php echo $fetch_book['name']; ?>
                            </div>
                        </div>
                        <div class="price">Price: $
                            <?php echo $fetch_book['price']; ?>
                        </div>
                        <!-- <button name="add_cart"><img src="./images/cart2.png" alt=""></button> -->
                        <form action="" method="POST">
                            <input class="hidden_input" type="hidden" name="book_name"
                                value="<?php echo $fetch_book['name'] ?>">
                            <input class="hidden_input" type="hidden" name="book_image"
                                value="<?php echo $fetch_book['image'] ?>">
                            <input class="hidden_input" type="hidden" name="book_price"
                                value="<?php echo $fetch_book['price'] ?>">
                            <button name="add_to_cart"><img src="./images/cart2.png" alt="Add to cart">
                                <a href="book_details.php?details=<?php echo $fetch_book['bid'];
                                echo '-name=', $fetch_book['name']; ?>"
                                    class="update_btn">Know More</a>
                        </form>
                        <!-- <button name="add_to_cart" ><img src="./images/cart2.png" alt="Add to cart"></button> -->
                        <!-- <input type="submit" name="add_cart" value="cart"> -->
                    </div>
                    <?php
                }
                echo '<p class="empty" style="margin: auto; color: blue; font-size:18px;">More Book Coming Soon...!</p>';

            } else {
                echo '<p class="empty" style="margin: auto; color: red">No products added yet!</p>';
            }
            
            ?>
        </div>
    </section>
    <?php include 'index_footer.php'; ?>


</body>

</html>