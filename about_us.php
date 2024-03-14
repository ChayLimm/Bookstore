<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About-Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            font-size: 36px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            color: #555;
            margin-bottom: 20px;
        }

        .columns {
            display: flex;
            flex-wrap: wrap;
        }

        .column {
            flex: 1;
            padding: 10px;
        }

        .column img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .site-name {
            font-size: 24px;
            text-align: center;
            margin-bottom: 30px;
            color: #007bff;
        }
    </style>
</head>

<body>
    <?php
        include 'index_header.php';
    ?>
<div class="top">
        <div class="container">
            <h1>Relate to Us</h1>
            <p class="site-name">BookFlex</p>
            <div class="columns">
                <div class="column">
                    <p>
                        <strong>"The joy of reading and sharing knowledge is what drives us."</strong>
                    </p>
                    <p>
                        At BookFlex, we are passionate about fostering a community of readers, authors, and
                        independent booksellers. We strive to create an inclusive and welcoming space where
                        people from all walks of life can come together to explore their love for literature.
                    </p>
                    <p>
                        Our mission is to connect readers with independent booksellers around the world,
                        empowering local businesses and promoting a diverse range of voices and perspectives in
                        literature. We believe that books have the power to inspire, educate, and transform
                        lives, and we're dedicated to making them accessible to everyone.
                    </p>
                </div>
                <div class="column">
                    <img src="https://assets.website-files.com/6267f35934aa8b1795cf1a9f/62f5394f512f1534599827db_vend.png"
                        loading="lazy"
                        alt="Customers lineup to buy BookFlex books from a cellphone that dispenses books like a vending machine">
                </div>
            </div>
        </div>
    </div>


    <?php
        include 'index_footer.php';
    ?>

</body>

</html>