<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 flex flex-col gap-20">
        <div>
            <h2 class="font-extrabold text-xl"> Неподтверждённые:</h2>
            <ul class="flex w-fit flex-wrap gap-10">

                <?php foreach ($not_approved as $user) : ?>
                    <li class="px-10 py-4 shadow-md w-fit flex flex-col gap-10">
                        <?= htmlspecialchars($user['email']) ?>
                        <div class="flex gap-4">
                            <form action="/admin" method="post">
                                <input type="hidden" name="_method" value="PATCH">
                                <button type="submit" class="px-6 py-4 bg-green-500 text-white font-bold rounded-md">Подтвердить</button>
                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                            </form>
                            <form action="/admin" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                <button class="px-6 py-4 bg-red-500 text-white font-bold rounded-md">Удалить</button>
                            </form>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div>
            <h2 class="font-extrabold text-xl">Подтверждённые:</h2>
            <ul class="flex w-fit flex-wrap gap-10">
                <?php foreach ($users as $user) : ?>
                    <li class="px-10 py-4 shadow-md w-fit flex flex-col gap-10">
                        <?= htmlspecialchars($user['email']) ?>
                        <form action="/admin" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                            <button class="px-6 py-4 bg-red-500 text-white font-bold rounded-md">Удалить</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>


    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>