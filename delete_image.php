<?php
require_once '../src/db.php';
require_once '../src/ImageRepository.php';

session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

if (isset($_GET['id'])) {
    $imageId = intval($_GET['id']);
    $imageRepo = new ImageRepository();

    // Fetch the image path from the database
    $image = $imageRepo->getImageById($imageId);

    if ($image) {
        // Delete the image from the database
        $imageRepo->deleteImage($imageId);

        // Delete the image file from the server
        $imagePath = '../public/uploads/' . $image['path'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Redirect to the admin page with a success message
        header('Location: admin.php?message=Image deleted successfully');
        exit();
    } else {
        // Redirect to the admin page with an error message
        header('Location: admin.php?error=Image not found');
        exit();
    }
} else {
    // Redirect to the admin page with an error message
    header('Location: admin.php?error=Invalid request');
    exit();
}
?>