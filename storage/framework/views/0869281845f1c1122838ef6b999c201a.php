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

  <?php $__env->startPush('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>
  <?php $__env->stopPush(); ?>

  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
    }

    h1 {
      font-size: 2.75rem;
      font-weight: 800;
      text-align: center;
      color: #16a34a;
      margin-bottom: 2.5rem;
      text-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }

    .dashboard-container {
      overflow-x: auto;
      border-radius: 1.5rem;
      backdrop-filter: blur(12px);
      background: rgba(255, 255, 255, 0.75);
      box-shadow: 0 10px 30px rgba(0, 128, 0, 0.1);
      padding: 1.5rem;
      border: 1px solid rgba(34, 197, 94, 0.3);
      transition: all 0.3s ease-in-out;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      border-radius: 1rem;
      overflow: hidden;
    }

    thead tr {
      background: linear-gradient(to right, #d9f99d, #bbf7d0, #ecfccb); /* green-lime gradients */
      color: #000000;
      text-transform: uppercase;
      font-size: 0.85rem;
      font-weight: bold;
      box-shadow: 0 2px 4px rgba(0, 128, 0, 0.1);
    }

    th, td {
      padding: 1rem;
      text-align: left;
    }

    tbody {
      background: rgba(255, 255, 255, 0.6);
      backdrop-filter: blur(6px);
    }

    tbody tr {
      transition: 0.3s ease;
      color: #000000; /* gray-800 */
    }

    tbody tr:hover {
      background-color: #ecfdf5; /* green-50 */
      transform: scale(1.01);
      box-shadow: 0 4px 12px rgba(0, 128, 0, 0.1);
    }

    td.italic {
      font-style: italic;
      color: #000000;
    }

    .btn-chain {
      padding: 0.5rem 1.25rem;
      border-radius: 9999px;
      background: linear-gradient(to bottom right, #10b981, #22c55e, #84cc16);
      color: white;
      font-weight: 600;
      box-shadow: 0 4px 8px rgba(0, 128, 0, 0.3);
      transition: all 0.3s ease;
      cursor: pointer;
      border: none;
    }

    .btn-chain:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 12px rgba(0, 128, 0, 0.5);
    }

    .btn-disabled {
      background-color: rgba(34, 197, 94, 0.15);
      color: #ffffff;
      padding: 0.5rem 1rem;
      border-radius: 9999px;
      font-weight: 500;
      cursor: not-allowed;
    }

    .btn-qr {
      background: linear-gradient(to right, #65a30d, #047857);
      color: white;
      padding: 0.5rem 1rem;
      border-radius: 9999px;
      font-weight: 600;
      box-shadow: 0 4px 8px rgba(0, 128, 0, 0.2);
      transition: all 0.3s ease;
      border: none;
    }

    .btn-qr:hover {
      box-shadow: 0 6px 14px rgba(0, 128, 0, 0.4);
      background: linear-gradient(to right, #4d7c0f, #065f46);
    }

    /* Dark mode support */
    @media (prefers-color-scheme: dark) {
      

      .dashboard-container {
        background: rgba(5, 46, 22, 0.5);
        border-color: rgba(132, 204, 22, 0.3);
      }

      thead tr {
        background: linear-gradient(to right, #064e3b, #065f46, #365314);
        color: #000000;
      }

      tbody {
        background: rgba(5, 46, 22, 0.4);
        color: #000000;
      }

      tbody tr:hover {
        background-color: #022c22;
      }

      .btn-disabled {
        color: #ffffff;
        background-color: rgba(34, 197, 94, 0.2);
      }
    }
  </style>

  <h1>🌱 Crops Dashboard</h1>

  <div class="dashboard-container">
    <table id="cropsTable">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Planting Date</th>
          <th>Harvest Date</th>
          <th>Fertilizers Used</th>
          <th>Farm</th>
          <th class="text-center">Blockchain</th>
          <th class="text-center">QR</th>
        </tr>
      </thead>
      <tbody>
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->crops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($crop['id']); ?></td>
            <td><?php echo e($crop['name']); ?></td>
            <td><?php echo e($crop['planting_date']); ?></td>
            <td><?php echo e($crop['harvest_date']); ?></td>
            <td class="italic"><?php echo e($crop['fertilizers_used']); ?></td>
            <td><?php echo e($crop['farm']['name'] ?? 'N/A'); ?></td>
            <td class="text-center">
              <!--[if BLOCK]><![endif]--><?php if(!$crop['isBlockchain']): ?>
                <form method="POST" action="<?php echo e(route('blockchain.send')); ?>">
                  <?php echo csrf_field(); ?>
                  <input type="hidden" name="crop_id" value="<?php echo e($crop['id']); ?>">
                  <button type="submit" class="btn-chain">
                    🚀 Send to Chain
                  </button>
                </form>
              <?php else: ?>
                <span class="btn-disabled">
                  ✅ On Blockchain
                </span>
              <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </td>
            <td class="text-center">
              <button onclick="generateQR(this)"
                      data-crop-id="<?php echo e($crop['id']); ?>"
                      class="btn-qr">
                🧾 QR Code
              </button>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
      </tbody>
    </table>
  </div>
  

    

 
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