<x-filament-panels::page>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>


    <h1 class="text-xl font-bold text-gray-900 dark:text-gray-100">Crops List</h1>

    <table id="cropsTable" class="min-w-full mt-4 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">ID <button class="delete-col-btn" onclick="deleteColumn(this)">🗑️</button></th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Name <button class="delete-col-btn" onclick="deleteColumn(this)">🗑️</button></th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Planting Date <button class="delete-col-btn" onclick="deleteColumn(this)">🗑️</button></th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Harvest Date <button class="delete-col-btn" onclick="deleteColumn(this)">🗑️</button></th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Fertilizers Used <button class="delete-col-btn" onclick="deleteColumn(this)">🗑️</button></th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Farm <button class="delete-col-btn" onclick="deleteColumn(this)">🗑️</button></th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($this->crops as $crop)
                <tr data-id="{{ $crop['id'] }}" class="text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700">
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $crop['id'] }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $crop['name'] }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $crop['planting_date'] }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $crop['harvest_date'] }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $crop['fertilizers_used'] }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $crop['farm']['name'] ?? 'N/A' }}</td>
                    <td class="border ... text-center space-x-2">
    <button onclick="deleteRow(this)" class="px-2 py-1 bg-red-600 text-white rounded">🗑️</button>
    <button onclick="generateQR(this)" class="px-2 py-1 bg-blue-600 text-black rounded">QR</button>
    <!-- الزر داخل عمود Action -->
    <button onclick="openCustomFieldModal('{{ $crop['id'] }}')" class="px-2 py-1 bg-yellow-400 text-black rounded">➕</button>

</td>


                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="flex gap-4 my-4">
    <button onclick="reviewAllCrops()" class="px-4 py-2 bg-orange-500 text-dark border-2 border-orange-700 rounded hover:bg-orange-600">Review Before Saving</button>

    <button onclick="uploadCropsToBlockchain()" class="px-4 py-2 bg-green-500 text-dark border-2 border-green-700 rounded hover:bg-green-600">Upload Crops to Blockchain</button>
    
    </div >
    <h1 class="text-xl font-bold mt-6 text-gray-900 dark:text-gray-100">Farms List</h1>

    <table id="farmsTable" class="min-w-full mt-4 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">ID <button class="delete-col-btn" onclick="deleteColumn(this)">🗑️</button></th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Name <button class="delete-col-btn" onclick="deleteColumn(this)">🗑️</button></th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Location <button class="delete-col-btn" onclick="deleteColumn(this)">🗑️</button></th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Size <button class="delete-col-btn" onclick="deleteColumn(this)">🗑️</button></th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Total Crops <button class="delete-col-btn" onclick="deleteColumn(this)">🗑️</button></th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Total Sensors <button class="delete-col-btn" onclick="deleteColumn(this)">🗑️</button></th>
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
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2 text-center">
                        <button onclick="deleteRow(this)" class="px-2 py-1 bg-red-600 text-white rounded">🗑️</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

 
    <div class="flex gap-4 my-4">
      <button onclick="uploadFarmsToBlockchain()" class="px-4 py-2 bg-green-500 text-dark border-2 border-green-700 rounded hover:bg-green-600">Upload Farms to Blockchain</button>
      <button onclick="sendCropsToAdmin()" class="px-4 py-2 bg-green-500 text-dark border-2 bg-green-700 rounded hover:bg-green-600">
    Send Crops to Admin
</button>

</div >


   


    <script>
        // حذف صف
        function deleteRow(button) {
            const row = button.closest('tr');
            if (confirm("Are you sure you want to delete this row?")) {
                row.remove();
            }
        }

        // حذف عمود
        function deleteColumn(button) {
            const th = button.closest('th');
            const table = th.closest('table');
            const columnIndex = Array.from(th.parentNode.children).indexOf(th);

            if (confirm("Are you sure you want to delete this column? This will delete all the cells in this column.")) {
                // حذف رأس العمود
                th.remove();

                // حذف كل الخلايا في هذا العمود بكل صف في tbody
                for (let row of table.tBodies[0].rows) {
                    row.cells[columnIndex].remove();
                }
            }
        }





       
