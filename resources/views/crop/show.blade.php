<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AlgroTech - Blockchain Crop Data Viewer</title>
    <script src="https://cdn.jsdelivr.net/npm/web3@1.8.0/dist/web3.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: white;
            min-height: 100vh;
            padding: 20px;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(4, 120, 87, 0.2);
            overflow: hidden;
            border: 1px solid rgba(220, 252, 231, 0.3);
        }

        .header {
            background: linear-gradient(135deg, #047857 0%, #10b981 50%, #059669 100%);
            color: white;
            padding: 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(240, 253, 244, 0.2) 0%, transparent 70%);
            animation: pulse 4s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }

        h1#project-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(6, 95, 70, 0.4);
            position: relative;
            z-index: 1;
        }

        .subtitle {
            font-size: 1.2rem;
            font-weight: 300;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        .content {
            padding: 40px;
        }

        #crop-id {
            text-align: center;
            margin-bottom: 40px;
            font-size: 1.3rem;
            color: #047857;
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(4, 120, 87, 0.1);
            border: 1px solid #bbf7d0;
        }

        h2 {
            color: #047857;
            margin-bottom: 30px;
            font-weight: 600;
            font-size: 2rem;
            text-align: center;
            position: relative;
        }

        h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border-radius: 2px;
        }

        .table-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(4, 120, 87, 0.1);
            overflow: hidden;
            margin: 0 auto;
            max-width: 800px;
            margin-bottom: 40px;
            border: 1px solid #dcfce7;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 20px 25px;
            text-align: left;
            font-size: 1.1rem;
            border-bottom: 1px solid #dcfce7;
        }

        th {
            background: linear-gradient(135deg, #047857 0%, #10b981 100%);
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9rem;
        }

        td {
            background: white;
            transition: background-color 0.3s ease;
            color: #065f46;
        }

        tr:hover td {
            background: #f0fdf4;
        }

        .data-row {
            border-left: 4px solid transparent;
            transition: all 0.3s ease;
        }

        .data-row:hover {
            border-left-color: #10b981;
            transform: translateX(5px);
        }

        #blockchainData {
            text-align: center;
            font-size: 1.2rem;
            padding: 30px;
            border-radius: 15px;
            margin-top: 30px;
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            color: #047857;
            box-shadow: 0 5px 15px rgba(4, 120, 87, 0.1);
            position: relative;
            border: 1px solid #bbf7d0;
        }

        .loading {
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            color: #10b981;
        }

        .error {
            background: linear-gradient(135deg, #fef2f2 0%, #fecaca 100%);
            color: #dc2626;
            border: 1px solid #f87171;
        }

        .success {
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            color: #047857;
            border: 1px solid #10b981;
        }

        .spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid #dcfce7;
            border-top: 3px solid #10b981;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-right: 10px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .icon {
            display: inline-block;
            width: 24px;
            height: 24px;
            margin-right: 10px;
            vertical-align: middle;
        }

        .crop-icon { background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" fill="%2310b981" viewBox="0 0 24 24"><path d="M12 2L13.09 8.26L20 9L13.09 9.74L12 16L10.91 9.74L4 9L10.91 8.26L12 2Z"/></svg>') no-repeat center; }
        .date-icon { background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" fill="%2310b981" viewBox="0 0 24 24"><path d="M19 3H18V1H16V3H8V1H6V3H5C3.89 3 3 3.9 3 5V19C3 20.1 3.89 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3M19 19H5V8H19V19Z"/></svg>') no-repeat center; }
        .fertilizer-icon { background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" fill="%2310b981" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12S6.48 22 12 22 22 17.52 22 12 17.52 2 12 2M12 20C7.59 20 4 16.41 4 12S7.59 4 12 4 20 7.59 20 12 16.41 20 12 20M12 6C8.69 6 6 8.69 6 12S8.69 18 12 18 18 15.31 18 12 15.31 6 12 6Z"/></svg>') no-repeat center; }
        .farm-icon { background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" fill="%2310b981" viewBox="0 0 24 24"><path d="M12 2L13.09 8.26L20 9L13.09 9.74L12 16L10.91 9.74L4 9L10.91 8.26L12 2Z"/></svg>') no-repeat center; }

        @media (max-width: 768px) {
            .container {
                margin: 10px;
                border-radius: 15px;
            }
            
            .header {
                padding: 30px 20px;
            }
            
            h1#project-title {
                font-size: 2rem;
            }
            
            .content {
                padding: 20px;
            }
            
            th, td {
                padding: 15px;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 id="project-title">AlgroTech</h1>
            <p class="subtitle">Blockchain-Powered Agricultural Data Management</p>
        </div>
        
        <div class="content">
            <div id="crop-id">Crop Data Details (ID: {{ $id }})</div>

            <h2>Crop Information</h2>
            
            <div class="table-container">
                <table id="cropTable" style="display:none;">
                    <tbody>
                        <tr class="data-row">
                            <th><span class="icon crop-icon"></span>Crop Name</th>
                            <td id="cropName"></td>
                        </tr>
                        <tr class="data-row">
                            <th><span class="icon date-icon"></span>Planting Date</th>
                            <td id="plantingDate"></td>
                        </tr>
                        <tr class="data-row">
                            <th><span class="icon date-icon"></span>Harvest Date</th>
                            <td id="harvestDate"></td>
                        </tr>
                        <tr class="data-row">
                            <th><span class="icon fertilizer-icon"></span>Fertilizers Used</th>
                            <td id="fertilizersUsed"></td>
                        </tr>
                        <tr class="data-row">
                            <th><span class="icon farm-icon"></span>Farm Name</th>
                            <td id="farmName"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="blockchainData" class="loading">
                <span class="spinner"></span>Loading blockchain data...
            </div>
        </div>
    </div>

<script>
    if (typeof window.ethereum !== 'undefined') {
        const web3 = new Web3(window.ethereum);

        async function loadBlockchainData() {
            try {
                await window.ethereum.request({ method: 'eth_requestAccounts' });

                const contractAddress = "0x8570189a5AEb7b35ad3B4cDc8f9aeB4cbd507F54";

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
    }
  ],

                const contract = new web3.eth.Contract(abi, contractAddress);

                const cropId = {{ $id }};

                const cropCount = await contract.methods.getCropsCount().call();

                if (cropId >= cropCount) {
                    const blockchainDiv = document.getElementById('blockchainData');
                    blockchainDiv.className = 'error';
                    blockchainDiv.innerHTML = "This crop does not exist in the blockchain.";
                    return;
                }

                const data = await contract.methods.getCrop(cropId).call();

                // Display data in table
                document.getElementById('cropName').innerText = data[0];
                document.getElementById('plantingDate').innerText = data[1];
                document.getElementById('harvestDate').innerText = data[2];
                document.getElementById('fertilizersUsed').innerText = data[3];
                document.getElementById('farmName').innerText = data[4];

                // Update the crop details header with the crop name
                document.getElementById('crop-id').innerText = 'Crop Data Details: ' + data[0];

                document.getElementById('cropTable').style.display = 'table';
                
                const blockchainDiv = document.getElementById('blockchainData');
                blockchainDiv.className = 'success';
                blockchainDiv.innerHTML = "✅ Data successfully loaded from blockchain!";

            } catch (error) {
                const blockchainDiv = document.getElementById('blockchainData');
                blockchainDiv.className = 'error';
                blockchainDiv.innerHTML = "❌ Error loading data: " + error.message;
            }
        }

        loadBlockchainData();

    } else {
        const blockchainDiv = document.getElementById('blockchainData');
        blockchainDiv.className = 'error';
        blockchainDiv.innerHTML = "⚠️ Please install MetaMask or a Web3 wallet to continue.";
    }
</script>

</body>
</html>