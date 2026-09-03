<?php
$page_title = "All Categories";
include 'includes/header.php';

$categories = include 'includes/categories.php';
$total = count($categories);

// Helper for slug (same as before)
function fab_slug($name) {
    return strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $name), '-'));
}
?>

<!-- Hero banner -->
<section class="bg-[#f5f0eb] py-12 border-b border-[#4FB6DE]/20">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-10 text-center" data-aos="fade-up">
        <h1 class="font-serif text-[36px] sm:text-[44px] text-[#241e1a] font-medium">All Fabric Categories</h1>
        <p class="text-[#241e1a]/70 text-[16px] max-w-[560px] mx-auto mt-3">Explore our complete range – <?= $total ?> categories covering every fabric we manufacture and source.</p>
    </div>
</section>

<!-- Category Grid -->
<section class="max-w-[1280px] mx-auto px-6 lg:px-10 py-16 lg:py-20">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <?php foreach ($categories as $i => $cat): 
            $tint = $cat['tint'];
            $bgWash = $tint === 'r' ? 'bg-[radial-gradient(120%_100%_at_0%_0%,rgba(193,39,45,0.14),rgba(193,39,45,0)_60%)]' : 'bg-[radial-gradient(120%_100%_at_0%_0%,rgba(79,182,222,0.20),rgba(79,182,222,0)_60%)]';
            $iconBg = $tint === 'r' ? 'bg-gradient-to-br from-[#C1272D] to-[#8F1D22]' : 'bg-gradient-to-br from-[#4FB6DE] to-[#2E93BD]';
            $textColor = $tint === 'r' ? 'text-[#8F1D22]' : 'text-[#2E93BD]';
        ?>
            <a href="<?= BASE_URL ?>category-detail.php?slug=<?= urlencode(fab_slug($cat['name'])) ?>"
               class="group relative rounded-[26px] bg-white shadow-[0_1px_2px_rgba(36,30,26,0.04),0_10px_24px_rgba(36,30,26,0.05)] transition-all duration-350 hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(36,30,26,0.12)] overflow-hidden flex items-center gap-4 p-6 <?= $bgWash ?>"
               data-aos="fade-up" data-aos-delay="<?= ($i % 6) * 60 ?>">
                
                <div class="w-16 h-16 rounded-2xl <?= $iconBg ?> flex items-center justify-center shrink-0 shadow-[0_8px_16px_rgba(36,30,26,0.15)] transition-transform duration-300 group-hover:scale-105">
                    <i class="fa-solid <?= $cat['icon'] ?> text-white text-[22px]"></i>
                </div>
                
                <div class="flex-1 min-w-0">
                    <h3 class="font-serif text-[17px] text-[#241e1a] leading-snug"><?= htmlspecialchars($cat['name']) ?></h3>
                    <p class="text-[13px] mt-1 <?= $textColor ?> font-medium"><?= $cat['count'] ?> products</p>
                </div>
                
                <i class="fa-solid fa-chevron-right text-[#241e1a]/30 text-[14px] transition-transform duration-300 group-hover:translate-x-1"></i>
            </a>
        <?php endforeach; ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>