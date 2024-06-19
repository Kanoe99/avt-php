<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="/"><img class="h-8" src="/images/logos/logo.png" alt="Your Company"></a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <?php require(base_path("views/partials/menu.php"));
                        menu(); ?>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">

                    <!-- Profile dropdown -->
                    <?php if ($_SESSION['user'] ?? false) : ?>
                        <div class="relative ml-3">
                            <button type="button" class="flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>

                                <style>
                                    /* Hide the checkbox input */
                                    input[type="checkbox"] {
                                        display: none;
                                    }

                                    /* Style for the label when the checkbox is checked */
                                    input[type="checkbox"]:checked~.dropdown-menu {
                                        display: block;
                                    }
                                </style>

                                <div class="relative">
                                    <input type="checkbox" id="dropdown-toggle" class="hidden">
                                    <label for="dropdown-toggle" class="rounded cursor-pointer">
                                        <?php if ($image ?? null) : ?>
                                            <img class="h-8 w-8 object-cover rounded-full" src="<?= (new Core\User)->getFolderByEmail($_SESSION['user']['email']) . $image ?>" alt="">
                                        <?php else :
                                            $full_name = $_SESSION['user']['full_name'];
                                            $letter = mb_strcut($full_name, 0, 2, "UTF-8");
                                            $letter = strtoupper($letter);
                                        ?>
                                            <p class="h-8 w-8 flex justify-center items-center border border-white rounded-full p-6 text-xl font-extrabold text-white">
                                                <?= $letter ?>
                                            </p>
                                        <?php endif; ?>
                                    </label>

                                    <div class="dropdown-menu absolute hidden bg-white shadow-lg rounded mt-2 py-2 w-48">
                                        <?php if ($_SESSION['user']['role'] === 'admin' ?? false) : ?>
                                            <a href="/admin" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Кабинет
                                                админа</a>
                                        <?php endif; ?>
                                        <a href="/profile" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Личный
                                            кабинет</a>
                                    </div>
                                </div>
                            </button>
                        </div>

                        <div class="ml-3">
                            <form method="POST" action="/session">
                                <input type="hidden" name="_method" value="DELETE" />

                                <button class="text-white">Выйти</button>
                            </form>
                        </div>
                    <?php else : ?>
                        <div class="ml-3">
                            <a href="/register" class="<?= urlIs('/register') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Регистрация</a>
                            <a href="/login" class="<?= urlIs('/login') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Вход</a>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
            <?php
            $style = "text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium";
            menu($style); ?>

        </div>
        <div class="border-t border-gray-700 pt-4 pb-3">
            <div class="flex items-center px-5">
                <div class="flex-shrink-0">
                    <?php if (isset($_SESSION['user'])) : ?>
                        <img class="h-8 w-8 object-cover rounded-full" src="<?= (new Core\User)->getFolderByEmail($_SESSION['user']['email']) . $image ?>" alt="">
                    <?php endif; ?>
                </div>
                <div class="ml-3">
                    <?php if (isset($_SESSION['user'])) : ?>
                        <div class="text-base font-medium leading-none text-white">
                            <?= (new Core\User)->getUserByEmail($_SESSION['user']['email'])['full_name']; ?>
                        </div>
                        <div class="text-sm font-medium leading-none text-gray-400"><?= $_SESSION['user']['email'] ?></div>
                    <?php else : ?>
                        <div class="text-base font-medium leading-none text-white">
                            Гость
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="mt-3 space-y-1 px-2">
                <a href="/profile" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Ваш
                    профиль</a>

                <?php if (isset($_SESSION['user'])) : ?>
                    <form method="POST" action="/session" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">
                        <input type="hidden" name="_method" value="DELETE" />

                        <button class="text-white">Выйти</button>
                    </form>
                <?php else : ?>
                    <a href="/login" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Войти</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>