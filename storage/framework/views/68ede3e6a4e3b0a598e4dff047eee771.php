<!-- resources/views/crop/show.blade.php -->

<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>عرض بيانات المحصول من البلوكشاين</title>
    <script src="https://cdn.jsdelivr.net/npm/web3@1.8.0/dist/web3.min.js"></script>
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            margin: 30px;
            background-color: #f9f9f9;
            color: #333;
        }
        h1#project-title {
            color: #2e7d32; /* أخضر جميل */
            font-weight: bold;
            text-align: center;
            margin-bottom: 40px;
            font-size: 2.5em;
            font-family: 'Arial', sans-serif;
            letter-spacing: 1px;
        }
        h2 {
            color: #2e7d32; /* نفس اللون الأخضر */
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 1.5em;
            border-bottom: 2px solid #2e7d32;
            padding-bottom: 5px;
        }
        #crop-id {
            text-align: center;
            margin-bottom: 30px;
            font-size: 1.2em;
            color: #555;
        }
        table {
            width: 60%;
            margin: 0 auto 50px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 15px 20px;
            border: 1px solid #ddd;
            text-align: right;
            font-size: 1.1em;
        }
        th {
            background-color: #a5d6a7; /* أخضر فاتح للعناوين */
            color: #1b5e20; /* أخضر غامق للعناوين */
            font-weight: 700;
        }
        #blockchainData {
            text-align: center;
            font-size: 1.1em;
            color: #d32f2f; /* لون أحمر لرسائل الخطأ */
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <h1 id="project-title">مشروع AlgroTech</h1>
    <div id="crop-id">بيانات المحصول (ID: <?php echo e($id); ?>)</div>

    <h2>تفاصيل المحصول</h2>
    <table id="cropTable" style="display:none;">
        <tbody>
            <tr>
                <th>اسم المحصول</th>
                <td id="cropName"></td>
            </tr>
            <tr>
                <th>تاريخ الزراعة</th>
                <td id="plantingDate"></td>
            </tr>
            <tr>
                <th>تاريخ الحصاد</th>
                <td id="harvestDate"></td>
            </tr>
            <tr>
                <th>الأسمدة المستخدمة</th>
                <td id="fertilizersUsed"></td>
            </tr>
            <tr>
                <th>اسم المزرعة</th>
                <td id="farmName"></td>
            </tr>
        </tbody>
    </table>

    <div id="blockchainData">جارٍ تحميل البيانات من البلوكشاين...</div>

<script>
    if (typeof window.ethereum !== 'undefined') {
        const web3 = new Web3(window.ethereum);

        async function loadBlockchainData() {
            try {
                await window.ethereum.request({ method: 'eth_requestAccounts' });

                const contractAddress = "0xee672d27B495a13a7b76B51bA8DEFAF0d4a25e3d";

                const abi = [ /* ABI نفس الموجود في كودك الأصلي */ 
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

                const contract = new web3.eth.Contract(abi, contractAddress);

                const cropId = <?php echo e($id); ?>;

                const data = await contract.methods.getCrop(cropId).call();

                // عرض البيانات في الجدول
                document.getElementById('cropName').innerText = data[0];
                document.getElementById('plantingDate').innerText = data[1];
                document.getElementById('harvestDate').innerText = data[2];
                document.getElementById('fertilizersUsed').innerText = data[3];
                document.getElementById('farmName').innerText = data[4];

                document.getElementById('cropTable').style.display = 'table';
                document.getElementById('blockchainData').innerText = '';

            } catch (error) {
                document.getElementById('blockchainData').innerText = "حدث خطأ أثناء تحميل البيانات: " + error.message;
            }
        }

        loadBlockchainData();

    } else {
        document.getElementById('blockchainData').innerText = "يرجى تثبيت MetaMask أو محفظة Web3 للمتابعة.";
    }
</script>

</body>
</html>

<?php /**PATH C:\Users\Dell\Iotapp\resources\views/crop/show.blade.php ENDPATH**/ ?>