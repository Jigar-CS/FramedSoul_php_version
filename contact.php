<?php
require_once '../src/config.php';
require_once '../src/db.php';
require_once '../src/ImageRepository.php';
require_once '../templates/header.php';
require_once '../templates/menu.php';

?>

<div class="contact-container">
    <h2>Contact Us</h2>
    <form action="mailto:jigarsakhia2020@gmail.com" method="post" enctype="text/plain">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
        </div>
        <button type="submit">Send Message</button>
    </form>
</div>

<?php
require_once '../templates/footer.php';
?>