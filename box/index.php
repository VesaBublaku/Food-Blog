<?php
session_start();
require_once("../Database.php");
$db = new Database();
$conn = $db->getConnection();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}

if (isset($_GET["recipeId"]) && isset($_GET["action"])) {
    $recipe_id = $_GET["recipeId"];
    $action = $_GET["action"];
    $stmt = null;
    if ($action == 'remove') {
        $stmt = $conn->prepare("DELETE FROM user_recipes WHERE recipe_id = :recipe_id");
        $stmt->bindParam(":recipe_id", $recipe_id);
    } else {
        $stmt = $conn->prepare("INSERT INTO user_recipes (user_id, recipe_id) VALUES (:user_id, :recipe_id)");
        $stmt->bindParam(":recipe_id", $recipe_id);
        $stmt->bindParam(":user_id", $_SESSION['user']['id']);
    }
    if ($stmt->execute()) {
        http_response_code(200);
    } else {
        http_response_code(500);
    }
    exit();
}

$sql = "SELECT * FROM recipe r JOIN user_recipes ur ON ur.recipe_id = r.id WHERE ur.user_id = :user_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $_SESSION['user']['id']);
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

        .collection {
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

<div class="collection">
        <a href="/index.php">Home</a><span>></span>
        <a>My Recipe Collection</a>
    </div>

<div class="recipe-container">
    <?php if (!empty($recipes)): ?>
        <div class="recipe-grid">
            <?php foreach ($recipes as $recipe): ?>
                <div class="recipe-card">
                    <a href="/recipe/index.php?id=<?php echo $recipe['id'] ?>">
                        <img src="<?php echo $recipe['image'] ?>" alt="">
                        <button onclick="removeRecipe(event, <?php echo $recipe['id'] ?>)">Remove</button>

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
    function removeRecipe(event, recipeId) {
        event.preventDefault(); // Prevent any default action

        var xhr = new XMLHttpRequest();
        xhr.open("GET", `/box/index.php?recipeId=${recipeId}&action=remove`, true);

        xhr.onload = function () {
            if (xhr.status === 200) {
                var button = event.target;
                var recipeCard = button.closest('.recipe-card');
                if (recipeCard) {
                    recipeCard.remove();
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