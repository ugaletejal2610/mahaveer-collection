<footer class="bg-brand-ink text-brand-cream mt-20">

    <!-- TOP: BRAND / LINKS / CONTACT -->
    <div class="max-w-[1280px] mx-auto px-6 lg:px-10 py-16 grid grid-cols-1 md:grid-cols-3 gap-12">

        <!-- BRAND -->
        <div class="md:col-span-1">
            <img src="<?= BASE_URL ?>assets/images/logo.png" alt="Your Brand" class="h-14 w-auto object-contain mb-5 brightness-0 invert opacity-95">
            <p class="text-[14px] leading-[1.7] text-brand-cream/70 max-w-[240px]">
                A lookbook of considered clothing — fabrics, fits, and details, put together for people who read labels before they read price tags.
            </p>
            <div class="flex items-center gap-3 mt-6">
                <a href="#" aria-label="Instagram" class="w-9 h-9 rounded-full border border-brand-cream/25 flex items-center justify-center text-brand-cream/80 transition-all duration-300 hover:bg-brand-red hover:border-brand-red hover:text-white">
                    <i class="fa-brands fa-instagram text-[15px]"></i>
                </a>
                <a href="#" aria-label="Pinterest" class="w-9 h-9 rounded-full border border-brand-cream/25 flex items-center justify-center text-brand-cream/80 transition-all duration-300 hover:bg-brand-sky hover:border-brand-sky hover:text-white">
                    <i class="fa-brands fa-pinterest-p text-[15px]"></i>
                </a>
                <a href="#" aria-label="Facebook" class="w-9 h-9 rounded-full border border-brand-cream/25 flex items-center justify-center text-brand-cream/80 transition-all duration-300 hover:bg-brand-red hover:border-brand-red hover:text-white">
                    <i class="fa-brands fa-facebook-f text-[15px]"></i>
                </a>
            </div>
        </div>

        <!-- EXPLORE -->
        <div>
            <h4 class="font-serif text-[18px] mb-5 text-brand-cream">Explore</h4>
            <ul class="space-y-3 text-[14px] text-brand-cream/70">
                <li><a href="<?= BASE_URL ?>collection.php" class="hover:text-brand-sky transition-colors duration-300">Collection</a></li>
                <li><a href="<?= BASE_URL ?>new-arrivals.php" class="hover:text-brand-sky transition-colors duration-300">New Arrivals</a></li>
                <li><a href="<?= BASE_URL ?>lookbook.php" class="hover:text-brand-sky transition-colors duration-300">Lookbook</a></li>
                <li><a href="<?= BASE_URL ?>aboutus.php" class="hover:text-brand-sky transition-colors duration-300">About Us</a></li>
            </ul>
        </div>

        <!-- CONTACT -->
        <div>
            <h4 class="font-serif text-[18px] mb-5 text-brand-cream">Get in Touch</h4>
            <ul class="space-y-4 text-[14px] text-brand-cream/70">
                <li class="flex items-start gap-3">
                    <i class="fa-solid fa-location-dot mt-[3px] text-brand-red"></i>
                    <span>123 Fashion Street, Bandra West, Mumbai, MH 400050</span>
                </li>
                <li class="flex items-center gap-3">
                    <i class="fa-solid fa-phone text-brand-sky"></i>
                    <a href="tel:+919999999999" class="hover:text-brand-sky transition-colors duration-300">+91 99999 99999</a>
                </li>
                <li class="flex items-center gap-3">
                    <i class="fa-solid fa-envelope text-brand-red"></i>
                    <a href="mailto:hello@yourbrand.com" class="hover:text-brand-sky transition-colors duration-300">hello@yourbrand.com</a>
                </li>
            </ul>
        </div>

    </div>

    <!-- DIVIDER -->
    <div class="h-[2px] w-full bg-gradient-to-r from-brand-red via-brand-sky to-brand-red opacity-70"></div>

    <!-- BOTTOM BAR -->
    <div class="max-w-[1280px] mx-auto px-6 lg:px-10 py-6 flex flex-col md:flex-row items-center justify-between gap-4 text-[13px] text-brand-cream/60">
        <p>&copy; <?= date('Y') ?> Your Brand. All rights reserved.</p>
        <p class="text-center">Made for browsing, not buying — every piece here is here to be seen.</p>
    </div>

</footer>

<!-- Include the enquiry modal (so it's available globally) -->
<?php include 'includes/enquiry-modal.php'; ?>

<!-- All JavaScript (AOS fix + modal control + AJAX) -->
<script>
    // AOS fix for browser back/forward cache
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof AOS !== 'undefined') {
            AOS.init();
        }
    });

    window.addEventListener('pageshow', function(event) {
        if (event.persisted && typeof AOS !== 'undefined') {
            AOS.refresh();
        }
    });

    // ----- Modal functions -----
    function openEnquiryModal(productName) {
        document.getElementById('productName').value = productName;
        const modal = document.getElementById('enquiryModal');
        const content = document.getElementById('modalContent');
        modal.classList.remove('hidden');
        requestAnimationFrame(() => {
            content.classList.remove('opacity-0', 'scale-95');
            content.classList.add('opacity-100', 'scale-100');
        });
        document.getElementById('enquiryForm').reset();
        const resp = document.getElementById('enqResponse');
        resp.classList.add('hidden');
        resp.innerHTML = '';
    }

    function closeEnquiryModal() {
        const modal = document.getElementById('enquiryModal');
        const content = document.getElementById('modalContent');
        content.classList.remove('opacity-100', 'scale-100');
        content.classList.add('opacity-0', 'scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    // Close modal on overlay click
    document.getElementById('enquiryModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeEnquiryModal();
        }
    });

    // ----- AJAX form submission -----
    document.getElementById('enquiryForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const form = this;
        const submitBtn = document.getElementById('enqSubmit');
        const responseDiv = document.getElementById('enqResponse');
        
        submitBtn.disabled = true;
        submitBtn.textContent = 'Sending...';
        responseDiv.classList.add('hidden');
        
        fetch(form.action, {
            method: 'POST',
            body: new FormData(form),
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(res => res.json())
        .then(data => {
            responseDiv.classList.remove('hidden');
            if (data.success) {
                responseDiv.className = 'mt-3 text-center text-sm text-green-600';
                responseDiv.textContent = data.message || 'Thank you! We will contact you soon.';
                form.reset();
            } else {
                responseDiv.className = 'mt-3 text-center text-sm text-red-600';
                responseDiv.textContent = data.message || 'Something went wrong. Please try again.';
            }
        })
        .catch(() => {
            responseDiv.classList.remove('hidden');
            responseDiv.className = 'mt-3 text-center text-sm text-red-600';
            responseDiv.textContent = 'Network error. Please check your connection.';
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Send Enquiry';
        });
    });
</script>

</body>
</html>