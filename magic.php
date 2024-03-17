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
    <h1 class="arrival_magic">New Arrival</h1>
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