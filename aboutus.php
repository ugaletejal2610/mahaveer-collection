<?php
// ============================================
// ABOUT PAGE – Pure Tailwind
// ============================================
$page_title = "About Us";
include 'includes/header.php';

// ------------------------------------------------------------------
// Core Values
// ------------------------------------------------------------------
$values = [
    ['icon' => 'fa-swatchbook', 'title' => 'Range', 'desc' => '19 fabric categories, from everyday shirting to specialised hospital and Schiffli fabrics.', 'tint' => 'r'],
    ['icon' => 'fa-magnifying-glass-chart', 'title' => 'Quality Checks', 'desc' => 'Every batch is checked for weave, weight and finish before it enters the catalogue.', 'tint' => 's'],
    ['icon' => 'fa-people-group', 'title' => 'Trade Relationships', 'desc' => 'Long-standing ties with mills and weavers, built over years of consistent sourcing.', 'tint' => 'r'],
    ['icon' => 'fa-clock', 'title' => 'Fast Response', 'desc' => 'Enquiries are answered quickly — we know timing matters in the fabric trade.', 'tint' => 's'],
];

// ------------------------------------------------------------------
// Why Choose Us – 5 Points
// ------------------------------------------------------------------
$whyUs = [
    ['icon' => 'fa-user-tie', 'title' => 'Experienced Professionals', 'desc' => 'Our team brings deep industry knowledge to source and check every fabric.', 'tint' => 'r'],
    ['icon' => 'fa-handshake', 'title' => 'Client-Centric Approach', 'desc' => 'We listen to your needs and offer tailored fabric solutions for every requirement.', 'tint' => 's'],
    ['icon' => 'fa-warehouse', 'title' => 'Well-Established Infrastructure', 'desc' => 'Based in Ulhasnagar with robust systems for inventory, dispatch, and quality control.', 'tint' => 'r'],
    ['icon' => 'fa-scale-balanced', 'title' => 'Ethical Business Practices', 'desc' => 'Transparent dealings and honest pricing build long-term trust with our partners.', 'tint' => 's'],
    ['icon' => 'fa-globe', 'title' => 'Wide Distribution Network', 'desc' => 'Supplying to India and overseas markets including Malaysia, Indonesia, Singapore & Africa.', 'tint' => 'r'],
];

// ------------------------------------------------------------------
// Milestones
// ------------------------------------------------------------------
$milestones = [
    ['year' => '1998', 'text' => 'Founded in Ulhasnagar, Maharashtra, as a small trading counter for shirting fabrics.'],
    ['year' => '2005', 'text' => 'Expanded into fancy and printed fabrics, catering to local boutiques and retailers.'],
    ['year' => '2012', 'text' => 'Added garment fabrics and fabric flags, entering the export market.'],
    ['year' => '2018', 'text' => 'Introduced Jaipuri and embroidery fabrics, becoming a one-stop fabric destination.'],
    ['year' => '2026', 'text' => 'Catalogue now spans 19 categories, with an annual turnover of ₹1.5 – 5 Cr.'],
];

// ------------------------------------------------------------------
// Profile Info
// ------------------------------------------------------------------
$profileInfo = [
    ['icon' => 'fa-building', 'label' => 'Nature of Business', 'value' => 'Trader – Wholesaler/Distributor'],
    ['icon' => 'fa-scale-balanced', 'label' => 'Legal Status', 'value' => 'Proprietorship'],
    ['icon' => 'fa-indian-rupee-sign', 'label' => 'Annual Turnover', 'value' => '₹1.5 – 5 Cr'],
    ['icon' => 'fa-id-card', 'label' => 'GST No.', 'value' => '27ABIPK4734A1ZY'],
    ['icon' => 'fa-passport', 'label' => 'IEC', 'value' => '0305043269'],
    ['icon' => 'fa-users', 'label' => 'Employees', 'value' => 'Upto 10 People'],
];
?>

