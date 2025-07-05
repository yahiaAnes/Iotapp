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

    
/* Modern Modal Backdrop */
.qr-modal {
  position: fixed;
  inset: 0;
  background: rgba(0, 0, 0, 0.6);
  backdrop-filter: blur(6px); /* subtle blur for modern effect */
  -webkit-backdrop-filter: blur(6px);
  display: none;
  justify-content: center;
  align-items: center;
  z-index: 9999;
  animation: fadeIn 0.3s ease-in-out;
}

/* Card Container - Neumorphic Style */
.qr-card {
  background: linear-gradient(145deg, #ffffff, #f0f0f0);
  border-radius: 1.25rem;
  padding: 2.5rem 2rem;
  box-shadow: 10px 10px 25px rgba(0, 0, 0, 0.15), -5px -5px 15px #ffffff;
  text-align: center;
  width: 90%;
  max-width: 420px;
  transition: all 0.3s ease-in-out;
  border: none;
}

/* Dark Mode Support */
@media (prefers-color-scheme: dark) {
  .qr-card {
    background: linear-gradient(145deg, #1e293b, #111827);
    box-shadow: 10px 10px 25px rgba(0, 0, 0, 0.7), -5px -5px 15px rgba(255, 255, 255, 0.05);
    color: #f9fafb;
  }
}

/* Title */
.qr-title {
  font-size: 1.5rem;
  font-weight: 700;
  margin-bottom: 1.5rem;
  color: #111827;
}

@media (prefers-color-scheme: dark) {
  .qr-title {
    color: #f9fafb;
  }
}

/* QR Code Container */
.qr-code-container {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 2rem;
}

/* Buttons */
.qr-button {
  display: block;
  width: 100%;
  padding: 0.75rem 1rem;
  font-size: 1rem;
  font-weight: 600;
  border: none;
  border-radius: 0.75rem;
  cursor: pointer;
  margin-bottom: 1rem;
  transition: all 0.25s ease-in-out;
  letter-spacing: 0.5px;
}

/* Download Button */
.qr-button.download {
  background: #22c55e;
  color: #000;
  box-shadow: 0 4px 14px rgba(34, 197, 94, 0.3);
}

.qr-button.download:hover {
  background: #16a34a;
  transform: translateY(-2px);
  box-shadow: 0 6px 18px rgba(34, 197, 94, 0.4);
}

/* Close Button */
.qr-button.close {
  background: #ef4444;
  color: #000;
  box-shadow: 0 4px 14px rgba(239, 68, 68, 0.3);
}

.qr-button.close:hover {
  background: #dc2626;
  transform: translateY(-2px);
  box-shadow: 0 6px 18px rgba(239, 68, 68, 0.4);
}

/* Fade In Animation */
@keyframes fadeIn {
  from { opacity: 0; transform: scale(0.95); }
  to { opacity: 1; transform: scale(1); }
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
  


 
    <script>

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



function generateQR(button) {
    const cropId = button.dataset.cropId;

    const qrData = `http://localhost:8000/crop/${cropId}`; 

    const qrContainer = document.getElementById('qrCodeContainer');
    qrContainer.innerHTML = ''; 

    new QRCode(qrContainer, {
        text: qrData,
        width: 200,
        height: 200,
    });

    document.getElementById('qrModal').style.display = 'flex';

}

    function closeQRModal() {
        document.getElementById('qrModal').style.display = 'none';
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






    </script>







<!-- Add QR Modal -->
<div id="qrModal" class="qr-modal">
  <div class="qr-card">
    <h2 class="qr-title">QR Code</h2>

    <div id="qrCodeContainer" class="qr-code-container"></div>

    <button onclick="downloadQRImage()" class="qr-button download">Download QR Image</button>
    <button onclick="closeQRModal()" class="qr-button close">Close</button>
  </div>
</div>


</x-filament-panels::page>
