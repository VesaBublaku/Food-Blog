<?php
session_start();
require_once("Database.php");

$db = new Database();
$conn = $db->getConnection();

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM user WHERE email = :email";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if ($user && password_verify($password, $user["password"])) {
    $_SESSION["user"] = [
        "id" => $user["id"],
        "username" => $user["username"],
        "email" => $user["email"],
        "role" => $user["role"],
    ];

    if ($user["role"] == "user") {
        header("Location: index.php");
        exit();
    } elseif ($user["role"] == "admin") {
        header("Location: /admin/index.php");
        exit();
    } else {
        http_response_code(403);
    }
} else {
    http_response_code(401);
}
exit();
