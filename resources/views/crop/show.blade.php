<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>AlgroTech - Blockchain Crop Data Viewer</title>
  <script src="https://cdn.jsdelivr.net/npm/web3@1.8.0/dist/web3.min.js"></script>
  <style>
      @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Inter', sans-serif;
  background: #ffffff;
  min-height: 100vh;
  padding: 20px;
  color: #065f46;
  position: relative;
  overflow-x: hidden;
}

body::before {
  content: '';
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: 
    radial-gradient(circle at 20% 80%, rgba(16, 185, 129, 0.1) 0%, transparent 50%),
    radial-gradient(circle at 80% 20%, rgba(5, 150, 105, 0.1) 0%, transparent 50%),
    radial-gradient(circle at 40% 40%, rgba(4, 120, 87, 0.05) 0%, transparent 50%);
  pointer-events: none;
  z-index: -1;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(20px);
  border-radius: 24px;
  box-shadow: 
    0 25px 50px rgba(4, 120, 87, 0.15),
    0 10px 25px rgba(16, 185, 129, 0.1),
    inset 0 1px 0 rgba(255, 255, 255, 0.6);
  overflow: hidden;
  border: 1px solid rgba(220, 252, 231, 0.5);
  animation: containerFloat 6s ease-in-out infinite;
}

@keyframes containerFloat {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-5px); }
}

.header {
  background: linear-gradient(135deg, 
    #047857 0%, 
    #059669 25%,
    #10b981 50%,
    #059669 75%,
    #047857 100%);
  color: white;
  padding: 50px 40px;
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
  background: 
    radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%),
    conic-gradient(from 0deg, transparent, rgba(255,255,255,0.1), transparent);
  animation: headerPulse 8s ease-in-out infinite;
}

@keyframes headerPulse {
  0%, 100% { transform: scale(1) rotate(0deg); opacity: 0.5; }
  50% { transform: scale(1.1) rotate(180deg); opacity: 0.8; }
}

.header::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 4px;
  background: linear-gradient(90deg, 
    #dcfce7, 
    #bbf7d0, 
    #dcfce7);
  animation: shimmer 3s ease-in-out infinite;
}

@keyframes shimmer {
  0%, 100% { opacity: 0.6; }
  50% { opacity: 1; }
}

h1#project-title {
  font-size: 3.5rem;
  font-weight: 800;
  margin-bottom: 15px;
  text-shadow: 
    2px 2px 4px rgba(0,0,0,0.3),
    0 0 20px rgba(255,255,255,0.2);
  position: relative;
  z-index: 1;
  letter-spacing: -0.02em;
  background: linear-gradient(135deg, #ffffff, #f0fdf4);
  background-clip: text;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: titleGlow 4s ease-in-out infinite alternate;
}

@keyframes titleGlow {
  0% { filter: drop-shadow(0 0 10px rgba(255,255,255,0.3)); }
  100% { filter: drop-shadow(0 0 20px rgba(255,255,255,0.5)); }
}

.subtitle {
  font-size: 1.3rem;
  font-weight: 400;
  opacity: 0.95;
  position: relative;
  z-index: 1;
  color: #f0fdf4;
  text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
  letter-spacing: 0.5px;
}

.content {
  padding: 50px 40px;
  background: linear-gradient(180deg, 
    rgba(240, 253, 244, 0.3) 0%,
    rgba(255, 255, 255, 0.1) 100%);
}

#crop-id {
  text-align: center;
  margin-bottom: 50px;
  font-size: 1.4rem;
  font-weight: 600;
  color: #047857;
  background: linear-gradient(135deg, 
    #f0fdf4 0%, 
    #dcfce7 50%,
    #f0fdf4 100%);
  padding: 25px 30px;
  border-radius: 20px;
  box-shadow: 
    0 10px 25px rgba(4, 120, 87, 0.1),
    inset 0 1px 0 rgba(255, 255, 255, 0.8);
  border: 2px solid #bbf7d0;
  position: relative;
  overflow: hidden;
}

