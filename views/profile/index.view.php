<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 flex flex-col gap-20">
        <div class="flex flex-col gap-10">
            <?php if ($image) : ?>
                <div class="flex flex-col gap-10 border border-purple-500 border-md rounded-md p-10 w-fit">
                    <img class="w-80 rounded-md" src="<?= (new Core\User)->getFolderByEmail($_SESSION['user']['email']) . $image ?>" alt="<?= strtoupper($full_name) ?>">
                    <p class="text-xl inline">Привет, </p>
                    <p class=" text-xl inline font-extrabold">
                        <?= (new Core\User)->getUserByEmail($_SESSION['user']['email'])['full_name'] ?></p>
                </div>
            <?php else : ?>
                <div>Загрузите ваше фото!</div>
            <?php endif; ?>

            <form method="POST" action="/profile" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PATCH">


                <div class="shadow sm:overflow-hidden sm:rounded-md">


                    <div class="space-y-6 bg-white px-4 py-5 sm:p-6 flex gap-10 w-full">

                        <div class="flex flex-col gap-4 w-96">
                            <div>
                                <label for="name" class="sr-only">Имя</label>
                                <input id="name" name="name" type="text" autocomplete="name" required class="relative block w-full appearance-none rounded-none border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Имя">
                            </div>
                            <div>
                                <label for="surname" class="sr-only">Фамилия</label>
                                <input id="surname" name="surname" type="text" autocomplete="surname" required class="relative block w-full appearance-none rounded-none border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Фамилия">
                            </div>
                            <div>
                                <label for="patronymic" class="sr-only">Отчество</label>
                                <input id="patronymic" name="patronymic" type="text" autocomplete="patronymic" required class="relative block w-full appearance-none rounded-none border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Отчество">
                            </div>
                        </div>
                        <div class="w-80 h-full flex flex-col gap-4 !m-0 p-8 border border-purple-700 rounded-md">
                            <p>Загрузить фото</p>
                            <input type="file" name="image" id="image">
                        </div>

                        <?php if (isset($errors['fields'])) : ?>
                            <p class="text-red-500 text-xs mt-2"><?= $errors['fields'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="bg-gray-50 px-4 py-3 text-right sm:px-6 flex gap-x-4 justify-end items-center">

                        <a href="/news" class="inline-flex justify-center rounded-md border border-transparent bg-gray-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Назад
                        </a>

                        <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Обновить
                        </button>
                    </div>
                </div>
            </form>
        </div>


    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>