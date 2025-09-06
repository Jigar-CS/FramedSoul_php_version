<?php
require_once '../src/db.php';
require_once '../src/ImageRepository.php';

$imageRepo = new ImageRepository();
$bioContent = "This is the biography of Jigar, the photographer behind FramedSoul. Here, you can learn about his journey, inspirations, and the stories behind his photographs.";

$images = $imageRepo->getAllImages(); // Fetch all images from the database

include '../templates/header.php';
include '../templates/menu.php';
?>

<div class="bio-content">
    <h2>About Me</h2>
    <p><?php echo $bioContent; ?></p>
</div>

<div class="image-gallery">
    <h3>Gallery</h3>
    <div class="image-grid">
        <?php foreach ($images as $image): ?>
            <div class="image-item">
                <img src="uploads/<?php echo htmlspecialchars($image['path']); ?>" alt="<?php echo htmlspecialchars($image['description']); ?>" loading="lazy">
                <p><?php echo htmlspecialchars($image['description']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
include '../templates/footer.php';
?>