#crop-id::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, 
    transparent, 
    rgba(16, 185, 129, 0.1), 
    transparent);
  animation: slideShine 3s ease-in-out infinite;
}

@keyframes slideShine {
  0% { left: -100%; }
  50% { left: 100%; }
  100% { left: 100%; }
}

h2 {
  color: #047857;
  margin-bottom: 40px;
  font-weight: 700;
  font-size: 2.2rem;
  text-align: center;
  position: relative;
  letter-spacing: -0.01em;
}

h2::after {
  content: '';
  position: absolute;
  bottom: -15px;
  left: 50%;
  transform: translateX(-50%);
  width: 100px;
  height: 5px;
  background: linear-gradient(135deg, 
    #10b981 0%, 
    #059669 50%,
    #047857 100%);
  border-radius: 3px;
  box-shadow: 0 2px 10px rgba(16, 185, 129, 0.3);
}

.table-container {
  background: linear-gradient(135deg, 
    rgba(255, 255, 255, 0.95) 0%,
    rgba(240, 253, 244, 0.8) 100%);
  border-radius: 24px;
  box-shadow: 
    0 20px 40px rgba(4, 120, 87, 0.12),
    0 5px 15px rgba(16, 185, 129, 0.08),
    inset 0 1px 0 rgba(255, 255, 255, 0.9);
  overflow: hidden;
  margin: 0 auto;
  max-width: 900px;
  margin-bottom: 50px;
  border: 1px solid rgba(187, 247, 208, 0.4);
  backdrop-filter: blur(10px);
}

table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  padding: 25px 30px;
  text-align: left;
  font-size: 1.1rem;
  border-bottom: 1px solid rgba(220, 252, 231, 0.6);
}

th {
  background: linear-gradient(135deg, 
    #047857 0%, 
    #059669 25%,
    #10b981 50%,
    #059669 75%,
    #047857 100%);
  color: white;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 1.2px;
  font-size: 0.95rem;
  text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
  position: relative;
}

th::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, 
    transparent, 
    rgba(240, 253, 244, 0.4), 
    transparent);
}

td {
  background: rgba(255, 255, 255, 0.8);
  transition: all 0.3s ease;
  font-weight: 500;
  color: #065f46;
}

tr:hover td {
  background: linear-gradient(135deg, 
    #f0fdf4 0%,
    rgba(220, 252, 231, 0.6) 100%);
  transform: translateX(3px);
}

