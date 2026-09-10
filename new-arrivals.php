<?php
$page_title = 'New Arrivals';
include 'includes/header.php';

// Load all products
$products = include 'includes/products.php';

// Sort by ID descending (newest first)
usort($products, function($a, $b) {
    return $b['id'] - $a['id'];
});

$total_products = count($products);
?>

<!-- ===== HERO – सिंपल और मिनिमल ===== -->
<section class="bg-[#f5f0eb] border-b border-[#4FB6DE]/20 py-16 lg:py-20">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-10">
        <div class="max-w-2xl" data-aos="fade-up">
            <span class="inline-block bg-[#C1272D]/10 text-[#C1272D] text-[12px] font-bold uppercase tracking-[0.15em] px-4 py-1.5 rounded-full mb-4">
                <i class="fa-regular fa-star mr-2"></i> Fresh Collection
            </span>
            <h1 class="font-serif text-4xl lg:text-5xl text-[#241e1a] font-medium">New Arrivals</h1>
            <p class="text-[#241e1a]/70 text-lg mt-3 max-w-lg">
                Discover the latest fabrics added to our catalogue – fresh weaves, new prints, and seasonal favourites.
            </p>
            <div class="flex flex-wrap gap-6 mt-6">
                <div>
                    <p class="text-[#C1272D] font-serif text-2xl font-medium"><?= $total_products ?></p>
                    <p class="text-[#241e1a]/50 text-[13px]">New Fabrics</p>
                </div>
                <div>
                    <p class="text-[#2E93BD] font-serif text-2xl font-medium">2026</p>
                    <p class="text-[#241e1a]/50 text-[13px]">Latest Season</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== PRODUCT GRID (बिना फ़िल्टर) ===== -->
<section class="max-w-[1280px] mx-auto px-6 lg:px-10 py-12">
    <?php if (empty($products)) : ?>
        <div class="text-center py-12">
            <p class="text-[#241e1a]/60">No products found.</p>
        </div>
    <?php else : ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php $counter = 0; ?>
            <?php foreach ($products as $p) : 
                $delay = ($counter % 4) * 50;
                $counter++;
                
                $price_display = !empty($p['price']) ? $p['price'] : 'Price on enquiry';
                $has_price = !empty($p['price']);
                
                $catColor = '#C1272D';
                if (strpos($p['category'], 'Embroidery') !== false) $catColor = '#4FB6DE';
                elseif (strpos($p['category'], 'Pocketing') !== false) $catColor = '#8F1D22';
                elseif (strpos($p['category'], 'Cotton') !== false) $catColor = '#2E93BD';
                elseif (strpos($p['category'], 'Polyester') !== false) $catColor = '#6A4C93';
                elseif (strpos($p['category'], 'Kurta') !== false) $catColor = '#D4A373';
            ?>
                <div data-aos="fade-up" data-aos-delay="<?= $delay ?>" 
                     class="bg-white rounded-2xl overflow-hidden shadow-[0_1px_2px_rgba(36,30,26,0.04),0_10px_24px_rgba(36,30,26,0.05)] transition-all duration-350 hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(36,30,26,0.12)] group">
                    
                    <!-- Image with Badges -->
                    <div class="relative overflow-hidden bg-[#f5f0eb]">
                        <a href="<?= BASE_URL ?>product.php?id=<?= $p['id'] ?>">
                            <img src="<?= BASE_URL . $p['image'] ?>" 
                                 alt="<?= htmlspecialchars($p['name']) ?>" 
                                 class="w-full h-64 object-cover transition-transform duration-600 group-hover:scale-105">
                        </a>
                        
                        <!-- "New" Badge -->
                        <span class="absolute top-3 left-3 bg-[#C1272D] text-white text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-full shadow-lg z-10">
                            <i class="fa-regular fa-star mr-1 text-[10px]"></i> New
                        </span>
                        
                        <!-- Category Badge (bottom) -->
                        <span class="absolute bottom-3 left-3 text-white text-[9px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-full shadow-lg z-10" 
                              style="background: <?= $catColor ?>;">
                            <?= htmlspecialchars($p['category']) ?>
                        </span>
                        
                        <!-- Quick View Overlay -->
                        <div class="absolute inset-0 bg-[#241e1a]/60 opacity-0 group-hover:opacity-100 transition-opacity duration-400 flex items-center justify-center z-10">
                            <a href="<?= BASE_URL ?>product.php?id=<?= $p['id'] ?>" 
                               class="bg-white text-[#241e1a] px-5 py-2.5 rounded-full text-[13px] font-medium hover:bg-[#C1272D] hover:text-white transition-all transform -translate-y-2 group-hover:translate-y-0 duration-300">
                                <i class="fa-regular fa-eye mr-2"></i> View Details
                            </a>
                        </div>
                    </div>

                    <div class="p-4">
                        <a href="<?= BASE_URL ?>product.php?id=<?= $p['id'] ?>" class="block">
                            <h3 class="font-serif text-[16px] text-[#241e1a] leading-tight hover:text-[#C1272D] transition line-clamp-2">
                                <?= htmlspecialchars($p['name']) ?>
                            </h3>
                        </a>
                        
                        <?php if ($has_price): ?>
                            <p class="text-[#C1272D] text-[15px] font-semibold mt-1"><?= htmlspecialchars($price_display) ?></p>
                        <?php else: ?>
                            <p class="text-[#2E93BD] text-[13px] font-medium mt-1">
                                <i class="fa-regular fa-envelope mr-1"></i> Enquire for Price
                            </p>
                        <?php endif; ?>
                        
                        <p class="text-[#241e1a]/60 text-[13px] mt-1 line-clamp-2"><?= htmlspecialchars(substr($p['description'], 0, 80)) ?>…</p>
                        
                        <div class="mt-3 flex items-center justify-between">
                            <span class="text-[#241e1a]/40 text-[11px]">
                                <i class="fa-regular fa-calendar mr-1"></i> Added recently
                            </span>
                            <a href="<?= BASE_URL ?>product.php?id=<?= $p['id'] ?>" 
                               class="text-[#2E93BD] hover:text-[#C1272D] transition text-[13px] font-medium">
                                Details <i class="fa-solid fa-arrow-right ml-1 text-[11px]"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>

