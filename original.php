<?php
require_once '../src/db.php';
require_once '../src/ImageRepository.php';
require_once '../templates/header.php';
require_once '../templates/menu.php';

$imageRepo = new ImageRepository();
$images = $imageRepo->getAllImages();

?>

<div class="p-home">
    <div class="p-home-view__background"></div>
    <section class="p-home-grid-mode">
        <div class="p-home-grid-mode__contents">
            <?php foreach ($images as $image): ?>
                <a href="record/record<?php echo $image['id']; ?>.php" class="p-home-grid-mode__item">
                    <p class="p-home-grid-mode__item-num"><?php echo $image['id']; ?></p>
                    <div class="p-home-grid-mode__item-image">
                        <img src="uploads/<?php echo $image['file_path']; ?>" alt="photo thumbnail" width="200" height="300" loading="lazy" decoding="async">
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </section>
    <p class="p-home-scroll">↓　ScrollDown</p>
</div>

<?php
require_once '../templates/footer.php';
?>