<!-- ============================================================ -->
<!-- HERO – Full Image Only -->
<!-- ============================================================ -->
<section class="w-full overflow-hidden">
    <img src="<?= BASE_URL ?>assets/images/about/about-hero.png"
         alt="Mahavir Enterprises"
         class="w-full h-auto block">
</section>

<!-- ============================================================ -->
<!-- COMPANY PROFILE -->
<!-- ============================================================ -->
<section id="profile" class="max-w-[1280px] mx-auto px-6 lg:px-10 py-16 lg:py-20">
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-10 items-center">

        <!-- Left -->
        <div class="lg:col-span-3" data-aos="fade-right">
            <p class="text-[#C1272D] font-medium text-[13px] mb-2">Who We Are</p>
            <h2 class="font-serif text-[28px] sm:text-[34px] text-[#1A1714] font-medium mb-4">
                Built on Quality, Driven by Trust
            </h2>
            <p class="text-[#5A5652] text-[15px] leading-[1.8] mb-4">
                <strong>Mahavir Enterprises</strong>, established in <strong>1998 at Ulhasnagar, Maharashtra</strong>,
                is a reputed <strong>manufacturer, wholesaler, and exporter</strong> of premium quality
                <strong>Fancy Fabrics, Printed Fabrics, Garment Fabrics, Fabric Flags, Jaipuri Fabrics, and
                Embroidery Fabrics</strong>.
            </p>
            <p class="text-[#5A5652] text-[15px] leading-[1.8] mb-6">
                Guided by our mentor <strong>Mr. Haresh B. Keswani (Proprietor)</strong>, we have grown consistently
                with a strong presence in India and overseas markets including
                <strong>Malaysia, Indonesia, Singapore, and African countries</strong>.
            </p>

            <!-- Profile Card -->
            <div class="bg-white rounded-[28px] shadow-[0_20px_50px_rgba(36,30,26,0.08)] p-6 sm:p-8 border border-[#4FB6DE]/20">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-x-8">
                    <?php foreach ($profileInfo as $info): ?>
                        <div class="flex items-baseline gap-2 text-[14px] sm:text-[15px] text-[#3D3A36] border-b border-dashed border-[#E8E4DF] pb-2 flex-wrap">
                            <i class="fa-solid <?= $info['icon'] ?> text-[#C1272D] w-5 text-[13px]"></i>
                            <span class="font-medium text-[#1A1714] min-w-[110px]"><?= $info['label'] ?></span>
                            <span class="text-[#4A4642]"><?= $info['value'] ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Right Images -->
        <div class="lg:col-span-2 relative h-[300px] lg:h-[420px]" data-aos="fade-left">
            <div class="absolute top-0 left-0 w-[85%] h-[85%] rounded-[26px] overflow-hidden shadow-[0_25px_60px_rgba(36,30,26,0.16)] border-4 border-white">
                <img src="<?= BASE_URL ?>assets/images/about/aboutus1.png"
                     alt="Mahavir Enterprises"
                     class="w-full h-full object-fit">
            </div>
            <div class="absolute bottom-0 right-0 w-[55%] h-[45%] rounded-[20px] overflow-hidden shadow-[0_18px_44px_rgba(36,30,26,0.16)] border-4 border-[#f5f0eb]">
                <img src="<?= BASE_URL ?>assets/images/about/aboutus2.png"
                     alt="Fabric rolls"
                     class="w-full h-full object-fit">
            </div>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- MISSION & VISION -->
