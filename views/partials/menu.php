<?php
function menu($style = "hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-[1vw] font-medium")
{
    $links = [
        "/about" => "Сведения об образовательной организации",
        "/teacher" => "Преподавателю",
        "/applicant" => "Абитуриенту",
        "/student" => "Студенту"
    ];

    $isLoggedIn = ($_SESSION['user'] ?? false);

    foreach ($links as $url => $text) {
        // Add active class based on current URL (you need to define the urlIs() function)
        $isActive = urlIs($url) ? 'bg-gray-900 text-white' : 'text-gray-300';
        // Output the link
        echo '<a href="' . $url . '" class="' . $isActive . ' ' . $style . '">' . $text . '</a>';
    }

    // Output "users" link if the user is logged in
    if ($isLoggedIn) {
        echo '<a href="/news" class="' . (urlIs('/news') ? 'bg-gray-900 text-white' : 'text-gray-300') . ' hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Новости</a>';
    }
}
