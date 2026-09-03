<?php
// ============================================
// HOME PAGE
// ============================================
$page_title = "Home";
include 'includes/header.php';
$categories = include 'includes/categories.php';


$total_categories = count($categories);
$total_products = array_sum(array_column($categories, 'count'));

function fab_slug($name) {
    return strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $name), '-'));
}

$featured = $categories;
usort($featured, fn($a, $b) => $b['count'] - $a['count']);
$featured = array_slice($featured, 0, 6);

$testimonials = [
    ['name' => 'Rakesh Mehta', 'role' => 'Retail Fabric Trader, Surat', 'quote' => 'Their shirting and pocketing range is the most complete catalogue I refer my tailors to.'],
    ['name' => 'Anita Shah', 'role' => 'Boutique Owner, Mumbai', 'quote' => 'The embroidery and Schiffli fabrics are consistently well-curated, season after season.'],
    ['name' => 'Imran Sheikh', 'role' => 'Master Tailor, Pune', 'quote' => 'I check the interlining and lining section every month before placing my next order elsewhere.'],
];

$steps = [
    ['icon' => 'fa-grip', 'title' => 'Browse Categories', 'desc' => 'Start from any of our 19 fabric categories, organised by use and material.'],
    ['icon' => 'fa-magnifying-glass', 'title' => 'View Fabric Details', 'desc' => 'Open a product to see weave, weight, width and other specifics.'],
    ['icon' => 'fa-bookmark', 'title' => 'Note What You Like', 'desc' => 'Shortlist the fabrics that fit your order — no account needed.'],
    ['icon' => 'fa-phone', 'title' => 'Reach Out to Us', 'desc' => 'Call, message or email us with what you found for pricing and samples.'],
];

// --- Hero Carousel Slides ---
$slides = [
    [
        'image' => 'https://picsum.photos/seed/fabricrolls/1600/800',
        'title' => 'Every fabric we stock, laid out for you to browse.',
        'sub'   => 'From shirting and embroidery fabrics to bag linings and readymade kurta sets — explore '.$total_categories.' categories.',
        'link'  => '#categories',
        'label' => 'Explore Categories'
    ],
    [
        'image' => 'https://picsum.photos/seed/textileclose/1600/800',
        'title' => 'Quality fabrics for every need',
        'sub'   => 'Discover our wide range of cotton, polyester, and specialty fabrics for apparel, home, and industrial use.',
        'link'  => '#categories',
        'label' => 'View All Categories'
    ],
    [
        'image' => 'https://picsum.photos/seed/weavingfloor/1600/800',
        'title' => 'Trusted by trade partners for 15+ years',
        'sub'   => 'Join 500+ retailers, tailors, and manufacturers who rely on our curated catalogue.',
        'link'  => BASE_URL.'contact.php',
        'label' => 'Get in Touch'
    ],
];
?>

