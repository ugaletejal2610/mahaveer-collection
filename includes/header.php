<?php
include("includes/constant.php");

// Load categories for dynamic navigation
$categories = include 'includes/categories.php';
$category_links = [];
foreach ($categories as $cat) {
    $slug = strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $cat['name']), '-'));
    $category_links[] = ['name' => $cat['name'], 'slug' => $slug];
}

// Current page detection for active menu
$current_page = basename($_SERVER['PHP_SELF']);
$current_slug = $_GET['slug'] ?? '';

// Collection tab sirf tab active hoga jab category-detail.php par ho aur slug set ho
$is_collection_active = ($current_page === 'category-detail.php' && $current_slug !== '');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? $page_title . ' - ' : '' ?>Your Brand | Fashion Lookbook</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,300;9..144,450;9..144,600;9..144,700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- AOS Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-cream': '#FAF6EE',
                        'brand-cream-deep': '#F1E9D8',
                        'brand-red': '#C1272D',
                        'brand-red-dark': '#8F1D22',
                        'brand-sky': '#4FB6DE',
                        'brand-sky-dark': '#2E93BD',
                        'brand-ink': '#241E1B',
                        'brand-ink-soft': '#6B5F56',
                    },
                    fontFamily: {
                        'serif': ['Fraunces', 'serif'],
                        'sans': ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        body { background-color: #FAF6EE; }

        /* Header always solid — transparent never */
        #headerMain {
            background-color: #FAF6EE !important;
            backdrop-filter: none !important;
        }

        .nav-link {
            position: relative;
            color: #241E1B;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            font-weight: 500;
            padding: 8px 0;
            transition: color .3s ease;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            height: 2px;
            width: 0;
            background: #C1272D;
            transition: width .35s ease;
        }
        .nav-link:hover { color: #2E93BD; }
        .nav-link:hover::after { width: 100%; background: #4FB6DE; }
        .nav-link.active { color: #C1272D; }
        .nav-link.active::after { width: 100%; }
    </style>
</head>
<body class="bg-brand-cream">

<!-- ANNOUNCEMENT BAR -->
<div class="bg-brand-red text-brand-cream text-[13px] relative z-[1002] w-full">
    <div class="max-w-[1280px] mx-auto px-5 h-9 flex items-center justify-center lg:justify-between">
        <div class="hidden lg:flex items-center gap-7">
            <span class="flex items-center gap-2 font-medium"><i class="fa-solid fa-shirt opacity-90"></i>New Arrivals Every Week</span>
            <span class="flex items-center gap-2 font-medium"><i class="fa-solid fa-scissors opacity-90"></i>Handpicked Fabrics</span>
        </div>
       
        <div class="hidden lg:flex items-center gap-2 font-medium"><i class="fa-solid fa-book-open opacity-90"></i>Lookbook Inside</div>
    </div>
</div>

<!-- HEADER -->
<header id="headerMain" class="sticky top-0 left-0 w-full z-[1001] transition-all duration-300 border-b-2 border-brand-sky/40 shadow-[0_2px_16px_rgba(36,30,26,0.05)]" style="background-color:#FAF6EE;">
    <div class="container mx-auto px-4 lg:px-6">
        <div class="flex items-center justify-between h-[76px] lg:h-[84px]">

            <!-- MOBILE MENU BUTTON -->
            <button id="mobileMenuBtn" class="lg:hidden text-2xl text-brand-ink flex items-center justify-center bg-transparent border-0 cursor-pointer p-2">
                <i class="fas fa-bars"></i>
            </button>

            <!-- LOGO -->
            <div class="flex items-center">
                <a href="<?= BASE_URL ?>" class="flex items-center">
                    <img src="<?= BASE_URL ?>assets/images/logo.png" alt="Your Brand" class="h-14 lg:h-16 w-auto object-contain transition duration-500 hover:scale-105">
                </a>
            </div>

            <!-- DESKTOP NAVIGATION (dynamic categories) -->
            <nav class="hidden lg:flex items-center gap-7 xl:gap-9">
                <a href="<?= BASE_URL ?>" class="nav-link <?= $current_page == 'index.php' ? 'active' : '' ?>">Home</a>

                <div class="relative group">
                    <a href="#" class="nav-link flex items-center gap-1 <?= $is_collection_active ? 'active' : '' ?>">
                        Collection <i class="fas fa-chevron-down text-[10px]"></i>
                    </a>
                    <div class="absolute left-0 top-full opacity-0 invisible group-hover:visible group-hover:opacity-100 transition-all duration-300 w-[720px] bg-brand-cream rounded-2xl border border-brand-sky/30 shadow-[0_25px_60px_rgba(36,30,26,0.12)] p-8 mt-5">
                        <div class="grid grid-cols-4 gap-6">
                            <?php
                            $chunks = array_chunk($category_links, ceil(count($category_links) / 4));
                            foreach ($chunks as $chunk) : ?>
                                <div>
                                    <?php foreach ($chunk as $cat) : ?>
                                        <a href="<?= BASE_URL ?>category-detail.php?slug=<?= urlencode($cat['slug']) ?>"
                                           class="block text-brand-ink-soft mb-[10px] text-[14px] hover:text-brand-red hover:pl-2 transition-all">
                                            <?= htmlspecialchars($cat['name']) ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <a href="<?= BASE_URL ?>new-arrivals.php" class="nav-link <?= strpos($_SERVER['PHP_SELF'], 'new-arrivals') !== false ? 'active' : '' ?>">New Arrivals</a>
                <a href="<?= BASE_URL ?>lookbook.php" class="nav-link <?= strpos($_SERVER['PHP_SELF'], 'lookbook') !== false ? 'active' : '' ?>">Lookbook</a>
                <a href="<?= BASE_URL ?>aboutus.php" class="nav-link <?= strpos($_SERVER['PHP_SELF'], 'about') !== false ? 'active' : '' ?>">About</a>
                <a href="<?= BASE_URL ?>contact.php" class="nav-link <?= strpos($_SERVER['PHP_SELF'], 'contact') !== false ? 'active' : '' ?>">Contact</a>
            </nav>

            <!-- RIGHT SIDE (search) -->
            <div class="flex items-center gap-3">
                <!-- Desktop Search -->
                <div class="hidden lg:block relative">
                    <form action="<?= BASE_URL ?>search.php" method="GET" class="relative">
                        <input type="text" name="q" placeholder="Search products..." class="w-[220px] h-[42px] border border-brand-sky/40 rounded-full pl-[18px] pr-[45px] outline-none bg-white transition-all duration-300 text-[13px] text-brand-ink focus:border-brand-red focus:shadow-[0_0_0_3px_rgba(193,39,45,0.1)] placeholder:text-brand-ink-soft">
                        <button type="submit" class="absolute right-[14px] top-1/2 -translate-y-1/2 bg-transparent border-0 cursor-pointer text-brand-ink-soft transition-colors duration-300 hover:text-brand-red">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>

                <!-- Mobile Search Icon -->
                <button id="mobileSearchBtn" class="lg:hidden w-[40px] h-[40px] rounded-full border border-brand-sky/40 flex items-center justify-center text-brand-ink transition-all duration-300 hover:bg-brand-sky hover:text-white hover:border-brand-sky">
                    <i class="fas fa-search"></i>
                </button>
            </div>

        </div>
    </div>
</header>

<!-- MOBILE SIDEBAR (dynamic categories) -->
<div id="mobileMenu" class="fixed top-0 left-[-100%] h-screen w-[320px] max-w-full bg-brand-cream overflow-y-auto transition-all duration-300 ease-[ease] shadow-[20px_0_50px_rgba(36,30,26,0.15)] z-[9999]">
    <div class="p-6">
        <div class="flex justify-between items-center">
            <img src="<?= BASE_URL ?>assets/images/logo.png" class="h-12" alt="Logo">
            <button id="closeMenu" class="text-2xl text-brand-ink transition-colors duration-300 hover:text-brand-red">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="mt-6">
            <form action="<?= BASE_URL ?>search.php" method="GET" class="relative">
                <input type="text" name="q" placeholder="Search products..." class="w-full h-[46px] rounded-full border border-brand-sky/40 pl-5 pr-[50px] outline-none transition-all duration-300 text-[14px] bg-white focus:border-brand-red">
                <button class="absolute right-4 top-1/2 -translate-y-1/2 text-brand-ink-soft transition-colors duration-300 hover:text-brand-red">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>

        <nav class="mt-6 flex flex-col">
            <a href="<?= BASE_URL ?>" class="mobile-link flex items-center justify-between py-[16px] border-b border-brand-sky/20 text-brand-ink font-medium transition-all duration-300 text-[15px] hover:text-brand-red hover:pl-3">Home</a>
            <a href="<?= BASE_URL ?>collection.php" class="mobile-link flex items-center justify-between py-[16px] border-b border-brand-sky/20 text-brand-ink font-medium transition-all duration-300 text-[15px] hover:text-brand-red hover:pl-3">Collection</a>
            <?php foreach ($category_links as $cat) : ?>
                <a href="<?= BASE_URL ?>category-detail.php?slug=<?= urlencode($cat['slug']) ?>"
                   class="mobile-link flex items-center justify-between py-[14px] border-b border-brand-sky/20 text-brand-ink/80 text-[14px] transition-all duration-300 hover:text-brand-red hover:pl-3 pl-4">
                    <?= htmlspecialchars($cat['name']) ?>
                </a>
            <?php endforeach; ?>
            <a href="<?= BASE_URL ?>new-arrivals.php" class="mobile-link flex items-center justify-between py-[16px] border-b border-brand-sky/20 text-brand-ink font-medium transition-all duration-300 text-[15px] hover:text-brand-red hover:pl-3">New Arrivals</a>
            <a href="<?= BASE_URL ?>lookbook.php" class="mobile-link flex items-center justify-between py-[16px] border-b border-brand-sky/20 text-brand-ink font-medium transition-all duration-300 text-[15px] hover:text-brand-red hover:pl-3">Lookbook</a>
            <a href="<?= BASE_URL ?>aboutus.php" class="mobile-link flex items-center justify-between py-[16px] border-b border-brand-sky/20 text-brand-ink font-medium transition-all duration-300 text-[15px] hover:text-brand-red hover:pl-3">About</a>
            <a href="<?= BASE_URL ?>contact.php" class="mobile-link flex items-center justify-between py-[16px] border-b border-brand-sky/20 text-brand-ink font-medium transition-all duration-300 text-[15px] hover:text-brand-red hover:pl-3">Contact</a>
        </nav>

        <div class="mt-8 pt-6 border-t border-brand-sky/20">
            <div class="flex flex-col gap-2 text-sm text-brand-ink-soft">
                <span><i class="fa-solid fa-shirt mr-2 text-brand-red"></i> New Arrivals Every Week</span>
                <span><i class="fa-solid fa-scissors mr-2 text-brand-sky-dark"></i> Handpicked Fabrics</span>
            </div>
        </div>
    </div>
</div>

<!-- Overlay -->
<div id="overlay" class="fixed inset-0 bg-brand-ink/50 opacity-0 invisible transition-all duration-300 z-[9998]"></div>

<!-- Back to top button -->
<button id="backToTop" class="fixed right-6 bottom-6 w-12 h-12 rounded-full bg-brand-red text-brand-cream flex items-center justify-center text-lg opacity-0 invisible translate-y-5 transition-all duration-300 z-50 shadow-[0_8px_20px_rgba(36,30,26,0.25)] hover:bg-brand-sky-dark hover:-translate-y-1" aria-label="Back to top">
    <i class="fa-solid fa-arrow-up"></i>
</button>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({ duration: 1000, once: true, offset: 120, easing: 'ease-in-out' });
    });

    const header = document.getElementById("headerMain");
    window.addEventListener("scroll", function() {
        // Header stays solid — only shadow changes
        header.style.backgroundColor = '#FAF6EE';
        if (window.scrollY > 80) {
            header.style.boxShadow = '0 10px 30px rgba(36,30,26,0.08)';
        } else {
            header.style.boxShadow = '0 2px 16px rgba(36,30,26,0.05)';
        }
    });

    const mobileMenuBtn = document.getElementById("mobileMenuBtn");
    const closeMenu = document.getElementById("closeMenu");
    const mobileMenu = document.getElementById("mobileMenu");
    const overlay = document.getElementById("overlay");

    function openSidebar() {
        mobileMenu.style.left = "0";
        overlay.style.opacity = "1";
        overlay.style.visibility = "visible";
        document.body.style.overflow = "hidden";
    }
    function closeSidebar() {
        mobileMenu.style.left = "-100%";
        overlay.style.opacity = "0";
        overlay.style.visibility = "hidden";
        document.body.style.overflow = "";
    }

    if (mobileMenuBtn) mobileMenuBtn.addEventListener("click", openSidebar);
    if (closeMenu) closeMenu.addEventListener("click", closeSidebar);
    if (overlay) overlay.addEventListener("click", closeSidebar);

    document.addEventListener("keydown", function(e) {
        if (e.key === "Escape") closeSidebar();
    });

    const mobileSearchBtn = document.getElementById("mobileSearchBtn");
    if (mobileSearchBtn) {
        mobileSearchBtn.addEventListener("click", function() {
            openSidebar();
            const input = mobileMenu.querySelector('input[name="q"]');
            if (input) setTimeout(() => input.focus(), 350);
        });
    }

    const backToTop = document.getElementById('backToTop');
    if (backToTop) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 500) {
                backToTop.style.opacity = '1';
                backToTop.style.visibility = 'visible';
                backToTop.style.transform = 'translateY(0)';
            } else {
                backToTop.style.opacity = '0';
                backToTop.style.visibility = 'hidden';
                backToTop.style.transform = 'translateY(20px)';
            }
        });
        backToTop.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    document.querySelectorAll('.mobile-link').forEach(link => {
        link.addEventListener('click', closeSidebar);
    });
</script>
</body>
</html>