<div class='space-y-4' x-data="{ 
    loading: false,
    cropId: {{ $crop->id }},
    name: '{{ $crop->name }}',
    plantingDate: '{{ $crop->planting_date }}',
    harvestDate: '{{ $crop->harvest_date }}',
    fertilizersUsed: '{{ $crop->fertilizers_used }}',
    farmName: '{{ $crop->farm->name ?? 'N/A' }}',
    
    async saveCropToBlockchain() {
        // Check if Web3 is available
        if (typeof window.Web3 === 'undefined') {
            alert('Web3 library not loaded. Please refresh the page and try again.');
            return;
        }

        if (typeof window.ethereum !== 'undefined') {
            this.loading = true;
            try {
                await window.ethereum.request({ method: 'eth_requestAccounts' });
                const web3 = new window.Web3(window.ethereum);

                const contractAddress = '0x0Bd2c6113896417AB36e96f200aB9c34B4d6F74e';
                const contractABI = [
                  {
      'anonymous': false,
      'inputs': [
        {
          'indexed': false,
          'internalType': 'uint256',
          'name': 'cropId',
          'type': 'uint256'
        },
        {
          'indexed': false,
          'internalType': 'string',
          'name': 'name',
          'type': 'string'
        },
        {
          'indexed': false,
          'internalType': 'string',
          'name': 'farmName',
          'type': 'string'
        }
      ],
      'name': 'CropAdded',
      'type': 'event'
    },
    {
      'anonymous': false,
      'inputs': [
        {
          'indexed': false,
          'internalType': 'uint256',
          'name': 'farmId',
          'type': 'uint256'
        },
        {
          'indexed': false,
          'internalType': 'string',
          'name': 'name',
          'type': 'string'
        },
        {
          'indexed': false,
          'internalType': 'string',
          'name': 'location',
          'type': 'string'
        }
      ],
      'name': 'FarmAdded',
      'type': 'event'
    },
    {
      'inputs': [
        {
          'internalType': 'string',
          'name': '_name',
          'type': 'string'
        },
        {
          'internalType': 'string',
          'name': '_plantingDate',
          'type': 'string'
        },
        {
          'internalType': 'string',
          'name': '_harvestDate',
          'type': 'string'
        },
        {
          'internalType': 'string',
          'name': '_fertilizersUsed',
          'type': 'string'
        },
        {
          'internalType': 'string',
          'name': '_farmName',
          'type': 'string'
        }
      ],
      'name': 'addCrop',
      'outputs': [],
      'stateMutability': 'nonpayable',
      'type': 'function'
    },
    {
      'inputs': [
        {
          'internalType': 'string',
          'name': '_name',
          'type': 'string'
        },
        {
          'internalType': 'string',
          'name': '_location',
          'type': 'string'
        },
        {
          'internalType': 'uint256',
          'name': '_size',
          'type': 'uint256'
        },
        {
          'internalType': 'uint256',
          'name': '_totalCrops',
          'type': 'uint256'
        },
        {
          'internalType': 'uint256',
          'name': '_totalSensors',
          'type': 'uint256'
        }
      ],
      'name': 'addFarm',
      'outputs': [],
      'stateMutability': 'nonpayable',
      'type': 'function'
    },
    {
      'inputs': [
        {
          'internalType': 'uint256',
          'name': '',
          'type': 'uint256'
        }
      ],
      'name': 'crops',
      'outputs': [
        {
          'internalType': 'string',
          'name': 'name',
          'type': 'string'
        },
        {
          'internalType': 'string',
          'name': 'plantingDate',
          'type': 'string'
        },
        {
          'internalType': 'string',
          'name': 'harvestDate',
          'type': 'string'
        },
        {
          'internalType': 'string',
          'name': 'fertilizersUsed',
          'type': 'string'
        },
        {
          'internalType': 'string',
          'name': 'farmName',
          'type': 'string'
        }
      ],
      'stateMutability': 'view',
      'type': 'function'
    },
    {
      'inputs': [
        {
          'internalType': 'uint256',
          'name': '',
          'type': 'uint256'
        }
      ],
      'name': 'farms',
      'outputs': [
        {
          'internalType': 'string',
          'name': 'name',
          'type': 'string'
        },
        {
          'internalType': 'string',
          'name': 'location',
          'type': 'string'
        },
        {
          'internalType': 'uint256',
          'name': 'size',
          'type': 'uint256'
        },
        {
          'internalType': 'uint256',
          'name': 'totalCrops',
          'type': 'uint256'
        },
        {
          'internalType': 'uint256',
          'name': 'totalSensors',
          'type': 'uint256'
        }
      ],
      'stateMutability': 'view',
      'type': 'function'
    },
    {
      'inputs': [
        {
          'internalType': 'uint256',
          'name': 'index',
          'type': 'uint256'
        }
      ],
      'name': 'getCrop',
      'outputs': [
        {
          'internalType': 'string',
          'name': '',
          'type': 'string'
        },
        {
          'internalType': 'string',
          'name': '',
          'type': 'string'
        },
        {
          'internalType': 'string',
          'name': '',
          'type': 'string'
        },
        {
          'internalType': 'string',
          'name': '',
          'type': 'string'
        },
        {
          'internalType': 'string',
          'name': '',
          'type': 'string'
        }
      ],
      'stateMutability': 'view',
      'type': 'function'
    },
    {
      'inputs': [],
      'name': 'getCropsCount',
      'outputs': [
        {
          'internalType': 'uint256',
          'name': '',
          'type': 'uint256'
        }
      ],
      'stateMutability': 'view',
      'type': 'function'
    },
    {
      'inputs': [
        {
          'internalType': 'uint256',
          'name': 'index',
          'type': 'uint256'
        }
      ],
      'name': 'getFarm',
      'outputs': [
        {
          'internalType': 'string',
          'name': '',
          'type': 'string'
        },
        {
          'internalType': 'string',
          'name': '',
          'type': 'string'
        },
        {
          'internalType': 'uint256',
          'name': '',
          'type': 'uint256'
        },
        {
          'internalType': 'uint256',
          'name': '',
          'type': 'uint256'
        },
        {
          'internalType': 'uint256',
          'name': '',
          'type': 'uint256'
        }
      ],
      'stateMutability': 'view',
      'type': 'function'
    },
    {
      'inputs': [],
      'name': 'getFarmsCount',
      'outputs': [
        {
          'internalType': 'uint256',
          'name': '',
          'type': 'uint256'
        }
      ],
      'stateMutability': 'view',
      'type': 'function'
    }
                ];

                const contract = new web3.eth.Contract(contractABI, contractAddress);
                const accounts = await web3.eth.getAccounts();

                const receipt = await contract.methods
                    .addCrop(this.name, this.plantingDate, this.harvestDate, this.fertilizersUsed, this.farmName)
                    .send({ from: accounts[0] });

                console.log('Transaction receipt:', receipt);

                // إبلاغ Laravel أن المحصول تم رفعه للبلوكشاين
                const res = await fetch(`/admin/mark-crop-stored/${this.cropId}`, {
                    method: 'POST',
                    headers: { 
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                });
                
                

                alert('Crop stored on blockchain successfully!');
                window.location.reload();

            } catch (error) {
                console.error(error);
                alert('Error saving crop to blockchain: ' + error.message);
            } finally {
                this.loading = false;
            }
        } else {
            alert('Please install MetaMask.');
        }
    },

    // Initialize Web3 when component loads
    init() {
        this.loadWeb3();
    },

    async loadWeb3() {
        if (typeof window.Web3 === 'undefined') {
            try {
                // Dynamically load Web3 if not available
                const script = document.createElement('script');
                script.src = 'https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js';
                script.onload = () => {
                    console.log('Web3 loaded successfully');
                };
                script.onerror = () => {
                    console.error('Failed to load Web3');
                };
                document.head.appendChild(script);
            } catch (error) {
                console.error('Error loading Web3:', error);
            }
        }
    }
}">
    <div class='grid grid-cols-2 gap-4'>
        <div>
            <p class='text-sm font-medium text-gray-500'>Crop Name</p>
            <p>{{ $crop->name }}</p>
        </div>
        <div>
            <p class='text-sm font-medium text-gray-500'>Farm</p>
            <p>{{ $crop->farm->name ?? 'N/A' }}</p>
        </div>
    </div>
    
    <div class='grid grid-cols-2 gap-4'>
        <div>
            <p class='text-sm font-medium text-gray-500'>Planting Date</p>
            <p>{{ $crop->planting_date}}</p>
        </div>
        <div>
            <p class='text-sm font-medium text-gray-500'>Harvest Date</p>
            <p>{{ $crop->harvest_date }}</p>
        </div>
    </div>
    
    <div>
        <p class='text-sm font-medium text-gray-500'>Fertilizers Used</p>
        <p>{{ $crop->fertilizers_used ?? 'None recorded' }}</p>
    </div>

    <style>
        .blockchain-button {
            background-color: #2563eb; /* blue-600 */
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 6px;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s ease, opacity 0.2s ease;
        }

        .blockchain-button:hover:not(:disabled) {
            background-color: #1d4ed8; /* blue-700 */
        }

        .blockchain-button:disabled {
            background-color: #9ca3af; /* gray-400 */
            cursor: not-allowed;
            opacity: 0.7;
        }
    </style>
    
    <button 
        @click='saveCropToBlockchain()' 
        :disabled='loading'
        class='blockchain-button'
    >
        <span x-show='!loading'>Save to Blockchain</span>
        <span x-show='loading'>Saving...</span>
          <meta name='csrf-token' content='{{ csrf_token() }}'>
    </button>
</div>