<!-- ===== HERO CAROUSEL (Tailwind) ===== -->
<!-- <section class="relative overflow-hidden bg-[#241e1a] h-[100vh] min-h-[480px] max-h-[700px]">
    <div class="flex w-full h-full transition-transform duration-700 ease-[cubic-bezier(0.25,0.46,0.45,0.94)]" id="heroSlides">
        <?php foreach ($slides as $index => $slide): ?>
            <div class="flex-[0_0_100%] h-full relative bg-cover bg-center flex items-center justify-start px-[5%] py-8 <?= $index === 0 ? '' : '' ?>" style="background-image: url('<?= $slide['image'] ?>');">
          
                <div class="absolute inset-0 bg-gradient-to-br from-[#241e1a]/60 via-[#241e1a]/20 to-transparent z-10"></div>
       
                <div class="relative z-20 max-w-[620px] text-white transition-all duration-700 ease-out <?= $index === 0 ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4' ?>" data-slide-content="<?= $index ?>">
                    <span class="inline-block bg-[#C1272D] text-white text-xs font-semibold px-4 py-1 rounded-full tracking-wide mb-4">Wholesale Fabric Catalogue</span>
                    <h1 class="font-serif text-[clamp(2rem,5vw,3.4rem)] font-medium leading-[1.15] mb-5 drop-shadow-md"><?= htmlspecialchars($slide['title']) ?></h1>
                    <p class="text-[clamp(0.95rem,1.3vw,1.15rem)] opacity-90 max-w-[480px] mb-8 leading-relaxed drop-shadow-sm"><?= htmlspecialchars($slide['sub']) ?></p>
                    <div class="flex flex-wrap gap-3">
                        <a href="<?= $slide['link'] ?>" class="bg-[#C1272D] text-white px-7 py-3 rounded-full font-semibold text-sm transition-all hover:bg-[#a62a2f] hover:-translate-y-1 hover:shadow-[0_12px_32px_rgba(193,39,45,0.45)] shadow-[0_8px_24px_rgba(193,39,45,0.35)] inline-flex items-center gap-2">
                            <?= htmlspecialchars($slide['label']) ?> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                        <a href="<?= BASE_URL ?>contact.php" class="bg-white/15 backdrop-blur-sm text-white border border-white/30 px-7 py-3 rounded-full font-medium text-sm transition-all hover:bg-white/25 hover:border-white hover:-translate-y-1 inline-flex items-center gap-2">
                            Contact Us <i class="fa-solid fa-phone"></i>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


    <button class="carousel-control-prev absolute top-1/2 left-5 -translate-y-1/2 z-20 bg-white/20 backdrop-blur-sm border-none w-11 h-11 rounded-full text-white text-xl cursor-pointer transition-all hover:bg-white/35 hover:scale-105 flex items-center justify-center" id="prevSlide" aria-label="Previous slide">
        <i class="fa-solid fa-chevron-left"></i>
    </button>
    <button class="carousel-control-next absolute top-1/2 right-5 -translate-y-1/2 z-20 bg-white/20 backdrop-blur-sm border-none w-11 h-11 rounded-full text-white text-xl cursor-pointer transition-all hover:bg-white/35 hover:scale-105 flex items-center justify-center" id="nextSlide" aria-label="Next slide">
        <i class="fa-solid fa-chevron-right"></i>
    </button>


    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex gap-2.5" id="carouselDots">
        <?php foreach ($slides as $index => $slide): ?>
            <button class="dot w-3 h-3 rounded-full bg-white/40 transition-all hover:scale-110 <?= $index === 0 ? 'bg-white scale-125 shadow-[0_0_12px_rgba(255,255,255,0.3)]' : '' ?>" data-index="<?= $index ?>" aria-label="Go to slide <?= $index+1 ?>"></button>
        <?php endforeach; ?>
    </div>
</section> -->

