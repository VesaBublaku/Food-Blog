<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Cookbooks - Bite By Bite</title>
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

        #searchInput {
            padding: 10px;
            font-size: 15px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            border: 1px solid #ddd;
            border-radius: 4px;
            flex: 1;
            display: none;
        }

        .cookbook {
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
            padding: 0px;
            font-size: 25px;
            background-color: #f7f6f3;
        }


        .cookbook-1,
        .cookbook-2,
        .cookbook-3,
        .cookbook-4 {
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            justify-content: space-around;
            background-color: #f7f6f3;
            padding-bottom: 70px;
        }

        .cookbook-1 img,
        .cookbook-2 img,
        .cookbook-3 img,
        .cookbook-4 img {
            width: auto;
            height: auto;
            max-width: 350px;
            max-height: 400px;
        }

        .text-1,
        .text-2,
        .text-3,
        .text-4 {
            display: flex;
            flex-wrap: wrap;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 18px;
            max-width: 700px;
        }

        .description-1 h3,
        .description-2 h3,
        .description-3 h3,
        .description-4 h3 {
            margin-bottom: 20px;
        }

        #p1,
        #p2 {
            font-weight: bold;
        }

        #p3 {
            font-size: 20px;
        }

        .order-1,
        .order-2,
        .order-3,
        .order-4 {
            display: flex;
            flex-wrap: wrap;
            padding-top: 10px;
            gap: 20px;
        }

        .order-1 button,
        .order-2 button,
        .order-3 button,
        .order-4 button {
            padding: 10px 20px;
        }

        #p4,
        #p7,
        #p8 {
            font-weight: bold;
        }

        #p5,
        #p6,
        #p9 {
            font-size: 20px;
        }
    </style>
</head>