<!-- ============================================================ -->
<section class="bg-[#f5f0eb] border-y border-[#4FB6DE]/20 py-16 lg:py-20">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">

            <div class="bg-white rounded-2xl p-8 shadow-[0_1px_2px_rgba(36,30,26,0.04),0_10px_24px_rgba(36,30,26,0.05)] text-center"
                 data-aos="fade-up">
                <div class="w-14 h-14 mx-auto rounded-full bg-[#C1272D]/10 flex items-center justify-center mb-4">
                    <i class="fa-solid fa-bullseye text-[#C1272D] text-[24px]"></i>
                </div>
                <h3 class="font-serif text-[22px] text-[#1A1714] mb-3">Our Mission</h3>
                <p class="text-[#5A5652] text-[15px] leading-[1.7]">
                    To provide <strong>high-quality, diverse fabrics</strong> to businesses worldwide,
                    ensuring <strong>timely delivery, transparent pricing, and unwavering reliability</strong>
                    in every yard we supply.
                </p>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-[0_1px_2px_rgba(36,30,26,0.04),0_10px_24px_rgba(36,30,26,0.05)] text-center"
                 data-aos="fade-up" data-aos-delay="100">
                <div class="w-14 h-14 mx-auto rounded-full bg-[#4FB6DE]/15 flex items-center justify-center mb-4">
                    <i class="fa-solid fa-eye text-[#2E93BD] text-[24px]"></i>
                </div>
                <h3 class="font-serif text-[22px] text-[#1A1714] mb-3">Our Vision</h3>
                <p class="text-[#5A5652] text-[15px] leading-[1.7]">
                    To become the <strong>most trusted fabric sourcing partner</strong> for trade customers
                    across India and emerging markets — by constantly expanding our catalogue
                    and deepening our quality checks.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- WHY CHOOSE US -->
