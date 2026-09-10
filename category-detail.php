<?php
// ============================================
// CATEGORY DETAIL – shows products for a specific category
// ============================================

// Get the slug from URL
$slug = isset($_GET['slug']) ? trim(urldecode($_GET['slug'])) : '';

// If no slug provided, redirect to the main categories page
if (empty($slug)) {
    header('Location: ' . BASE_URL . 'categories.php');
    exit;
}

// Load central data
$categories = include 'includes/categories.php';
$all_products = include 'includes/products.php';

// Helper function (same as used elsewhere)
function fab_slug($name) {
    return strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $name), '-'));
}

// Find the category by slug
$category = null;
$matched_name = '';
foreach ($categories as $cat) {
    if (fab_slug($cat['name']) === $slug) {
        $category = $cat;
        $matched_name = $cat['name'];
        break;
    }
}

// If category not found, redirect to all categories
if (!$category) {
    header('Location: ' . BASE_URL . 'categories.php');
    exit;
}

// ---- Safe to include header now ----
$page_title = $category['name'];
include 'includes/header.php';

// Filter products for this category
$products = array_filter($all_products, function($p) use ($matched_name) {
    return $p['category'] === $matched_name;
});
$products = array_values($products);
$product_count = count($products);

// Category styling (based on tint)
$tint = $category['tint'];
$textColor = $tint === 'r' ? 'text-[#8F1D22]' : 'text-[#2E93BD]';
?>

<!-- Category Header with Big Image -->
<section class="relative overflow-hidden bg-[#f5f0eb]">
    <!-- ✅ Category Banner Image - Bada size -->
    <div class="relative h-[300px] md:h-[400px] lg:h-[500px] w-full overflow-hidden">
        <img src="<?= BASE_URL . $category['image'] ?>" 
             alt="<?= htmlspecialchars($category['name']) ?>" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-[#241e1a]/80 via-[#241e1a]/40 to-transparent"></div>
        
        <!-- Category Info Overlay -->
        <div class="absolute bottom-0 left-0 right-0 p-8 md:p-12 z-10">
            <div class="max-w-[1280px] mx-auto">
                <a href="<?= BASE_URL ?>categories.php" class="text-white/80 text-sm font-medium hover:text-white inline-flex items-center gap-1 mb-4">
                    <i class="fa-solid fa-arrow-left"></i> All Categories
                </a>
                <h1 class="font-serif text-[32px] sm:text-[48px] lg:text-[56px] text-white font-medium flex items-center gap-4">
                    <!-- ✅ Category Image instead of icon -->
                    <span class="inline-block w-14 h-14 rounded-2xl overflow-hidden shadow-lg border-2 border-white/30">
                        <img src="<?= BASE_URL . $category['image'] ?>" 
                             alt="<?= htmlspecialchars($category['name']) ?>" 
                             class="w-full h-full object-cover">
                    </span>
                    <?= htmlspecialchars($category['name']) ?>
                </h1>
                <p class="text-white/80 text-[16px] mt-2"><?= $product_count ?> product<?= $product_count > 1 ? 's' : '' ?> available</p>
            </div>
        </div>
    </div>
</section>

<!-- Product Grid -->
<section class="max-w-[1280px] mx-auto px-6 lg:px-10 py-16 lg:py-20">
    <?php if ($product_count === 0): ?>
        <div class="text-center py-12">
            <i class="fa-solid fa-box-open text-6xl text-[#241e1a]/20 mb-4"></i>
            <h3 class="font-serif text-2xl text-[#241e1a] font-medium">No products in this category yet</h3>
            <p class="text-[#241e1a]/60 mt-2">Check back soon or browse other categories.</p>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php foreach ($products as $i => $product): ?>
                <a href="<?= BASE_URL ?>product.php?id=<?= $product['id'] ?>" 
                   class="group bg-white rounded-2xl overflow-hidden shadow-[0_1px_2px_rgba(36,30,26,0.04),0_10px_24px_rgba(36,30,26,0.05)] transition-all duration-350 hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(36,30,26,0.12)]"
                   data-aos="fade-up" data-aos-delay="<?= ($i % 6) * 60 ?>">
                    
                    <!-- Product Image -->
                    <div class="relative h-56 overflow-hidden bg-[#f5f0eb]">
                        <img src="<?= BASE_URL . $product['image'] ?>" alt="<?= htmlspecialchars($product['name']) ?>" 
                             class="w-full h-full object-cover transition-transform duration-600 group-hover:scale-105">
                        
                        <!-- ✅ Price Badge - Only show if exists -->
                        <?php if (!empty($product['price'])): ?>
                            <div class="absolute top-3 right-3 bg-[#C1272D] text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                                <?= $product['price'] ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Product Info -->
                    <div class="p-5">
                        <h3 class="font-serif text-[17px] text-[#241e1a] leading-snug group-hover:text-[#C1272D] transition-colors">
                            <?= htmlspecialchars($product['name']) ?>
                        </h3>
                        <p class="text-[#241e1a]/60 text-[13px] mt-1 line-clamp-2">
                            <?= htmlspecialchars(substr($product['description'], 0, 100)) ?>...
                        </p>
                        <div class="flex items-center justify-between mt-4">
                            <?php if (!empty($product['price'])): ?>
                                <span class="font-bold text-[#C1272D] text-sm"><?= $product['price'] ?></span>
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
    <?php endif; ?>
</section>

<?php include 'includes/footer.php'; ?>