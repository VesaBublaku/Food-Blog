<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Shop - Bite By Bite</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            min-height: 100vh;
            width: 100%;
            display: flex;
            flex-direction: column;
            margin: 0;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }

        .shop {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 20px;
            background-color: #f7f6f3;
            padding: 10px;
            margin-top: 40px;
            gap: 4px;
        }

        #id1 {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            font-family: Georgia, 'Times New Roman', Times, serif;
            color: #636b54;
            margin-top: 60px;
            padding: 10px;
            font-size: 25px;
            background-color: #f7f6f3;
        }

        .popular-items {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            background-color: #f7f6f3;
            margin-bottom: 40px;
        }

        .popular-items img {
            width: auto;
            height: auto;
            max-width: 350px;
            max-height: 400px;
        }

        .popular-items>div p {
            font-family: Georgia, 'Times New Roman', Times, serif;
            padding: 0px;
            text-align: center;
        }

        #id {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            background-color: #a4ac86;
            font-size: 20px;
            margin-top: 20px;
            margin-bottom: 20px;
            padding: 10px;
        }

        #id2 {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 20px;
            background-color: #f7f6f3;
            padding: 10px;
            margin-top: 40px;
            gap: 4px;
        }

        .slider,
        .slider2,
        .slider3 {
            display: flex;
            flex-wrap: wrap;
            position: relative;
            overflow-x: hidden;
            height: 390px;
        }

        .slider3 {
            margin-bottom: 60px;
        }

        .slider-width,
        .slider2-width,
        .slider3-width {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            left: 0;
            top: 0;
            transition: 0.4s ease-in-out;
        }

        .item,
        .item2,
        .item3 {
            width: 250px;
            height: 300px;
            margin: 0 10px;
            text-align: center;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-around;
        }

        .item img,
        .item2 img,
        .item3 img {
            width: auto;
            height: auto;
            max-width: 250px;
            max-height: 300px;
        }

        .item p,
        .item2 p,
        .item3 p {
            width: 100%;
            font-family: Georgia, 'Times New Roman', Times, serif;
            padding: 0px;
            text-align: center;
        }

        .item button,
        .item2 button,
        .item3 button {
            display: block;
            margin-top: 5px;
            padding: 5px;
            margin-left: 30px;
            width: 200px;
            border: none;
            border-radius: 5px;
        }

        .buttonSlider,
        .buttonSlider2,
        .buttonSlider3 {
            margin-top: 360px;
            align-items: center;
            padding: 6px 12px;
            cursor: pointer;
            position: absolute;
            left: 50%;
            transform: translate(-50%);
            border-radius: 15px;
            border: gray;
        }

        .buttonSlider:nth-child(2),
        .buttonSlider2:nth-child(2),
        .buttonSlider3:nth-child(2) {
            margin-left: -74px;
        }

        #id3 {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            font-family: Georgia, 'Times New Roman', Times, serif;
            color: #636b54;
            margin-top: 60px;
            padding: 10px;
            font-size: 25px;
            background-color: #f7f6f3;
        }

        #id4 {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            font-family: Georgia, 'Times New Roman', Times, serif;
            color: #636b54;
            margin-top: 60px;
            padding: 10px;
            font-size: 25px;
            background-color: #f7f6f3;
        }
    </style>
</head>

