<x-filament-panels::page>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>
  @endpush

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
        @foreach ($this->crops as $crop)
          <tr>
            <td>{{ $crop['id'] }}</td>
            <td>{{ $crop['name'] }}</td>
            <td>{{ $crop['planting_date'] }}</td>
            <td>{{ $crop['harvest_date'] }}</td>
            <td class="italic">{{ $crop['fertilizers_used'] }}</td>
            <td>{{ $crop['farm']['name'] ?? 'N/A' }}</td>
            <td class="text-center">
              @if (!$crop['isBlockchain'])
                <form method="POST" action="{{ route('blockchain.send') }}">
                  @csrf
                  <input type="hidden" name="crop_id" value="{{ $crop['id'] }}">
                  <button type="submit" class="btn-chain">
                    🚀 Send to Chain
                  </button>
                </form>
              @else
                <span class="btn-disabled">
                  ✅ On Blockchain
                </span>
              @endif
            </td>
            <td class="text-center">
              <button onclick="generateQR(this)"
                      data-crop-id="{{ $crop['id'] }}"
                      class="btn-qr">
                🧾 QR Code
              </button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  

    {{-- <!-- <div class="flex gap-4 my-4"> -->
    <button onclick="reviewAllCrops()" class="px-4 py-2 bg-orange-500 text-dark border-2 border-orange-700 rounded hover:bg-orange-600">Review Before Saving</button>

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
            @foreach ($this->farms as $farm)
                <tr class="text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700">
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $farm['id'] }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $farm['name'] }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $farm['location'] }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $farm['size'] }} hectares</td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ count($farm['crops']) }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ count($farm['sensors']) }}</td>
                    <!-- <td class="border border-gray-300 dark:border-gray-700 px-4 py-2 text-center">
                        <button onclick="deleteRow(this)" class="px-2 py-1 bg-red-600 text-white rounded">🗑️</button>
                    </td> -->
                      <!-- <td class="border border-gray-300 dark:border-gray-700 px-4 py-2 text-center">
                       <button onclick="sendCropToAdmin({{ $crop['id'] }})" class="px-4 py-2 bg-green-500 text-dark border-2 bg-green-700 rounded hover:bg-green-600"> Send farm to Admin </button></td>
                </tr> -->
            @endforeach
        </tbody>
    </table> --}}

 
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


</x-filament-panels::page>
