<?php
// ============================================
// PRODUCT DETAIL PAGE
// ============================================

// ----- Helper function (must be defined before use) -----
function fab_slug($name) {
    return strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $name), '-'));
}

// ----- Get product ID from URL -----
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// If no ID or invalid, redirect
if ($id <= 0) {
    header('Location: ' . BASE_URL . 'categories.php');
    exit;
}

// Load products
$all_products = include 'includes/products.php';

// Find the product by ID
$product = null;
foreach ($all_products as $p) {
    if ($p['id'] === $id) {
        $product = $p;
        break;
    }
}

// If product not found, redirect
if (!$product) {
    header('Location: ' . BASE_URL . 'categories.php');
    exit;
}

// Now safe to include header
$page_title = $product['name'];
include 'includes/header.php';

// Load categories to generate breadcrumb link
$categories = include 'includes/categories.php';
$category_slug = '';
foreach ($categories as $cat) {
    if ($cat['name'] === $product['category']) {
        $category_slug = fab_slug($cat['name']);
        break;
    }
}

// ----- Get Similar Products (same category, exclude current) -----
$similar_products = array_filter($all_products, function($p) use ($product) {
    return $p['category'] === $product['category'] && $p['id'] !== $product['id'];
});
$similar_products = array_values($similar_products);

// ----- Subtitle (fallback agar product data me na ho) -----
$product_subtitle = $product['subtitle'] 
    ?? 'Premium quality fabric — carefully sourced for wholesale, retail and export trade.';
?>
<?php include 'includes/enquiry-modal.php'; ?>

<!-- Breadcrumb & Header -->
<section class="bg-[#f5f0eb] py-8 border-b border-[#4FB6DE]/20">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-10">
        <nav class="text-sm text-[#241e1a]/60 mb-4">
            <a href="<?= BASE_URL ?>categories.php" class="hover:text-[#2E93BD]">Categories</a>
            <span class="mx-2">/</span>
            <a href="<?= BASE_URL ?>category-detail.php?slug=<?= urlencode($category_slug) ?>" class="hover:text-[#2E93BD]">
                <?= htmlspecialchars($product['category']) ?>
            </a>
            <span class="mx-2">/</span>
            <span class="text-[#241e1a] font-medium"><?= htmlspecialchars($product['name']) ?></span>
        </nav>
    </div>
</section>

