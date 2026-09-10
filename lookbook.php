<?php
$page_title = 'Lookbook';
include 'includes/header.php';

// Load products
$products = include 'includes/products.php';

$selected_ids = [
    1,  
    18, 
    40,  
    43,  
    58, 
    70,  
    73, 
    83, 
    85, 
    99, 
    110, 
    124, 
];


$look_products = array_filter($products, function($p) use ($selected_ids) {
    return in_array($p['id'], $selected_ids);
});

if (count($look_products) < 8) {
    $look_products = array_slice($products, 0, 12);
}

usort($look_products, function($a, $b) use ($selected_ids) {
    return array_search($a['id'], $selected_ids) - array_search($b['id'], $selected_ids);
});
?>

<!-- ===== HERO BANNER ===== -->
<section class="relative h-[50vh] min-h-[350px] bg-cover bg-center flex items-center justify-center" 
         style="background-image: url('<?= BASE_URL ?>assets/images/banner/lookbook-banner.webp');">
    <div class="absolute inset-0 bg-gradient-to-r from-[#C1272D]/40 via-[#4FB6DE]/20 to-transparent"></div>
    <div class="relative text-center text-white px-6">
        <span class="inline-block bg-white/20 backdrop-blur-sm text-white text-[12px] font-bold uppercase tracking-[0.15em] px-4 py-1.5 rounded-full mb-4">Our Collection</span>
        <h1 class="font-serif text-4xl md:text-6xl font-medium drop-shadow-lg">The Lookbook</h1>
        <p class="text-lg md:text-xl mt-3 max-w-2xl mx-auto text-white/90 drop-shadow-md">Styling inspiration – every piece tells a story.</p>
    </div>
</section>

<!-- ===== LOOKBOOK GRID ===== -->
<section class="max-w-[1280px] mx-auto px-6 lg:px-10 py-16">
    <div class="text-center mb-12" data-aos="fade-up">
        <p class="text-[#2E93BD] font-medium text-[13px] mb-2">Curated for You</p>
        <h2 class="font-serif text-[28px] sm:text-[34px] text-[#241e1a] font-medium">Our Finest Fabrics, Handpicked</h2>
        <p class="text-[#241e1a]/70 text-[15px] max-w-[580px] mx-auto mt-2">
            From elegant embroideries to sturdy pocketings – each fabric reflects quality and craftsmanship.
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <?php foreach ($look_products as $index => $product): 
            // Category badge color
            $catColor = '#C1272D';
            if (strpos($product['category'], 'Embroidery') !== false) $catColor = '#4FB6DE';
            elseif (strpos($product['category'], 'Pocketing') !== false) $catColor = '#8F1D22';
            elseif (strpos($product['category'], 'Cotton') !== false) $catColor = '#2E93BD';
            elseif (strpos($product['category'], 'Polyester') !== false) $catColor = '#6A4C93';
            elseif (strpos($product['category'], 'Kurta') !== false) $catColor = '#D4A373';
            else $catColor = '#C1272D';
        ?>
            <div class="group relative rounded-2xl overflow-hidden bg-white shadow-[0_1px_2px_rgba(36,30,26,0.04),0_10px_24px_rgba(36,30,26,0.05)] transition-all duration-350 hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(36,30,26,0.12)]" 
                 data-aos="fade-up" data-aos-delay="<?= ($index % 4) * 80 ?>">
                
                <!-- Image Container -->
                <div class="relative aspect-[3/4] overflow-hidden bg-[#f5f0eb]">
                    <img src="<?= BASE_URL . $product['image'] ?>" 
                         alt="<?= htmlspecialchars($product['name']) ?>" 
                         class="w-full h-full object-cover transition-transform duration-600 group-hover:scale-105">
                    
                    <!-- Category Badge -->
                    <span class="absolute top-3 left-3 text-white text-[9px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-full shadow-lg" 
                          style="background: <?= $catColor ?>;">
                        <?= htmlspecialchars($product['category']) ?>
                    </span>

                    <!-- Overlay on Hover (Desktop) -->
                    <div class="absolute inset-0 bg-gradient-to-t from-[#241e1a]/80 via-[#241e1a]/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-400 flex flex-col justify-end p-5">
                        <h3 class="text-white text-[16px] font-serif font-medium leading-tight line-clamp-2"><?= htmlspecialchars($product['name']) ?></h3>
                        <?php if (!empty($product['price'])): ?>
                            <p class="text-[#4FB6DE] text-[14px] font-semibold mt-1"><?= htmlspecialchars($product['price']) ?></p>
                        <?php endif; ?>
                        <a href="<?= BASE_URL ?>product.php?id=<?= $product['id'] ?>" 
                           class="mt-3 inline-flex items-center gap-1 bg-white text-[#241e1a] px-4 py-2 rounded-full text-[12px] font-medium hover:bg-[#C1272D] hover:text-white transition-all w-fit">
                            View Product <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                <!-- Mobile / Always visible info -->
                <div class="p-4 md:hidden">
                    <h3 class="text-[#241e1a] text-[15px] font-serif font-medium leading-tight line-clamp-1"><?= htmlspecialchars($product['name']) ?></h3>
                    <p class="text-[#241e1a]/60 text-[12px] mt-0.5"><?= htmlspecialchars($product['category']) ?></p>
                    <?php if (!empty($product['price'])): ?>
                        <p class="text-[#C1272D] text-[13px] font-semibold mt-1"><?= htmlspecialchars($product['price']) ?></p>
                    <?php endif; ?>
                </div>

                <!-- Desktop info (hidden on mobile) -->
                <div class="hidden md:block p-4">
                    <h3 class="text-[#241e1a] text-[15px] font-serif font-medium leading-tight line-clamp-1"><?= htmlspecialchars($product['name']) ?></h3>
                    <p class="text-[#241e1a]/60 text-[12px] mt-0.5"><?= htmlspecialchars($product['category']) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- View All CTA -->
    <div class="text-center mt-12" data-aos="fade-up">
        <a href="<?= BASE_URL ?>categories.php" class="inline-flex items-center gap-2 border-2 border-[#241e1a] text-[#241e1a] px-8 py-3 rounded-full font-medium text-[14px] transition-all duration-300 hover:bg-[#241e1a] hover:text-white hover:-translate-y-0.5">
            Explore Full Collection <i class="fa-solid fa-arrow-right text-[12px]"></i>
        </a>
    </div>
