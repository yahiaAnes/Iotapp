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


    <h1 class="text-xl font-bold text-gray-900 dark:text-gray-100">Crops List</h1>

    <table id="cropsTable" class="min-w-full mt-4 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">ID </th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Name </th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Planting Date </th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Harvest Date </th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Fertilizers Used </th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Farm </th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Action</th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->crops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr data-id="<?php echo e($crop['id']); ?>" class="text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700">
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2"><?php echo e($crop['id']); ?></td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2"><?php echo e($crop['name']); ?></td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2"><?php echo e($crop['planting_date']); ?></td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2"><?php echo e($crop['harvest_date']); ?></td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2"><?php echo e($crop['fertilizers_used']); ?></td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2"><?php echo e($crop['farm']['name'] ?? 'N/A'); ?></td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2 text-center">
                       <button onclick="sendCropToAdmin(<?php echo e($crop['id']); ?>)" class="px-4 py-2 bg-green-500 text-dark border-2 bg-green-700 rounded hover:bg-green-600"> Send Crops to Admin </button></td>
                    <td class="border ... text-center space-x-2">
                        <button onclick="generateQR(this)" data-crop-id="<?php echo e($crop['id']); ?>" class="bg-indigo-600 text-white px-3 py-1 rounded">
    Generate QR
</button>

    <!-- <button onclick="deleteRow(this)" class="px-2 py-1 bg-red-600 text-white rounded">🗑️</button> -->
    <!-- <button onclick="generateQR(this)" class="px-2 py-1 bg-blue-600 text-black rounded">QR</button> -->
    <!-- الزر داخل عمود Action -->
    <!-- <button onclick="openCustomFieldModal('<?php echo e($crop['id']); ?>')" class="px-2 py-1 bg-yellow-400 text-black rounded">➕</button> -->

</td>


                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </tbody>
    </table>

    <!-- <div class="flex gap-4 my-4"> -->
    <button onclick="reviewAllCrops()" class="px-4 py-2 bg-orange-500 text-dark border-2 border-orange-700 rounded hover:bg-orange-600">Review Before Saving</button>
<!-- 
    <button onclick="uploadCropsToBlockchain()" class="px-4 py-2 bg-green-500 text-dark border-2 border-green-700 rounded hover:bg-green-600">Upload Crops to Blockchain</button>
    
    </div > -->
    <h1 class="text-xl font-bold mt-6 text-gray-900 dark:text-gray-100">Farms List</h1>

    <table id="farmsTable" class="min-w-full mt-4 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">ID </th>  <!-- <button class="delete-col-btn" onclick="deleteColumn(this)">🗑️</button> -->
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Name </th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Location </th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Size</th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Total Crops </th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Total Sensors </th>
                <!-- <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Action</th> -->
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->farms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $farm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700">
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2"><?php echo e($farm['id']); ?></td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2"><?php echo e($farm['name']); ?></td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2"><?php echo e($farm['location']); ?></td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2"><?php echo e($farm['size']); ?> hectares</td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2"><?php echo e(count($farm['crops'])); ?></td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2"><?php echo e(count($farm['sensors'])); ?></td>
                    <!-- <td class="border border-gray-300 dark:border-gray-700 px-4 py-2 text-center">
                        <button onclick="deleteRow(this)" class="px-2 py-1 bg-red-600 text-white rounded">🗑️</button>
                    </td> -->
                      <td class="border border-gray-300 dark:border-gray-700 px-4 py-2 text-center">
                       <button onclick="sendCropToAdmin(<?php echo e($crop['id']); ?>)" class="px-4 py-2 bg-green-500 text-dark border-2 bg-green-700 rounded hover:bg-green-600"> Send farm to Admin </button></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </tbody>
    </table>

 
    


   


    <script>
        // // deleteRow
        // function deleteRow(button) {
        //     const row = button.closest('tr');
        //     if (confirm("Are you sure you want to delete this row?")) {
        //         row.remove();
        //     }
        // }

        // // deleteColumn
        // function deleteColumn(button) {
        //     const th = button.closest('th');
        //     const table = th.closest('table');
        //     const columnIndex = Array.from(th.parentNode.children).indexOf(th);

        //     if (confirm("Are you sure you want to delete this column? This will delete all the cells in this column.")) {
        //         th.remove();


        //         for (let row of table.tBodies[0].rows) {
        //             row.cells[columnIndex].remove();
        //         }
        //     }
        // }

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



// !-- Add QR Modal 

//  function generateQR(button) {
//         const row = button.closest('tr');
//         const cropId = row.cells[0].textContent.trim();

//         const qrData = `http://localhost:8000/crop/${cropId}`;

//         const qrContainer = document.getElementById('qrCodeContainer');
//         qrContainer.innerHTML = ''; // إفراغ الحاوية القديمة

//         new QRCode(qrContainer, {
//             text: qrData,
//             width: 200,
//             height: 200,
//         });

