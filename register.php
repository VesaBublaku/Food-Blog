<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("Database.php");

    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $db = new Database();
    $conn = $db->getConnection();

    $sql = "INSERT INTO user (username, email, password, date, phone, role) VALUES (:username, :email, :password, :date, :phone, 'user')";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $_POST["username"]);
    $stmt->bindParam(':email', $_POST["email"]);
    $stmt->bindParam(':date', $_POST["date"]);
    $stmt->bindParam(':phone', $_POST["phone"]);
    $stmt->bindParam(':password', $hashedPassword);

    if ($stmt->execute()) {
        http_response_code(200);
    } else {
        http_response_code(400);
    }
    exit();
}