</section>

<!-- ===== WHY LOOKBOOK? (Optional extra section) ===== -->
<section class="bg-[#f5f0eb] border-y border-[#4FB6DE]/20 py-16">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center max-w-4xl mx-auto">
            <div data-aos="fade-up" data-aos-delay="0">
                <div class="w-14 h-14 mx-auto rounded-full bg-[#C1272D]/10 flex items-center justify-center mb-4">
                    <i class="fa-solid fa-eye text-[#C1272D] text-[24px]"></i>
                </div>
                <h3 class="font-serif text-[18px] text-[#241e1a]">See the Texture</h3>
                <p class="text-[#241e1a]/70 text-[14px] leading-[1.6] mt-2">High-resolution images that capture the weave, feel, and finish of every fabric.</p>
            </div>
            <div data-aos="fade-up" data-aos-delay="100">
                <div class="w-14 h-14 mx-auto rounded-full bg-[#4FB6DE]/15 flex items-center justify-center mb-4">
                    <i class="fa-solid fa-lightbulb text-[#2E93BD] text-[24px]"></i>
                </div>
                <h3 class="font-serif text-[18px] text-[#241e1a]">Get Inspired</h3>
                <p class="text-[#241e1a]/70 text-[14px] leading-[1.6] mt-2">Discover new combinations – from shirting to embroidery, we have something for every project.</p>
            </div>
            <div data-aos="fade-up" data-aos-delay="200">
                <div class="w-14 h-14 mx-auto rounded-full bg-[#C1272D]/10 flex items-center justify-center mb-4">
                    <i class="fa-solid fa-cart-plus text-[#C1272D] text-[24px]"></i>
                </div>
                <h3 class="font-serif text-[18px] text-[#241e1a]">Order with Ease</h3>
                <p class="text-[#241e1a]/70 text-[14px] leading-[1.6] mt-2">Click on any product to see full specs, pricing, and MOQ – then reach out to us.</p>
            </div>
        </div>
    </div>
</section>

<!-- ===== CONTACT CTA ===== -->
<section class="max-w-[1280px] mx-auto px-6 lg:px-10 py-16 text-center" data-aos="fade-up">
    <h2 class="font-serif text-[26px] sm:text-[30px] text-[#241e1a] font-medium mb-4">Found something you love?</h2>
    <p class="text-[#241e1a]/70 text-[15px] max-w-[440px] mx-auto mb-8">Get in touch for pricing, samples, and bulk orders – we're here to help.</p>
    <a href="<?= BASE_URL ?>contact.php" class="inline-flex items-center gap-2 bg-[#C1272D] text-white px-8 py-3.5 rounded-full font-medium text-[14px] transition-all duration-300 hover:bg-[#a62a2f] hover:-translate-y-0.5">
        Contact Us
        <i class="fa-solid fa-arrow-right text-[12px]"></i>
    </a>
</section>

<?php include 'includes/footer.php'; ?>