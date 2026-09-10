<?php
// ============================================
// CONTACT PAGE – Premium Redesign
// ============================================
$page_title = "Contact";
include 'includes/header.php';

$contact_info = [
    [
        'icon' => 'fa-location-dot', 
        'title' => 'Visit Us', 
        'lines' => ['Shop No. 7, BK No. 462, Manas Complex, Near Navjeevan Bank Siru Chowk Branch, Ulhasnagar, Thane-421002, Maharashtra, India'], 
        'tint' => 'r',
        'bg' => 'bg-[#C1272D]/10'
    ],
    [
        'icon' => 'fa-phone', 
        'title' => 'Call Us', 
        'lines' => ['+91 98220 66508', '+91 93225 70282' , '+91 0251 2706498'], 
        'tint' => 's',
        'bg' => 'bg-[#4FB6DE]/15'
    ],
    [
        'icon' => 'fa-envelope', 
        'title' => 'Email Us', 
        'lines' => ['Hareshbk70@gmail.com'], 
        'tint' => 'r',
        'bg' => 'bg-[#C1272D]/10'
    ],
    [
        'icon' => 'fa-clock', 
        'title' => 'Working Hours', 
        'lines' => ['Wed – Mon: 11:00 AM – 06:00. PM', 'Tuesday: Closed'], 
        'tint' => 's',
        'bg' => 'bg-[#4FB6DE]/15'
    ],
];

// ============================================================
// FAQ – अब 10 सवाल
// ============================================================
$faqs = [
    ['q' => 'Can I place an order directly on the website?', 'a' => 'Not yet — this site is for browsing our fabric categories. To order, send us an enquiry and our team will guide you through pricing and quantities.'],
    ['q' => 'Do you provide fabric samples?', 'a' => 'Yes, for most categories. Mention the fabric name and category in your enquiry and we\'ll let you know availability.'],
    ['q' => 'Do you supply in bulk for institutions?', 'a' => 'Yes — we regularly supply hospital fabric, uniform shirting and similar categories to institutions in bulk.'],
    ['q' => 'Which cities do you deliver to?', 'a' => 'We service trade partners across most major cities. Share your location in the enquiry form and we\'ll confirm.'],
    ['q' => 'What is the minimum order quantity (MOQ) for different fabrics?', 'a' => 'MOQ varies by category — from 500 meters for PC fabrics to 6000 meters for pocketing fabrics. We\'ll share exact numbers when you enquire about a specific product.'],
    ['q' => 'Do you offer custom printing or dyeing?', 'a' => 'Yes, we can arrange custom dyeing and digital printing for bulk orders. Share your design, colour, and quantity requirements and we\'ll get back with a feasibility and pricing.'],
    ['q' => 'Do you deliver internationally?', 'a' => 'Yes, we export to Malaysia, Indonesia, Singapore, and several African countries. For international shipping, contact us with your destination and order volume.'],
    ['q' => 'Is GST included in the prices shown?', 'a' => 'Prices shown on the product pages are exclusive of GST. A 5% GST will be added to most items at checkout or on the final invoice.'],
    ['q' => 'How do I know if a fabric is currently in stock?', 'a' => 'Stock levels change rapidly. The best way is to send us an enquiry with the fabric name and our team will confirm current availability and dispatch timelines.'],
    ['q' => 'Can I get a quality certificate or test report for the fabric?', 'a' => 'Yes, we can provide basic quality certificates (GSM, width, composition) on request. For detailed lab reports, we may need to coordinate with our suppliers.'],
];
?>