function sendCropsToAdmin() {
    const cropIds = getCropIdsFromTable();

    fetch('/crops/send-to-admin', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'  // مهم جدًا للسلامة
        },
        body: JSON.stringify({ crop_ids: cropIds })
    })
    .then(response => response.json())
    .then(data => {
        alert('تم إرسال البيانات للأدمن للمراجعة.');
    })
    .catch(error => {
        console.error('حدث خطأ:', error);
        alert('فشل في إرسال البيانات.');
    });
}

function getCropIdsFromTable() {
    const rows = document.querySelectorAll('#cropsTable tbody tr');
    let ids = [];
    rows.forEach(row => {
        ids.push(row.getAttribute('data-id'));
    });
    return ids;
}





        // --- الكود الحالي لتحميل البيانات من البلوكشين (اختصار) ---
         async function uploadCropsToBlockchain() {
        try {
            if (typeof window.ethereum === "undefined") {
                alert("يرجى تثبيت MetaMask");
                return;
            }

            const web3 = new Web3(window.ethereum);
            await window.ethereum.request({ method: "eth_requestAccounts" });
            const account = (await web3.eth.getAccounts())[0];

            const contractAddress = "0xc3Fe7F0B18Afa35d9be8e9CE4bA24859aD45C7D6";
            const abi = [ {
      "anonymous": false,
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
    }];
            const contract = new web3.eth.Contract(abi, contractAddress);

            const tableRows = document.querySelectorAll("#cropsTable tbody tr");
            for (let row of tableRows) {
                const cells = row.querySelectorAll("td");
                const name = cells[1].textContent.trim();
                const plantingDate = cells[2].textContent.trim();
                const harvestDate = cells[3].textContent.trim();
                const fertilizersUsed = cells[4].textContent.trim();
                const farmName = cells[5].textContent.trim();

                await contract.methods.addCrop(name, plantingDate, harvestDate, fertilizersUsed, farmName)
                    .send({ from: account });
            }

            alert("Crop data has been successfully uploaded to the blockchain.");
        } catch (error) {
            console.error("Error while uploading crops:", error);
        }
    }

    async function uploadFarmsToBlockchain() {
        try {
            if (typeof window.ethereum === "undefined") {
                alert("يرجى تثبيت MetaMask");
                return;
            }

            const web3 = new Web3(window.ethereum);
            await window.ethereum.request({ method: "eth_requestAccounts" });
            const account = (await web3.eth.getAccounts())[0];

            const contractAddress = "0xc3Fe7F0B18Afa35d9be8e9CE4bA24859aD45C7D6";
            const abi = [ {
      "anonymous": false,
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
    }];
            const contract = new web3.eth.Contract(abi, contractAddress);

            const tableRows = document.querySelectorAll("#farmsTable tbody tr");
            for (let row of tableRows) {
                const cells = row.querySelectorAll("td");
                const name = cells[1].textContent.trim();
                const location = cells[2].textContent.trim();
                const size = parseFloat(cells[3].textContent); // تأكد من تحويله لرقم
                const totalCrops = parseInt(cells[4].textContent);
                const totalSensors = parseInt(cells[5].textContent);

                await contract.methods.addFarm(name, location, size, totalCrops, totalSensors)
                    .send({ from: account });
            }

            alert("Farm data has been successfully uploaded to the blockchain.");
        } catch (error) {
            console.error("Error while uploading farms:", error);
        }
    }