<!-- Product Detail - Sticky Image -->
<section class="max-w-[1280px] mx-auto px-6 lg:px-10 py-12 lg:py-16">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        
        <!-- ✅ Left Column - Image + Thumbnails -->
        <div data-aos="fade-right" class="lg:sticky lg:top-24 self-start">
            <div class="rounded-3xl overflow-hidden bg-[#f5f0eb] shadow-[0_10px_40px_rgba(36,30,26,0.10)] h-[400px] md:h-[500px] lg:h-[600px]">
                <img src="<?= BASE_URL . $product['image'] ?>" alt="<?= htmlspecialchars($product['name']) ?>" 
                     class="w-full h-full object-contain" id="mainProductImage">
            </div>
            
            <?php if (!empty($product['gallery'])): ?>
            <div class="flex gap-3 mt-4 overflow-x-auto pb-2">
                <?php foreach ($product['gallery'] as $index => $thumb): ?>
                    <button onclick="changeImage('<?= BASE_URL . $thumb ?>')" class="shrink-0 w-20 h-20 rounded-xl overflow-hidden border-2 border-transparent hover:border-[#C1272D] transition-all focus:border-[#C1272D]">
                        <img src="<?= BASE_URL . $thumb ?>" alt="Thumbnail <?= $index+1 ?>" class="w-full h-full object-cover">
                    </button>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>

        <!-- ✅ Right Column - Details -->
        <div data-aos="fade-left" data-aos-delay="100" class="max-h-[calc(100vh-120px)] overflow-y-auto pr-2 scrollbar-thin">
            
            <!-- Title -->
            <h1 class="font-serif text-[32px] sm:text-[38px] text-[#241e1a] font-medium leading-tight">
                <?= htmlspecialchars($product['name']) ?>
            </h1>

            <!-- Subtitle -->
            <p class="text-[#241e1a]/70 text-[15px] sm:text-[16px] leading-[1.7] mt-3">
                <?= htmlspecialchars($product_subtitle) ?>
            </p>
            
            <!-- Price -->
            <div class="flex items-center gap-4 mt-5 flex-wrap">
                <?php if (!empty($product['price'])): ?>
                    <span class="bg-[#C1272D] text-white text-lg font-bold px-5 py-1.5 rounded-full shadow-md">
                        <?= $product['price'] ?>
                    </span>
                <?php endif; ?>
                <span class="text-[#241e1a]/50 text-sm border border-[#241e1a]/10 px-3 py-1 rounded-full">
                    <i class="fa-regular fa-clock mr-1"></i> In Stock
                </span>
            </div>

            <!-- Description -->
            <div class="mt-6 border-t border-[#241e1a]/10 pt-6">
                <h3 class="text-[#241e1a] font-semibold text-sm uppercase tracking-wider">Description</h3>
                <p class="text-[#241e1a]/80 text-[15px] leading-relaxed mt-2">
                    <?= nl2br(htmlspecialchars($product['description'])) ?>
                </p>
            </div>

            <!-- Specifications -->
            <?php if (!empty($product['specs'])): ?>
                <div class="mt-8 border-t border-[#241e1a]/10 pt-6">
                    <h3 class="text-[#241e1a] font-semibold text-sm uppercase tracking-wider">Specifications</h3>
                    <dl class="mt-3 grid grid-cols-2 gap-x-4 gap-y-2 text-sm">
                        <?php foreach ($product['specs'] as $key => $value): ?>
                            <dt class="text-[#241e1a]/50 font-medium"><?= htmlspecialchars($key) ?></dt>
                            <dd class="text-[#241e1a]"><?= htmlspecialchars($value) ?></dd>
                        <?php endforeach; ?>
                    </dl>
                </div>
            <?php endif; ?>

            <!-- CTA -->
            <div class="mt-10 flex flex-wrap gap-4">
                <a href="#" onclick="openEnquiryModal('<?= htmlspecialchars($product['name']) ?>'); return false;" 
                   class="bg-[#C1272D] text-white px-8 py-3.5 rounded-full font-semibold text-sm transition-all hover:bg-[#a62a2f] hover:-translate-y-1 shadow-[0_8px_24px_rgba(193,39,45,0.35)] inline-flex items-center gap-2">
                    <i class="fa-solid fa-envelope"></i> Enquire Now
                </a>
                <a href="<?= BASE_URL ?>category-detail.php?slug=<?= urlencode($category_slug) ?>" class="border-2 border-[#241e1a]/20 text-[#241e1a] px-7 py-3 rounded-full font-medium text-sm transition-all hover:border-[#241e1a] hover:bg-[#241e1a]/5 inline-flex items-center gap-2">
                    <i class="fa-solid fa-arrow-left"></i> Back to Category
                </a>
            </div>

            <!-- ✅ NEED HELP? — Compact box, bottom me -->
            <div class="mt-8 pt-6 border-t border-[#241e1a]/10">
                <div class="flex items-center gap-2 mb-3">
                    <i class="fa-solid fa-headset text-[#C1272D] text-[13px]"></i>
                    <h3 class="text-[#241e1a] font-semibold text-[13px] uppercase tracking-wider">Need Help?</h3>
                    <span class="text-[#241e1a]/50 text-[12.5px] ml-1">— our team is happy to assist.</span>
                </div>

                <div class="flex flex-col sm:flex-row sm:flex-wrap gap-3 text-[13px]">
                    <!-- Phone -->
                    <a href="tel:+9198220 66508" 
                       class="inline-flex items-center gap-2 bg-[#f5f0eb] hover:bg-[#C1272D]/10 border border-[#4FB6DE]/25 hover:border-[#C1272D]/30 rounded-full px-3.5 py-1.5 transition-all text-[#241e1a] hover:text-[#C1272D]">
                        <i class="fa-solid fa-phone text-[#C1272D] text-[11px]"></i>
                        <span class="font-medium">+91 98220 66508</span>
                    </a>

                    <!-- Email -->
                    <a href="mailto:Hareshbk70@gmail.com" 
                       class="inline-flex items-center gap-2 bg-[#f5f0eb] hover:bg-[#2E93BD]/10 border border-[#4FB6DE]/25 hover:border-[#2E93BD]/40 rounded-full px-3.5 py-1.5 transition-all text-[#241e1a] hover:text-[#2E93BD] max-w-full">
                        <i class="fa-solid fa-envelope text-[#2E93BD] text-[11px]"></i>
                        <span class="font-medium truncate">Hareshbk70@gmail.com</span>
                    </a>

                    <!-- Hours -->
                    <span class="inline-flex items-center gap-2 bg-[#f5f0eb] border border-[#4FB6DE]/25 rounded-full px-3.5 py-1.5 text-[#241e1a]/80">
                        <i class="fa-solid fa-clock text-[#C1272D] text-[11px]"></i>
                        <span class="font-medium">Wed–Mon, 11:00–06:00</span>
                    </span>
                </div>

                <p class="text-[#241e1a]/50 text-[12px] mt-2 italic">Tuesday: Closed</p>
            </div>
        </div>
    </div>
