<?php
session_start();
require_once("../Database.php");

$user_id = '';
if (isset($_SESSION['user'])) {
    $user_id = $_SESSION['user']['id'];
}

$db = new Database();
$conn = $db->getConnection();
$sql = "SELECT r.*, ur.user_id FROM recipe r LEFT JOIN user_recipes ur ON r.id = ur.recipe_id AND ur.user_id = :user_id ORDER BY r.date_created DESC";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
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
    <title>Recipes</title>
    <style>
        body {
            min-height: 100vh;
            width: 100%;
            display: flex;
            flex-direction: column;
            margin: 0;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }

        .recipe-container {
            flex: 1;
        }

        .recipes {
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

    </style>
</head>

<body>
    <?php include('../header.php') ?>
    <?php include('../menu.php') ?>

    <div class="recipes">
        <a href="/index.php">Home</a><span>></span>
        <a>Recipes</a>
    </div>

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

    <?php include('../footer.php') ?>
    <script>
        function toggleRecipe(event, recipeId, action) {
            event.preventDefault(); // Prevent any default action

            var xhr = new XMLHttpRequest();
            xhr.open("GET", `/box/index.php?recipeId=${recipeId}&action=${action}`, true);

            xhr.onload = function() {
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

            // For GET requests, you can simply call send() without any data.
            xhr.send();
        }
    </script>
</body>

</html>