<body>
    <?php include('../header.php') ?>
    <?php include('../menu.php') ?>

    <div class="cookbook">
        <a href="/index.php">Home</a><span>></span>
        <a>Cookbooks</a>
    </div>

    <div id="id1">
        <p>Cookbooks</p>
    </div>


    <div id="cookbook-1" class="cookbook-1">

        <div>
            <img src="/images/thefirstmesscookbook.png" alt="">
        </div>

        <div class="text-1">
            <div class="description-1">
                <h3>The First Mess Cookbook: Vibrant Plant-Based Recipes to Eat Well Through the Seasons</h3>
                <p id="p1">The blogger behind the Saveur award-winning blog The First Mess shares more than 125 beautifully
                    prepared seasonal whole-food recipes.</p>
                <p id="p2">“This plant-based collection of recipes is full of color, good ideas, clever tricks you’ll want
                    to know.”—Deborah Madison, author of Vegetable Literacy and The New Vegetarian Cooking for Everyone</p>
                <p>Home cooks head to The First Mess for Laura Wright’s simple-to-prepare seasonal vegan recipes but stay
                    for her beautiful photographs and enchanting storytelling. In her debut cookbook, Wright presents a
                    visually stunning collection of heirloom-quality recipes highlighting the beauty of the seasons. Her 125
                    produce-forward recipes showcase the best each season has to offer and, as a whole, demonstrate that
                    plant-based wellness is both accessible and delicious.</p>
                <p>Wright grew up working at her family’s local food market and vegetable patch in southern Ontario, where
                    fully stocked root cellars in the winter and armfuls of fresh produce in the spring and summer were the
                    norm. After attending culinary school and working for one of Canada’s original local food chefs, she
                    launched The First Mess at the urging of her friends in order to share the delicious, no-fuss, healthy,
                    seasonal meals she grew up eating, and she quickly attracted a large, international following.</p>
                <p>The First Mess Cookbook is filled with more of the exquisitely prepared whole-food recipes and Wright’s
                    signature transporting, magical photography. With recipes for every meal of the day, such as Fluffy
                    Whole Grain Pancakes, Romanesco Confetti Salad with Meyer Lemon Dressing, Roasted Eggplant and Olive
                    Bolognese, and desserts such as Earl Grey and Vanilla Bean Tiramisu, The First Mess Cookbook is a
                    must-have for any home cook looking to prepare nourishing plant-based meals with the best the seasons
                    have to offer.</p>
                <p id="p3">Order Now:</p>
            </div>

            <div class="order-1">
                <a href="https://www.amazon.com/First-Mess-Cookbook-Vibrant-Plant-Based/dp/1583335900/ref=as_li_ss_tl?s=books&ie=UTF8&qid=1477927422&sr=1-1&keywords=the+first+mess+cookbook&linkCode=sl1&tag=&linkId=0e27e09788c08be044c76ec36a207411">
                    <button>Amazon</button>
                </a>
            </div>
        </div>

    </div>

    <div id="cookbook-2" class="cookbook-2">

        <div class="text-2">
            <div class="description-2">
                <h3>Well+Good Cookbook: 100 Healthy Recipes + Expert Advice for Better Living </h3>
                <p id="p4">RECIPES TO IMPROVE YOUR SKIN, SLEEP, MOOD, ENERGY, FOCUS, DIGESTION, AND SEX</p>
                <p>From the trusted, influential, and famously trend-setting website comes the first ever Well+Good
                    cookbook. Founders Alexia Brue and Melisse Gelula have curated a collection of 100 easy and delicious
                    recipes from the luminaries across their community to help you eat for wellness. These dishes don’t
                    require a million ingredients or crazy long prep times. They are what the buzziest and busiest people in
                    every facet of the wellness world—fitness, beauty, spirituality, women’s health, and more—cook for
                    themselves. Enjoy Venus Williams’ Jalapeno Vegan Burrito, Kelly LeVeque’s Chia + Flax Chicken Tenders,
                    Drew Ramsey’s Kale Salad with Chickpea Croutons, and Gabrielle Bernstein’s Tahini Fudge, among many
                    other recipes for every meal and snack time.</p>
                <p>Whether you want to totally transform your eating habits, clear up your skin, add more nutrient-rich
                    dishes to your repertoire, or sleep more soundly, you’ll find what you need in this book. Along with
                    go-deep guides on specific wellness topics contributed by experts, this gorgeous cookbook delivers a
                    little more wellness in every bite. </p>
                <p id="p5">Order Now:</p>
            </div>

            <div class="order-2">
                <a href="https://www.amazon.com/Well-Good-Healthy-Recipes-Expert/dp/1984823191">
                    <button>Amazon</button>
                </a>
            </div>
        </div>

        <div>
            <img src="../images/well+good.jpg" alt="">
        </div>

    </div>

    <div id="cookbook-3" class="cookbook-3">

        <div>
            <img src="/images/zaika.jpg" alt="">
        </div>

        <div class="text-3">
            <div class="description-3">
                <h3>Zaika: Vegan recipes from India </h3>
                <p>With a foreword by the OBSERVER FOOD MONTHLY's editor, Allan Jenkins, ZAIKA celebrates the very best of
                    Indian vegan cooking. With over 100 innovative and exciting curries and side dishes, vegan recipes have
                    never been so inviting.Inspired by her own heritage, Romy Gill M.B.E., has expertly written a collection
                    of recipes that not only delivers incredible vegan food but are simple to make - they can be made in a
                    hurry for a fast weekday supper or leisurely at the weekend to enjoy with friends. Most importantly,
                    they are a celebration and a timely reminder of the benefits of flavoursome vegan cuisine. The spices
                    used in Indian cooking are at the core of Ayurvedic medicine, with purported health benefits as diverse
                    as promoting digestion, bolstering the immune system, reducing inflammation - and even benefiting
                    prostate health. Realise the benefits of Indian veganism today with ZAIKA, with these classic yet fresh
                    vegan recipes.</p>
                <p id="p6">Order Now:</p>
            </div>

            <div class="order-3">
                <a href="https://www.amazon.com/Turmeric-Romy-Gill/dp/1841883050">
                    <button>Amazon</button>
                </a>
            </div>
        </div>

    </div>


    <div id="cookbook-4" class="cookbook-4">

        <div class="text-4">
            <div class="description-4">
                <h3>Living Bread: Tradition and Innovation in Artisan Bread Making: A Baking Book</h3>
                <p id="p7">2020 James Beard Award Winner</p>
                <p id="p8">The major new cookbook by the pioneer from Bread Alone, who revolutionized American artisan bread
                    baking, with 60 recipes inspired by bakers around the world.</p>
                <p>At twenty-two, Daniel Leader stumbled across the intoxicating perfume of bread baking in the back room of
                    a Parisian boulangerie, and he has loved and devoted himself to making quality bread ever since. He went
                    on to create Bread Alone, the now-iconic bakery that has become one of the most beloved artisan bread
                    companies in the country. Today, professional bakers and bread enthusiasts from all over the world flock
                    to Bread Alone's headquarters in the Catskills to learn Dan's signature techniques and baking
                    philosophy.</p>
                <p>But though Leader is a towering figure in bread baking, he still considers himself a student of the
                    craft, and his curiosity is boundless. In this groundbreaking book, he offers a comprehensive picture of
                    bread baking today for the enthusiastic home baker. With inspiration from a community of millers,
                    farmers, bakers, and scientists, Living Bread provides a fascinating look into the way artisan bread
                    baking has evolved and continues to change--from wheat farming practices and advances in milling, to
                    sourdough starters and the mechanics of mixing dough. Influenced by art and science in equal measure,
                    Leader presents exciting twists on classics such as Curry Tomato Ciabatta, Vegan Brioche, and Chocolate
                    Sourdough Babka, as well as traditional recipes. Sprinkled with anecdotes and evocative photos from
                    Leader's own travels and encounters with artisans who have influenced him, Living Bread is a love
                    letter, and a cutting-edge guide, to the practice of making "good bread."</p>
                <p id="p9">Order Now:</p>
            </div>

            <div class="order-4">
                <a href="https://www.amazon.com/Living-Bread-Tradition-Innovation-Artisan/dp/0735213836">
                    <button>Amazon</button>
                </a>
            </div>
        </div>

        <div>
            <img src="/images/livingbread.jpg" alt="">
        </div>

    </div>

    <?php include('../footer.php') ?>
</body>

</html>