<?php
// ============================================
// ABOUT PAGE - Redesigned with new Why Choose Us points & icon fixes
// ============================================
$page_title = "About Us";
include 'includes/header.php';

// ------------------------------------------------------------------
// Core values (kept from original)
// ------------------------------------------------------------------
$values = [
    ['icon' => 'fa-swatchbook', 'title' => 'Range', 'desc' => '19 fabric categories, from everyday shirting to specialised hospital and Schiffli fabrics.', 'tint' => 'r'],
    ['icon' => 'fa-magnifying-glass-chart', 'title' => 'Quality Checks', 'desc' => 'Every batch is checked for weave, weight and finish before it enters the catalogue.', 'tint' => 's'],
    ['icon' => 'fa-people-group', 'title' => 'Trade Relationships', 'desc' => 'Long-standing ties with mills and weavers, built over years of consistent sourcing.', 'tint' => 'r'],
    ['icon' => 'fa-clock', 'title' => 'Fast Response', 'desc' => 'Enquiries are answered quickly — we know timing matters in the fabric trade.', 'tint' => 's'],
];

// ------------------------------------------------------------------
// WHY CHOOSE US – UPDATED with your 5 specific points
// ------------------------------------------------------------------
$whyUs = [
    ['icon' => 'fa-user-tie', 'title' => 'Experienced Professionals', 'desc' => 'Our team brings deep industry knowledge to source and check every fabric.', 'tint' => 'r'],
    ['icon' => 'fa-handshake', 'title' => 'Client-Centric Approach', 'desc' => 'We listen to your needs and offer tailored fabric solutions for every requirement.', 'tint' => 's'],
    ['icon' => 'fa-warehouse', 'title' => 'Well-Established Infrastructure', 'desc' => 'Based in Ulhasnagar with robust systems for inventory, dispatch, and quality control.', 'tint' => 'r'],
    ['icon' => 'fa-scale-balanced', 'title' => 'Ethical Business Practices', 'desc' => 'Transparent dealings and honest pricing build long-term trust with our partners.', 'tint' => 's'],
    ['icon' => 'fa-globe', 'title' => 'Wide Distribution Network', 'desc' => 'Supplying to India and overseas markets including Malaysia, Indonesia, Singapore & Africa.', 'tint' => 'r'],
];

// ------------------------------------------------------------------
// Milestones (company history)
// ------------------------------------------------------------------
$milestones = [
    ['year' => '1998', 'text' => 'Founded in Ulhasnagar, Maharashtra, as a small trading counter for shirting fabrics.'],
    ['year' => '2005', 'text' => 'Expanded into fancy and printed fabrics, catering to local boutiques and retailers.'],
    ['year' => '2012', 'text' => 'Added garment fabrics and fabric flags, entering the export market.'],
    ['year' => '2018', 'text' => 'Introduced Jaipuri and embroidery fabrics, becoming a one-stop fabric destination.'],
    ['year' => '2026', 'text' => 'Catalogue now spans 19 categories, with an annual turnover of ₹1.5 – 5 Cr.'],
];

// ------------------------------------------------------------------
// Team (kept as is)
// ------------------------------------------------------------------
$team = [
    ['name' => 'Suresh Patel', 'role' => 'Founder & Sourcing Head'],
    ['name' => 'Meera Nair', 'role' => 'Quality & Inspection Lead'],
    ['name' => 'Farhan Ali', 'role' => 'Trade Relations'],
];
?>

