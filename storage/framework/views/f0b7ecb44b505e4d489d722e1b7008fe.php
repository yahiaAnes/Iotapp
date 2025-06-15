
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

    <h1 class="text-2xl font-bold mb-4 text-gray-800">Review & Save Crops to Blockchain</h1>

    <form method="GET" class="mb-4">
        <label for="status" class="mr-2 font-semibold text-gray-700">Filter by status:</label>
        <select name="status" id="status" onchange="this.form.submit()" class="px-3 py-1 border rounded text-gray-800 bg-white">
            <option value="">All</option>
            <option value="draft" <?php echo e(request('status') == 'draft' ? 'selected' : ''); ?>>Draft</option>
            <option value="pending" <?php echo e(request('status') == 'pending' ? 'selected' : ''); ?>>Pending</option>
            <option value="stored" <?php echo e(request('status') == 'stored' ? 'selected' : ''); ?>>Stored</option>
        </select>
    </form>

    <table class="min-w-full border border-gray-300 rounded-lg overflow-hidden text-sm text-gray-800">
        <thead class="bg-gray-200 text-gray-700">
            <tr>
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">Name</th>
                <th class="px-4 py-2 border">Farm</th>
                <th class="px-4 py-2 border">Planting Date</th>
                <th class="px-4 py-2 border">Harvest Date</th>
                <th class="px-4 py-2 border">Fertilizers</th>
                <th class="px-4 py-2 border">Status</th>
                <th class="px-4 py-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $crops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="bg-black hover:bg-gray-50" data-id="<?php echo e($crop->id); ?>">
                    <td class="border px-4 py-2"><?php echo e($crop->id); ?></td>
                    <td class="border px-4 py-2"><?php echo e($crop->name); ?></td>
                    <td class="border px-4 py-2"><?php echo e($crop->farm->name ?? 'N/A'); ?></td>
                    <td class="border px-4 py-2"><?php echo e($crop->planting_date); ?></td>
                    <td class="border px-4 py-2"><?php echo e($crop->harvest_date); ?></td>
                    <td class="border px-4 py-2"><?php echo e($crop->fertilizers_used); ?></td>
                    <td class="border px-4 py-2">
                        <span class="px-2 py-1 text-xs font-medium rounded-full text-white 
    <?php echo e($crop->status == 'stored' ? 'bg-green-600' : 
        ($crop->status == 'pending' ? 'bg-yellow-500' : 
        ($crop->status == 'draft' ? 'bg-gray-500' : 'bg-red-500'))); ?>">
    <?php echo e($crop->status); ?>

</span>

                    </td>
                    <td class="border px-4 py-2 text-center">
                        <button onclick="saveCropToBlockchain(
                            <?php echo e($crop->id); ?>,
                            '<?php echo e($crop->name); ?>',
                            '<?php echo e($crop->planting_date); ?>',
                            '<?php echo e($crop->harvest_date); ?>',
                            '<?php echo e($crop->fertilizers_used); ?>',
                            '<?php echo e($crop->farm->name ?? 'N/A'); ?>'
                        )" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded">
                            Save to Blockchain
                        </button>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </tbody>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
    <script>
        // async function saveCropToBlockchain(cropId, cropName) 
         async function saveCropToBlockchain(cropId, name, plantingDate, harvestDate, fertilizersUsed, farmName){
            if (typeof window.ethereum !== 'undefined') {
                try {
                    await window.ethereum.request({ method: 'eth_requestAccounts' });
                    const web3 = new Web3(window.ethereum);

                    const contractAddress = '0xc3Fe7F0B18Afa35d9be8e9CE4bA24859aD45C7D6';
                    const contractABI = [{ "anonymous": false,
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
      "type": "function"}]; // عوضيه بملف الـ ABI الحقيقي

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