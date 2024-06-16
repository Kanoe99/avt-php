<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p>Привет, <b><?= $_SESSION['user']['full_name'] ?? 'Гость' ?></b>. Добро пожаловать в ЕТ Автоматику.</p>
        <div class="max-w-7xl py-6 w-[50vw] items-start">
            <div class="relative">
                <!-- Carousel container -->
                <div class="carousel overflow-hidden">
                    <!-- Carousel items -->
                    <div class="carousel-inner flex transition-transform duration-500 ease-in-out w-[50vw]">
                        <div class="carousel-item active">
                            <img class="w-fit" src="images/carousel/carousel1.jpg" alt="carousel item #1">
                        </div>
                        <div class="carousel-item hidden">
                            <img class="w-fit" src="images/carousel/carousel2.jpg" alt="carousel item #2">
                        </div>
                        <div class="carousel-item hidden">
                            <img class="w-fit" src="images/carousel/carousel3.jpg" alt="carousel item #3">
                        </div>
                        <!-- Add more carousel items as needed -->
                    </div>
                </div>

                <!-- Buttons for fast access -->
                <div class="absolute bottom-0 left-0 right-0 flex justify-center mt-2 -translate-y-1/2">
                    <button class="mx-2 px-4 py-2 bg-[#4f46e5] text-white rounded-lg focus:outline-none" onclick="showItem(1)">1</button>
                    <button class="mx-2 px-4 py-2 bg-[#4f46e5] text-white rounded-lg focus:outline-none" onclick="showItem(2)">2</button>
                    <button class="mx-2 px-4 py-2 bg-[#4f46e5] text-white rounded-lg focus:outline-none" onclick="showItem(3)">3</button>
                    <!-- Add more buttons as needed -->
                </div>

                <!-- Navigation arrows -->
                <button class="absolute right-20 bottom-0 transform -translate-y-1/2 px-3 py-2 bg-gray-500 text-white rounded-full focus:outline-none" onclick="prevItem()">
                    <!-- Arrow left icon -->
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                </button>
                <button class="absolute right-6 bottom-0 transform -translate-y-1/2 px-3 py-2 bg-gray-500 text-white rounded-full focus:outline-none" onclick="nextItem()">
                    <!-- Arrow right icon -->
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>

            <script>
                function showItem(index) {
                    const items = document.querySelectorAll('.carousel-item');
                    items.forEach((item, i) => {
                        const isActive = i + 1 === index;
                        item.classList.toggle('active', isActive);
                        item.classList.toggle('hidden', !isActive);
                    });
                }

                function nextItem() {
                    const items = document.querySelectorAll('.carousel-item');
                    const activeIndex = Array.from(items).findIndex(item => item.classList.contains('active'));
                    const nextIndex = (activeIndex + 1) % items.length;
                    showItem(nextIndex + 1);
                }

                function prevItem() {
                    const items = document.querySelectorAll('.carousel-item');
                    const activeIndex = Array.from(items).findIndex(item => item.classList.contains('active'));
                    const prevIndex = (activeIndex - 1 + items.length) % items.length;
                    showItem(prevIndex + 1);
                }
            </script>
        </div>
    </div>

</main>

<?php require('partials/footer.php') ?>