<!-- ===== HERO CAROUSEL (Sirf Background Images) ===== -->
<section class="relative overflow-hidden bg-[#241e1a] h-[100vh] min-h-[480px] max-h-[700px]">
    <div class="flex w-full h-full transition-transform duration-700 ease-[cubic-bezier(0.25,0.46,0.45,0.94)]" id="heroSlides">
        <?php 
        // Sirf 3 background images
      $bgImages = [
    BASE_URL . 'assets/images/banner/banner1.webp',   
    BASE_URL . 'assets/images/banner/banner2.webp',   
    BASE_URL . 'assets/images/banner/banner3.webp'   
];
        
        foreach ($bgImages as $index => $image): 
        ?>
            <div class="flex-[0_0_100%] h-full relative bg-contain bg-center" 
                 style="background-image: url('<?= htmlspecialchars($image) ?>');">
                <!-- Optional: Light overlay for better visibility (hatana hai toh hata sakte hain) -->
                <div class="absolute inset-0 bg-[#241e1a]/20 z-10"></div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Controls -->
    <button class="carousel-control-prev absolute top-1/2 left-5 -translate-y-1/2 z-20 bg-white/20 backdrop-blur-sm border-none w-11 h-11 rounded-full text-white text-xl cursor-pointer transition-all hover:bg-white/35 hover:scale-105 flex items-center justify-center" id="prevSlide" aria-label="Previous slide">
        <i class="fa-solid fa-chevron-left"></i>
    </button>
    <button class="carousel-control-next absolute top-1/2 right-5 -translate-y-1/2 z-20 bg-white/20 backdrop-blur-sm border-none w-11 h-11 rounded-full text-white text-xl cursor-pointer transition-all hover:bg-white/35 hover:scale-105 flex items-center justify-center" id="nextSlide" aria-label="Next slide">
        <i class="fa-solid fa-chevron-right"></i>
    </button>

    <!-- Dots -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex gap-2.5" id="carouselDots">
        <?php foreach ($bgImages as $index => $image): ?>
            <button class="dot w-3 h-3 rounded-full bg-white/40 transition-all hover:scale-110 <?= $index === 0 ? 'bg-white scale-125 shadow-[0_0_12px_rgba(255,255,255,0.3)]' : '' ?>" data-index="<?= $index ?>" aria-label="Go to slide <?= $index+1 ?>"></button>
        <?php endforeach; ?>
    </div>
</section>

<section class="bg-[#241e1a]">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-10 py-10 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
        <div data-aos="zoom-in">
            <p class="font-serif text-[28px] text-[#C1272D] leading-none">15+</p>
            <p class="text-[#f5f0eb]/60 text-[13px] mt-2">Years in Fabric Trade</p>
        </div>
        <div data-aos="zoom-in" data-aos-delay="80">
            <p class="font-serif text-[28px] text-[#4FB6DE] leading-none"><?= $total_categories ?></p>
            <p class="text-[#f5f0eb]/60 text-[13px] mt-2">Categories Listed</p>
        </div>
        <div data-aos="zoom-in" data-aos-delay="160">
            <p class="font-serif text-[28px] text-[#C1272D] leading-none"><?= $total_products ?>+</p>
            <p class="text-[#f5f0eb]/60 text-[13px] mt-2">Fabrics Catalogued</p>
        </div>
        <div data-aos="zoom-in" data-aos-delay="240">
            <p class="font-serif text-[28px] text-[#4FB6DE] leading-none">500+</p>
            <p class="text-[#f5f0eb]/60 text-[13px] mt-2">Trade Partners</p>
        </div>
    </div>
</section>

<!-- ===== FEATURED CATEGORIES (IMAGE STRIP) ===== -->
<section class="max-w-[1280px] mx-auto px-6 lg:px-10 py-16 lg:py-20">
    <div class="flex items-end justify-between mb-8" data-aos="fade-up">
        <div>
            <p class="text-[#2E93BD] font-medium text-[13px] mb-2">Most browsed</p>
            <h2 class="font-serif text-[26px] sm:text-[30px] text-[#241e1a] font-medium">Popular Categories</h2>
        </div>
    </div>

    <div class="scroller flex gap-5 overflow-x-auto pb-4 scroll-snap-x" data-aos="fade-up" data-aos-delay="100">
        <?php foreach ($featured as $cat): ?>
            <!-- ✅ UPDATED link to category-detail.php -->
            <a href="<?= BASE_URL ?>category-detail.php?slug=<?= urlencode(fab_slug($cat['name'])) ?>"
               class="relative shrink-0 w-[240px] h-[300px] rounded-2xl overflow-hidden block group">
                <img src="https://picsum.photos/seed/<?= urlencode(fab_slug($cat['name'])) ?>/400/500" alt="<?= htmlspecialchars($cat['name']) ?>" class="w-full h-full object-cover transition-transform duration-600 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-[#241e1a]/60 z-10"></div>
                <div class="absolute bottom-0 left-0 right-0 p-5 z-20">
                    <p class="text-white font-serif text-[17px] leading-snug"><?= htmlspecialchars($cat['name']) ?></p>
                    <p class="text-white/75 text-[12px] mt-1"><?= $cat['count'] ?> products</p>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</section>

