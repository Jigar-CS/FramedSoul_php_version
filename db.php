<?php
// Database connection settings
$host = 'localhost';
$dbname = 'framed_soul';
$username = 'root'; // default XAMPP username
$password = ''; // default XAMPP password

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle connection error
    die("Database connection failed: " . $e->getMessage());
}

// Function to fetch all images from the database
function fetchAllImages($pdo) {
    $stmt = $pdo->query("SELECT * FROM images ORDER BY id DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to add a new image to the database
function addImage($pdo, $imagePath) {
    $stmt = $pdo->prepare("INSERT INTO images (path) VALUES (:path)");
    $stmt->execute(['path' => $imagePath]);
}

// Function to delete an image from the database
function deleteImage($pdo, $imageId) {
    $stmt = $pdo->prepare("DELETE FROM images WHERE id = :id");
    $stmt->execute(['id' => $imageId]);
}

// Function to fetch a single image by ID
function fetchImageById($pdo, $imageId) {
    $stmt = $pdo->prepare("SELECT * FROM images WHERE id = :id");
    $stmt->execute(['id' => $imageId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>