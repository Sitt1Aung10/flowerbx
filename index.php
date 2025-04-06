<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower Delivery|Send Luxury Flowers</title>
    <link rel="icon" type="image/x-icon" href="/flowerBX/peony_primrose_peony_vase_4.jpg">

    <!--font Awesome Link-->
    <script src="https://kit.fontawesome.com/8cbc109b9d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="loginPage.css">
</head>

<body>
    <?php include 'header.php' ?> <!-- Include the header PHP file -->
    <main>

        <!--Login Page -->
        <?php include 'loginPage.php' ?>
        <!--when finish login user name will shown here-->
        <?php include 'username_display.php' ?>
        <!-- Cart -->
        <div class="cart-container">

        </div>

        <!-- Popup Container -->
        <div id="popupContainer" class="popup-container">
            <div class="popup-content">
                <span class="close-btn">×</span>
                <div id="popupProductName"></div>
                <img id="popupProductImage" src="" alt="Product Image">
                <div id="popupProductPrice">Price : 20.99 USD</div>
                <div id="popupProductDescription"></div>
                <div id="quantityContainer">
                    <i class="fa-solid fa-minus decreaseBtn"></i>
                    <input type="number" value="1" min="0" class="quantityDisplay" style="width: 40px;padding-inline-start:25px;">
                    <i class="fa-solid fa-plus increaseBtn"></i>
                </div>
                <a id="popupProductLink" href="">Buy Flower</a>
                <p class="popupNote" style="padding: 20px;">SuccessFully Added To Cart</p>
            </div>
        </div>

        <!-- Slider Section Start -->
        <section class="slider_section" style="margin-top: 1rem;">
            <img class="Hero_Banner_subscription_DESKTOP" src="img/Hero_Banner_subscription_DESKTOP.jpg">
        </section>
        <!-- Slider Section End -->

        <!-- Brands Collection Section Start -->
        <section class="brands_collection">
            <a href="https://www.flowerbx.com/flowers"><img src="img/PRESS_LOGOS (1).jpg"></a>
        </section>
        <!-- Brands Collection Section End -->

        <!-- Shopping Section Start -->
        <?php include 'shopping.php' ?> <!-- Include the shopping PHP file -->
        <!-- Shopping Section End -->

        <!-- Section Four Block Desktop -->
        <section class="section_four_block_desktop">
            <a href="https://www.flowerbx.com/flowers">
                <img class="section_four_img" src="img/SECTION_FOUR_BLOCK_DESKTOP-min.jpeg">
            </a>
        </section>

        <?php include 'shop.php' ?> <!-- Include the shop PHP file -->

        <!-- Section Sixth Block Desktop -->
        <section class="section_sixth_block_desktop">
            <a href="https://www.flowerbx.com/flowers">
                <img class="section_sixth_img" src="img/Group_372_1.jpg">
            </a>
        </section>

        <section class="about_section">
            <div class="content">
                <h1 style="font-size: 2em;">LUXURY FLOWER DELIVERY: ABOUT FLOWERBX</h1>
                <p>At FLOWERBX, we deliver fresh, seasonal, high-quality flowers to your doorstep, with reliable
                    flower delivery options 7 days a week, including UK nationwide next-day and same-day delivery in
                    London. Order flowers online with us, and you will always receive exquisite flowers, whether they are
                    for your home or sent as a gift. Discover our range.</p>
            </div>
            <div>
                <img src="img/Mask_group-1_1-min.jpeg"> <!-- Image of flowers -->
                <img src="img/Mask_group_1-min.jpeg"> <!-- Another image of flowers -->
            </div>
        </section>

        <!-- Footer -->
        <?php include 'footer.php' ?> <!-- Include the footer PHP file -->
    </main>
    <script src="index.js"></script> <!-- Link to the JavaScript file -->

</body>

</html>