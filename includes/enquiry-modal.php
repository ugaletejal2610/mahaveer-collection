<!-- includes/enquiry-modal.php -->
<div id="enquiryModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black/50 transition-opacity">
  <!-- Modal card -->
  <div id="modalContent" class="bg-white rounded-2xl max-w-md w-full mx-4 p-6 shadow-2xl relative transform transition-all duration-300 scale-95 opacity-0">
    
    <!-- Close button -->
    <button type="button" onclick="closeEnquiryModal()" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 text-2xl leading-none">&times;</button>
    
    <h3 class="text-2xl font-serif text-[#241e1a] mb-2">Enquire Now</h3>
    <p class="text-[#241e1a]/60 text-sm mb-4">We'll get back to you shortly.</p>
    
    <form id="enquiryForm" action="<?= BASE_URL ?>process-enquiry.php" method="POST">
      <!-- Hidden field to store product name -->
      <input type="hidden" name="product" id="productName" value="">
      
      <div class="mb-3">
        <label for="enqName" class="block text-sm font-medium text-[#241e1a]/80">Full Name *</label>
        <input type="text" id="enqName" name="name" required class="w-full border border-[#241e1a]/20 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#2E93BD] focus:border-transparent">
      </div>
      
      <div class="mb-3">
        <label for="enqEmail" class="block text-sm font-medium text-[#241e1a]/80">Email Address *</label>
        <input type="email" id="enqEmail" name="email" required class="w-full border border-[#241e1a]/20 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#2E93BD] focus:border-transparent">
      </div>
      
      <div class="mb-3">
        <label for="enqPhone" class="block text-sm font-medium text-[#241e1a]/80">Phone Number</label>
        <input type="tel" id="enqPhone" name="phone" class="w-full border border-[#241e1a]/20 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#2E93BD] focus:border-transparent">
      </div>
      
      <div class="mb-4">
        <label for="enqMessage" class="block text-sm font-medium text-[#241e1a]/80">Message</label>
        <textarea id="enqMessage" name="message" rows="3" class="w-full border border-[#241e1a]/20 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#2E93BD] focus:border-transparent"></textarea>
      </div>
      
      <button type="submit" id="enqSubmit" class="w-full bg-[#C1272D] text-white font-semibold py-3 rounded-full hover:bg-[#a62a2f] transition shadow-md">
        Send Enquiry
      </button>
      
      <div id="enqResponse" class="mt-3 text-center text-sm hidden"></div>
    </form>
  </div>
</div>

<script>
document.getElementById('enquiryForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    fetch('<?= BASE_URL ?>process-enquiry.php', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        const responseDiv = document.getElementById('enqResponse');
        responseDiv.classList.remove('hidden');
        
        if (data.success) {
            responseDiv.innerHTML = '<span style="color:green;">✓ ' + data.message + '</span>';
            document.getElementById('enquiryForm').reset();
            setTimeout(closeEnquiryModal, 3000);
        } else {
            responseDiv.innerHTML = '<span style="color:red;">✗ ' + data.message + '</span>';
        }
    })
    .catch(error => {
        document.getElementById('enqResponse').innerHTML = '<span style="color:red;">✗ Network error. Please try again.</span>';
    });
});

function closeEnquiryModal() {
    const modal = document.getElementById('enquiryModal');
    const content = document.getElementById('modalContent');
    
    content.classList.add('scale-95', 'opacity-0');
    setTimeout(() => {
        modal.classList.add('hidden');
        content.classList.remove('scale-95', 'opacity-0');
        document.getElementById('enqResponse').classList.add('hidden');
    }, 300);
}

function openEnquiryModal(productName) {
    const modal = document.getElementById('enquiryModal');
    const productInput = document.getElementById('productName');
    
    if (productName) {
        productInput.value = productName;
    }
    
    modal.classList.remove('hidden');
    const content = document.getElementById('modalContent');
    setTimeout(() => {
        content.classList.remove('scale-95', 'opacity-0');
    }, 10);
}
</script>