//         document.getElementById('qrModal').classList.remove('hidden');
//     }
function generateQR(button) {
    const cropId = button.dataset.cropId;

    const qrData = `http://localhost:8000/crop/${cropId}`; // عدل للدومين الحقيقي عند النشر

    const qrContainer = document.getElementById('qrCodeContainer');
    qrContainer.innerHTML = ''; // مسح QR السابق

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


// //!-- Modal -->

// let currentCropRow = null;
// const cropCustomFields = new Map(); // map of cropId => array of { key, value }

// function openCustomFieldsModal(button) {
//     currentCropRow = button.closest("tr");
//     document.getElementById("customFieldsModal").classList.remove("hidden");
// }

// function closeModal() {
//     document.getElementById("customFieldsModal").classList.add("hidden");
//     document.getElementById("customKey").value = "";
//     document.getElementById("customValue").value = "";
// }

// function addCustomField(cropId) {
//     const nameInput = document.getElementById('customFieldName-' + cropId);
//     const valueInput = document.getElementById('customFieldValue-' + cropId);
//     const fieldName = nameInput.value.trim();
//     const fieldValue = valueInput.value.trim();

//     if (!fieldName || !fieldValue) {
//         alert('Please enter a name and value for the custom information.');
//         return;
//     }


    
    // // headerRow befor action
    // const headerRow = document.querySelector("#cropsTable thead tr");
    // const ths = headerRow.querySelectorAll("th");
    // const actionIndex = Array.from(ths).findIndex(th => th.textContent.trim() === 'Action');

    // // existingHeaders
    // const existingHeaders = Array.from(ths).map(th => th.getAttribute('data-key'));
    // if (!existingHeaders.includes(fieldName)) {
    //     const newTh = document.createElement("th");
    //     newTh.setAttribute("data-key", fieldName);
    //     newTh.className = "border border-gray-300 dark:border-gray-700 px-4 py-2";
    //     newTh.textContent = fieldName;
    //     headerRow.insertBefore(newTh, ths[actionIndex]);
    // }

    // add crops
//     const rows = document.querySelectorAll("#cropsTable tbody tr");
//     rows.forEach(row => {
//         const rowId = row.getAttribute("data-id");
//         const tds = row.querySelectorAll("td");
//         const existingCells = row.querySelectorAll("td[data-key='" + fieldName + "']");
//         const actionTd = tds[actionIndex];

//         if (rowId === cropId) {
            
//             if (existingCells.length === 0) {
//                 const newTd = document.createElement("td");
//                 newTd.className = "border border-gray-300 dark:border-gray-700 px-4 py-2";
//                 newTd.setAttribute("data-key", fieldName);
//                 newTd.textContent = fieldValue;
//                 row.insertBefore(newTd, actionTd);
//             }
//         } else {
          
//             if (existingCells.length === 0) {
//                 const emptyTd = document.createElement("td");
//                 emptyTd.className = "border border-gray-300 dark:border-gray-700 px-4 py-2";
//                 emptyTd.setAttribute("data-key", fieldName);
//                 emptyTd.textContent = "-";
//                 row.insertBefore(emptyTd, actionTd);
//             }
//         }
//     });

//     updateCropCustomFields(cropId);
//     nameInput.value = "";
//     valueInput.value = "";
   
//     closeCustomFieldModal(cropId);
    
// }

// function updateCropCustomFields(cropId) {
//     const customFields = [];
//     const inputs = document.querySelectorAll(`#customFieldsContainer-${cropId} .custom-field-input`);
//     inputs.forEach(input => {
//         const key = input.dataset.key;
//         const value = input.value.trim();
//         if (key && value) {
//             customFields.push({ key, value });
//         }
//     });
//     cropCustomFields.set(cropId, customFields);
// }


//review All Crops

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






<!-- Custom Field Modal -->
<div id="customFieldModal-<?php echo e($crop['id']); ?>" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-lg w-96">
        <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-4">Add Custom Information</h2>
        <input type="text" id="customFieldName-<?php echo e($crop['id']); ?>" placeholder="Information Name" class="w-full mb-2 px-3 py-2 border rounded">
        <input type="text" id="customFieldValue-<?php echo e($crop['id']); ?>" placeholder="Information Value" class="w-full mb-4 px-3 py-2 border rounded">
        <div class="flex justify-end gap-2">
            <button onclick="addCustomField('<?php echo e($crop['id']); ?>')" class="bg-green-500 px-4 py-2 rounded text-white">Add</button>
            <button onclick="closeCustomFieldModal('<?php echo e($crop['id']); ?>')" class="bg-red-500 px-4 py-2 rounded text-white">Cancel</button>
        </div>
    </div>
</div>


<!-- <script>
    function openCustomFieldModal(cropId) {
        document.getElementById("customFieldModal-" + cropId).classList.remove("hidden");
    }

    function closeCustomFieldModal(cropId) {
        document.getElementById("customFieldModal-" + cropId).classList.add("hidden");
    }
</script> -->




<!-- Add QR Modal -->
<div id="qrModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-lg text-center">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">QR Code</h2>
        <div id="qrCodeContainer"></div>
         <button onclick="downloadQRImage()" class="bg-green-500 text-black px-4 py-2 rounded mb-2"> download QR Image </button><br>
        <button onclick="closeQRModal()" class="mt-4 px-4 py-2 bg-red-500 text-black rounded">Close</button>
    </div>
</div>


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