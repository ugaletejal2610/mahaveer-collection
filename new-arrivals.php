<?php

$page_title = 'New Arrivals';
include 'includes/header.php';

// Load all products
$products = include 'includes/products.php';

// Sort by ID descending (newest first)
usort($products, function($a, $b) {
    return $b['id'] - $a['id'];
});
?>

<!-- Page Header -->
<section class="bg-[#f5f0eb] py-12 border-b border-[#4FB6DE]/20">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-10">
        <h1 class="font-serif text-4xl lg:text-5xl text-[#241e1a] font-medium">New Arrivals</h1>
        <p class="text-[#241e1a]/60 text-lg mt-2">Discover the latest additions to our collection</p>
    </div>
</section>

<!-- Product Grid -->
<section class="max-w-[1280px] mx-auto px-6 lg:px-10 py-12">
    <?php if (empty($products)) : ?>
        <div class="text-center py-12">
            <p class="text-[#241e1a]/60">No products found.</p>
        </div>
    <?php else : ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php $counter = 0; ?>
            <?php foreach ($products as $p) : 
                $cat_slug = strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $p['category']), '-'));
                $delay = ($counter % 4) * 50;
                $counter++;
            ?>
                <div data-aos="fade-up" data-aos-delay="<?= $delay ?>" 
                     class="bg-white rounded-2xl overflow-hidden shadow-[0_8px_30px_rgba(36,30,26,0.06)] transition hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(36,30,26,0.12)] group">
                    
                    <!-- Image with "New" badge -->
                    <div class="relative">
                        <a href="<?= BASE_URL ?>product.php?id=<?= $p['id'] ?>">
                            <img src="<?= $p['image'] ?>" alt="<?= htmlspecialchars($p['name']) ?>" class="w-full h-64 object-cover group-hover:scale-105 transition duration-500">
                        </a>
                        <!-- "New" Badge -->
                        <span class="absolute top-3 left-3 bg-brand-red text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                            New
                        </span>
                    </div>

                    <div class="p-5">
                        <p class="text-xs text-brand-red uppercase tracking-wide font-medium">
                            <a href="<?= BASE_URL ?>category-detail.php?slug=<?= urlencode($cat_slug) ?>" class="hover:underline">
                                <?= htmlspecialchars($p['category']) ?>
                            </a>
                        </p>
                        <a href="<?= BASE_URL ?>product.php?id=<?= $p['id'] ?>" class="block font-serif text-lg text-[#241e1a] hover:text-brand-red transition mt-1">
                            <?= htmlspecialchars($p['name']) ?>
                        </a>
                        <p class="text-[#241e1a]/80 text-sm mt-1 line-clamp-2"><?= htmlspecialchars($p['description']) ?></p>
                        <div class="mt-3 flex items-center justify-between">
                            <span class="bg-brand-red text-white text-sm font-bold px-3 py-1 rounded-full"><?= $p['price'] ?></span>
                            <a href="<?= BASE_URL ?>product.php?id=<?= $p['id'] ?>" class="text-brand-sky-dark hover:text-brand-red transition text-sm font-medium">
                                View Details <i class="fa-solid fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>

<?php include 'includes/footer.php'; ?>