<?php
require_once '../src/db.php';
require_once '../src/ImageRepository.php';
session_start();

// Check if the user is logged in as admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

$imageRepo = new ImageRepository();

// Handle image deletion
if (isset($_POST['delete_image'])) {
    $imageId = $_POST['image_id'];
    $imageRepo->deleteImage($imageId);
}

// Fetch all images from the database
$images = $imageRepo->getAllImages();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - FramedSoul</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include '../templates/header.php'; ?>
    <?php include '../templates/menu.php'; ?>

    <main>
        <h1>Admin Panel</h1>
        <h2>Manage Images</h2>

        <h3>Add New Image</h3>
        <form action="add_image.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="image" required>
            <button type="submit">Upload Image</button>
        </form>

        <h3>Existing Images</h3>
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($images as $image): ?>
                <tr>
                    <td><img src="uploads/<?php echo htmlspecialchars($image['path']); ?>" alt="Image" width="100"></td>
                    <td>
                        <form action="" method="POST">
                            <input type="hidden" name="image_id" value="<?php echo $image['id']; ?>">
                            <button type="submit" name="delete_image">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <?php include '../templates/footer.php'; ?>
</body>
</html>