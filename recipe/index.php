<?php
session_start();
require_once("../Database.php");
if (!isset($_GET['id'])) {
    header("Location: /index.php");
}

$id = $_GET['id'];
$db = new Database();
$conn = $db->getConnection();
$sql = "SELECT r.*, c.name as category FROM recipe r JOIN category c ON c.id = r.category_id WHERE r.id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->execute();
$recipe = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../styles.css">
    <title><?php echo $recipe['title']?></title>
    <style>
        body {
            min-height: 100vh;
            width: 100%;
            display: flex;
            flex-direction: column;
            margin: 0;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 20px;
        }

        .recipe-container {
            flex: 1;
            width: 80%;
            max-width: 820px;
            margin: 0 auto;
            margin-bottom: 40px;
        }

        .recipe-title {
            text-align: center;
        }

        .image {
            display: block;
        }

        .image img {
            width: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>
<?php include('../header.php') ?>
<?php include('../menu.php') ?>

<div class="recipe-container">

    <h2 class="recipe-title">
        <?php echo $recipe['title']; ?>
    </h2>

    <div class="image">
        <img src="<?php echo $recipe['image']; ?>" alt="">
    </div>

    <div class="recipe-content">
        <?php echo $recipe['content'] ?>
    </div>
</div>

<?php include('../footer.php') ?>
</body>

</html>