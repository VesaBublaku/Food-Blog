<?php
$category = '';
if (isset($_GET['slug'])) {
    $allowedCategories = ['drinks', 'dinner', 'dessert', 'breakfast'];
    $category = $_GET['slug'];
    if (!in_array($category, $allowedCategories, true)) {
        header('Location: /index.php');
    }
} else {
    header("location: index.php");
}

require_once("../Database.php");

$db = new Database();
$conn = $db->getConnection();
$sql = "SELECT r.* FROM recipe r JOIN category c ON r.category_id = c.id WHERE c.slug = :slug ORDER BY date_created DESC ";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':slug', $category);
$stmt->execute();
$recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../styles.css">
    <title><?php echo ucwords($category) ?></title>
</head>
<body>
<?php include('../header.php') ?>
<?php include('../menu.php') ?>
<div class="breadcrumb">
    <a href="/Food-Blog/index.php">Home</a> <span>></span>
    <a><?php echo ucwords($category) ?></a>
</div>

<div class="recipe-container">
    <?php if (!empty($recipes)): ?>
        <div class="recipe-grid">
            <?php foreach ($recipes as $recipe): ?>
                <div class="recipe-card">
                    <a href="/Food-Blog/recipe/index.php?id=<?php echo $recipe['id'] ?>">
                        <img src="<?php echo $recipe['image'] ?>" alt="">
                        <?php if (isset($_SESSION['user'])): ?>
                            <button onclick="toggleRecipe(event, <?php echo $recipe['id'] ?>, 'save')">Save Recipe</button>
                                <?php else: ?>
                                    <button onclick="toggleRecipe(event, <?php echo $recipe['id'] ?>, 'remove')">Remove</button>
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

<?php include('../footer.php') ?>

<script>
    function toggleRecipe(event, recipeId, action) {
        event.preventDefault(); // Prevent any default action

        var xhr = new XMLHttpRequest();
        xhr.open("GET", `/Food-Blog/box/index.php?recipeId=${recipeId}&action=${action}`, true);

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

</body>

</html>