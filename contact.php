<?php
// ============================================
// CONTACT PAGE
// ============================================
$page_title = "Contact";
include 'includes/header.php';

$contact_info = [
    ['icon' => 'fa-location-dot', 'title' => 'Visit Us', 'lines' => ['123 Fashion Street, Bandra West', 'Mumbai, MH 400050'], 'tint' => 'r'],
    ['icon' => 'fa-phone', 'title' => 'Call Us', 'lines' => ['+91 99999 99999', '+91 88888 88888'], 'tint' => 's'],
    ['icon' => 'fa-envelope', 'title' => 'Email Us', 'lines' => ['hello@yourbrand.com', 'sales@yourbrand.com'], 'tint' => 'r'],
    ['icon' => 'fa-clock', 'title' => 'Working Hours', 'lines' => ['Mon – Sat: 10:00 AM – 7:30 PM', 'Sunday: Closed'], 'tint' => 's'],
];

$faqs = [
    ['q' => 'Can I place an order directly on the website?', 'a' => 'Not yet — this site is for browsing our fabric categories. To order, send us an enquiry and our team will guide you through pricing and quantities.'],
    ['q' => 'Do you provide fabric samples?', 'a' => 'Yes, for most categories. Mention the fabric name and category in your enquiry and we\'ll let you know availability.'],
    ['q' => 'Do you supply in bulk for institutions?', 'a' => 'Yes — we regularly supply hospital fabric, uniform shirting and similar categories to institutions in bulk.'],
    ['q' => 'Which cities do you deliver to?', 'a' => 'We service trade partners across most major cities. Share your location in the enquiry form and we\'ll confirm.'],
];
?>