// !-- Add QR Modal 



 function generateQR(button) {
        const row = button.closest('tr');
        const cropId = row.cells[0].textContent.trim();

        const qrData = `http://localhost:8000/crop/${cropId}`;

        const qrContainer = document.getElementById('qrCodeContainer');
        qrContainer.innerHTML = ''; // إفراغ الحاوية القديمة

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


//!-- Modal لإدخال معلومات مخصصة -->

let currentCropRow = null;
const cropCustomFields = new Map(); // map of cropId => array of { key, value }

function openCustomFieldsModal(button) {
    currentCropRow = button.closest("tr");
    document.getElementById("customFieldsModal").classList.remove("hidden");
}

function closeModal() {
    document.getElementById("customFieldsModal").classList.add("hidden");
    document.getElementById("customKey").value = "";
    document.getElementById("customValue").value = "";
}

function addCustomField(cropId) {
    const nameInput = document.getElementById('customFieldName-' + cropId);
    const valueInput = document.getElementById('customFieldValue-' + cropId);
    const fieldName = nameInput.value.trim();
    const fieldValue = valueInput.value.trim();

    if (!fieldName || !fieldValue) {
        alert('Please enter a name and value for the custom information.');
        return;
    }


    
    // إدراج العمود الجديد في رأس الجدول قبل عمود Action
    const headerRow = document.querySelector("#cropsTable thead tr");
    const ths = headerRow.querySelectorAll("th");
    const actionIndex = Array.from(ths).findIndex(th => th.textContent.trim() === 'Action');

    // التأكد من أن العمود غير مكرر
    const existingHeaders = Array.from(ths).map(th => th.getAttribute('data-key'));
    if (!existingHeaders.includes(fieldName)) {
        const newTh = document.createElement("th");
        newTh.setAttribute("data-key", fieldName);
        newTh.className = "border border-gray-300 dark:border-gray-700 px-4 py-2";
        newTh.textContent = fieldName;
        headerRow.insertBefore(newTh, ths[actionIndex]);
    }

    // الآن نضيف القيمة في صف المحصول الموافق
    const rows = document.querySelectorAll("#cropsTable tbody tr");
    rows.forEach(row => {
        const rowId = row.getAttribute("data-id");
        const tds = row.querySelectorAll("td");
        const existingCells = row.querySelectorAll("td[data-key='" + fieldName + "']");
        const actionTd = tds[actionIndex];

        if (rowId === cropId) {
            // إذا لم يكن العمود موجود في الصف، أضف القيمة
            if (existingCells.length === 0) {
                const newTd = document.createElement("td");
                newTd.className = "border border-gray-300 dark:border-gray-700 px-4 py-2";
                newTd.setAttribute("data-key", fieldName);
                newTd.textContent = fieldValue;
                row.insertBefore(newTd, actionTd);
            }
        } else {
            // المحاصيل الأخرى - أضف خانة فارغة للحفاظ على التوازن
            if (existingCells.length === 0) {
                const emptyTd = document.createElement("td");
                emptyTd.className = "border border-gray-300 dark:border-gray-700 px-4 py-2";
                emptyTd.setAttribute("data-key", fieldName);
                emptyTd.textContent = "-";
                row.insertBefore(emptyTd, actionTd);
            }
        }
    });

    updateCropCustomFields(cropId);
    nameInput.value = "";
    valueInput.value = "";
   
    closeCustomFieldModal(cropId);
    
}

function updateCropCustomFields(cropId) {
    const customFields = [];
    const inputs = document.querySelectorAll(`#customFieldsContainer-${cropId} .custom-field-input`);
    inputs.forEach(input => {
        const key = input.dataset.key;
        const value = input.value.trim();
        if (key && value) {
            customFields.push({ key, value });
        }
    });
    cropCustomFields.set(cropId, customFields);
}


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

    alert("✅ Review Before Upload:\n\n" + summary.join("\n\n"));
}



    </script>






<!-- Custom Field Modal -->
<div id="customFieldModal-{{ $crop['id'] }}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-lg w-96">
        <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-4">Add Custom Information</h2>
        <input type="text" id="customFieldName-{{ $crop['id'] }}" placeholder="Information Name" class="w-full mb-2 px-3 py-2 border rounded">
        <input type="text" id="customFieldValue-{{ $crop['id'] }}" placeholder="Information Value" class="w-full mb-4 px-3 py-2 border rounded">
        <div class="flex justify-end gap-2">
            <button onclick="addCustomField('{{ $crop['id'] }}')" class="bg-green-500 px-4 py-2 rounded text-white">Add</button>
            <button onclick="closeCustomFieldModal('{{ $crop['id'] }}')" class="bg-red-500 px-4 py-2 rounded text-white">Cancel</button>
        </div>
    </div>
</div>


<script>
    function openCustomFieldModal(cropId) {
        document.getElementById("customFieldModal-" + cropId).classList.remove("hidden");
    }

    function closeCustomFieldModal(cropId) {
        document.getElementById("customFieldModal-" + cropId).classList.add("hidden");
    }
</script>




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