<!-- ===== WHY CHECK NEW ARRIVALS? ===== -->
<section class="bg-[#f5f0eb] border-y border-[#4FB6DE]/20 py-16">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-10">
        <div class="text-center mb-12" data-aos="fade-up">
            <p class="text-[#C1272D] font-medium text-[13px] mb-2">Why Check New Arrivals</p>
            <h2 class="font-serif text-[26px] sm:text-[30px] text-[#241e1a] font-medium">Stay Ahead with Fresh Fabrics</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
            <div class="text-center" data-aos="fade-up" data-aos-delay="0">
                <div class="w-16 h-16 mx-auto rounded-full bg-[#C1272D]/10 flex items-center justify-center mb-4">
                    <i class="fa-solid fa-compass text-[#C1272D] text-[24px]"></i>
                </div>
                <h3 class="font-serif text-[18px] text-[#241e1a]">Seasonal Updates</h3>
                <p class="text-[#241e1a]/70 text-[14px] leading-[1.6] mt-2">We regularly add fabrics that match the season – lightweight cottons for summer, warm blends for winter.</p>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 mx-auto rounded-full bg-[#4FB6DE]/15 flex items-center justify-center mb-4">
                    <i class="fa-solid fa-palette text-[#2E93BD] text-[24px]"></i>
                </div>
                <h3 class="font-serif text-[18px] text-[#241e1a]">New Prints & Patterns</h3>
                <p class="text-[#241e1a]/70 text-[14px] leading-[1.6] mt-2">Our designers curate fresh prints – from digital florals to contemporary geometrics.</p>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 mx-auto rounded-full bg-[#C1272D]/10 flex items-center justify-center mb-4">
                    <i class="fa-solid fa-bolt text-[#C1272D] text-[24px]"></i>
                </div>
                <h3 class="font-serif text-[18px] text-[#241e1a]">Trending Now</h3>
                <p class="text-[#241e1a]/70 text-[14px] leading-[1.6] mt-2">Be the first to stock what's trending – our new arrivals reflect what's moving in the market.</p>
            </div>
        </div>
    </div>
</section>

<!-- ===== CTA ===== -->
<section class="max-w-[1280px] mx-auto px-6 lg:px-10 py-16 text-center" data-aos="fade-up">
    <h2 class="font-serif text-[26px] sm:text-[30px] text-[#241e1a] font-medium mb-4">Want to order something new?</h2>
    <p class="text-[#241e1a]/70 text-[15px] max-w-[440px] mx-auto mb-8">Reach out to us with the fabric name and we'll share pricing, samples, and availability.</p>
    <a href="<?= BASE_URL ?>contact.php" class="inline-flex items-center gap-2 bg-[#C1272D] text-white px-8 py-3.5 rounded-full font-medium text-[14px] transition-all duration-300 hover:bg-[#a62a2f] hover:-translate-y-0.5">
        Contact Us
        <i class="fa-solid fa-arrow-right text-[12px]"></i>
    </a>
</section>

<?php include 'includes/footer.php'; ?>