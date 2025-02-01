<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header("location: /index.php");
}
require_once("../Database.php");
$db = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $title = $_POST["title"];
    $content = $_POST["content"];
    $image = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/../images/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $tempPath = $_FILES['image']['tmp_name'];
        $image = basename($_FILES['image']['name']);
        $targetPath = $uploadDir . $image;
        if (!move_uploaded_file($tempPath, $targetPath)) {
            http_response_code(400);
        }
    } else {
        http_response_code(400);
    }
    $imageToBeSaved = '/images/' . $image;
    $conn = $db->getConnection();
    $stmt = $conn->prepare("INSERT INTO recipe (title, content, image, category_id) VALUES (:title, :content, :image, :category)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':image', $imageToBeSaved);
    $stmt->bindParam(':category', $category);
    if ($stmt->execute()) {
        http_response_code(200);
    } else {
        http_response_code(400);
    }
    exit();
}

$categories = [];
$conn = $db->getConnection();
$stmt = $conn->prepare("SELECT * FROM category");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-beta.0/dist/quill.core.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-beta.0/dist/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
    <title>New Recipe</title>
    <style>
        body {
            min-height: 100vh;
            width: 100%;
            display: flex;
            flex-direction: column;
            margin: 0;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 8px;
            padding: 8px 8px;
            flex: 1;
        }

        .category-select {
            height: 30px;
        }

        .image-upload {
            margin-bottom: 8px;
        }
    </style>
</head>

<body>
<?php include('../header.php') ?>
<?php include('../menu.php') ?>

<form class="form sign-up" action="?action=signup" method="post">
    <h2>Create Recipe</h2>
    <input class="image-upload" type="file" name="image" id="image"/>
    <input type="text" placeholder="Title" name="title" id="title">
    <select class="category-select" name="categories" id="categories">
        <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <div id="editor"></div>
    <button type="submit" class="submit-recipe">Confirm</button>
</form>

<?php include('../footer.php') ?>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.0-beta.0/dist/quill.core.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.0-beta.0/dist/quill.min.js"></script>
<script defer>
    const quill = new Quill('#editor', {
        modules: {
            toolbar: [
                [{header: [1, 2, 3, 4, 5, 6, false]}],
                ['bold', 'italic', 'underline'],
                [{list: 'ordered'}, {list: 'bullet'}],
                ['link', 'image'],
                [{'script': 'sub'}, {'script': 'super'}],
                [{'color': []}, {'background': []}],
                [{'align': []}],
            ],
        },
        placeholder: 'Compose an epic...',
        theme: 'snow',
    });
    document.querySelector(".submit-recipe").addEventListener('click', (event) => {
        event.preventDefault();
        const category = document.getElementById("categories").value;
        const title = document.getElementById("title").value;
        const semanticHTML = quill.getSemanticHTML();
        const formData = new FormData();
        formData.append("content", semanticHTML);
        formData.append("category", category);
        formData.append("title", title);
        const imageFile = document.getElementById("image").files[0];
        if (imageFile) {
            formData.append("image", imageFile);
        }
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/admin/index.php", true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                window.location.href = '/index.php';
            } else {
                console.error("Error:", xhr.statusText);
            }
        };
        xhr.send(formData);
    });
</script>
</body>

</html>