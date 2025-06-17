<x-filament-panels::page>

    

    <!-- Tailwind safelist colors -->
<div class="hidden">
    bg-green-600 bg-yellow-500 bg-gray-500 bg-red-500 hover:bg-gray-100 text-white
</div>
@php
    $cropId = session('review_crop_id');
    $highlightCropId = $cropId ?? null;
    @endphp
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Review & Save Crops to Blockchain</h1>

    <form method="GET" class="mb-4">
        <label for="status" class="mr-2 font-semibold text-gray-700">Filter by status:</label>
        <select name="status" id="status" onchange="this.form.submit()" class="px-5 py-1 border rounded text-black bg-white">
            <option value="">All</option>
            <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="stored" {{ request('status') == 'stored' ? 'selected' : '' }}>Stored</option>
        </select>
    </form>

    <table class="min-w-full border border-gray-300 rounded-lg overflow-hidden text-sm text-gray-800">
        <thead class="bg-gray-200 text-gray-700">
            <tr>
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">Name</th>
                <th class="px-4 py-2 border">Sender</th>
                <th class="px-4 py-2 border">Farm</th>
                <th class="px-4 py-2 border">Planting Date</th>
                <th class="px-4 py-2 border">Harvest Date</th>
                <th class="px-4 py-2 border">Fertilizers</th>
                <th class="px-4 py-2 border">Status</th>
                <th class="px-4 py-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($crops as $crop)
                <tr class="hover:bg-gray-50 {{ $highlightCropId == $crop->id ? 'bg-yellow-100' : 'bg-white' }}" data-id="{{ $crop->id }}">
                    <td class="border px-4 py-2">{{ $crop->id }}</td>
                    <td class="border px-4 py-2">{{ $crop->name }}</td>
                    <td class="border px-4 py-2">{{ $crop->user->name ?? 'Unknown' }}</td> 
                    <td class="border px-4 py-2">{{ $crop->farm->name ?? 'N/A' }}</td>
                    <td class="border px-4 py-2">{{ $crop->planting_date }}</td>
                    <td class="border px-4 py-2">{{ $crop->harvest_date }}</td>
                    <td class="border px-4 py-2">{{ $crop->fertilizers_used }}</td>
                    <td class="border px-4 py-2">
                      <span class="px-2 py-1 text-xs font-medium rounded-full text-white
    @if($crop->status === 'stored') bg-green-600
    @elseif($crop->status === 'pending') bg-yellow-500
    @elseif($crop->status === 'draft') bg-gray-500
    @else bg-red-500 @endif">
    {{ $crop->status }}
</span>


                    </td>
                    <td class="border px-4 py-2 text-center">
                        <button onclick="saveCropToBlockchain(
                            {{ $crop->id }},
                            '{{ $crop->name }}',
                            '{{ $crop->planting_date }}',
                            '{{ $crop->harvest_date }}',
                            '{{ $crop->fertilizers_used }}',
                            '{{ $crop->farm->name ?? 'N/A' }}'
                        )" class="bg-blue-600 hover:bg-blue-700 text-black px-3 py-1 rounded">
                            Save to Blockchain
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h1 class="text-xl font-bold text-gray-900 dark:text-gray-100 mt-10">Farms List</h1>

<table id="farmsTable" class="min-w-full mt-4 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded-lg overflow-hidden">
    <thead>
        <tr class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
            <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">ID</th>
            <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Name</th>
            <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Location</th>
            <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Size</th>
            <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Total Crops</th>
            <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Total Sensors</th>
            <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Action</th>
        </tr>
    </thead>
    <tbody>
       @foreach ($farms as $farm)

            <tr class="text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700">
                <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $farm['id'] }}</td>
                <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $farm['name'] }}</td>
                <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $farm['location'] }}</td>
                <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $farm['size'] }}</td>
                <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $farm['total_crops'] }}</td>
                <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $farm['total_sensors'] }}</td>
                <td class="border border-gray-300 dark:border-gray-700 px-4 py-2 text-center">
    <button 
        onclick='saveFarmToBlockchain(
            @json($farm["name"]),
            @json($farm["location"]),
            {{ $farm["size"] }},
            {{ $farm["total_crops"] }},
            {{ $farm["total_sensors"] }}
        )' 
        class="px-4 py-2 bg-blue-500 text-black rounded hover:bg-blue-600">
        Save to Blockchain
    </button>
</td>

            </tr>
        @endforeach
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
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                              });
                         if (!res.ok) throw new Error('Laravel update failed');
                    
                    // fetch(`/admin/mark-crop-stored/${cropId}`, {
                    //     method: 'POST',
                    //     headers: {
                    //         'Content-Type': 'application/json',
                    //         'X-CSRF-TOKEN': '{{ csrf_token() }}'
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
</x-filament-panels::page>





















