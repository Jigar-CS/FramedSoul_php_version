<?php
require_once '../src/db.php';
require_once '../src/ImageRepository.php';

session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Initialize variables
$imagePath = '';
$error = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Check for valid image file types
        $allowedfileExtensions = array('jpg', 'jpeg', 'png', 'gif', 'webp');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            // Create a unique file name and move the uploaded file
            $newFileName = uniqid('', true) . '.' . $fileExtension;
            $uploadFileDir = './uploads/';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                // Save the image path to the database
                $imageRepo = new ImageRepository();
                $imageRepo->addImage($dest_path);

                header('Location: admin.php?success=Image uploaded successfully.');
                exit();
            } else {
                $error = 'There was an error moving the uploaded file.';
            }
        } else {
            $error = 'Upload failed. Allowed file types: ' . implode(', ', $allowedfileExtensions);
        }
    } else {
        $error = 'There was an error uploading the image.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Image</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <?php include '../templates/header.php'; ?>
    </header>
    <main>
        <h1>Add New Image</h1>
        <?php if ($error): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form action="add_image.php" method="POST" enctype="multipart/form-data">
            <label for="image">Select Image:</label>
            <input type="file" name="image" id="image" required>
            <button type="submit">Upload</button>
        </form>
    </main>
    <footer>
        <?php include '../templates/footer.php'; ?>
    </footer>
</body>
</html>