<!-- ===== FULL CATEGORY GRID ===== -->
<section id="categories" class="max-w-[1280px] mx-auto px-6 lg:px-10 py-16 lg:py-20 scroll-mt-24">
    <div class="flex items-end justify-between mb-10" data-aos="fade-up">
        <div>
            <h2 class="font-serif text-[28px] sm:text-[32px] text-[#241e1a] font-medium mb-2">Browse by Category</h2>
            <p class="text-[#241e1a]/70 text-[15px]">Tap a category to see every fabric listed under it.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        <?php foreach ($categories as $i => $cat): ?>
            <?php 
                $tint = $cat['tint'];
                $bgWash = $tint === 'r' ? 'bg-[radial-gradient(120%_100%_at_0%_0%,rgba(193,39,45,0.14),rgba(193,39,45,0)_60%)]' : 'bg-[radial-gradient(120%_100%_at_0%_0%,rgba(79,182,222,0.20),rgba(79,182,222,0)_60%)]';
                $iconBg = $tint === 'r' ? 'bg-gradient-to-br from-[#C1272D] to-[#8F1D22]' : 'bg-gradient-to-br from-[#4FB6DE] to-[#2E93BD]';
                $textColor = $tint === 'r' ? 'text-[#8F1D22]' : 'text-[#2E93BD]';
            ?>
            <!-- ✅ UPDATED link to category-detail.php -->
            <a href="<?= BASE_URL ?>category-detail.php?slug=<?= urlencode(fab_slug($cat['name'])) ?>"
               class="relative rounded-[26px] bg-white shadow-[0_1px_2px_rgba(36,30,26,0.04),0_10px_24px_rgba(36,30,26,0.05)] transition-all duration-350 hover:-translate-y-1.5 hover:shadow-[0_20px_40px_rgba(36,30,26,0.12)] overflow-hidden flex items-center gap-4 p-5 <?= $bgWash ?>"
               data-aos="fade-up" data-aos-delay="<?= ($i % 6) * 60 ?>">
                <div class="w-14 h-14 rounded-2xl <?= $iconBg ?> flex items-center justify-center shrink-0 shadow-[0_8px_16px_rgba(36,30,26,0.15)]">
                    <i class="fa-solid <?= $cat['icon'] ?> text-white text-[19px]"></i>
                </div>
                <div class="min-w-0">
                    <h3 class="font-serif text-[16px] text-[#241e1a] leading-snug truncate"><?= htmlspecialchars($cat['name']) ?></h3>
                    <p class="text-[12.5px] mt-1 <?= $textColor ?> font-medium"><?= $cat['count'] ?> products</p>
                </div>
                <i class="fa-solid fa-chevron-right text-[#241e1a]/40 text-[13px] ml-auto shrink-0"></i>
            </a>
        <?php endforeach; ?>
    </div>
</section>

