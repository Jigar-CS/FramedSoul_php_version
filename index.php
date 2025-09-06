<?php
require_once '../src/config.php';
require_once '../src/db.php';
require_once '../src/ImageRepository.php';
require_once '../src/auth.php';



// Initialize the database connection
$db = new Database();
$imageRepo = new ImageRepository($db);


// Get the requested page
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Load images from the database
$images = $imageRepo->getAllImages();

// Include the header, menu, and footer templates
include '../templates/header.php';
include '../templates/menu.php';

// Display content based on the requested page
switch ($page) {
    case 'bio':
        include 'bio.php';
        break;
    case 'original':
        include 'original.php';
        break;
    case 'contact':
        include 'contact.php';
        break;
    case 'admin':
        include 'admin.php';
        break;
    case 'login':
        include 'login.php';
        break;
    case 'logout':
        include 'logout.php';
        break;
    case 'add_image':
        include 'add_image.php';
        break;
    case 'delete_image':
        include 'delete_image.php';
        break;
    default:
        include '../templates/image_grid.php'; // Default to image grid
        break;
}

include '../templates/footer.php';
?>