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

    <!-- Tailwind safelist colors -->
    <div class="hidden">
        bg-green-600 bg-yellow-500 bg-gray-500 bg-red-500 hover:bg-gray-100 text-white
    </div>
    
    <?php
        $cropId = session('review_crop_id');
        $highlightCropId = $cropId ?? null;
    ?>

    <!-- Main Container with improved background -->
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 dark:from-gray-900 dark:to-gray-800 p-6">
        
        <!-- Header Section with icon -->
        <div class="max-w-7xl mx-auto mb-8">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-purple-700 bg-clip-text text-transparent dark:from-blue-400 dark:to-purple-500">
                        Review & Save Crops to Blockchain
                    </h1>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">Manage and store your crop data securely on the blockchain</p>
                </div>
            </div>

            <!-- Enhanced Filter Section -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 mb-8">
                <form method="GET" class="flex items-center gap-4">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                        </svg>
                        <label for="status" class="text-sm font-semibold text-gray-700 dark:text-gray-300">Filter by status:</label>
                    </div>
                    <select name="status" id="status" onchange="this.form.submit()" 
                            class="px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors shadow-sm">
                        <option value="">All Status</option>
                        <option value="draft" <?php echo e(request('status') == 'draft' ? 'selected' : ''); ?>>Draft</option>
                        <option value="pending" <?php echo e(request('status') == 'pending' ? 'selected' : ''); ?>>Pending</option>
                        <option value="stored" <?php echo e(request('status') == 'stored' ? 'selected' : ''); ?>>Stored</option>
                    </select>
                </form>
            </div>

            <!-- Enhanced Crops Table -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-200 dark:border-gray-700 mb-12">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-800">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Crops Review</h2>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-800 border-b border-gray-200 dark:border-gray-600">
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Sender</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Farm</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Planting Date</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Harvest Date</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Fertilizers</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $crops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200 <?php echo e($highlightCropId == $crop->id ? 'bg-gradient-to-r from-yellow-50 to-amber-50 dark:from-yellow-900/20 dark:to-amber-900/20 border-l-4 border-yellow-400' : 'bg-white dark:bg-gray-800'); ?>" data-id="<?php echo e($crop->id); ?>">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-full text-sm font-semibold">
                                            <?php echo e($crop->id); ?>

                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100"><?php echo e($crop->name); ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-gray-200 dark:bg-gray-600 rounded-full flex items-center justify-center mr-3">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                </svg>
                                            </div>
                                            <?php echo e($crop->user->name ?? 'Unknown'); ?>

                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300"><?php echo e($crop->farm->name ?? 'N/A'); ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                                            <?php echo e($crop->planting_date); ?>

                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 dark:bg-orange-900 text-orange-800 dark:text-orange-200">
                                            <?php echo e($crop->harvest_date); ?>

                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200">
                                            <?php echo e($crop->fertilizers_used); ?>

                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full text-white shadow-sm
                                            <?php if($crop->status === 'stored'): ?> bg-gradient-to-r from-green-500 to-green-600
                                            <?php elseif($crop->status === 'pending'): ?> bg-gradient-to-r from-yellow-500 to-yellow-600
                                            <?php elseif($crop->status === 'draft'): ?> bg-gradient-to-r from-gray-500 to-gray-600
                                            <?php else: ?> bg-gradient-to-r from-red-500 to-red-600 <?php endif; ?>">
                                            <!--[if BLOCK]><![endif]--><?php if($crop->status === 'stored'): ?>
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                </svg>
                                            <?php elseif($crop->status === 'pending'): ?>
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                                </svg>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            <?php echo e(ucfirst($crop->status)); ?>

                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <button onclick="saveCropToBlockchain(
                                            <?php echo e($crop->id); ?>,
                                            '<?php echo e($crop->name); ?>',
                                            '<?php echo e($crop->planting_date); ?>',
                                            '<?php echo e($crop->harvest_date); ?>',
                                            '<?php echo e($crop->fertilizers_used); ?>',
                                            '<?php echo e($crop->farm->name ?? 'N/A'); ?>'
                                        )" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white text-sm font-medium rounded-lg shadow-sm transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                            </svg>
                                            Save to Blockchain
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Enhanced Farms Section -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-200 dark:border-gray-700">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-800">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H9m0 0H5m4 0V9a1 1 0 011-1h4a1 1 0 011 1v12M9 7h6"></path>
                            </svg>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Farms Management</h2>
                    </div>
                </div>

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
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $farms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $farm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200 bg-white dark:bg-gray-800">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center justify-center w-8 h-8 bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200 rounded-full text-sm font-semibold">
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
                                            <?php echo e($farm['total_crops']); ?>

                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300">
                                        <span class="inline-flex items-center justify-center w-8 h-8 bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-200 rounded-full text-sm font-semibold">
                                            <?php echo e($farm['total_sensors']); ?>

                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <button 
                                            onclick='saveFarmToBlockchain(
                                                <?php echo json_encode($farm["name"], 15, 512) ?>,
                                                <?php echo json_encode($farm["location"], 15, 512) ?>,
                                                <?php echo e($farm["size"]); ?>,
                                                <?php echo e($farm["total_crops"]); ?>,
                                                <?php echo e($farm["total_sensors"]); ?>

                                            )' 
                                            class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white text-sm font-medium rounded-lg shadow-sm transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                            </svg>
                                            Save to Blockchain
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


    <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
    <script>
        // async function saveCropToBlockchain(cropId, cropName) 
         async function saveCropToBlockchain(cropId, name, plantingDate, harvestDate, fertilizersUsed, farmName){
            if (typeof window.ethereum !== 'undefined') {
                try {
                    await window.ethereum.request({ method: 'eth_requestAccounts' });
                    const web3 = new Web3(window.ethereum);

                    const contractAddress = '0xee672d27B495a13a7b76B51bA8DEFAF0d4a25e3d';
                    const contractABI = [{"anonymous": false,
      "inputs": [
        {
          "indexed": false,
          "internalType": "uint256",
          "name": "cropId",
          "type": "uint256"
        },
        {
          "indexed": false,
          "internalType": "string",
          "name": "name",
          "type": "string"
        },
        {
          "indexed": false,
          "internalType": "string",
          "name": "farmName",
          "type": "string"
        }
      ],
      "name": "CropAdded",
      "type": "event"
    },
    {
      "anonymous": false,
      "inputs": [
        {
          "indexed": false,
          "internalType": "uint256",
          "name": "farmId",
          "type": "uint256"
        },
        {
          "indexed": false,
          "internalType": "string",
          "name": "name",
          "type": "string"
        },
        {
          "indexed": false,
          "internalType": "string",
          "name": "location",
          "type": "string"
        }
      ],
      "name": "FarmAdded",
      "type": "event"
    },
    {
      "inputs": [
        {
          "internalType": "string",
          "name": "_name",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "_plantingDate",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "_harvestDate",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "_fertilizersUsed",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "_farmName",
          "type": "string"
        }
      ],
      "name": "addCrop",
      "outputs": [],
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "string",
          "name": "_name",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "_location",
          "type": "string"
        },
        {
          "internalType": "uint256",
          "name": "_size",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "_totalCrops",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "_totalSensors",
          "type": "uint256"
        }
      ],
      "name": "addFarm",
      "outputs": [],
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        }
      ],
      "name": "crops",
      "outputs": [
        {
          "internalType": "string",
          "name": "name",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "plantingDate",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "harvestDate",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "fertilizersUsed",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "farmName",
          "type": "string"
        }
      ],
      "stateMutability": "view",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        }
      ],
      "name": "farms",
      "outputs": [
        {
          "internalType": "string",
          "name": "name",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "location",
          "type": "string"
        },
        {
          "internalType": "uint256",
          "name": "size",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "totalCrops",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "totalSensors",
          "type": "uint256"
        }
      ],
      "stateMutability": "view",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "index",
          "type": "uint256"
        }
      ],
      "name": "getCrop",
      "outputs": [
        {
          "internalType": "string",
          "name": "",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "",
          "type": "string"
        }
      ],
      "stateMutability": "view",
      "type": "function"
    },
    {
      "inputs": [],
      "name": "getCropsCount",
      "outputs": [
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        }
      ],
      "stateMutability": "view",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "index",
          "type": "uint256"
        }
      ],
      "name": "getFarm",
      "outputs": [
        {
          "internalType": "string",
          "name": "",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "",
          "type": "string"
        },
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        }
      ],
      "stateMutability": "view",
      "type": "function"
    },
    {
      "inputs": [],
      "name": "getFarmsCount",
      "outputs": [
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        }
      ],
      "stateMutability": "view",
      "type": "function"
    }]; // عوضيه بملف الـ ABI الحقيقي

                    const contract = new web3.eth.Contract(contractABI, contractAddress);
                    const accounts = await web3.eth.getAccounts();


                     const receipt = await contract.methods
                    .addCrop(name, plantingDate, harvestDate, fertilizersUsed, farmName)
                   .send({ from: accounts[0] }); // correct account
                    // const receipt = await contract.methods
                    //     .addCrop(name, plantingDate, harvestDate, fertilizersUsed, farmName)
                    //     .send({ from: account });

                    console.log('Transaction receipt:', receipt);

                    // إبلاغ Laravel أن المحصول تم رفعه للبلوكشاين
                
                    const res = await fetch(`/admin/mark-crop-stored/${cropId}`, {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>' }
                              });
                         if (!res.ok) throw new Error('Laravel update failed');
                    
                    // fetch(`/admin/mark-crop-stored/${cropId}`, {
                    //     method: 'POST',
                    //     headers: {
                    //         'Content-Type': 'application/json',
                    //         'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                    //     }
                    // });

                    alert('Crop stored on blockchain successfully!');
                    window.location.reload();

                } catch (error) {
                    console.error(error);
                    alert('Error saving crop to blockchain.');
                }
            } else {
                alert("Please install MetaMask.");
            }
        }

        async function saveFarmToBlockchain(name, location, size, totalCrops, totalSensors) {
    if (typeof window.ethereum !== 'undefined') {
        try {
            await window.ethereum.request({ method: 'eth_requestAccounts' });
            const web3 = new Web3(window.ethereum);
            const contractAddress = '0xee672d27B495a13a7b76B51bA8DEFAF0d4a25e3d';
            const contractABI = [{"anonymous": false,
      "inputs": [
        {
          "indexed": false,
          "internalType": "uint256",
          "name": "cropId",
          "type": "uint256"
        },
        {
          "indexed": false,
          "internalType": "string",
          "name": "name",
          "type": "string"
        },
        {
          "indexed": false,
          "internalType": "string",
          "name": "farmName",
          "type": "string"
        }
      ],
      "name": "CropAdded",
      "type": "event"
    },
    {
      "anonymous": false,
      "inputs": [
        {
          "indexed": false,
          "internalType": "uint256",
          "name": "farmId",
          "type": "uint256"
        },
        {
          "indexed": false,
          "internalType": "string",
          "name": "name",
          "type": "string"
        },
        {
          "indexed": false,
          "internalType": "string",
          "name": "location",
          "type": "string"
        }
      ],
      "name": "FarmAdded",
      "type": "event"
    },
    {
      "inputs": [
        {
          "internalType": "string",
          "name": "_name",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "_plantingDate",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "_harvestDate",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "_fertilizersUsed",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "_farmName",
          "type": "string"
        }
      ],
      "name": "addCrop",
      "outputs": [],
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "string",
          "name": "_name",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "_location",
          "type": "string"
        },
        {
          "internalType": "uint256",
          "name": "_size",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "_totalCrops",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "_totalSensors",
          "type": "uint256"
        }
      ],
      "name": "addFarm",
      "outputs": [],
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        }
      ],
      "name": "crops",
      "outputs": [
        {
          "internalType": "string",
          "name": "name",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "plantingDate",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "harvestDate",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "fertilizersUsed",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "farmName",
          "type": "string"
        }
      ],
      "stateMutability": "view",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        }
      ],
      "name": "farms",
      "outputs": [
        {
          "internalType": "string",
          "name": "name",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "location",
          "type": "string"
        },
        {
          "internalType": "uint256",
          "name": "size",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "totalCrops",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "totalSensors",
          "type": "uint256"
        }
      ],
      "stateMutability": "view",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "index",
          "type": "uint256"
        }
      ],
      "name": "getCrop",
      "outputs": [
        {
          "internalType": "string",
          "name": "",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "",
          "type": "string"
        }
      ],
      "stateMutability": "view",
      "type": "function"
    },
    {
      "inputs": [],
      "name": "getCropsCount",
      "outputs": [
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        }
      ],
      "stateMutability": "view",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "index",
          "type": "uint256"
        }
      ],
      "name": "getFarm",
      "outputs": [
        {
          "internalType": "string",
          "name": "",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "",
          "type": "string"
        },
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        }
      ],
      "stateMutability": "view",
      "type": "function"
    },
    {
      "inputs": [],
      "name": "getFarmsCount",
      "outputs": [
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        }
      ],
      "stateMutability": "view",
      "type": "function"}]; 

            const contract = new web3.eth.Contract(contractABI, contractAddress);
            const accounts = await web3.eth.getAccounts();

            const tx = await contract.methods
                .addFarm(name, location, size, totalCrops, totalSensors)
                .send({ from: accounts[0] });

            console.log('Farm transaction:', tx);
           const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

          const farmId = tx.events.FarmAdded.returnValues.farmId;

          await fetch(`/admin/mark-farm-stored/${farmId}`, {
          method: 'POST',
          headers: { 'X-CSRF-TOKEN': csrfToken }
          });


            alert('Farm saved to blockchain successfully!');
            window.location.reload();
        } catch (error) {
            console.error(error);
            alert('Error saving farm to blockchain.');
        }
    } else {
        alert("Please install MetaMask.");
    }
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





















<?php /**PATH C:\Users\Dell\Iotapp\resources\views/filament/pages/save-in-blockchain-page.blade.php ENDPATH**/ ?>