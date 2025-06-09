
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <title>Crops Page - Upload to Blockchain</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
</head>
<body class="bg-gray-100 p-6 text-gray-900">

<h1 class="text-2xl font-bold mb-4">Crops List</h1>

<table class="min-w-full border border-gray-300 bg-white rounded-lg overflow-hidden">
    <thead>
        <tr class="bg-gray-200 text-gray-900">
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Planting Date</th>
            <th class="border px-4 py-2">Harvest Date</th>
            <th class="border px-4 py-2">Fertilizers Used</th>
        </tr>
    </thead>
    <tbody id="cropsTableBody">
        {{-- Pass $crops variable from controller --}}
        @foreach ($crops as $crop)
        <tr class="text-center">
            <td class="border px-4 py-2">{{ $crop->id }}</td>
            <td class="border px-4 py-2">{{ $crop->name }}</td>
            <td class="border px-4 py-2">{{ $crop->planting_date }}</td>
            <td class="border px-4 py-2">{{ $crop->harvest_date }}</td>
            <td class="border px-4 py-2">{{ $crop->fertilizers_used }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-6">
    <button
        onclick="uploadCropsToBlockchain()"
        class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700"
    >
        Upload Crops to Blockchain
    </button>
</div>

<script>
async function uploadCropsToBlockchain() {
    if (typeof window.ethereum === 'undefined') {
        alert('Please install MetaMask first!');
        return;
    }

    try {
        await window.ethereum.request({ method: 'eth_requestAccounts' });

        const web3 = new Web3(window.ethereum);

        const contractAddress = '0xc3Fe7F0B18Afa35d9be8e9CE4bA24859aD45C7D6';

        const contractABI = [
            {
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
            }
        ];

        const contract = new web3.eth.Contract(contractABI, contractAddress);

        const crops = [];
        const rows = document.querySelectorAll('#cropsTableBody tr');

        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            crops.push({
                id: parseInt(cells[0].textContent.trim()),
                name: cells[1].textContent.trim(),
                plantingDate: cells[2].textContent.trim(),
                harvestDate: cells[3].textContent.trim(),
                fertilizersUsed: cells[4].textContent.trim()
            });
        });

        const accounts = await web3.eth.getAccounts();

        await contract.methods.uploadCrops(crops).send({ from: accounts[0] });

        alert('Crops data successfully uploaded to blockchain!');
    } catch (error) {
        console.error('Error uploading data:', error);
        alert('An error occurred while uploading. Check console for details.');
    }
}
</script>

</body>
</html>




<!-- <x-filament::page>
    <h2 class="text-2xl font-bold mb-4">Save to Blockchain</h2>

    <table class="min-w-full divide-y divide-gray-200 border">
        <thead class="bg-white-100">
            <tr>
                <th class="px-4 py-2 text-left">Farmer</th>
                <th class="px-4 py-2 text-left">Data</th>
                <th class="px-4 py-2 text-left">Status</th>
                <th class="px-4 py-2 text-left">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($this->requests as $request)
                <tr>
                    <td class="px-4 py-2">{{ $request->farmer->name }}</td>
                    <td class="px-4 py-2">{{ $request->data }}</td>
                    <td class="px-4 py-2">
                        @if($request->is_saved_to_blockchain)
                            ✅ Saved
                        @else
                            ❌ Pending
                        @endif
                    </td>
                    <td class="px-4 py-2">
                        @if(!$request->is_saved_to_blockchain)
                            <form method="POST" action="{{ route('admin.blockchain.save', $request->id) }}">
                                @csrf
                                <x-filament::button type="submit" color="primary" size="sm">
                                    Save Now
                                </x-filament::button>
                            </form>
                        @else
                            <span class="text-gray-400 text-sm">Already Saved</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-filament::page> -->
