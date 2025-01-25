<?php
session_start();
require_once("Database.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();
    if (isset($_GET['action']) && $_GET['action'] == "signup") {
        $_SESSION["signup"] = [
            "username" => $_POST["username"],
            "email" => $_POST["email"],
            "date" => $_POST["date"],
            "phone" => $_POST["phone"],
            "password" => $_POST["password"]
        ];
        $db = new Database();
        $conn = $db->getConnection();
        $sql = "INSERT INTO user (username, email, password, date, phone) VALUES (:username, :email, :password, :date, :phone)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $_POST["username"]);
        $stmt->bindParam(':email', $_POST["email"]);
        $stmt->bindParam(':date', $_POST["date"]);
        $stmt->bindParam(':phone', $_POST["phone"]);
        $stmt->bindParam(':password', $_POST["password"]);
        // Execute the query
        if ($stmt->execute()) {
            $_SESSION["signup_success"] = true;
        } else {
            $_SESSION["signup_success"] = false;
        }
    } elseif (isset($_GET['action']) && $_GET['action'] == "login") {
        $_SESSION["login"] = [
            "email" => $_POST["email"],
            "password" => $_POST["password"]
        ];
        echo "Login Successful!";
    }
    exit();
}
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Home - Bite by Bite</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <?php if (isset($_SESSION['success']) && $_SESSION['success']): ?>
        <div>Bravo u regjistrove</div>
    <?php elseif (isset($_SESSION['success']) && !$_SESSION['success']): ?>
        <div>Bravo e bone berllog</div>
    <?php endif; ?>

    <div class="account">
        <a href="#signUpModal"> <p>Save your Favorite Recipes (Create an Account)</p></a> 
     </div>
 
     <div id="signUpModal" class="modal-overlay">
        <div class="modal">
            <a href="#" class="close-btn">&times;</a>
            <form class="sign-up-form" action="?action=signup" method="post">
                <h2>Sign Up</h2>
                <div class="input-group">
                    <label for="username">Full Name</label>
                    <input type="text" placeholder="Enter full name" id="username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" placeholder="example@gmail.com" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="date">Date of Birth</label>
                    <input type="date" id="date" name="date" required>
                </div>
                <div class="input-group">
                   <label for="phone">Phone Number</label>
                   <input type="tel" placeholder="044-111-222" id="phone" name="phone" required>
                </div>
                <div class="input-group">
                   <label for="password">Password</label>
                   <input type="password" placeholder="Enter password" id="password" name="password" required>
                </div>
                <div class="input-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" placeholder="Confirm password" id="confirm_password" name="confirm_password" required>
                </div>
                <button type="submit" id="signupSubmit">Confirm</button>
                <p>Already have an account?<a href="#logInModal" id="a1">Login</a></p>
            </form>
        </div>
    </div>


    <div id="logInModal" class="modal-overlay2">
       <div class="modal2">
           <a href="#" class="close-btn">&times;</a>
           <form class="log-in-form" action="?action=login" method="post">
               <h2>Welcome back</h2>
               <p>Login to your account below</p>
               <div class="input-group">
                   <label for="email">Email</label>
                   <input type="email" placeholder="example@gmail.com" id="email_login" name="email" required>
               </div>
               <div class="input-group">
                  <label for="password">Password</label>
                  <input type="password" placeholder="Enter password" id="password_login" name="password" required>
               </div>
               <button type="submit" id="b2">Login</button>
           </form>
       </div>
   </div>


    <div class="nav">
        <div class="logo">Bite by Bite</div>
        <ul class= "list" type="none">
            <li><a href="Home-page.html">Home</a></li>
            <li><a href="Recipe-page1.html">Recipes</a></li>
            <li><a href="Shop-page.html">Shop</a></li>
            <li><a href="Cookbooks-page.html">Cookbooks</a></li>
            <li><a href="Myrecipebox-page.html">My Recipe Box</a></li>
        </ul>

        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Enter your search term" />
            <div class="searchIcon" id="searchIcon">
                <i class="fas fa-search"></i>
            </div>
        </div>

    </div>


    <div class="recipes">
        <div>
            <a href="Drinks-page.html"><img src="images/drink.jpg" alt=""><p>Drinks</p></a>
        </div>

        <div>
            <a href="Breakfast-page.html"><img src="images/breakfast.jpg" alt=""><p>Breakfast</p></a>
        </div>

        <div>
            <a href="Dinner-page.html"><img src="images/dinner.jpg" alt=""><p>Dinner</p></a>
        </div>

        <div>
            <a href="Dessert-page.html"><img src="images/dessert.jpg" alt=""><p>Dessert</p></a>
        </div>
    </div>


    <div class="cookbook">
        <div> <img src="images/cookbook.jpg" alt=""> </div>
        <div>
            <h3>Preorder the newest cookbook! On sale December 18th!</h3>
            <h1>The First Mess Cookbook</h1>
            <p>Discover delicious recipes and cozy culinary inspiration in the latest cookbook release. Don’t miss the chance to attend a special signing event and meet the author in person!</p>
            <a href="Cookbooks-page.html"><button>PREORDER</button></a>
        </div>
    </div>


    <div class="aboutme">
        <div class="text-aboutme">
            <h3>About me</h3>
            <p>By day, I navigate the fast-paced world of IT, tackling challenges and finding solutions, but as evening sets in, I step into my kitchen where my true passion unfolds. Living in Oregon with my partner, Jake, has inspired my love for fresh, local ingredients, especially those I find while wandering through weekend farmers' markets. The joy of creating new recipes, whether it's testing out innovative flavor combinations or perfecting old favorites, keeps my evenings vibrant. And nothing compares to the satisfaction of ending the day with a homemade dessert, whether it's a rich chocolate torte or a tangy lemon tart.</p>
        </div>
        <div><img src="Images/aboutme2.jpg" alt=""></div>
        <div><img src="Images/aboutme1.jpg" alt=""></div>
    </div>


    <div id="t1"><h2>Latest Recipes</h2></div>


    <div class="food">
        <div>
            <a href="NoodleSoup-page.html"><img src="images/noodlesoup.jpg" alt="">
                <button>Save recipes</button>
                <p>RECIPES</p>
                <p>NOVEMBER 1,2024</p>
                <p>Noodle soup</p>
            </a>
        </div>

        <div >
            <a href="AppleTarte-page.html"><img src="images/appletart.jpg" alt="">
                <button>Save recipes</button>
                <p>RECIPES</p>
                <p>OCTOBER 3,2024</p>
                <p>Apple tarte</p>
            </a>
        </div>

        <div>
            <a href="ChickenBiryani-page.html"><img src="images/chickenbiryani.jpg" alt="">
                <button>Save recipes</button>
                <p>RECIPES</p>
                <p>NOVEMBER 4,2024</p>
                <p>Chicken Biryani </p>
            </a>
        </div>

        <div>
            <a href="PomegranateBraisedShortRibs-page.html"><img src="images/ribs.jpg" alt="">
                <button>Save recipes</button>
                <p>RECIPES</p>
                <p>OCTOBER 24,2024</p>
                <p>Pomegranate Braised Short Ribs</p>
            </a>
        </div>

        <div>
            <a href="KoreanBBQBurrito-page.html"><img src="Images/koreanbbqburrito.jpg" alt="">
            <button>Save recipes</button>
            <p>RECIPES</p>
            <p>OCTOBER 27,2024</p>
            <p>Korean BBQ Burrito</p>
        </a>
        </div>
    </div>


    <div class="food2">
        <div>
            <a href="BurrataBruschetta-page.html"><img src="images/burratabruschetta.jpg" alt="">
                <button>Save recipes</button>
                <p>RECIPES</p>
                <p>OCTOBER 14,2024</p>
                <p>Burrata Bruschetta</p>
            </a>
        </div>

        <div>
            <a href="BananaNutellaCrepe-page.html"><img src="images/banananutellacrepe.jpg" alt="">
                <button>Save recipes</button>
                <p>RECIPES</p>
                <p>OCTOBER 23,2024</p>
                <p>Banana Nutella Crepe</p>
            </a>
        </div>

        <div>
            <a href="ChorizoPizza-page.html"><img src="images/chorizopizza.jpg" alt="">
                <button>Save recipes</button>
                <p>RECIPES</p>
                <p>NOVEMBER 2,2024</p>
                <p>Chorizo Pizza</p>
            </a>
        </div>

        <div>
            <a href="GreekChickenMeatballs-page.html"><img src="images/greekchickenmeatballs.jpg" alt="">
                <button>Save recipes</button>
                <p>RECIPES</p>
                <p>OCTOBER 29,2024</p>
                <p>Greek Chicken Meatballs</p>
            </a>
        </div>

        <div>
            <a href="CrunchyRollBowls-page.html"><img src="images/crunchyrollbowls.jpg" alt="">
                <button>Save recipes</button>
                <p>RECIPES</p>
                <p>OCTOBER 30,2024</p>
                <p>Crunchy Roll Bowls</p>
            </a>
        </div>
    </div>


    <div class="footer">
    
    <div class="footer-1">
    <div class="info">
        <div>
        <ul type="none">
            <a href=""><li><h4>Company</h4></li></a>
            <a href=""><li>Contact</li></a>
            <a href=""><li>Partner With Us</li></a>
            <a href=""><li>Press</li></a>
        </ul>
        </div>

        <div>
        <ul type="none">
                <a href=""><li><h4>Explore</h4></li></a>
                <a href="Recipe-page1.html"><li>Recipes</li></a>
                <a href="Shop-page.html"><li>Shop</li></a>
                <a href="Cookbooks-page.html"><li>Cookbooks</li></a>
        </ul>
         </div>

        <div>
        <ul type="none">
            <a href="#"><li><h4>Cookbook</h4></li></a>
            <a href="Cookbooks-page.html#cookbook-1"><li>The First Mess Cookbook</li></a>
            <a href="Cookbooks-page.html#cookbook-2"><li>WELL+GOOD</li></a>
            <a href="Cookbooks-page.html#cookbook-3"><li>Zaika</li></a>
            <a href="Cookbooks-page.html#cookbook-4"><li>Living Bread</li></a>
        </ul>
        </div>
    </div>

        <div class="socialmedia">
            <a href=""><i class="fa-brands fa-instagram" style="color: #ffffff;"></i></a>
            <a href=""><i class="fa-brands fa-facebook" style="color: #ffffff;"></i></a>
            <a href=""><i class="fa-brands fa-twitter" style="color: #ffffff;"></i></a>
            <a href=""><i class="fa-brands fa-instagram" style="color: #ffffff;"></i></a>
            <a href=""><i class="fa-brands fa-tiktok" style="color: #ffffff;"></i></a>

        </div>
    </div>

    <div class="footer-2">
            
        <h4>Sign up</h4>
        <select name="" id="n1">
            <option value="">Daily Recipe Updates</option>
            <option value="">Weekly Recipe Digest</option>
            <option value="">Weekly Meal Plan</option>
            <option value="">About Me</option>
            <option value="">Special Announcements</option>
        </select>
        <input id="n2" type="text" placeholder="First Name" required>
        <input id="n3" type="email" placeholder="Email Address" required>
        <a href="#footer2"><button id="n4">Subscribe</button></a>
    </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
    
    const loginForm = document.querySelector(".log-in-form");
    loginForm.addEventListener("submit", function (event) {
        event.preventDefault(); 

        const email_login = document.getElementById("email_login").value.trim();
        const password_login = document.getElementById("password_login").value.trim();

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email_login)) {
            alert("Invalid email address.");
            return false;
        }

        if (password_login === "") {
            alert("Password cannot be empty.");
            return false;
        }

        alert("Log in successful!");
        window.location.href = "Home-page.html"; 
    });

    const signupForm = document.querySelector(".sign-up-form");
    signupForm.addEventListener("submit", function (event) {
        event.preventDefault(); 

        const username = document.getElementById("username").value.trim();
        const email = document.getElementById("email").value.trim();
        const date = document.getElementById("date").value.trim();
        const phone = document.getElementById("phone").value.trim();
        const password = document.getElementById("password").value.trim();
        const confirmPassword = document.getElementById("confirm_password").value.trim();

        const usernameRegex = /^[a-zA-Z0-9_]{3,16}$/;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const dateRegex = /^\d{4}-\d{2}-\d{2}$/;
        const phoneNumberRegex = /^\+?[0-9\s\-()]{7,15}$/;
        const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;

        if (!usernameRegex.test(username)) {
            alert("Username must be 3–16 characters long and can contain letters, numbers, and underscores.");
            return false;
        }

        if (!emailRegex.test(email)) {
            alert("Invalid email address.");
            return false;
        }

        if (!dateRegex.test(date)) {
            alert("Date must be in the format YYYY-MM-DD.");
            return false;
        }

        if (!phoneNumberRegex.test(phone)) {
            alert("Invalid phone number.");
            return false;
        }

        if (!passwordRegex.test(password)) {
            alert("Password must be at least 8 characters long, include a letter, a number, and a special character.");
            return false;
        }

        if (confirmPassword !== password) {
            alert("Passwords do not match.");
            return false;
        }
        
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'index.php?action=signup', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(`username=${encodeURIComponent(username)}&email=${encodeURIComponent(email)}&date=${encodeURIComponent(date)}&phone=${encodeURIComponent(phone)}&password=${encodeURIComponent(password)}`);

    });
});
    </script>