<style>
    /* --- Styles for cards and layout --- */
    .val-card {
        border-radius: 22px;
        background: #FFFFFF;
        box-shadow: 0 1px 2px rgba(36,30,26,0.04), 0 10px 24px rgba(36,30,26,0.05);
        transition: transform .35s ease, box-shadow .35s ease;
    }
    .val-card:hover { transform: translateY(-6px); box-shadow: 0 20px 40px rgba(36,30,26,0.12); }
    .val-icon-r { background: linear-gradient(135deg, #C1272D, #8F1D22); }
    .val-icon-s { background: linear-gradient(135deg, #4FB6DE, #2E93BD); }

    .timeline-line { background: linear-gradient(180deg, #C1272D, #4FB6DE); }

    /* Company profile card */
    .profile-card {
        background: #fff;
        border-radius: 28px;
        box-shadow: 0 20px 50px rgba(36,30,26,0.08);
        padding: 2rem 2.5rem;
        border: 1px solid rgba(79, 182, 222, 0.2);
    }
    .profile-card .info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem 2rem;
    }
    .profile-card .info-item {
        display: flex;
        align-items: baseline;
        gap: 0.5rem;
        font-size: 0.95rem;
        color: #3D3A36;
        border-bottom: 1px dashed #E8E4DF;
        padding-bottom: 0.5rem;
    }
    .profile-card .info-item .label {
        font-weight: 500;
        color: #1A1714;
        min-width: 120px;
    }
    .profile-card .info-item .value {
        color: #4A4642;
    }
    .profile-card .info-item i {
        color: #C1272D;
        width: 20px;
        font-size: 0.9rem;
    }
    @media (max-width: 640px) {
        .profile-card .info-grid { grid-template-columns: 1fr; }
        .profile-card .info-item { flex-wrap: wrap; }
    }

    /* Why Choose Us cards */
    .why-card {
        border-radius: 22px;
        background: #FFFFFF;
        box-shadow: 0 1px 2px rgba(36,30,26,0.04), 0 10px 24px rgba(36,30,26,0.05);
        transition: transform .35s ease, box-shadow .35s ease;
        padding: 1.8rem 1.5rem;
        text-align: center;
        border: 1px solid transparent;
    }
    .why-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 50px rgba(36,30,26,0.12);
        border-color: rgba(193, 39, 45, 0.2);
    }
    .why-card .why-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.2rem;
        font-size: 1.6rem;
        color: #fff;
    }
    .why-card .why-icon.r { background: linear-gradient(135deg, #C1272D, #8F1D22); }
    .why-card .why-icon.s { background: linear-gradient(135deg, #4FB6DE, #2E93BD); }
    .why-card h3 {
        font-family: 'Georgia', serif;
        font-size: 1.1rem;
        font-weight: 600;
        color: #1A1714;
        margin-bottom: 0.6rem;
    }
    .why-card p {
        font-size: 0.9rem;
        color: #5A5652;
        line-height: 1.6;
        margin: 0;
    }

    .section-pad { padding: 4rem 0; }
    @media (min-width: 1024px) { .section-pad { padding: 5rem 0; } }
</style>

<!-- ============================================================ -->
<!-- PAGE INTRO -->
<!-- ============================================================ -->
<section class="bg-brand-cream border-b border-brand-sky/20 section-pad">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-10 text-center" data-aos="fade-up">
        <p class="text-brand-red font-medium text-[14px] mb-4">About Us</p>
        <h1 class="font-serif text-[36px] sm:text-[46px] leading-[1.15] text-brand-ink font-medium max-w-[720px] mx-auto mb-5">
            Mahavir Enterprises – Your Trusted Fabric Partner Since 1998
        </h1>
        <p class="text-brand-ink-soft text-[16px] leading-[1.7] max-w-[600px] mx-auto">
            From a single shirting counter to a global exporter – we bring you premium fabrics with a personal touch.
        </p>
    </div>
</section>

<!-- ============================================================ -->
<!-- COMPANY PROFILE (exact details from screenshot) - ICONS FIXED to fa-solid -->
<!-- ============================================================ -->
<section class="max-w-[1280px] mx-auto px-6 lg:px-10 section-pad">
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-10 items-center">
        <div class="lg:col-span-3" data-aos="fade-right">
            <h2 class="font-serif text-[28px] sm:text-[32px] text-brand-ink font-medium mb-4">
                Who We Are
            </h2>
            <p class="text-brand-ink-soft text-[15px] leading-[1.8] mb-6">
                <strong>Mahavir Enterprises</strong>, established in <strong>1998 at Ulhasnagar, Maharashtra</strong>, is a reputed 
                <strong>manufacturer, wholesaler, and exporter</strong> of premium quality 
                <strong>Fancy Fabrics, Printed Fabrics, Garment Fabrics, Fabric Flags, Jaipuri Fabrics, and Embroidery Fabrics</strong>.
            </p>
            <p class="text-brand-ink-soft text-[15px] leading-[1.8] mb-6">
                Guided by our mentor <strong>Mr. Haresh B. Keswani (Proprietor)</strong>, we have grown consistently with a strong presence 
                in India and overseas markets including <strong>Malaysia, Indonesia, Singapore, and African countries</strong>.
            </p>
            <div class="profile-card">
                <div class="info-grid">

                    <div class="info-item"><i class="fa-solid fa-building"></i><span class="label">Nature of Business</span><span class="value">Trader – Wholesaler/Distributor</span></div>
                    <div class="info-item"><i class="fa-solid fa-scale-balanced"></i><span class="label">Legal Status</span><span class="value">Proprietorship</span></div>
                    <div class="info-item"><i class="fa-solid fa-indian-rupee-sign"></i><span class="label">Annual Turnover</span><span class="value">₹1.5 – 5 Cr</span></div>
                    <div class="info-item"><i class="fa-solid fa-id-card"></i><span class="label">GST No.</span><span class="value">27ABIPK4734A1ZY</span></div>
                    <div class="info-item"><i class="fa-solid fa-passport"></i><span class="label">IEC</span><span class="value">0305043269</span></div>
                    <div class="info-item"><i class="fa-solid fa-users"></i><span class="label">Employees</span><span class="value">Upto 10 People</span></div>
                </div>
            </div>
        </div>
        <div class="lg:col-span-2 relative h-[300px] lg:h-[420px]" data-aos="fade-left">
            <div class="absolute top-0 left-0 w-[85%] h-[85%] rounded-[26px] overflow-hidden shadow-[0_25px_60px_rgba(36,30,26,0.16)] border-4 border-white">
                <img src="https://picsum.photos/seed/mahavir/800/700" alt="Mahavir Enterprises" class="w-full h-full object-cover">
            </div>
            <div class="absolute bottom-0 right-0 w-[55%] h-[45%] rounded-[20px] overflow-hidden shadow-[0_18px_44px_rgba(36,30,26,0.16)] border-4 border-brand-cream">
                <img src="https://picsum.photos/seed/fabricrolls/500/420" alt="Fabric rolls" class="w-full h-full object-cover">
            </div>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- WHY CHOOSE US – UPDATED WITH YOUR 5 POINTS -->
<!-- ============================================================ -->
<section class="bg-brand-cream-deep border-y border-brand-sky/20 section-pad">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-10">
        <div class="text-center mb-12" data-aos="fade-up">
            <p class="text-brand-red font-medium text-[13px] mb-2">Why Choose Us</p>
            <h2 class="font-serif text-[26px] sm:text-[34px] text-brand-ink font-medium">The Mahavir Advantage</h2>
            <p class="text-brand-ink-soft text-[15px] max-w-[560px] mx-auto mt-3">
                Decades of trust, a global footprint, and an unwavering commitment to quality – that's what sets us apart.
            </p>
        </div>
        <!-- Grid: 5 items ke liye 3 columns (2 rows me adjust ho jayega) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($whyUs as $i => $item): ?>
                <div class="why-card" data-aos="fade-up" data-aos-delay="<?= $i * 80 ?>">
                    <div class="why-icon <?= $item['tint'] ?>">
                        <i class="fa-solid <?= $item['icon'] ?>"></i>
                    </div>
                    <h3><?= $item['title'] ?></h3>
                    <p><?= $item['desc'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- OUR VALUES (kept from original) -->
<!-- ============================================================ -->
<section class="max-w-[1280px] mx-auto px-6 lg:px-10 section-pad">
    <div class="text-center mb-12" data-aos="fade-up">
        <p class="text-brand-sky-dark font-medium text-[13px] mb-2">What we stand for</p>
        <h2 class="font-serif text-[26px] sm:text-[30px] text-brand-ink font-medium">The Way We Work</h2>
        <p class="text-brand-ink-soft text-[15px] max-w-[500px] mx-auto mt-2">Our daily practices that build lasting trust</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php foreach ($values as $i => $v): ?>
            <div class="val-card p-6" data-aos="fade-up" data-aos-delay="<?= $i * 80 ?>">
                <div class="w-12 h-12 rounded-xl val-icon-<?= $v['tint'] ?> flex items-center justify-center mb-5 shadow-[0_8px_16px_rgba(36,30,26,0.15)]">
                    <i class="fa-solid <?= $v['icon'] ?> text-white text-[17px]"></i>
                </div>
                <h3 class="font-serif text-[16px] text-brand-ink mb-2"><?= $v['title'] ?></h3>
                <p class="text-brand-ink-soft text-[13.5px] leading-[1.7]"><?= $v['desc'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- ============================================================ -->
<!-- TIMELINE -->
<!-- ============================================================ -->
<section class="bg-brand-cream-deep border-y border-brand-sky/20 section-pad">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-10">
        <div class="text-center mb-14" data-aos="fade-up">
            <p class="text-brand-sky-dark font-medium text-[13px] mb-2">How we got here</p>
            <h2 class="font-serif text-[26px] sm:text-[30px] text-brand-ink font-medium">Our Journey</h2>
        </div>

        <div class="relative max-w-[680px] mx-auto">
            <div class="timeline-line absolute left-[7px] sm:left-1/2 top-0 bottom-0 w-[2px] sm:-translate-x-1/2 rounded-full opacity-70"></div>
            <div class="space-y-10">
                <?php foreach ($milestones as $i => $m): ?>
                    <div class="relative pl-8 sm:pl-0 sm:grid sm:grid-cols-2 sm:gap-10" data-aos="fade-up" data-aos-delay="<?= $i * 80 ?>">
                        <span class="absolute left-0 sm:left-1/2 top-1 w-4 h-4 rounded-full <?= $i % 2 === 0 ? 'bg-brand-red' : 'bg-brand-sky' ?> sm:-translate-x-1/2 border-4 border-brand-cream"></span>
                        <?php if ($i % 2 === 0): ?>
                            <div class="sm:text-right sm:pr-4">
                                <p class="font-serif text-[20px] <?= $i % 2 === 0 ? 'text-brand-red' : 'text-brand-sky-dark' ?> mb-1"><?= $m['year'] ?></p>
                                <p class="text-brand-ink-soft text-[14px] leading-[1.7]"><?= $m['text'] ?></p>
                            </div>
                            <div></div>
                        <?php else: ?>
                            <div class="hidden sm:block"></div>
                            <div class="sm:pl-4">
                                <p class="font-serif text-[20px] text-brand-sky-dark mb-1"><?= $m['year'] ?></p>
                                <p class="text-brand-ink-soft text-[14px] leading-[1.7]"><?= $m['text'] ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- TEAM (unchanged) -->
<!-- ============================================================ -->
<section class="bg-brand-ink section-pad">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-10">
        <div class="text-center mb-12" data-aos="fade-up">
            <p class="text-brand-sky font-medium text-[13px] mb-2">Behind the catalogue</p>
            <h2 class="font-serif text-[26px] sm:text-[30px] text-brand-cream font-medium">The People Who Check Every Fabric</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-[820px] mx-auto">
            <?php foreach ($team as $i => $p): ?>
                <div class="text-center" data-aos="fade-up" data-aos-delay="<?= $i * 100 ?>">
                    <img src="https://picsum.photos/seed/<?= urlencode($p['name']) ?>/200/200" class="w-24 h-24 rounded-full object-cover mx-auto border-4 border-white/10" alt="<?= htmlspecialchars($p['name']) ?>">
                    <p class="text-brand-cream font-serif text-[16px] mt-4"><?= $p['name'] ?></p>
                    <p class="text-brand-cream/55 text-[13px] mt-1"><?= $p['role'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- CONTACT CTA -->
<!-- ============================================================ -->
<section class="max-w-[1280px] mx-auto px-6 lg:px-10 section-pad text-center" data-aos="fade-up">
    <h2 class="font-serif text-[26px] sm:text-[30px] text-brand-ink font-medium mb-4">Want to know more about our fabrics?</h2>
    <p class="text-brand-ink-soft text-[15px] max-w-[440px] mx-auto mb-8">Reach out and we'll walk you through anything in the catalogue.</p>
    <a href="<?= BASE_URL ?>contact.php" class="inline-flex items-center gap-2 bg-brand-red text-white px-8 py-3.5 rounded-full font-medium text-[14px] transition-all duration-300 hover:bg-brand-red-dark hover:-translate-y-0.5">
        Contact Us
        <i class="fa-solid fa-arrow-right text-[12px]"></i>
    </a>
</section>

<?php include 'includes/footer.php'; ?>