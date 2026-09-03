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
// echo '<pre style="background:#f4f4f4; padding:15px; border:1px solid #ccc;">';
// print_r($product);
// echo '</pre>';
// exit;

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

<!-- Product Detail -->
<section class="max-w-[1280px] mx-auto px-6 lg:px-10 py-12 lg:py-16">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        <!-- Image -->
        <div data-aos="fade-right">
            <div class="rounded-3xl overflow-hidden bg-[#f5f0eb] shadow-[0_10px_40px_rgba(36,30,26,0.10)]">
                <img src="<?= $product['image'] ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="w-full h-auto object-cover">
            </div>
        </div>

        <!-- Details -->
        <div data-aos="fade-left" data-aos-delay="100">
            <h1 class="font-serif text-[32px] sm:text-[38px] text-[#241e1a] font-medium leading-tight">
                <?= htmlspecialchars($product['name']) ?>
            </h1>
            
            <div class="flex items-center gap-4 mt-3 flex-wrap">
                <span class="bg-[#C1272D] text-white text-lg font-bold px-5 py-1.5 rounded-full shadow-md">
                    <?= $product['price'] ?>
                </span>
                <span class="text-[#241e1a]/50 text-sm border border-[#241e1a]/10 px-3 py-1 rounded-full">
                    <i class="fa-regular fa-clock mr-1"></i> In Stock
                </span>
            </div>

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
              <!-- Inside the CTA div -->
<a href="#" onclick="openEnquiryModal('<?= htmlspecialchars($product['name']) ?>'); return false;" 
   class="bg-[#C1272D] text-white px-8 py-3.5 rounded-full font-semibold text-sm transition-all hover:bg-[#a62a2f] hover:-translate-y-1 shadow-[0_8px_24px_rgba(193,39,45,0.35)] inline-flex items-center gap-2">
  <i class="fa-solid fa-envelope"></i> Enquire Now
</a>
                <a href="<?= BASE_URL ?>category-detail.php?slug=<?= urlencode($category_slug) ?>" class="border-2 border-[#241e1a]/20 text-[#241e1a] px-7 py-3 rounded-full font-medium text-sm transition-all hover:border-[#241e1a] hover:bg-[#241e1a]/5 inline-flex items-center gap-2">
                    <i class="fa-solid fa-arrow-left"></i> Back to Category
                </a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>