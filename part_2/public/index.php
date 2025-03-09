<?php
require_once 'includes/functions.php';

// Путь к директории с изображениями относительно корня public
$imageDir = 'image';
$images = getImages($imageDir);
?>

<?php include 'header.php'; ?>


<main>
    <h1>Галерея изображений</h1>
    <?php if (empty($images)): ?>
        <p>Изображения не найдены. Пожалуйста, проверьте директорию <code>image</code>.</p>
    <?php else: ?>
        <div class="gallery">
            <?php foreach ($images as $image): ?>
                <img src="<?php echo $image; ?>" alt="Изображение">
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>

<?php include 'footer.php'; ?>