<script>

    const searchInput = document.getElementById('searchInput');
    const searchIcon = document.getElementById('searchIcon');

    const recipes = {
        "noodle soup" : "NoodleSoup-page.html",
        "apple tarte": "AppleTarte-page.html",
        "chicken biryani": "ChickenBiryani-page.html",
        "pomegranate braised short ribs" : "PomegranateBraisedShortRibs-page.html",
        "korean bbq burrito": "KoreanBBQBurrito-page.html",
        "burrata bruschetta" : "BurrataBruschetta-page.html",
        "banana nutella crepe" : "BananaNutellaCrepe-page.html",
        "chorizo pizza" : "ChorizoPizza-page.html",
        "greek chicken meatballs" : "GreekChickenMeatballs-page.html",
        "crunchy roll bowls" : "CrunchyRollBowls-page.html", 
        "springy blueberry lemon bread" : "SpringyBlueberryLemonBread-page.html",
        "springy vegetable quiche" : "SpringyVegetableQuiche-page.html",
        "healthy carrot muffins" : "HealthyCarrotMuffins-page.html",
        "strawberry shortcake yogurt bowls" : "StrawberryShortcakeYogurtBowls-page.html",
        "protein pancakes" : "ProteinPancakes-page.html",
        "one-pot spicy eggsand potatoes" : "One-PotSpicyEggsandPotatoes-page.html",
        "berry chia overnight oats" : "BerryChiaOvernightOats-page.html",
        "migas" : "Migas-page.html",
        "creamy green shakshuka with rice" : "CreamyGreenShakshukawithRice-page.html",
        "chocolate granola" : "ChocolateGranola-page.html",
        "poached egg and avocado toast" : "PoachedEggandAvocadoToast.html",
        "oatmilk honey latte" : "OatmilkHoneyLatte-page.html",
        "breakfast sandwich" : "BreakfastSandwich-page.html",
        "egg and croissant brunch bake" : "EggandCroissantBrunchBake-page.html",
        "caramelized banana oatmeal" : "CaramelizedBananaOatmeal-page.html",
        "triple berry cheesecake muffins" : "TripleBerryCheesecakeMuffins-page.html",
        "green smoothie" : "GreenSmoothie-page.html",
        "soft scrambled eggs" : "SoftScrambledEggs-page.html",
        "oat bran for breakfast" : "OatBranforBreakfast-page.html",
        "cookie dough energy bites" : "CookieDoughEnergyBites-page.html",
        "english muffin baklava" : "EnglishMuffinBaklava-page.html",
        "danish pastry" : "DanishPastry-page.html",
        "homemade oreo cookies" : "HomemadeOreoCookies-page.html",
        "party brownies" : "PartyBrownies-page.html",
        "pumpkin caramel bread" : "PumpkinCaramelBread-page.html",
        "peanut butter pie" : "PeanutButterPie-page.html",
        "golden graham s'mores" : "GoldenGrahamS'mores-page.html",
        "pumpkin muffins" : "PumpkinMuffins-page.html",
        "raspberry crumble bars" : "RaspberryCrumbleBars-page.html",
        "pistachio loaf" : "PistachioLoaf-page.html",
        "cinnamon rolls" : "CinnamonRolls-page.html",
        "double chocolate cookies" : "DoubleChocolateCookies-page.html",
        "salted caramel rice krispie" : "SaltedCaramelRiceKrispie-page.html",
        "pumpkin shortcakes" : "PumpkinShortcakes-page.html",
        "turtle caramel cake" : "TurtleCaramelCake-page.html",
        "best puppy chow recipe" : "BestPuppyChowRecipe-page.html",
        "vegan chocolate pie" : "VeganChocolatePie-page.html",
        "bread pudding" : "BreadPudding-page.html",
        "apple crisp" : "AppleCrisp-page.html",
        "sweet potato casserole" : "SweetPotatoCasserole-page.html",
        "roasted cauliflower bowl" : "RoastedCauliflowerBowl-page.html",
        "creamy red pepper pasta" : "CreamyRedPepperPasta-page.html",
        "chicken tikka masala" : "ChickenTikkaMasala-page.html",
        "spring roll bowl" : "SpringRollBowl-page.html",
        "vegan crunchwrap supreme" : "VeganCrunchwrapSupreme-page.html",
        "ginger chicken meatball sandos" : "GingerChickenMeatballSandos-page.html",
        "japchae" : "Japchae-page.html",
        "chicken tacos with green sauce" : "ChickenTacosWithGreenSauce-page.html",
        "gochujang noodles with chicken" : "GochujangNoodleswithChicken-page.html",
        "olive garden salad" : "OliveGardenSalad-page.html",
        "creamy chicken and rice soup" : "CreamyChickenandRiceSoup-page.html",
        "smash burger" : "SmashBurger-page.html",
        "mucci's bucatini" : "Mucci'sBucatini-page.html",
        "spicy short rib ramen" : "SpicyShortRibRamen-page.html",
        "creamy tomato lasagna florentine" : "CreamyTomatoLasagnaFlorentine-page.html",
        "portobello french dip" : "PortobelloFrenchDip-page.html",
        "swedish meatballs" : "SwedishMeatballs-page.html",
        "crockpot carnitas" : "CrockpotCarnitas-page.html",
        "spicy sausage pasta" : "SpicySausagePasta-page.html",
        "spicy creamy coconut lime margaritas" : "SpicyCreamyCoconutLimeMargaritas-page.html",
        "naughty gingerbread cocktail" : "NaughtyGingerbreadCocktail-page.html",
        "who ville christmas punch" : "WhoVilleChristmasPunch-page.html",
        "mistletoe kiss cocktail" : "MistletoeKissCocktail-page.html",
        "hocus pocus old fashioned" : "HocusPocusOldFashioned-page.html",
        "spicy jalapeño ginger moscow mule" : "SpicyJalapeñoGingerMoscowMule-page.html",
        "chocolate espresso martini" : "ChocolateEspressoMartini-page.html",
        "christmas pomegranate punch" : "ChristmasPomegranatePunch-page.html",
        "frozen aperol peach margarita" : "FrozenAperolPeachMargarita-page.html",
        "strawberry mojito" : "StrawberryMojito-page.html",
        "bad santa white russian" : "BadSantaWhiteRussian-page.html",
        "chai espresso martini" : "ChaiEspressoMartini-page.html",
        "firecracker champagne paloma" : "FirecrackerChampagnePaloma-page.html",
        "spicy serrano pineapple margarita" : "SpicySerranoPineappleMargarita-page.html",
        "frozen blueberry paloma" : "FrozenBlueberryPaloma-page.html",
        "pink vodka watermelon lemonade" : "PinkVodkaWatermelonLemonade-page.html",
        "basil smash piña colada" : "BasilSmashPiñaColada-page.html",
        "creamy coconut lime mojito" : "CreamyCoconutLimeMojito-page.html",
        "the santa clause smash" : "TheSantaClauseSmash-page.html",
        "the spicy sweet grinch cocktail" : "TheSpicySweetGrinchCocktail-page.html",
        "salmon with avocado salsa" : "SalmonwithAvocadosalsa-page.html",
        "chicken with cocount kale" : "Chickenwithcocountkale-page.html",
        "spicy shrimp with peach salad" : "SpicyShrimpwithPeachSalad-page.html",
        "honey chipotle chicken skewers" : "HoneyChipotleChickenSkewers-page.html",
        "marry me chicken" : "MarryMeChicken-page.html",
        "shortcut sesame butter noodles" : "ShortcutSesameButterNoodles-page.html",
        "roasted mushroom sandwich" : "RoastedMushroomSandwich-page.html",
        "swedish pancakes" : "SwedishPancakes-page.html",
        "kale apple salad with crispy shallots" : "KaleAppleSaladwithCrispyShallots-page.html",
        "zucchini muffins" : "ZucchiniMuffins-page.html",
        "non-alcoholic margarita" : "Non-AlcoholicMargarita-page.html",
        "pickled strawberries" : "PickledStrawberries-page.html",
        "carrot cake coffee cake" : "CarrotCakeCoffeeCake-page.html",
        "vegetarian shepherd’s pie" : "VegetarianShepherd’sPie-page.html",
        "instant pot mac and cheese" : "InstantPotMacandCheese-page.html",
        "instant pot wild rice soup" : "InstantPotWildRiceSoup-page.html",
        "spicy sofritas tofu" : "SpicySofritasTofu-page.html",
        "cauliflower black bean tostadas" : "CauliflowerBlackBeanTostadas-page.html",
        "fruit pizza" : "FruitPizza-page.html",
        "zaalouk toasts with burrata" : "ZaaloukToastswithBurrata-page.html",
        "green bean casserole" : "GreenBeanCasserole-page.html",
        "chicken tortilla soup" : "ChickenTortillaSoup-page.html",
        "spicy pumpkin ginger soup" : "SpicyPumpkinGingerSoup-page.html",
        "sunday chili" : "SundayChili-page.html",
        "thai coconut soup with tofu and rice" : "ThaiCoconutSoupwithTofuandRice-page.html",
        "country chicken stew" : "CountryChickenStew-page.html",
        "maple-mustard tempeh bowls" : "Maple-MustardTempehBowls-page.html",
        "vegan mac and cheese" : "VeganMacandCheese-page.html",
        "slow cooked shredded beeragu pasta" : "SlowCookedShreddedBeeraguPasta-page.html",
        "cinnamon apple cake" : "CinnamonAppleCake-page.html",
        "lemon chicken with asparagus" : "LemonChickenwithAsparagus-page.html",
        "garlic butter shrimp" : "GarlicButterShrimp-page.html",
        "peach cobbler" : "PeachCobbler-page.html",
        "s'more bars" : "S'moreBars-page.html",
        "spaghetti with crispy zucchini" : "SpaghettiwithCrispyZucchini-page.html",
        "asian chicken salad" : "AsianChickenSalad-page.html",
        "spicy salmon burgers" : "SpicySalmonBurgers-page.html",
        "veggie enchiladas" : "VeggieEnchiladas-page.html",
        "instant pot chicken and dumplings" : "InstantPotChickenandDumplings-page.html",
        "sheet pan shrimp and cauli rice" : "SheetPanShrimpandCauliRice-page.html",
        "soft gingerbread cookies" : "SoftGingerbreadCookies-page.html",
        "spinach and artichoke pizza" : "SpinachandArtichokePizza.html",
        "mexican casserole" : "MexicanCasserole-page.html",
    };

    function performSearch() {
    const query = document.getElementById('searchInput').value.trim().toLowerCase();

    if (query) {
        const recipePage = recipes[query];

        if (recipePage) {
            window.location.href = recipePage;
        } else {
            alert("No recipes found.");
        }
    } else {
        alert("Please enter a search term.");
    }
}


    searchIcon.addEventListener('click', () => {
        searchIcon.style.display = 'none'; 
        searchInput.style.display = 'inline-block'; 
        searchInput.focus(); 
    });

    searchInput.addEventListener('keypress', (event) => {
        if (event.key === 'Enter') {
            performSearch();
        }
    });
</script>
</body>
</html>