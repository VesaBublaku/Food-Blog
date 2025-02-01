<?php
session_start();
require_once("Database.php");

$user_id = '';

if (isset($_SESSION['user'])) {
    $user_id = $_SESSION['user']['id'];
}

$db = new Database();
$conn = $db->getConnection();
$sql = "SELECT * FROM category";
$stmt = $conn->prepare($sql);
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT r.*, ur.user_id FROM recipe r LEFT JOIN user_recipes ur ON r.id = ur.recipe_id AND ur.user_id = :user_id ORDER BY date_created DESC LIMIT 10";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<style>
    body {
            min-height: 100vh;
            width: 100%;
            display: flex;
            flex-direction: column;
            margin: 0;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>

<body>
<?php include('header.php') ?>
<?php include('menu.php') ?>

<div class="category-container">
    <?php if (!empty($categories)): ?>
        <?php foreach ($categories as $category): ?>
            <div class="category-card">
                <a href="/Food-Blog/category/index.php?slug=<?php echo $category['slug'] ?>">
                    <img src="<?php echo $category['image'] ?>" alt="">
                    <p><?php echo $category['name'] ?></p>
                </a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No categories found</p>
    <?php endif; ?>
</div>

<div class="cookbook">
    <div><img src="/images/cookbook.jpg" alt=""></div>
    <div>
        <h3>Preorder the newest cookbook! On sale December 18th!</h3>
        <h1>The First Mess Cookbook</h1>
        <p>Discover delicious recipes and cozy culinary inspiration in the latest cookbook release. Don’t miss the
            chance to attend a special signing event and meet the author in person!</p>
        <a href="Cookbooks-page.html">
            <button>PREORDER</button>
        </a>
    </div>
</div>

<div class="aboutme">
    <div class="text-aboutme">
        <h3>About us</h3>
        <p>By day, I navigate the fast-paced world of IT, tackling challenges and finding solutions, but as evening sets
            in, I step into my kitchen where my true passion unfolds. Living in Oregon with my partner, Jake, has
            inspired my love for fresh, local ingredients, especially those I find while wandering through weekend
            farmers' markets. The joy of creating new recipes, whether it's testing out innovative flavor combinations
            or perfecting old favorites, keeps my evenings vibrant. And nothing compares to the satisfaction of ending
            the day with a homemade dessert, whether it's a rich chocolate torte or a tangy lemon tart.</p>
    </div>
    <div><img src="/images/aboutme2.jpg" alt=""></div>
    <div><img src="/images/aboutme1.jpg" alt=""></div>
</div>

<div id="t1"><h2>Latest Recipes</h2></div>

<div class="recipe-container">
    <?php if (!empty($recipes)): ?>
        <div class="recipe-grid">
            <?php foreach ($recipes as $recipe): ?>
                <div class="recipe-card">
                    <a href="/recipe/index.php?id=<?php echo $recipe['id'] ?>">
                        <img src="<?php echo $recipe['image'] ?>" alt="">
                        <?php if (isset($_SESSION['user'])): ?>
                            <?php if ($recipe['user_id']): ?>
                                <button onclick="toggleRecipe(event, <?php echo $recipe['id'] ?>, 'remove')">Remove</button>
                            <?php else: ?>
                                <button onclick="toggleRecipe(event, <?php echo $recipe['id'] ?>, 'save')">Save Recipe</button>
                            <?php endif; ?>
                        <?php endif; ?>
                        <h4><?php echo $recipe['title'] ?></h4>
                        <i><?php echo date('F d, Y H:i', strtotime($recipe['date_created'])) ?></i>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No recipe found</p>
    <?php endif; ?>
</div>

<?php include('footer.php') ?>
<script>
    function toggleRecipe(event, recipeId, action) {
        event.preventDefault(); 

        var xhr = new XMLHttpRequest();
        xhr.open("GET", `/box/index.php?recipeId=${recipeId}&action=${action}`, true);

        xhr.onload = function () {
            if (xhr.status === 200) {
                const button = event.target;
                if (action === 'remove') {
                    button.textContent = 'Save Recipe';
                    button.setAttribute('onclick', `toggleRecipe(event, ${recipeId}, 'save')`);
                } else if (action === 'save') {
                    button.textContent = 'Remove';
                    button.setAttribute('onclick', `toggleRecipe(event, ${recipeId}, 'remove')`);
                }
            } else {
                console.error('Request failed. Status:', xhr.status);
                alert('An error occurred. Please try again.');
            }
        };
        xhr.send();
    }
</script>

</html>