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
$iconBg = $tint === 'r' ? 'bg-gradient-to-br from-[#C1272D] to-[#8F1D22]' : 'bg-gradient-to-br from-[#4FB6DE] to-[#2E93BD]';
$textColor = $tint === 'r' ? 'text-[#8F1D22]' : 'text-[#2E93BD]';
?>

<!-- Category Header -->
<section class="bg-[#f5f0eb] py-12 border-b border-[#4FB6DE]/20">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-10">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <a href="<?= BASE_URL ?>categories.php" class="text-[#2E93BD] text-sm font-medium hover:underline inline-flex items-center gap-1">
                    <i class="fa-solid fa-arrow-left"></i> All Categories
                </a>
                <h1 class="font-serif text-[32px] sm:text-[40px] text-[#241e1a] font-medium mt-2 flex items-center gap-3">
                    <span class="inline-block w-10 h-10 rounded-2xl <?= $iconBg ?> flex items-center justify-center text-white text-lg shadow-md">
                        <i class="fa-solid <?= $category['icon'] ?>"></i>
                    </span>
                    <?= htmlspecialchars($category['name']) ?>
                </h1>
                <p class="text-[#241e1a]/70 text-[15px] mt-1"><?= $product_count ?> product<?= $product_count > 1 ? 's' : '' ?> available</p>
            </div>
            <div class="text-sm <?= $textColor ?> font-medium bg-white/70 px-4 py-2 rounded-full shadow-sm border border-[#4FB6DE]/10">
                <i class="fa-solid fa-tag mr-2"></i> <?= $product_count ?> items
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
                        <img src="<?= $product['image'] ?>" alt="<?= htmlspecialchars($product['name']) ?>" 
                             class="w-full h-full object-cover transition-transform duration-600 group-hover:scale-105">
                        <div class="absolute top-3 right-3 bg-[#C1272D] text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                            <?= $product['price'] ?>
                        </div>
                    </div>

                    <!-- Product Info -->
                    <div class="p-5">
                        <h3 class="font-serif text-[17px] text-[#241e1a] leading-snug group-hover:text-[#C1272D] transition-colors">
                            <?= htmlspecialchars($product['name']) ?>
                        </h3>
                        <p class="text-[#241e1a]/60 text-[13px] mt-1 line-clamp-2">
                            <?= htmlspecialchars($product['description']) ?>
                        </p>
                        <div class="flex items-center justify-between mt-4">
                            <span class="font-bold text-[#241e1a] text-sm"><?= $product['price'] ?></span>
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