<!-- ===== PROCESS: HOW TO EXPLORE ===== -->
<section class="bg-[#f5f0eb] border-y border-[#4FB6DE]/20">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-10 py-16 lg:py-20">
        <div class="text-center mb-12" data-aos="fade-up">
            <p class="text-[#C1272D] font-medium text-[13px] mb-2">How it works</p>
            <h2 class="font-serif text-[26px] sm:text-[30px] text-[#241e1a] font-medium">Finding a fabric here is simple</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative">
            <?php foreach ($steps as $i => $step): ?>
                <div class="text-center relative" data-aos="fade-up" data-aos-delay="<?= $i * 100 ?>">
                    <div class="w-16 h-16 mx-auto rounded-full <?= $i % 2 === 0 ? 'bg-[#C1272D]/10' : 'bg-[#4FB6DE]/15' ?> flex items-center justify-center mb-5">
                        <i class="fa-solid <?= $step['icon'] ?> text-[20px] <?= $i % 2 === 0 ? 'text-[#C1272D]' : 'text-[#2E93BD]' ?>"></i>
                    </div>
                    <h3 class="font-serif text-[17px] text-[#241e1a] mb-2"><?= $step['title'] ?></h3>
                    <p class="text-[#241e1a]/70 text-[13px] leading-[1.7] max-w-[220px] mx-auto"><?= $step['desc'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===== GALLERY ===== -->
<section class="max-w-[1280px] mx-auto px-6 lg:px-10 py-16 lg:py-20">
    <div class="text-center mb-10" data-aos="fade-up">
        <p class="text-[#2E93BD] font-medium text-[13px] mb-2">A closer look</p>
        <h2 class="font-serif text-[26px] sm:text-[30px] text-[#241e1a] font-medium">From the Fabric Floor</h2>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="rounded-2xl h-[220px] md:h-[260px] md:col-span-2 md:row-span-2 overflow-hidden" data-aos="zoom-in">
            <img src="https://picsum.photos/seed/weavingfloor/800/800" class="w-full h-full object-cover transition-transform duration-600 hover:scale-105" alt="Weaving floor">
        </div>
        <div class="rounded-2xl h-[105px] md:h-[125px] overflow-hidden" data-aos="zoom-in" data-aos-delay="80">
            <img src="https://picsum.photos/seed/cottonbolt/400/300" class="w-full h-full object-cover transition-transform duration-600 hover:scale-105" alt="Cotton bolt">
        </div>
        <div class="rounded-2xl h-[105px] md:h-[125px] overflow-hidden" data-aos="zoom-in" data-aos-delay="120">
            <img src="https://picsum.photos/seed/threadspool/400/300" class="w-full h-full object-cover transition-transform duration-600 hover:scale-105" alt="Thread spools">
        </div>
        <div class="rounded-2xl h-[105px] md:h-[125px] overflow-hidden" data-aos="zoom-in" data-aos-delay="160">
            <img src="https://picsum.photos/seed/embroiderywork/400/300" class="w-full h-full object-cover transition-transform duration-600 hover:scale-105" alt="Embroidery work">
        </div>
        <div class="rounded-2xl h-[105px] md:h-[125px] overflow-hidden" data-aos="zoom-in" data-aos-delay="200">
            <img src="https://picsum.photos/seed/tailorcutting/400/300" class="w-full h-full object-cover transition-transform duration-600 hover:scale-105" alt="Tailor cutting fabric">
        </div>
    </div>
</section>

<!-- ===== TESTIMONIALS ===== -->
<section class="bg-[#241e1a]">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-10 py-16 lg:py-20">
        <div class="text-center mb-12" data-aos="fade-up">
            <p class="text-[#4FB6DE] font-medium text-[13px] mb-2">Trusted by the trade</p>
            <h2 class="font-serif text-[26px] sm:text-[30px] text-[#f5f0eb] font-medium">What Our Trade Partners Say</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($testimonials as $i => $t): ?>
                <div class="bg-white/5 border border-white/10 rounded-2xl p-7" data-aos="fade-up" data-aos-delay="<?= $i * 100 ?>">
                    <i class="fa-solid fa-quote-left text-[#C1272D] text-[20px] mb-4 block"></i>
                    <p class="text-[#f5f0eb]/85 text-[14px] leading-[1.8] mb-6">&ldquo;<?= $t['quote'] ?>&rdquo;</p>
                    <div class="flex items-center gap-3">
                        <img src="https://picsum.photos/seed/<?= urlencode($t['name']) ?>/80/80" class="w-10 h-10 rounded-full object-cover border-2 border-[#4FB6DE]/40" alt="<?= htmlspecialchars($t['name']) ?>">
                        <div>
                            <p class="text-[#f5f0eb] text-[14px] font-medium leading-none"><?= $t['name'] ?></p>
                            <p class="text-[#f5f0eb]/50 text-[12px] mt-1"><?= $t['role'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===== CONTACT CTA ===== -->
<section class="max-w-[1280px] mx-auto px-6 lg:px-10 py-16 lg:py-20 text-center" data-aos="fade-up">
    <h2 class="font-serif text-[26px] sm:text-[30px] text-[#241e1a] font-medium mb-4">Looking for a specific fabric?</h2>
    <p class="text-[#241e1a]/70 text-[15px] max-w-[440px] mx-auto mb-8">Get in touch and we'll help you find what you need from the catalogue.</p>
    <a href="<?= BASE_URL ?>contact.php" class="inline-flex items-center gap-2 bg-[#C1272D] text-white px-8 py-3.5 rounded-full font-medium text-[14px] transition-all duration-300 hover:bg-[#a62a2f] hover:-translate-y-0.5">
        Contact Us
        <i class="fa-solid fa-arrow-right text-[12px]"></i>
    </a>
</section>

<?php include 'includes/footer.php'; ?>

<!-- ===== CAROUSEL JAVASCRIPT ===== -->
<script>
    (function() {
        const slidesWrapper = document.getElementById('heroSlides');
        const slides = slidesWrapper.querySelectorAll('div[style*="background-image"]');
        const total = slides.length;
        let current = 0;
        let interval = null;
        const autoDelay = 5000;

        const dots = document.querySelectorAll('#carouselDots .dot');
        const prevBtn = document.getElementById('prevSlide');
        const nextBtn = document.getElementById('nextSlide');

        function goTo(index) {
            if (index < 0) index = total - 1;
            else if (index >= total) index = 0;
            current = index;
            slidesWrapper.style.transform = 'translateX(-' + (current * 100) + '%)';

            dots.forEach((dot, i) => {
                dot.classList.toggle('bg-white', i === current);
                dot.classList.toggle('scale-125', i === current);
                dot.classList.toggle('shadow-[0_0_12px_rgba(255,255,255,0.3)]', i === current);
                dot.classList.toggle('bg-white/40', i !== current);
            });
        }

        function next() { goTo(current + 1); }
        function prev() { goTo(current - 1); }

        function startAuto() {
            if (interval) clearInterval(interval);
            interval = setInterval(next, autoDelay);
        }
        function stopAuto() {
            if (interval) { clearInterval(interval); interval = null; }
        }

        nextBtn.addEventListener('click', function(e) {
            e.preventDefault();
            stopAuto();
            next();
            startAuto();
        });
        prevBtn.addEventListener('click', function(e) {
            e.preventDefault();
            stopAuto();
            prev();
            startAuto();
        });
        dots.forEach((dot, i) => {
            dot.addEventListener('click', function() {
                stopAuto();
                goTo(i);
                startAuto();
            });
        });

        let touchStartX = 0, touchEndX = 0;
        slidesWrapper.addEventListener('touchstart', function(e) {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });
        slidesWrapper.addEventListener('touchend', function(e) {
            touchEndX = e.changedTouches[0].screenX;
            const diff = touchStartX - touchEndX;
            if (Math.abs(diff) > 40) {
                stopAuto();
                if (diff > 0) next();
                else prev();
                startAuto();
            }
        }, { passive: true });

        goTo(0);
        startAuto();

        const hero = document.querySelector('.relative.overflow-hidden');
        hero.addEventListener('mouseenter', stopAuto);
        hero.addEventListener('mouseleave', startAuto);
    })();
</script>

<!-- Additional Tailwind scroll-snap support (for featured categories) -->
<style>
    .scroller {
        scroll-snap-type: x mandatory;
        -webkit-overflow-scrolling: touch;
    }
    .scroller > * {
        scroll-snap-align: start;
    }
    .scroller::-webkit-scrollbar {
        height: 6px;
    }
    .scroller::-webkit-scrollbar-thumb {
        background: rgba(79,182,222,0.35);
        border-radius: 10px;
    }
    /* Fallback for font-serif if not defined in Tailwind */
    .font-serif {
        font-family: Georgia, serif;
    }
</style>