.data-row {
  border-left: 4px solid transparent;
  transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.data-row:hover {
  border-left-color: #10b981;
  box-shadow: 0 5px 15px rgba(16, 185, 129, 0.15);
}

#blockchainData {
  text-align: center;
  font-size: 1.3rem;
  font-weight: 600;
  padding: 35px 40px;
  border-radius: 20px;
  margin-top: 40px;
  background: linear-gradient(135deg, 
    #f0fdf4 0%, 
    #dcfce7 100%);
  color: #047857;
  box-shadow: 
    0 15px 30px rgba(4, 120, 87, 0.1),
    inset 0 1px 0 rgba(255, 255, 255, 0.7);
  position: relative;
  border: 2px solid #bbf7d0;
  backdrop-filter: blur(5px);
}

.loading {
  background: linear-gradient(135deg, 
    #dcfce7 0%, 
    #bbf7d0 100%);
  color: #059669;
  animation: loadingPulse 2s ease-in-out infinite;
}

@keyframes loadingPulse {
  0%, 100% { opacity: 0.8; }
  50% { opacity: 1; }
}

.error {
  background: linear-gradient(135deg, 
    #fef2f2 0%, 
    #fecaca 100%);
  color: #dc2626;
  border-color: #fca5a5;
}

.success {
  background: linear-gradient(135deg, 
    #f0fdf4 0%, 
    #dcfce7 100%);
  color: #047857;
  border-color: #bbf7d0;
  animation: successGlow 3s ease-in-out;
}

@keyframes successGlow {
  0% { box-shadow: 0 15px 30px rgba(4, 120, 87, 0.1); }
  50% { box-shadow: 0 15px 30px rgba(16, 185, 129, 0.2); }
  100% { box-shadow: 0 15px 30px rgba(4, 120, 87, 0.1); }
}

.spinner {
  display: inline-block;
  width: 24px;
  height: 24px;
  border: 3px solid rgba(5, 150, 105, 0.3);
  border-top: 3px solid #059669;
  border-radius: 50%;
  animation: spin 1s linear infinite;
  margin-right: 12px;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.icon {
  display: inline-block;
  width: 28px;
  height: 28px;
  margin-right: 12px;
  vertical-align: middle;
  filter: drop-shadow(0 2px 4px rgba(16, 185, 129, 0.2));
  transition: all 0.3s ease;
}

.data-row:hover .icon {
  transform: scale(1.1);
  filter: drop-shadow(0 4px 8px rgba(16, 185, 129, 0.3));
}

.crop-icon { 
  background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" fill="%2310b981" viewBox="0 0 24 24"><path d="M12 2L13.09 8.26L20 9L13.09 9.74L12 16L10.91 9.74L4 9L10.91 8.26L12 2Z"/></svg>') no-repeat center;
  background-size: contain;
}

.date-icon { 
  background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" fill="%23059669" viewBox="0 0 24 24"><path d="M19 3H18V1H16V3H8V1H6V3H5C3.89 3 3 3.9 3 5V19C3 20.1 3.89 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3M19 19H5V8H19V19Z"/></svg>') no-repeat center;
  background-size: contain;
}

.fertilizer-icon { 
  background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" fill="%23047857" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12S6.48 22 12 22 22 17.52 22 12 17.52 2 12 2M12 20C7.59 20 4 16.41 4 12S7.59 4 12 4 20 7.59 20 12 16.41 20 12 20M12 6C8.69 6 6 8.69 6 12S8.69 18 12 18 18 15.31 18 12 15.31 6 12 6Z"/></svg>') no-repeat center;
  background-size: contain;
}

.farm-icon { 
  background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" fill="%2310b981" viewBox="0 0 24 24"><path d="M12 2L13.09 8.26L20 9L13.09 9.74L12 16L10.91 9.74L4 9L10.91 8.26L12 2Z"/></svg>') no-repeat center;
  background-size: contain;
}

/* تأثيرات تفاعلية إضافية */
.table-container:hover {
  transform: translateY(-2px);
  box-shadow: 
    0 25px 50px rgba(4, 120, 87, 0.15),
    0 10px 25px rgba(16, 185, 129, 0.1);
}

#crop-id:hover {
  transform: translateY(-1px);
  box-shadow: 
    0 15px 30px rgba(4, 120, 87, 0.15),
    inset 0 1px 0 rgba(255, 255, 255, 0.9);
}

/* تحسينات الاستجابة */
@media (max-width: 768px) {
  .container {
      margin: 10px;
      border-radius: 20px;
  }

  .header {
      padding: 40px 25px;
  }

  h1#project-title {
      font-size: 2.5rem;
  }

  .subtitle {
      font-size: 1.1rem;
  }

  .content {
      padding: 30px 20px;
  }

  th, td {
      padding: 18px 15px;
      font-size: 1rem;
  }

  .icon {
      width: 24px;
      height: 24px;
      margin-right: 10px;
  }

  #crop-id {
      font-size: 1.2rem;
      padding: 20px;
  }

  h2 {
      font-size: 1.8rem;
  }
}

@media (max-width: 480px) {
  body {
      padding: 10px;
  }

  .header {
      padding: 30px 20px;
  }

  h1#project-title {
      font-size: 2rem;
  }

  .content {
      padding: 25px 15px;
  }

  th, td {
      padding: 15px 12px;
      font-size: 0.9rem;
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

                const abi = [  {
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