<!-- ============================================================ -->
<section class="bg-[#f5f0eb] border-y border-[#4FB6DE]/20 py-16 lg:py-20">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-10">
        <div class="text-center mb-12" data-aos="fade-up">
            <p class="text-[#C1272D] font-medium text-[13px] mb-2">Why Choose Us</p>
            <h2 class="font-serif text-[26px] sm:text-[34px] text-[#1A1714] font-medium">The Mahavir Advantage</h2>
            <p class="text-[#5A5652] text-[15px] max-w-[560px] mx-auto mt-3">
                Decades of trust, a global footprint, and an unwavering commitment to quality – that's what sets us apart.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($whyUs as $i => $item): ?>
                <div class="group bg-white rounded-[22px] shadow-[0_1px_2px_rgba(36,30,26,0.04),0_10px_24px_rgba(36,30,26,0.05)] p-7 text-center border border-transparent transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_25px_50px_rgba(36,30,26,0.12)] hover:border-[#C1272D]/20"
                     data-aos="fade-up" data-aos-delay="<?= $i * 80 ?>">
                    <div class="w-[60px] h-[60px] rounded-full flex items-center justify-center mx-auto mb-5 text-[26px] text-white transition-transform duration-300 group-hover:scale-110 <?= $item['tint'] === 'r' ? 'bg-gradient-to-br from-[#C1272D] to-[#8F1D22]' : 'bg-gradient-to-br from-[#4FB6DE] to-[#2E93BD]' ?>">
                        <i class="fa-solid <?= $item['icon'] ?>"></i>
                    </div>
                    <h3 class="font-serif text-[17px] font-semibold text-[#1A1714] mb-2"><?= $item['title'] ?></h3>
                    <p class="text-[14px] text-[#5A5652] leading-[1.6]"><?= $item['desc'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- OUR VALUES -->
<!-- ============================================================ -->
<section class="max-w-[1280px] mx-auto px-6 lg:px-10 py-16 lg:py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <p class="text-[#2E93BD] font-medium text-[13px] mb-2">What we stand for</p>
        <h2 class="font-serif text-[26px] sm:text-[30px] text-[#1A1714] font-medium">The Way We Work</h2>
        <p class="text-[#5A5652] text-[15px] max-w-[500px] mx-auto mt-2">Our daily practices that build lasting trust</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php foreach ($values as $i => $v): ?>
            <div class="bg-white rounded-[22px] shadow-[0_1px_2px_rgba(36,30,26,0.04),0_10px_24px_rgba(36,30,26,0.05)] p-7 transition-all duration-300 hover:-translate-y-1.5 hover:shadow-[0_20px_40px_rgba(36,30,26,0.12)]"
                 data-aos="fade-up" data-aos-delay="<?= $i * 80 ?>">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-5 shadow-[0_8px_16px_rgba(36,30,26,0.15)] <?= $v['tint'] === 'r' ? 'bg-gradient-to-br from-[#C1272D] to-[#8F1D22]' : 'bg-gradient-to-br from-[#4FB6DE] to-[#2E93BD]' ?>">
                    <i class="fa-solid <?= $v['icon'] ?> text-white text-[17px]"></i>
                </div>
                <h3 class="font-serif text-[16px] text-[#1A1714] mb-2"><?= $v['title'] ?></h3>
                <p class="text-[13.5px] text-[#5A5652] leading-[1.7]"><?= $v['desc'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- ============================================================ -->
<!-- TIMELINE -->
<!-- ============================================================ -->
<section class="bg-[#f5f0eb] border-y border-[#4FB6DE]/20 py-16 lg:py-20">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-10">
        <div class="text-center mb-14" data-aos="fade-up">
            <p class="text-[#2E93BD] font-medium text-[13px] mb-2">How we got here</p>
            <h2 class="font-serif text-[26px] sm:text-[30px] text-[#1A1714] font-medium">Our Journey</h2>
        </div>

        <div class="relative max-w-[680px] mx-auto">
            <!-- Vertical line -->
            <div class="absolute left-[7px] sm:left-1/2 top-0 bottom-0 w-[2px] sm:-translate-x-1/2 rounded-full opacity-70 bg-gradient-to-b from-[#C1272D] to-[#4FB6DE]"></div>

            <div class="space-y-10">
                <?php foreach ($milestones as $i => $m): ?>
                    <div class="relative pl-8 sm:pl-0 sm:grid sm:grid-cols-2 sm:gap-10"
                         data-aos="fade-up" data-aos-delay="<?= $i * 80 ?>">
                        <!-- Dot -->
                        <span class="absolute left-0 sm:left-1/2 top-1 w-4 h-4 rounded-full <?= $i % 2 === 0 ? 'bg-[#C1272D]' : 'bg-[#4FB6DE]' ?> sm:-translate-x-1/2 border-4 border-[#f5f0eb]"></span>

                        <?php if ($i % 2 === 0): ?>
                            <div class="sm:text-right sm:pr-4">
                                <p class="font-serif text-[20px] text-[#C1272D] mb-1"><?= $m['year'] ?></p>
                                <p class="text-[#5A5652] text-[14px] leading-[1.7]"><?= $m['text'] ?></p>
                            </div>
                            <div></div>
                        <?php else: ?>
                            <div class="hidden sm:block"></div>
                            <div class="sm:pl-4">
                                <p class="font-serif text-[20px] text-[#2E93BD] mb-1"><?= $m['year'] ?></p>
                                <p class="text-[#5A5652] text-[14px] leading-[1.7]"><?= $m['text'] ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- CONTACT CTA -->
<!-- ============================================================ -->
<section class="bg-[#f5f0eb] border-y border-[#4FB6DE]/20 py-16 lg:py-20">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-10 text-center" data-aos="fade-up">
        <h2 class="font-serif text-[26px] sm:text-[30px] text-[#1A1714] font-medium mb-4">
            Want to know more about our fabrics?
        </h2>
        <p class="text-[#5A5652] text-[15px] max-w-[440px] mx-auto mb-8">
            Reach out and we'll walk you through anything in the catalogue.
        </p>
        <a href="<?= BASE_URL ?>contact.php"
           class="inline-flex items-center gap-2 bg-[#C1272D] text-white px-8 py-3.5 rounded-full font-medium text-[14px] transition-all duration-300 hover:bg-[#a62a2f] hover:-translate-y-0.5">
            Contact Us
            <i class="fa-solid fa-arrow-right text-[12px]"></i>
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>