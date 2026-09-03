<?php
// search.php


$query = isset($_GET['q']) ? trim($_GET['q']) : '';
$products = include 'includes/products.php';
$results = [];

if (!empty($query)) {
    $search_terms = explode(' ', strtolower($query));
    foreach ($products as $p) {
        $match = true;
        foreach ($search_terms as $term) {
            if (stripos($p['name'], $term) === false && 
                stripos($p['description'], $term) === false && 
                stripos($p['category'], $term) === false) {
                $match = false;
                break;
            }
        }
        if ($match) {
            $results[] = $p;
        }
    }
}

$page_title = $query ? "Search: $query" : "Search";
include 'includes/header.php';
?>

<section class="max-w-[1280px] mx-auto px-6 lg:px-10 py-12">
    <h1 class="font-serif text-3xl text-[#241e1a] mb-2">
        <?= $query ? "Results for “" . htmlspecialchars($query) . "”" : "Search Products" ?>
    </h1>
    <p class="text-[#241e1a]/60 text-sm mb-8">
        <?= count($results) ?> product<?= count($results) !== 1 ? 's' : '' ?> found
    </p>

    <?php if (empty($query)) : ?>
        <div class="bg-white p-8 rounded-2xl shadow-sm text-center">
            <p class="text-[#241e1a]/60">Type something in the search bar above.</p>
        </div>
    <?php elseif (empty($results)) : ?>
        <div class="bg-white p-8 rounded-2xl shadow-sm text-center">
            <i class="fa-regular fa-face-frown text-4xl text-[#241e1a]/30 mb-4"></i>
            <p class="text-[#241e1a]/60">No products found matching your search.</p>
            <a href="<?= BASE_URL ?>" class="inline-block mt-4 text-brand-red hover:underline">Go back home</a>
        </div>
    <?php else : ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php foreach ($results as $p) : 
                $cat_slug = strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $p['category']), '-'));
            ?>
                <div class="bg-white rounded-2xl overflow-hidden shadow-[0_8px_30px_rgba(36,30,26,0.06)] transition hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(36,30,26,0.12)]">
                    <a href="<?= BASE_URL ?>product-detail.php?id=<?= $p['id'] ?>">
                        <img src="<?= $p['image'] ?>" alt="<?= htmlspecialchars($p['name']) ?>" class="w-full h-56 object-cover">
                    </a>
                    <div class="p-5">
                        <p class="text-xs text-brand-red uppercase tracking-wide font-medium"><?= htmlspecialchars($p['category']) ?></p>
                        <a href="<?= BASE_URL ?>product-detail.php?id=<?= $p['id'] ?>" class="block font-serif text-lg text-[#241e1a] hover:text-brand-red transition mt-1">
                            <?= htmlspecialchars($p['name']) ?>
                        </a>
                        <p class="text-[#241e1a]/80 text-sm mt-1 line-clamp-2"><?= htmlspecialchars($p['description']) ?></p>
                        <div class="mt-3 flex items-center justify-between">
                            <span class="bg-brand-red text-white text-sm font-bold px-3 py-1 rounded-full"><?= $p['price'] ?></span>
                            <a href="<?= BASE_URL ?>product-detail.php?id=<?= $p['id'] ?>" class="text-brand-sky-dark hover:text-brand-red transition text-sm font-medium">View →</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>

<?php include 'includes/footer.php'; ?>