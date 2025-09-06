<?php
require_once 'db.php';

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function login($username, $password) {
    include 'db.php';
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        return true;
    }
    return false;
}

function logout() {
    session_destroy();
    header("Location: login.php");
    exit();
}

function checkAdmin() {
    if (!isLoggedIn() || $_SESSION['user_role'] !== 'admin') {
        header("Location: login.php");
        exit();
    }
}
?>