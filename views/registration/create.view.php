<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<main>
    <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Регистрация</h2>
            </div>

            <form class="mt-8 space-y-6" action="/register" method="POST">
                <div class="-space-y-px rounded-md shadow-sm">
                    <div>
                        <label for="email" class="sr-only">Почта</label>
                        <input id="email" name="email" type="email" autocomplete="email" required class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Почта" value="<?= old('email') ?>">
                    </div>
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

                    <div>
                        <label for="password" class="sr-only">Пароль</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="relative block w-full appearance-none rounded-none border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Пароль">
                    </div>
                    <div>
                        <label for="password_repeat" class="sr-only">Подтвредите пароль</label>
                        <input id="password_repeat" name="password_repeat" type="password" autocomplete="password-repeat" required class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Повторите пароль">
                    </div>
                </div>

                <div>
                    <button type="submit" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Зарегистрироваться
                    </button>
                </div>

                <ul>
                    <?php if (isset($errors['email'])) : ?>
                        <li class="text-red-500 text-xs mt-2"><?= $errors['email'] ?></li>
                    <?php endif; ?>

                    <?php if (isset($errors['password'])) : ?>
                        <li class="text-red-500 text-xs mt-2"><?= $errors['password'] ?></li>
                    <?php endif; ?>

                    <?php if (isset($errors['password_repeat'])) : ?>
                        <li class="text-red-500 text-xs mt-2"><?= $errors['password_repeat'] ?></li>
                    <?php endif; ?>

                    <?php if (isset($errors['user'])) : ?>
                        <li class="text-red-500 text-xs mt-2"><?= $errors['user'] ?></li>
                    <?php endif; ?>

                    <?php if (isset($errors['full_name'])) : ?>
                        <li class="text-red-500 text-xs mt-2"><?= $errors['full_name'] ?></li>
                    <?php endif; ?>
                </ul>
            </form>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>