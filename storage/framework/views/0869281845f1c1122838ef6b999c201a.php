<?php if (isset($component)) { $__componentOriginal166a02a7c5ef5a9331faf66fa665c256 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal166a02a7c5ef5a9331faf66fa665c256 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-panels::components.page.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament-panels::page'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>

  <!-- Main Container with improved spacing and background -->
  <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 p-6">
    
    <!-- Crops Section -->
    <div class="max-w-7xl mx-auto mb-12">
      <!-- Header with icon and improved typography -->
      <div class="flex items-center gap-3 mb-8">
        <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center">
          <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
          </svg>
        </div>
        <h1 class="text-3xl font-bold bg-gradient-to-r from-green-600 to-green-800 bg-clip-text text-transparent dark:from-green-400 dark:to-green-600">
          Crops Management
        </h1>
      </div>

      <!-- Crops Table with enhanced styling -->
      <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-200 dark:border-gray-700">
        <div class="overflow-x-auto">
          <table id="cropsTable" class="min-w-full">
            <thead>
              <tr class="bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-800 border-b border-gray-200 dark:border-gray-600">
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">ID</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Name</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Planting Date</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Harvest Date</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Fertilizers Used</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Farm</th>
                <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Send to Admin</th>
                <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Actions</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
              <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->crops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr data-id="<?php echo e($crop['id']); ?>" class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                    <span class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-full text-xs font-semibold">
                      <?php echo e($crop['id']); ?>

                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100"><?php echo e($crop['name']); ?></td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300"><?php echo e($crop['planting_date']); ?></td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300"><?php echo e($crop['harvest_date']); ?></td>
                  <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200">
                      <?php echo e($crop['fertilizers_used']); ?>

                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300"><?php echo e($crop['farm']['name'] ?? 'N/A'); ?></td>
                  <td class="px-6 py-4 whitespace-nowrap text-center">
                    <button onclick="sendCropToAdmin(<?php echo e($crop['id']); ?>)" 
                            class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white text-sm font-medium rounded-lg shadow-sm transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                      <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                      </svg>
                      Send to Admin
                    </button>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-center">
                    <button onclick="generateQR(this)" data-crop-id="<?php echo e($crop['id']); ?>" 
                            class="inline-flex items-center px-3 py-2 bg-gradient-to-r from-indigo-500 to-indigo-600 hover:from-indigo-600 hover:to-indigo-700 text-white text-sm font-medium rounded-lg shadow-sm transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                      <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path>
                      </svg>
                      QR Code
                    </button>
                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
          </table>
        </div>
      </div>

      <!-- Review Button with improved styling -->
      <div class="mt-8 flex justify-center">
        <button onclick="reviewAllCrops()" 
                class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-semibold rounded-xl shadow-lg transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
          <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2H9z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
          </svg>
          Review Before Saving
        </button>
      </div>
    </div>

    <!-- Farms Section -->
    <div class="max-w-7xl mx-auto">
      <!-- Header with icon -->
      <div class="flex items-center gap-3 mb-8">
        <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
          <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H9m0 0H5m4 0V9a1 1 0 011-1h4a1 1 0 011 1v12M9 7h6"></path>
          </svg>
        </div>
        <h1 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent dark:from-blue-400 dark:to-blue-600">
          Farms Management
        </h1>
      </div>

      <!-- Farms Table -->
      <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-200 dark:border-gray-700">
        <div class="overflow-x-auto">
          <table id="farmsTable" class="min-w-full">
            <thead>
              <tr class="bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-800 border-b border-gray-200 dark:border-gray-600">
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">ID</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Name</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Location</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Size</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Total Crops</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Total Sensors</th>
                <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Action</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
              <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->farms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $farm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                    <span class="inline-flex items-center justify-center w-8 h-8 bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200 rounded-full text-xs font-semibold">
                      <?php echo e($farm['id']); ?>

                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100"><?php echo e($farm['name']); ?></td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300">
                    <div class="flex items-center">
                      <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                      </svg>
                      <?php echo e($farm['location']); ?>

                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                      <?php echo e($farm['size']); ?> hectares
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300">
                    <span class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-full text-sm font-semibold">
                      <?php echo e(count($farm['crops'])); ?>

                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300">
                    <span class="inline-flex items-center justify-center w-8 h-8 bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-200 rounded-full text-sm font-semibold">
                      <?php echo e(count($farm['sensors'])); ?>

                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-center">
                    <button onclick="sendCropToAdmin(<?php echo e($crop['id']); ?>)" 
                            class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white text-sm font-medium rounded-lg shadow-sm transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                      <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                      </svg>
                      Send to Admin
                    </button>
                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Enhanced QR Modal -->
  <div id="qrModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center hidden z-50 backdrop-blur-sm">
    <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-2xl text-center max-w-md w-full mx-4 border border-gray-200 dark:border-gray-700">
      <div class="flex items-center justify-center mb-6">
        <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900 rounded-full flex items-center justify-center">
          <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path>
          </svg>
        </div>
      </div>
      <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">QR Code Generated</h2>
      <div id="qrCodeContainer" class="mb-6 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg"></div>
      <div class="flex gap-3 justify-center">
        <button onclick="downloadQRImage()" 
                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold rounded-lg shadow-sm transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
          <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
          </svg>
          Download QR
        </button>
        <button onclick="closeQRModal()" 
                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white font-semibold rounded-lg shadow-sm transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
          <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
          Close
        </button>
      </div>
    </div>
  </div>

  <!-- Custom Field Modal (keeping original structure) -->
  <div id="customFieldModal-<?php echo e($crop['id']); ?>" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center hidden z-50 backdrop-blur-sm">
    <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-2xl w-full max-w-md mx-4 border border-gray-200 dark:border-gray-700">
      <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">Add Custom Information</h2>
      <div class="space-y-4">
        <input type="text" id="customFieldName-<?php echo e($crop['id']); ?>" placeholder="Information Name" 
               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-100 transition-colors">
        <input type="text" id="customFieldValue-<?php echo e($crop['id']); ?>" placeholder="Information Value" 
               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-100 transition-colors">
      </div>
      <div class="flex justify-end gap-3 mt-8">
        <button onclick="addCustomField('<?php echo e($crop['id']); ?>')" 
                class="px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold rounded-lg shadow-sm transition-all duration-200 transform hover:scale-105">
          Add
        </button>
        <button onclick="closeCustomFieldModal('<?php echo e($crop['id']); ?>')" 
                class="px-6 py-3 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-semibold rounded-lg shadow-sm transition-all duration-200 transform hover:scale-105">
          Cancel
        </button>
      </div>
    </div>
  </div>

  <script>
    function sendCropToAdmin(cropId) {
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        fetch('/crops/send-to-admin', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify({ crop_id: cropId })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                alert('Crop sent to admin!');
            } else {
                alert('Failed to send.');
            }
        })
        .catch(err => {
            console.error(err);
            alert('Error sending crop.');
        });
    }

    function generateQR(button) {
        const cropId = button.dataset.cropId;
        const qrData = `http://localhost:8000/crop/${cropId}`;
        const qrContainer = document.getElementById('qrCodeContainer');
        qrContainer.innerHTML = '';

        new QRCode(qrContainer, {
            text: qrData,
            width: 200,
            height: 200,
        });

        document.getElementById('qrModal').classList.remove('hidden');
    }

    function closeQRModal() {
        document.getElementById('qrModal').classList.add('hidden');
        document.getElementById('qrCodeContainer').innerHTML = '';
    }

    function downloadQRImage() {
        const canvas = document.querySelector('#qrCodeContainer canvas');
        if (!canvas) return alert("QR code has not been generated yet.");

        const image = canvas.toDataURL("image/png");
        const link = document.createElement('a');
        link.href = image;
        link.download = 'qr-code.png';
        link.click();
    }

    function reviewAllCrops() {
        const summary = [];
        const rows = document.querySelectorAll("#cropsTable tbody tr");
        
        rows.forEach(row => {
            const cropId = row.cells[0].innerText.trim();
            const name = row.cells[1].innerText.trim();
            const planting = row.cells[2].innerText.trim();
            const harvest = row.cells[3].innerText.trim();
            const fert = row.cells[4].innerText.trim();
            const farm = row.cells[5].innerText.trim();
            const custom = cropCustomFields.get(cropId) || [];

            let entry = `🟢 ${name}\n`;
            entry += `  - Planting: ${planting}, Harvest: ${harvest}\n  - Fertilizers: ${fert}, Farm: ${farm}\n`;
            if (custom.length > 0) {
                entry += `  - Custom Information:\n`;
                custom.forEach(f => {
                    entry += `    • ${f.key}: ${f.value}\n`;
                });
            }
            summary.push(entry);
        });

        alert(" Review Before Upload:\n\n" + summary.join("\n\n"));
    }
  </script>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal166a02a7c5ef5a9331faf66fa665c256)): ?>
<?php $attributes = $__attributesOriginal166a02a7c5ef5a9331faf66fa665c256; ?>
<?php unset($__attributesOriginal166a02a7c5ef5a9331faf66fa665c256); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal166a02a7c5ef5a9331faf66fa665c256)): ?>
<?php $component = $__componentOriginal166a02a7c5ef5a9331faf66fa665c256; ?>
<?php unset($__componentOriginal166a02a7c5ef5a9331faf66fa665c256); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Dell\Iotapp\resources\views/filament/user/pages/blockchain.blade.php ENDPATH**/ ?>