<style>
    .info-card {
        border-radius: 22px;
        background: #FFFFFF;
        box-shadow: 0 1px 2px rgba(36,30,26,0.04), 0 10px 24px rgba(36,30,26,0.05);
        transition: transform .35s ease, box-shadow .35s ease;
    }
    .info-card:hover { transform: translateY(-4px); box-shadow: 0 16px 32px rgba(36,30,26,0.10); }
    .info-icon-r { background: linear-gradient(135deg, #C1272D, #8F1D22); }
    .info-icon-s { background: linear-gradient(135deg, #4FB6DE, #2E93BD); }

    .field label { display: block; font-size: 13px; font-weight: 500; color: #241E1B; margin-bottom: 8px; }
    .field input, .field select, .field textarea {
        width: 100%;
        border: 1.5px solid rgba(36,30,26,0.10);
        border-radius: 14px;
        padding: 12px 16px;
        font-size: 14px;
        color: #241E1B;
        background: #FAF6EE;
        outline: none;
        transition: border-color .3s ease, box-shadow .3s ease, background .3s ease;
    }
    .field input:focus, .field select:focus, .field textarea:focus {
        border-color: #4FB6DE;
        background: #FFFFFF;
        box-shadow: 0 0 0 4px rgba(79,182,222,0.12);
    }
    .field textarea { resize: vertical; min-height: 120px; }

    .faq-item { border-bottom: 1px solid rgba(36,30,26,0.08); }
    .faq-item:last-child { border-bottom: none; }
    .faq-toggle { transition: transform .3s ease; }
    .faq-item.open .faq-toggle { transform: rotate(45deg); }
    .faq-panel { max-height: 0; overflow: hidden; transition: max-height .35s ease; }
    .faq-item.open .faq-panel { max-height: 200px; }
</style>

<!-- PAGE INTRO -->
<section class="bg-brand-cream border-b border-brand-sky/20">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-10 py-16 lg:py-20 text-center" data-aos="fade-up">
        <p class="text-brand-red font-medium text-[14px] mb-4">Contact Us</p>
        <h1 class="font-serif text-[36px] sm:text-[46px] leading-[1.15] text-brand-ink font-medium max-w-[640px] mx-auto mb-5">
            Found a fabric you like? Let's talk.
        </h1>
        <p class="text-brand-ink-soft text-[16px] leading-[1.7] max-w-[520px] mx-auto">
            Send us an enquiry with what you're looking for and our team will get back to you with details, pricing and samples.
        </p>
    </div>
</section>

<!-- CONTACT INFO CARDS -->
<section class="max-w-[1280px] mx-auto px-6 lg:px-10 py-14">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php foreach ($contact_info as $i => $c): ?>
            <div class="info-card p-6" data-aos="fade-up" data-aos-delay="<?= $i * 80 ?>">
                <div class="w-12 h-12 rounded-xl info-icon-<?= $c['tint'] ?> flex items-center justify-center mb-5 shadow-[0_8px_16px_rgba(36,30,26,0.15)]">
                    <i class="fa-solid <?= $c['icon'] ?> text-white text-[17px]"></i>
                </div>
                <h3 class="font-serif text-[16px] text-brand-ink mb-2"><?= $c['title'] ?></h3>
                <?php foreach ($c['lines'] as $line): ?>
                    <p class="text-brand-ink-soft text-[13.5px] leading-[1.7]"><?= $line ?></p>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- FORM + MAP -->
<section class="max-w-[1280px] mx-auto px-6 lg:px-10 py-10 lg:py-16 grid grid-cols-1 lg:grid-cols-5 gap-10">

    <!-- FORM -->
    <div class="lg:col-span-3" data-aos="fade-right">
        <div class="info-card p-7 sm:p-10">
            <p class="text-brand-sky-dark font-medium text-[13px] mb-2">Send an enquiry</p>
            <h2 class="font-serif text-[24px] sm:text-[28px] text-brand-ink font-medium mb-7">Tell us what you're looking for</h2>

            <form action="<?= BASE_URL ?>send-enquiry.php" method="POST" class="space-y-5">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="field">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" placeholder="Your name" required>
                    </div>
                    <div class="field">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" placeholder="+91 00000 00000" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="field">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="you@example.com" required>
                    </div>
                    <div class="field">
                        <label for="category">Fabric Category</label>
                        <select id="category" name="category">
                            <option value="">Select a category</option>
                            <option>Trouser / Pocketing Fabrics</option>
                            <option>Embroidery Fabrics</option>
                            <option>Hospital Fabric</option>
                            <option>Pooja Cloth</option>
                            <option>Woven Interlining / Astar Fabrics</option>
                            <option>Mens Kurta Pajama</option>
                            <option>Cotton Fabrics</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div>

                <div class="field">
                    <label for="message">Your Message</label>
                    <textarea id="message" name="message" placeholder="Tell us the fabric, quantity, and any other details..." required></textarea>
                </div>

                <button type="submit" class="inline-flex items-center gap-2 bg-brand-red text-white px-8 py-3.5 rounded-full font-medium text-[14px] transition-all duration-300 hover:bg-brand-red-dark hover:-translate-y-0.5">
                    Send Enquiry
                    <i class="fa-solid fa-paper-plane text-[13px]"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- MAP + SOCIAL -->
    <div class="lg:col-span-2 flex flex-col gap-6" data-aos="fade-left">
        <div class="info-card overflow-hidden h-[240px] lg:h-[280px]">
            <iframe
                src="https://www.google.com/maps?q=Bandra%20West%2C%20Mumbai&output=embed"
                class="w-full h-full border-0"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                title="Store location map">
            </iframe>
        </div>

        <div class="info-card p-7">
            <h3 class="font-serif text-[17px] text-brand-ink mb-4">Follow Along</h3>
            <p class="text-brand-ink-soft text-[13.5px] leading-[1.7] mb-5">New fabrics and category updates are posted here first.</p>
            <div class="flex items-center gap-3">
                <a href="#" aria-label="Instagram" class="w-10 h-10 rounded-full border border-brand-ink/10 flex items-center justify-center text-brand-ink transition-all duration-300 hover:bg-brand-red hover:border-brand-red hover:text-white">
                    <i class="fa-brands fa-instagram text-[15px]"></i>
                </a>
                <a href="#" aria-label="WhatsApp" class="w-10 h-10 rounded-full border border-brand-ink/10 flex items-center justify-center text-brand-ink transition-all duration-300 hover:bg-brand-sky hover:border-brand-sky hover:text-white">
                    <i class="fa-brands fa-whatsapp text-[15px]"></i>
                </a>
                <a href="#" aria-label="Facebook" class="w-10 h-10 rounded-full border border-brand-ink/10 flex items-center justify-center text-brand-ink transition-all duration-300 hover:bg-brand-red hover:border-brand-red hover:text-white">
                    <i class="fa-brands fa-facebook-f text-[15px]"></i>
                </a>
            </div>
        </div>
    </div>

</section>

<!-- FAQ -->
<section class="bg-brand-cream-deep border-y border-brand-sky/20">
    <div class="max-w-[820px] mx-auto px-6 lg:px-10 py-16 lg:py-20">
        <div class="text-center mb-12" data-aos="fade-up">
            <p class="text-brand-red font-medium text-[13px] mb-2">Before you write in</p>
            <h2 class="font-serif text-[26px] sm:text-[30px] text-brand-ink font-medium">Frequently Asked Questions</h2>
        </div>

        <div class="info-card divide-y divide-brand-ink/5 overflow-hidden" data-aos="fade-up" data-aos-delay="100">
            <?php foreach ($faqs as $i => $f): ?>
                <div class="faq-item px-6 sm:px-8" data-index="<?= $i ?>">
                    <button type="button" class="faq-btn w-full flex items-center justify-between gap-4 py-5 text-left">
                        <span class="font-serif text-[15.5px] text-brand-ink"><?= $f['q'] ?></span>
                        <i class="faq-toggle fa-solid fa-plus text-brand-red text-[13px] shrink-0"></i>
                    </button>
                    <div class="faq-panel">
                        <p class="text-brand-ink-soft text-[14px] leading-[1.75] pb-5"><?= $f['a'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
    document.querySelectorAll('.faq-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const item = btn.closest('.faq-item');
            const wasOpen = item.classList.contains('open');
            document.querySelectorAll('.faq-item.open').forEach(el => el.classList.remove('open'));
            if (!wasOpen) item.classList.add('open');
        });
    });
</script>

<?php include 'includes/footer.php'; ?>