<?php


$page_title = 'Lookbook';
include 'includes/header.php';

// Load products for tagging
$products = include 'includes/products.php';
?>

<!-- Hero Banner -->
<section class="relative h-[60vh] min-h-[400px] bg-cover bg-center flex items-center justify-center" style="background-image: url('<?= BASE_URL ?>assets/images/lookbook-hero.jpg');">
    <div class="absolute inset-0 bg-black/30"></div>
    <div class="relative text-center text-white px-6">
        <h1 class="font-serif text-5xl md:text-7xl font-medium drop-shadow-lg">The Lookbook</h1>
        <p class="text-lg md:text-xl mt-3 max-w-2xl mx-auto text-white/90">Styling inspiration – every piece tells a story.</p>
    </div>
</section>

<!-- Lookbook Gallery -->
<section class="max-w-[1280px] mx-auto px-6 lg:px-10 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        <!-- Look 1 -->
        <div data-aos="fade-up" class="group relative overflow-hidden rounded-2xl shadow-lg">
            <img src="https://picsum.photos/seed/look1/800/600" alt="Look 1" class="w-full h-[500px] object-cover transition duration-500 group-hover:scale-105">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent flex flex-col justify-end p-6">
                <h3 class="text-white text-2xl font-serif">Classic Cotton Shirting</h3>
                <p class="text-white/80 text-sm mt-1">Pair with chinos or denim for a smart-casual look.</p>
                <div class="mt-3 flex flex-wrap gap-2">
                    <?php 
                    // Find the product with matching name or id (here we manually assign)
                    $look_product = array_filter($products, fn($p) => $p['id'] == 1);
                    $look_product = reset($look_product);
                    if ($look_product): ?>
                        <a href="<?= BASE_URL ?>product.php?id=<?= $look_product['id'] ?>" class="inline-block bg-white text-[#241e1a] px-4 py-2 rounded-full text-sm font-medium hover:bg-brand-red hover:text-white transition">
                            Shop This Look
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Look 2 -->
        <div data-aos="fade-up" data-aos-delay="100" class="group relative overflow-hidden rounded-2xl shadow-lg">
            <img src="https://picsum.photos/seed/look2/800/600" alt="Look 2" class="w-full h-[500px] object-cover transition duration-500 group-hover:scale-105">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent flex flex-col justify-end p-6">
                <h3 class="text-white text-2xl font-serif">Polyester Suiting</h3>
                <p class="text-white/80 text-sm mt-1">Perfect for boardroom meetings – pair with a crisp white shirt.</p>
                <div class="mt-3 flex flex-wrap gap-2">
                    <?php 
                    $look_product = array_filter($products, fn($p) => $p['id'] == 2);
                    $look_product = reset($look_product);
                    if ($look_product): ?>
                        <a href="<?= BASE_URL ?>product.php?id=<?= $look_product['id'] ?>" class="inline-block bg-white text-[#241e1a] px-4 py-2 rounded-full text-sm font-medium hover:bg-brand-red hover:text-white transition">
                            Shop This Look
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Look 3 -->
        <div data-aos="fade-up" data-aos-delay="50" class="group relative overflow-hidden rounded-2xl shadow-lg">
            <img src="https://picsum.photos/seed/look3/800/600" alt="Look 3" class="w-full h-[500px] object-cover transition duration-500 group-hover:scale-105">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent flex flex-col justify-end p-6">
                <h3 class="text-white text-2xl font-serif">Embroidery Base Fabric</h3>
                <p class="text-white/80 text-sm mt-1">Ideal for hand embroidery – creates stunning festive wear.</p>
                <div class="mt-3 flex flex-wrap gap-2">
                    <?php 
                    $look_product = array_filter($products, fn($p) => $p['id'] == 3);
                    $look_product = reset($look_product);
                    if ($look_product): ?>
                        <a href="<?= BASE_URL ?>product.php?id=<?= $look_product['id'] ?>" class="inline-block bg-white text-[#241e1a] px-4 py-2 rounded-full text-sm font-medium hover:bg-brand-red hover:text-white transition">
                            Shop This Look
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Look 4 -->
        <div data-aos="fade-up" data-aos-delay="150" class="group relative overflow-hidden rounded-2xl shadow-lg">
            <img src="https://picsum.photos/seed/look4/800/600" alt="Look 4" class="w-full h-[500px] object-cover transition duration-500 group-hover:scale-105">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent flex flex-col justify-end p-6">
                <h3 class="text-white text-2xl font-serif">Kurta Pajama Set</h3>
                <p class="text-white/80 text-sm mt-1">Comfortable yet stylish – ready-to-wear for any occasion.</p>
                <div class="mt-3 flex flex-wrap gap-2">
                    <?php 
                    $look_product = array_filter($products, fn($p) => $p['id'] == 4);
                    $look_product = reset($look_product);
                    if ($look_product): ?>
                        <a href="<?= BASE_URL ?>product.php?id=<?= $look_product['id'] ?>" class="inline-block bg-white text-[#241e1a] px-4 py-2 rounded-full text-sm font-medium hover:bg-brand-red hover:text-white transition">
                            Shop This Look
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Call to Action -->
<section class="bg-[#f5f0eb] py-16 text-center">
    <div class="max-w-3xl mx-auto px-6">
        <h2 class="font-serif text-3xl text-[#241e1a]">Inspired?</h2>
        <p class="text-[#241e1a]/70 text-lg mt-2">Explore our full collection to create your own look.</p>
        <a href="<?= BASE_URL ?>contact.php" class="inline-block mt-6 bg-brand-red text-white px-8 py-3 rounded-full font-semibold hover:bg-brand-red-dark transition shadow-md">
          Contact Us
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>