<style>
    /* ===== Base ===== */
    .section-pad { padding: 4rem 0; }
    @media (min-width: 1024px) { .section-pad { padding: 5rem 0; } }

    /* ===== Hero ===== */
    .hero-contact {
        background: linear-gradient(135deg, #1A1714 0%, #2E2A26 100%);
        position: relative;
        min-height: 50vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        overflow: hidden;
    }
    .hero-contact::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url('https://picsum.photos/seed/contactbanner/1600/900') center/cover no-repeat;
        opacity: 0.2;
        z-index: 0;
    }
    .hero-contact .content {
        position: relative;
        z-index: 1;
        max-width: 720px;
        padding: 2rem 1.5rem;
    }

    /* ===== Info Cards ===== */
    .info-card {
        border-radius: 24px;
        background: #FFFFFF;
        box-shadow: 0 1px 2px rgba(36,30,26,0.04), 0 10px 24px rgba(36,30,26,0.05);
        transition: transform .35s ease, box-shadow .35s ease;
        padding: 1.8rem 1.5rem;
        text-align: center;
        border: 1px solid transparent;
    }
    .info-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 40px rgba(36,30,26,0.12);
        border-color: rgba(193, 39, 45, 0.15);
    }
    .info-icon-wrap {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 1.4rem;
        color: #fff;
    }
    .info-icon-wrap.r { background: linear-gradient(135deg, #C1272D, #8F1D22); }
    .info-icon-wrap.s { background: linear-gradient(135deg, #4FB6DE, #2E93BD); }
    .info-card h3 {
        font-family: 'Georgia', serif;
        font-size: 1.1rem;
        font-weight: 600;
        color: #1A1714;
        margin-bottom: 0.4rem;
    }
    .info-card p {
        font-size: 0.9rem;
        color: #5A5652;
        line-height: 1.6;
        margin: 0;
    }

    /* ===== Form ===== */
    .field label { display: block; font-size: 13px; font-weight: 500; color: #241E1B; margin-bottom: 6px; }
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

    /* ===== FAQ ===== */
    .faq-item { border-bottom: 1px solid rgba(36,30,26,0.08); }
    .faq-item:last-child { border-bottom: none; }
    .faq-toggle { transition: transform .3s ease; }
    .faq-item.open .faq-toggle { transform: rotate(45deg); }
    .faq-panel { max-height: 0; overflow: hidden; transition: max-height .4s ease; }
    .faq-item.open .faq-panel { max-height: 300px; }

    /* ===== Alerts ===== */
    .alert-success { background: #d4edda; border-color: #c3e6cb; color: #155724; }
    .alert-error { background: #f8d7da; border-color: #f5c6cb; color: #721c24; }
    .alert { padding: 12px 20px; border-radius: 12px; margin-bottom: 20px; border: 1px solid; display: none; }

    /* ===== Trust Cards ===== */
    .trust-card {
        padding: 1.5rem;
        border-radius: 20px;
        background: #fff;
        box-shadow: 0 1px 2px rgba(36,30,26,0.04), 0 10px 24px rgba(36,30,26,0.05);
        transition: transform .35s ease, box-shadow .35s ease;
        text-align: center;
    }
    .trust-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 40px rgba(36,30,26,0.10);
    }
    .trust-card .icon-wrap {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 0.8rem;
        font-size: 1.2rem;
        color: #fff;
    }
</style>

<!-- ============================================================ -->
<!-- HERO -->
<!-- ============================================================ -->
<section class="hero-contact" data-aos="fade-up">
    <div class="content">
        <span class="inline-block bg-white/10 backdrop-blur-sm text-white text-[12px] font-bold uppercase tracking-[0.15em] px-4 py-1.5 rounded-full mb-4">Get in Touch</span>
        <h1 class="font-serif text-[36px] sm:text-[48px] leading-[1.1] text-white font-medium">
            Let's Talk <span class="text-[#4FB6DE]">Fabrics</span>
        </h1>
        <p class="text-white/80 text-[16px] sm:text-[18px] leading-[1.7] max-w-[540px] mx-auto mt-3">
            Have a project, bulk requirement, or just a question? Reach out — we're here to help.
        </p>
    </div>
</section>

<!-- ============================================================ -->
<!-- CONTACT INFO CARDS -->
<!-- ============================================================ -->
<section class="max-w-[1280px] mx-auto px-6 lg:px-10 py-14">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php foreach ($contact_info as $i => $c): ?>
            <div class="info-card" data-aos="fade-up" data-aos-delay="<?= $i * 80 ?>">
                <div class="info-icon-wrap <?= $c['tint'] ?>">
                    <i class="fa-solid <?= $c['icon'] ?>"></i>
                </div>
                <h3><?= $c['title'] ?></h3>
                <?php foreach ($c['lines'] as $line): ?>
                    <p><?= $line ?></p>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- ============================================================ -->
<!-- FORM + MAP + SOCIAL -->
<!-- ============================================================ -->
<section class="max-w-[1280px] mx-auto px-6 lg:px-10 pb-16 grid grid-cols-1 lg:grid-cols-5 gap-10">
    <!-- FORM -->
    <div class="lg:col-span-3" data-aos="fade-right">
        <div class="bg-white rounded-3xl shadow-[0_1px_2px_rgba(36,30,26,0.04),0_10px_24px_rgba(36,30,26,0.05)] p-7 sm:p-10">
            <p class="text-[#2E93BD] font-medium text-[13px] mb-2">Send an enquiry</p>
            <h2 class="font-serif text-[24px] sm:text-[28px] text-[#1A1714] font-medium mb-7">Tell us what you're looking for</h2>

            <div id="formAlert" class="alert"></div>

            <form id="contactForm" action="<?= BASE_URL ?>process-enquiry.php" method="POST" class="space-y-5">
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

                <button type="submit" id="submitBtn" class="inline-flex items-center gap-2 bg-[#C1272D] text-white px-8 py-3.5 rounded-full font-medium text-[14px] transition-all duration-300 hover:bg-[#a62a2f] hover:-translate-y-0.5">
                    Send Enquiry
                    <i class="fa-solid fa-paper-plane text-[13px]"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- MAP + SOCIAL -->
    <div class="lg:col-span-2 flex flex-col gap-6" data-aos="fade-left">
        <div class="rounded-3xl overflow-hidden h-[240px] lg:h-[280px] shadow-[0_1px_2px_rgba(36,30,26,0.04),0_10px_24px_rgba(36,30,26,0.05)]">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10080.133759546861!2d73.16372230238265!3d19.235768432560892!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7959832a3b41f%3A0x33bd4983ffc5a277!2sMANAS%20PLAZA!5e0!3m2!1sen!2sin!4v1789021589186!5m2!1sen!2sin"
                class="w-full h-full border-0"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                title="Store location map">
            </iframe>
        </div>

        <div class="bg-white rounded-3xl shadow-[0_1px_2px_rgba(36,30,26,0.04),0_10px_24px_rgba(36,30,26,0.05)] p-7">
            <h3 class="font-serif text-[17px] text-[#1A1714] mb-4">Follow Along</h3>
            <p class="text-[#5A5652] text-[13.5px] leading-[1.7] mb-5">New fabrics and category updates are posted here first.</p>
            <div class="flex items-center gap-3">
                <a href="#" aria-label="Instagram" class="w-11 h-11 rounded-full border border-[#1A1714]/10 flex items-center justify-center text-[#1A1714] transition-all duration-300 hover:bg-[#C1272D] hover:border-[#C1272D] hover:text-white hover:-translate-y-1">
                    <i class="fa-brands fa-instagram text-[16px]"></i>
                </a>
                <a href="#" aria-label="WhatsApp" class="w-11 h-11 rounded-full border border-[#1A1714]/10 flex items-center justify-center text-[#1A1714] transition-all duration-300 hover:bg-[#4FB6DE] hover:border-[#4FB6DE] hover:text-white hover:-translate-y-1">
                    <i class="fa-brands fa-whatsapp text-[16px]"></i>
                </a>
                <a href="#" aria-label="Facebook" class="w-11 h-11 rounded-full border border-[#1A1714]/10 flex items-center justify-center text-[#1A1714] transition-all duration-300 hover:bg-[#C1272D] hover:border-[#C1272D] hover:text-white hover:-translate-y-1">
                    <i class="fa-brands fa-facebook-f text-[16px]"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- WHY CONTACT US? – नया Trust सेक्शन -->
<!-- ============================================================ -->
<section class="bg-[#f5f0eb] border-y border-[#4FB6DE]/20 section-pad">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-10">
        <div class="text-center mb-12" data-aos="fade-up">
            <p class="text-[#C1272D] font-medium text-[13px] mb-2">Why reach out?</p>
            <h2 class="font-serif text-[26px] sm:text-[32px] text-[#1A1714] font-medium">We're More Than Just a Fabric Supplier</h2>
            <p class="text-[#5A5652] text-[15px] max-w-[540px] mx-auto mt-2">Here's what you can expect when you connect with us.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="trust-card" data-aos="fade-up" data-aos-delay="0">
                <div class="icon-wrap" style="background:linear-gradient(135deg,#C1272D,#8F1D22);">
                    <i class="fa-solid fa-handshake"></i>
                </div>
                <h3 class="font-serif text-[17px] text-[#1A1714] mb-2">Personalised Support</h3>
                <p class="text-[#5A5652] text-[14px] leading-[1.6]">We listen to your specific needs and guide you to the right fabric for your project — every time.</p>
            </div>
            <div class="trust-card" data-aos="fade-up" data-aos-delay="100">
                <div class="icon-wrap" style="background:linear-gradient(135deg,#4FB6DE,#2E93BD);">
                    <i class="fa-solid fa-bolt"></i>
                </div>
                <h3 class="font-serif text-[17px] text-[#1A1714] mb-2">Fast Turnaround</h3>
                <p class="text-[#5A5652] text-[14px] leading-[1.6]">We understand the urgency of deadlines — our response times are quick and our delivery schedules are reliable.</p>
            </div>
            <div class="trust-card" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-wrap" style="background:linear-gradient(135deg,#C1272D,#8F1D22);">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <h3 class="font-serif text-[17px] text-[#1A1714] mb-2">Quality Assurance</h3>
                <p class="text-[#5A5652] text-[14px] leading-[1.6]">Every fabric in our catalogue is checked for weave, weight, and finish before it reaches you.</p>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- FAQ – अब 10 सवाल -->
<!-- ============================================================ -->
<section class="section-pad">
    <div class="max-w-[820px] mx-auto px-6 lg:px-10">
        <div class="text-center mb-12" data-aos="fade-up">
            <p class="text-[#2E93BD] font-medium text-[13px] mb-2">Before you write in</p>
            <h2 class="font-serif text-[26px] sm:text-[30px] text-[#1A1714] font-medium">Frequently Asked Questions</h2>
            <p class="text-[#5A5652] text-[15px] max-w-[480px] mx-auto mt-2">Quick answers to the most common queries from our trade partners.</p>
        </div>

        <div class="bg-white rounded-3xl shadow-[0_1px_2px_rgba(36,30,26,0.04),0_10px_24px_rgba(36,30,26,0.05)] divide-y divide-[#1A1714]/5 overflow-hidden" data-aos="fade-up" data-aos-delay="100">
            <?php foreach ($faqs as $i => $f): ?>
                <div class="faq-item px-6 sm:px-8" data-index="<?= $i ?>">
                    <button type="button" class="faq-btn w-full flex items-center justify-between gap-4 py-5 text-left">
                        <span class="font-serif text-[15.5px] text-[#1A1714]"><?= $f['q'] ?></span>
                        <i class="faq-toggle fa-solid fa-plus text-[#C1272D] text-[13px] shrink-0"></i>
                    </button>
                    <div class="faq-panel">
                        <p class="text-[#5A5652] text-[14px] leading-[1.75] pb-5"><?= $f['a'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- FINAL CTA -->
<!-- ============================================================ -->
<section class="bg-[#1A1714] section-pad">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-10 text-center" data-aos="fade-up">
        <h2 class="font-serif text-[28px] sm:text-[34px] text-[#f5f0eb] font-medium">Ready to Start Your Order?</h2>
        <p class="text-[#f5f0eb]/70 text-[15px] max-w-[480px] mx-auto mt-3 mb-8">Drop us a message and we'll help you find exactly what you need — from samples to bulk orders.</p>
        <a href="#contactForm" class="inline-flex items-center gap-2 bg-[#C1272D] text-white px-8 py-3.5 rounded-full font-medium text-[14px] transition-all duration-300 hover:bg-[#a62a2f] hover:-translate-y-0.5">
            Send Enquiry Now <i class="fa-solid fa-arrow-right text-[12px]"></i>
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<!-- ===== JAVASCRIPT ===== -->
<script>
    // FAQ toggle
    document.querySelectorAll('.faq-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const item = btn.closest('.faq-item');
            const wasOpen = item.classList.contains('open');
            document.querySelectorAll('.faq-item.open').forEach(el => el.classList.remove('open'));
            if (!wasOpen) item.classList.add('open');
        });
    });

    // AJAX form submission
    const form = document.getElementById('contactForm');
    const alertBox = document.getElementById('formAlert');
    const submitBtn = document.getElementById('submitBtn');

    form.addEventListener('submit', async function(e) {
        e.preventDefault();

        const formData = new FormData(form);
        formData.append('source', 'contact_page');

        submitBtn.disabled = true;
        submitBtn.innerHTML = 'Sending... <i class="fa-solid fa-spinner fa-spin"></i>';

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            });

            const result = await response.json();

            alertBox.style.display = 'block';
            alertBox.className = 'alert';

            if (result.success) {
                alertBox.classList.add('alert-success');
                alertBox.textContent = result.message || 'Thank you! We\'ll get back to you soon.';
                form.reset();
            } else {
                alertBox.classList.add('alert-error');
                alertBox.textContent = result.message || 'Something went wrong. Please try again.';
            }
        } catch (error) {
            alertBox.style.display = 'block';
            alertBox.className = 'alert alert-error';
            alertBox.textContent = 'Network error. Please check your connection and try again.';
        }

        submitBtn.disabled = false;
        submitBtn.innerHTML = 'Send Enquiry <i class="fa-solid fa-paper-plane text-[13px]"></i>';

        setTimeout(() => { alertBox.style.display = 'none'; }, 6000);
    });
</script>