<body>
    <?php include('../header.php') ?>
    <?php include('../menu.php') ?>

    <div class="shop">
        <a href="/Food-Blog/index.php">Home</a><span>></span>
        <a>Shop</a>
    </div>

    <div id="id1">
        <p>Popular Items</p>
    </div>

    <div class="popular-items">
        <div>
            <a href="https://gjirafamall.com/tenxhere-me-kapak-staub-55-l-e-kuqe-e-hirte">
                <img src="/images/staubroundcocotte.jpg" alt="">
                <p>Staub Round Cocotte</p>
            </a>
        </div>

        <div>
            <a href="https://gjirafamall.com/friteze-me-ajer-te-nxehte-sencor-sfr-6550bk-65-l-1600w#SearchResults">
                <img src="/images/airfryer.jpg" alt="">
                <p>Air fryer</p>
            </a>
        </div>

        <div>
            <a href="https://gjirafamall.com/procesor-ushqimi-bosch-mc812m865">
                <img src="/images/foodprocessor.jpg" alt="">
                <p>Food Processor</p>
            </a>
        </div>

        <div>
            <a href="https://gjirafamall.com/mikser-per-kuzhine-sencor-robot-stm-3730sl-eue3-i-bardhe-1#SearchResults">
                <img src="/images/mixer.jpg" alt="">
                <p>Mixer</p>
            </a>
        </div>

    </div>

    <hr>

    <div id="id">
        <p>KITCHEN ESSENTIALS</p>
    </div>

    <hr>

    <div id="id2">
        <p>Kitchen Tools</p>
    </div>

    <div class="slider" item-display-d="5" item-display-t="4" item-display-m="2">
        <div class="slider-width">
            <div class="item">
                <img src="/images/kitchenscissors.jpg" alt="">
                <p>Kitchen Scissors</p>
                <a href="https://gjirafamall.com/gershere-kuzhine-yato-210-mm-te-zeza">
                    <button>Shop Now</button>
                </a>
            </div>
            <div class="item">
                <img src="/images/grippeelers.jpg" alt="">
                <p>Grip Peelers</p>
                <a href="https://gjirafamall.com/qeruese-victorinox-me-celik-inox-e-zeze#SearchResults">
                    <button>Shop Now</button>
                </a>
            </div>
            <div class="item">
                <img src="/images/icecreamscoop.jpg" alt="">
                <p>Ice Cream Scoop</p>
                <a href="https://gjirafamall.com/luge-per-akullore-rosle-e-argjendte#SearchResults">
                    <button>Shop Now</button>
                </a>
            </div>
            <div class="item">
                <img src="/images/whisks.jpg" alt="">
                <p>Whisks</p>
                <a href="https://gjirafamall.com/rrahese-gefu-28-cm-e-argjendte-e-zeze#SearchResults">
                    <button>Shop Now</button>
                </a>
            </div>
            <div class="item">
                <img src="/images/scraper.jpg" alt="">
                <p>Scraper</p>
                <a href="https://gjirafamall.com/thike-per-stuko-hermes-05149-200mm-celik#SearchResults">
                    <button>Shop Now</button>
                </a>
            </div>
            <div class="item">
                <img src="/images/SlottedTurner.jpg" alt="">
                <p>Slotted Turner</p>
                <a href="https://gjirafamall.com/shpatull-ambition-96773-belts-ivy-e-argjendte">
                    <button>Shop Now</button>
                </a>
            </div>
            <div class="item">
                <img src="/images/garlicMasher.jpg" alt="">
                <p>Garlic Masher</p>
                <a href="https://gjirafamall.com/shtypes-hudherash-lamart-lt2072">
                    <button>Shop Now</button>
                </a>
            </div>
            <div class="item">
                <img src="/images/pastaspatula.jpg" alt="">
                <p>Pasta Spatula</p>
                <a href="https://gjirafamall.com/luge-per-pasta-lamart-lt3989-e-zezee-argjendte">
                    <button>Shop Now</button>
                </a>
            </div>
            <div class="item">
                <img src="/images/potatopusher.jpg" alt="">
                <p>Potato Pusher</p>
                <a href="https://gjirafamall.com/shtypes-puresh-lamart-lt3993-e-zeze">
                    <button>Shop Now</button>
                </a>
            </div>
            <div class="item">
                <img src="/images/solidspoon.jpg" alt="">
                <p>Solid Spoon</p>
                <a href="https://gjirafamall.com/luge-kuzhine-lamart-lt3988-e-zeze">
                    <button>Shop Now</button>
                </a>
            </div>
        </div>
        <button type="button" class="buttonSlider" onclick="prevSlider()">Prev</button>
        <button type="button" class="buttonSlider" onclick="nextSlider()">Next</button>
    </div>

    <script>
        var count = 0;
        var inc = 0;
        var margin = 0;
        var slider = document.getElementsByClassName("slider-width")[0];
        var itemDisplay = 0;
        if (screen.width > 990) {
            itemDisplay = document.getElementsByClassName("slider")[0].getAttribute("item-display-d")
            margin = itemDisplay * 5;
        }
        if (screen.width > 700 && screen.width < 990) {
            itemDisplay = document.getElementsByClassName("slider")[0].getAttribute("item-display-t")
            margin = itemDisplay * 6.8;
        }
        if (screen.width > 280 && screen.width < 700) {
            itemDisplay = document.getElementsByClassName("slider")[0].getAttribute("item-display-m")
            margin = itemDisplay * 20;
        }

        var item = document.getElementsByClassName("item");
        var itemleft = item.length % itemDisplay;
        var itemSlide = Math.floor(item.length / itemDisplay) - 1;

        for (let i = 0; i < item.length; i++) {
            item[i].style.width = (screen.width / itemDisplay) - margin + "px";
        }

        function nextSlider() {
            if (inc !== itemSlide + itemleft) {
                if (inc === itemSlide) {
                    inc = inc + itemleft;
                    count = count - (screen.width / itemDisplay) * itemleft;
                } else {
                    inc++;
                    count = count - screen.width;
                }
            }

            slider.style.left = count + "px";
        }

        function prevSlider() {
            if (inc !== 0) {
                if (inc === itemleft) {
                    inc = inc - itemleft;
                    count = count - (screen.width / itemDisplay) * itemleft;
                } else {
                    inc--;
                    count = count + screen.width;
                }
            }

            slider.style.left = count + "px";
        }
    </script>


    <div id="id3">
        <p>Bakeware</p>
    </div>

    <div class="slider2" item-display-d="5" item-display-t="4" item-display-m="2">
        <div class="slider2-width">
            <div class="item2">
                <img src="/images/muffinpan.jpg" alt="">
                <p>Muffin Pan</p>
                <a href="https://gjirafamall.com/tepsi-per-12-muffins-lamart-lt3092-ngjyra-baker#SearchResults">
                    <button>Shop Now</button>
                </a>
            </div>
            <div class="item2">
                <img src="/images/breadloafpan.jpg" alt="">
                <p>Bread Loaf Pan</p>
                <a href="https://gjirafamall.com/tepsi-per-pjekje-kinghoff-30x13cm-e-zeze#SearchResults">
                    <button>Shop Now</button>
                </a>
            </div>
            <div class="item2">
                <img src="/images/saucepan.jpg" alt="">
                <p>Sauce Pan</p>
                <a href="https://gjirafamall.com/tenxhere-lamart-lt1169-28l-e-argjendte#SearchResults">
                    <button>Shop Now</button>
                </a>
            </div>
            <div class="item2">
                <img src="/images/donutpan.jpg" alt="">
                <p>Donut Pan</p>
                <a href="https://gjirafamall.com/tepsi-tefal-e-zeze#SearchResults">
                    <button>Shop Now</button>
                </a>
            </div>
            <div class="item2">
                <img src="/images/halfsheet.jpg" alt="">
                <p>Half Sheet</p>
                <a href="https://gjirafamall.com/tepsi-per-pjekje-lamart-lt3076-e-kuqe#SearchResults">
                    <button>Shop Now</button>
                </a>
            </div>
            <div class="item2">
                <img src="/images/stockpot.jpg" alt="">
                <p>Stock Pot</p>
                <a href="https://gjirafamall.com/tenxhere-lamart-lt1162-24x135-cm-6-l-e-argjendte">
                    <button>Shop Now</button>
                </a>
            </div>
            <div class="item2">
                <img src="/images/piepan.jpg" alt="">
                <p>Pie Pan</p>
                <a href="https://gjirafamall.com/tepsi-per-pjekje-lamart-31x3cm-e-zeze">
                    <button>Shop Now</button>
                </a>
            </div>
            <div class="item2">
                <img src="/images/airfryer2.jpg" alt="">
                <p>Airfryer</p>
                <a href="https://gjirafamall.com/friteze-xiaomi-mi-smart-air-fryer-pro-4l-e-bardhe">
                    <button>Shop Now</button>
                </a>
            </div>
            <div class="item2">
                <img src="/images/toaster.jpg" alt="">
                <p>Toaster</p>
                <a href="https://gjirafamall.com/thekese-buke-sencor-sts-2607bk-e-zeze-2">
                    <button>Shop Now</button>
                </a>
            </div>
            <div class="item2">
                <img src="/images/pan.jpg" alt="">
                <p>Pan</p>
                <a href="https://gjirafamall.com/tigan-lamart-flint-lt1175-28x53cm-i-hirte-2">
                    <button>Shop Now</button>
                </a>
            </div>
        </div>
        <button type="button" class="buttonSlider2" onclick="prevSlider2()">Prev</button>
        <button type="button" class="buttonSlider2" onclick="nextSlider2()">Next</button>
    </div>

    <script>
        var count = 0;
        var inc = 0;
        var margin = 0;
        var slider2 = document.getElementsByClassName("slider2-width")[0];
        var itemDisplay = 0;
        if (screen.width > 990) {
            itemDisplay = document.getElementsByClassName("slider2")[0].getAttribute("item-display-d")
            margin = itemDisplay * 5;
        }
        if (screen.width > 700 && screen.width < 990) {
            itemDisplay = document.getElementsByClassName("slider2")[0].getAttribute("item-display-t")
            margin = itemDisplay * 6.8;
        }
        if (screen.width > 280 && screen.width < 700) {
            itemDisplay = document.getElementsByClassName("slider2")[0].getAttribute("item-display-m")
            margin = itemDisplay * 20;
        }

        var item = document.getElementsByClassName("item2");
        var itemleft = item.length % itemDisplay;
        var itemSlide = Math.floor(item.length / itemDisplay) - 1;

        for (let i = 0; i < item.length; i++) {
            item[i].style.width = (screen.width / itemDisplay) - margin + "px";
        }

        function nextSlider2() {
            if (inc !== itemSlide + itemleft) {
                if (inc === itemSlide) {
                    inc = inc + itemleft;
                    count = count - (screen.width / itemDisplay) * itemleft;
                } else {
                    inc++;
                    count = count - screen.width;
                }
            }

            slider2.style.left = count + "px";
        }

        function prevSlider2() {
            if (inc !== 0) {
                if (inc === itemleft) {
                    inc = inc - itemleft;
                    count = count - (screen.width / itemDisplay) * itemleft;
                } else {
                    inc--;
                    count = count + screen.width;
                }
            }

            slider2.style.left = count + "px";
        }
    </script>


    <div id="id4">
        <p>Cutlery</p>
    </div>

    <div class="slider3" item-display-d="5" item-display-t="4" item-display-m="2">
        <div class="slider3-width">
            <div class="item3">
                <img src="/images/kitchenknife.jpg" alt="">
                <p>Kitchen Knife</p>
                <a href="https://gjirafamall.com/thike-klasike-victorinox-per-prerje-te-filetos-e-zeze#SearchResults">
                    <button>Shop Now</button>
                </a>
            </div>
            <div class="item3">
                <img src="/images/thebreadknife.jpg" alt="">
                <p>The Bread Knife</p>
                <a href="https://gjirafamall.com/thike-per-prerjen-e-bukes-e-valezuar-victorinox-fibrox-e-zeze#SearchResults">
                    <button>Shop Now</button>
                </a>
            </div>
            <div class="item3">
                <img src="/images/thecleaverknife.jpg" alt="">
                <p>The Cleaver Knife</p>
                <a href="https://gjirafamall.com/thike-kuzhine-wmf-grand-gourmet-chinese-285-cm#SearchResults">
                    <button>Shop Now</button>
                </a>
            </div>
            <div class="item3">
                <img src="/images/thekitchenshears.jpg" alt="">
                <p>The Kitchen Shears</p>
                <a href="https://gjirafamall.com/gershere-fiskars-per-kuzhine-bardhezeze-1#SearchResults">
                    <button>Shop Now</button>
                </a>
            </div>
            <div class="item3">
                <img src="/images/rollingknife.jpg" alt="">
                <p>Rolling knife</p>
                <a href="https://gjirafamall.com/thike-rrote-fiskars-per-pice-zezeportokalli-1#SearchResults">
                    <button>Shop Now</button>
                </a>
            </div>
            <div class="item3">
                <img src="/images/milkfrother.jpg" alt="">
                <p>Milk Frother</p>
                <a href="https://gjirafamall.com/pajisje-shkumezuese-per-qumesht-esperanza-latte-ekf001-e-kuqe">
                    <button>Shop Now</button>
                </a>
            </div>
            <div class="item3">
                <img src="/images/ladle.jpg" alt="">
                <p>Ladle</p>
                <a href="https://gjirafamall.com/garuzhde-lamart-lt3975-e-kaft">
                    <button>Shop Now</button>
                </a>
            </div>
            <div class="item3">
                <img src="/images/meathammer.jpg" alt="">
                <p>Meat Hammer</p>
                <a href="https://gjirafamall.com/cekic-mishi-lamart-lt2096-i-hirte">
                    <button>Shop Now</button>
                </a>
            </div>
            <div class="item3">
                <img src="/images/bottleopener.jpg" alt="">
                <p>Bottle Opener</p>
                <a href="https://gjirafamall.com/hapese-per-shishe-lamart-lt2074-15cm-e-hirte">
                    <button>Shop Now</button>
                </a>
            </div>
            <div class="item3">
                <img src="/images/potatopeeler.jpg" alt="">
                <p>Potato Peeler</p>
                <a href="https://gjirafamall.com/qerues-patatesh-lamart-lt2095-e-hirte">
                    <button>Shop Now</button>
                </a>
            </div>
        </div>
        <button type="button" class="buttonSlider3" onclick="prevSlider3()">Prev</button>
        <button type="button" class="buttonSlider3" onclick="nextSlider3()">Next</button>
    </div>

    <script>
        var count = 0;
        var inc = 0;
        var margin = 0;
        var slider3 = document.getElementsByClassName("slider3-width")[0];
        var itemDisplay = 0;
        if (screen.width > 990) {
            itemDisplay = document.getElementsByClassName("slider3")[0].getAttribute("item-display-d")
            margin = itemDisplay * 5;
        }
        if (screen.width > 700 && screen.width < 990) {
            itemDisplay = document.getElementsByClassName("slider3")[0].getAttribute("item-display-t")
            margin = itemDisplay * 6.8;
        }
        if (screen.width > 280 && screen.width < 700) {
            itemDisplay = document.getElementsByClassName("slider3")[0].getAttribute("item-display-m")
            margin = itemDisplay * 20;
        }

        var item = document.getElementsByClassName("item3");
        var itemleft = item.length % itemDisplay;
        var itemSlide = Math.floor(item.length / itemDisplay) - 1;

        for (let i = 0; i < item.length; i++) {
            item[i].style.width = (screen.width / itemDisplay) - margin + "px";
        }

        function nextSlider3() {
            if (inc !== itemSlide + itemleft) {
                if (inc === itemSlide) {
                    inc = inc + itemleft;
                    count = count - (screen.width / itemDisplay) * itemleft;
                } else {
                    inc++;
                    count = count - screen.width;
                }
            }

            slider3.style.left = count + "px";
        }

        function prevSlider3() {
            if (inc !== 0) {
                if (inc === itemleft) {
                    inc = inc - itemleft;
                    count = count - (screen.width / itemDisplay) * itemleft;
                } else {
                    inc--;
                    count = count + screen.width;
                }
            }

            slider3.style.left = count + "px";
        }
    </script>

    <?php include('../footer.php') ?>

</body>

</html>