</section>

<!-- ===== SIMILAR PRODUCTS ===== -->
<?php if (count($similar_products) > 0): ?>
<section class="max-w-[1280px] mx-auto px-6 lg:px-10 py-16 lg:py-20 border-t border-[#241e1a]/10">
    <div class="flex items-end justify-between mb-10" data-aos="fade-up">
        <div>
            <h2 class="font-serif text-[28px] sm:text-[32px] text-[#241e1a] font-medium mb-2">Similar Products</h2>
            <p class="text-[#241e1a]/70 text-[15px]">More from <?= htmlspecialchars($product['category']) ?></p>
        </div>
        <a href="<?= BASE_URL ?>category-detail.php?slug=<?= urlencode($category_slug) ?>" class="text-[#2E93BD] text-sm font-medium hover:underline">
            View All <i class="fa-solid fa-arrow-right ml-1"></i>
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php foreach (array_slice($similar_products, 0, 4) as $i => $similar): ?>
            <a href="<?= BASE_URL ?>product.php?id=<?= $similar['id'] ?>" 
               class="group bg-white rounded-2xl overflow-hidden shadow-[0_1px_2px_rgba(36,30,26,0.04),0_10px_24px_rgba(36,30,26,0.05)] transition-all duration-350 hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(36,30,26,0.12)]"
               data-aos="fade-up" data-aos-delay="<?= ($i % 4) * 100 ?>">
                
                <div class="relative h-56 overflow-hidden bg-[#f5f0eb]">
                    <img src="<?= BASE_URL . $similar['image'] ?>" alt="<?= htmlspecialchars($similar['name']) ?>" 
                         class="w-full h-full object-cover transition-transform duration-600 group-hover:scale-105">
                    
                    <?php if (!empty($similar['price'])): ?>
                        <div class="absolute top-3 right-3 bg-[#C1272D] text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                            <?= $similar['price'] ?>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="p-5">
                    <h3 class="font-serif text-[16px] text-[#241e1a] leading-snug group-hover:text-[#C1272D] transition-colors line-clamp-2">
                        <?= htmlspecialchars($similar['name']) ?>
                    </h3>
                    <p class="text-[#241e1a]/50 text-[12px] mt-1"><?= htmlspecialchars($similar['category']) ?></p>
                    <div class="flex items-center justify-between mt-3">
                        <?php if (!empty($similar['price'])): ?>
                            <span class="font-bold text-[#C1272D] text-sm"><?= $similar['price'] ?></span>
                        <?php else: ?>
                            <span class="text-[#241e1a]/40 text-sm">Price on Request</span>
                        <?php endif; ?>
                        <span class="text-[#2E93BD] text-sm font-medium group-hover:translate-x-1 transition-transform inline-block">
                            View <i class="fa-solid fa-chevron-right text-[10px] ml-1"></i>
                        </span>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>

<!-- ===== JavaScript for Thumbnail Change ===== -->
<script>
function changeImage(src) {
    document.getElementById('mainProductImage').src = src;
}
</script>

<!-- Custom Scrollbar Styling -->
<style>
    .scrollbar-thin::-webkit-scrollbar {
        width: 4px;
    }
    .scrollbar-thin::-webkit-scrollbar-track {
        background: #f5f0eb;
        border-radius: 10px;
    }
    .scrollbar-thin::-webkit-scrollbar-thumb {
        background: #C1272D;
        border-radius: 10px;
    }
    .scrollbar-thin::-webkit-scrollbar-thumb:hover {
        background: #a62a2f;
    }
</style>