<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/header.php") ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <form method="POST" enctype="multipart/form-data">
                <input type="file" id="image" name="image">
                <button>Upload</button>
            </form>

            <?php if (isset($errors['image'])) : ?>
                <p class="text-red-500 text-xs mt-2"><?= $errors['image'] ?></p>
            <?php endif; ?>
        </div>

    </main>

<?php require base_path("views/partials/footer.php") ?>