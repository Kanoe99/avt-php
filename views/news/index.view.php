<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 flex gap-20">

        <ul>
            <?php foreach ($news as $note) : ?>
                <li>
                    <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
                        <?= htmlspecialchars($note['body']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php if ($_SESSION['user']['role'] === 'admin' ?? false) : ?>
            <p class="mb-6">
                <a href="/news/create" class="text-white bg-indigo-500 px-4 py-2 rounded-md">Создать запись</a>
            </p>
        <?php endif; ?>


    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>