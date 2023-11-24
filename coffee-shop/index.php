<?php
    date_default_timezone_set("Asia/Jakarta");
    include("connection.php");

    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];
        $time = date("d-m-Y h:i");

        $sql = "INSERT INTO review VALUES (NULL, '$name', '$email', '$message', '$time')";
        $result = $conn->query($sql);

        if ($result) {
            header("Refresh: 0");
        } else {
            echo "Error ";
            return false;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee</title>

    <!-- SWIPER -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- Font Awesome CDN Link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom CSS File Link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <!-- HEADER -->
    <header class="header">
        <div id="menu-btn" class="fas fa-bars"></div>

        <a href="#" class="logo">coffee <i class="fas fa-mug-hot"></i></a>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#menu">menu</a>
            <a href="#review">review</a>
            <a href="#location">Location</a>
            <a href="#book">feedback</a>
        </nav>

    </header>

    <!-- HOME -->
    <section class="home" id="home">
        <div class="row">
            <div class="content">
                <h3>fresh coffee in the morning</h3>
            </div>

            <div class="image">
                <img src="image/home-img-1.png" class="main-home-image" alt="">
            </div>
        </div>

        <div class="image-slider">
            <img src="image/home-img-1.png" alt="">
            <img src="image/home-img-2.png" alt="">
            <img src="image/home-img-3.png" alt="">
        </div>
    </section>

    <!-- ABOUT -->
    <section class="about" id="about">
        <h1 class="heading">about us <span>why choose us</span></h1>

        <div class="row">
            <div class="image">
                <img src="image/about-img.png" alt="">
            </div>

            <div class="content">
                <h3 class="title">what's make our coffee special!</h3>
                <p></p>
                <a href="#" class="btn">read more</a>
                <div class="icons-container">
                    <div class="icons">
                        <img src="image/about-icon-1.png" alt="">
                        <h3>quality coffee</h3>
                    </div>
                    <div class="icons">
                        <img src="image/about-icon-2.png" alt="">
                        <h3>our branches</h3>
                    </div>
                    <div class="icons">
                        <img src="image/about-icon-3.png" alt="">
                        <h3>free delivery</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MENU -->
    <section class="menu" id="menu">
        <h1 class="heading">our menu <span>popular menu</span></h1>

        <div class="box-container">
            <a href="#" class="box">
                <img src="image/menu-1.png" alt="">
                <div class="content">
                    <h3>kopi latte</h3>
                    <p>RP.45.000</p>
                    <span></span>
                </div>
            </a>

            <a href="#" class="box">
                <img src="image/menu-2.png" alt="">
                <div class="content">
                    <h3>frappucino</h3>
                    <p>RP.50.000</p>
                    <span></span>
                </div>
            </a>

            <a href="#" class="box">
                <img src="image/menu-3.png" alt="">
                <div class="content">
                    <h3>Americano caffee</h3>
                    <p>RP.45.000</p>
                    <span></span>
                </div>
            </a>

            <a href="#" class="box">
                <img src="image/menu-4.png" alt="">
                <div class="content">
                    <h3>mochacino</h3>
                    <p>RP.50.0000</p>
                    <span></span>
                </div>
            </a>

            <a href="#" class="box">
                <img src="image/menu-5.png" alt="">
                <div class="content">
                    <h3>Caramel Machiatto</h3>
                    <p>RP.60.000</p>
                    <span></span>
                </div>
            </a>

            <a href="#" class="box">
                <img src="image/menu-6.png" alt="">
                <div class="content">
                    <h3>cappuccino coffee</h3>
                    <p>RP.40.0000</p>
                    <span></span>
                </div>
            </a>
        </div>
    </section>

    <!-- REVIEW -->
    <section class="review" id="review">
        <h1 class="heading">reviews <span>what people says</span></h1>

        <div class="swiper review-slider">
            <div class="swiper-wrapper" style="display: block;">
                <?php
                    $sql = "SELECT * FROM review";
                    $result = $conn->query($sql);

                    if ($result) {
                        while ($row = $result->fetch_array()) {
                            echo "
                            <div class='swiper-slide box'>
                                <i class='fas fa-quote-left'></i>
                                <i class='fas fa-quote-right'></i>
                                <h3>".$row['name']."</h3>
                                <div style='display: flex; flex-direction: column;'>
                                    <span id='message'>".$row['message']."</span>
                                    <span>".$row['Time']."</span>
                                </div>
                            </div>";
                        }
                    } else {
                        echo "
                        <div class='swiper-slide box'>
                            <i class='fas fa-quote-left'></i>
                            <i class='fas fa-quote-right'></i>
                            <h3>Error</h3>
                            <span>Ellor bang</span>
                        </div>";
                    }
                ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    
    <section class="loaction" id="location">
        <div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.0808309975287!2d107.05842427374075!3d-6.253080461221441!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698dffaa3e87c9%3A0x7f0f671bf57691ae!2sSMK%20TELEKOMUNIKASI%20TELESANDI%20BEKASI!5e0!3m2!1sid!2sid!4v1700448299302!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div>
    </section>
    <!-- BOOK -->
    <section class="book" id="book">
        <h1 class="heading">comment
             <span>Comment</span></h1>

        <form action="index.php" method="post">
            <input type="text" placeholder="Name" class="box" name="name" required>
            <input type="email" placeholder="Email" class="box" name="email" required>
            <textarea placeholder="Message" class="box" id="" cols="30" rows="10" name="message" required></textarea>
            <input type="submit" value="send message" class="btn" name="submit">
        </form>
    </section>

    <!-- FOOTER -->
    <section class="footer">
        <div class="box-container">

            <div class="box">
                <h3>quick links</h3>
                <a href="#home"><i class="fas fa-arrow-right"></i> home</a>
                <a href="#about"><i class="fas fa-arrow-right"></i> about</a>
                <a href="#menu"><i class="fas fa-arrow-right"></i> menu</a>
                <a href="#review"><i class="fas fa-arrow-right"></i> review</a>
                <a href="#book"><i class="fas fa-arrow-right"></i> feedback</a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#"><i class="fas fa-phone"></i> +62813-2765-1324</a>
                <a href="#"><i class="fas fa-phone"></i> +62811-9087-1342</a>
                <a href="#"><i class="fas fa-envelope"></i> coffee_shop@gmail.com</a>
                <a href="#"><i class="fas fa-map"></i> Desa, Mekarsari, Kec. Tambun Sel., Kabupaten Bekasi, Jawa Barat 17510</a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#"><i class="fab fa-facebook-f"></i> coffeeshop</a>
                <a href="#"><i class="fab fa-twitter"></i> coffee_shop</a>
                <a href="#"><i class="fab fa-instagram"></i> coffee_shop</a>
            </div>
        </div>

        <div class="credit">created by <span>Faris Hadinata</span> | all rights reserved</div>
    </section>

    <!-- SWIPER -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script>
        var sensor=["kontol", "memek", "anjir"];
        function replaceTextInElements(elements) {
            elements.forEach(function(element) {
                // Mengambil teks dari elemen
                var originalText = element.textContent;

                // Mengganti kata-kata menggunakan ekspresi reguler dan fungsi penggantian kustom
                var newText = originalText.replace(new RegExp(sensor.join('|'), 'gi'), function(match) {
                    // Menghasilkan jumlah asterisk yang sesuai dengan panjang kata yang disensor
                    return '*'.repeat(match.length);
                });

                // Menetapkan teks yang telah diganti kembali ke elemen
                element.textContent = newText;
            });
        }

        // Mengambil semua elemen <p> dengan id="message"
        var messageElements = document.querySelectorAll('span#message');

        // Mengganti kata-kata dalam elemen-elemen yang dipilih
        replaceTextInElements(messageElements);
    </script>

    <!-- Custom JS File Link  -->
    <script src="js/script.js"></script>

</body>

</html>