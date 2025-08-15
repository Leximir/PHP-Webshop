<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/header.php") ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <p class="mb-6">
                <a href="/notes" class="text-blue-500 hover:underline">go back ...</a>
            </p>

            <p>
                <?= htmlspecialchars($note['body']) ?>
            </p>

            <div class="mt-6">
                <a class="inline-flex justify-center rounded-md border border-transparent bg-gray-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                   href="/note/edit?id=<?= $note['id'] ?>">Edit</a>
            </div>


        </div>
    </main>

<?php require base_path("views/partials/footer.php") ?>