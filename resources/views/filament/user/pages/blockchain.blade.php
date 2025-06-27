<x-filament-panels::page>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>
  @endpush

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 50%, #bbf7d0 100%);
      min-height: 100vh;
      padding: 2rem 1rem;
    }

    /* Animated background */
    body::before {
      content: '';
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: 
        radial-gradient(circle at 20% 50%, rgba(34, 197, 94, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(16, 185, 129, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 40% 80%, rgba(5, 150, 105, 0.1) 0%, transparent 50%);
      animation: backgroundMove 20s ease-in-out infinite;
      z-index: -1;
    }

    @keyframes backgroundMove {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      33% { transform: translateY(-20px) rotate(1deg); }
      66% { transform: translateY(20px) rotate(-1deg); }
    }

    .page-container {
      max-width: 1400px;
      margin: 0 auto;
    }

    h1 {
      font-size: clamp(2rem, 5vw, 3.5rem);
      font-weight: 800;
      text-align: center;
      background: linear-gradient(135deg, #10b981, #059669, #047857);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-bottom: 3rem;
      text-shadow: 0 4px 20px rgba(16, 185, 129, 0.3);
      position: relative;
      animation: titleGlow 3s ease-in-out infinite alternate;
    }

    @keyframes titleGlow {
      from { filter: drop-shadow(0 0 20px rgba(16, 185, 129, 0.5)); }
      to { filter: drop-shadow(0 0 30px rgba(16, 185, 129, 0.8)); }
    }

    h1::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      width: 100px;
      height: 4px;
      background: linear-gradient(90deg, transparent, #10b981, transparent);
      border-radius: 2px;
    }

    .dashboard-container {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      border-radius: 24px;
      padding: 2rem;
      box-shadow: 
        0 25px 50px rgba(0, 0, 0, 0.1),
        0 0 0 1px rgba(255, 255, 255, 0.5);
      border: 1px solid rgba(255, 255, 255, 0.2);
      position: relative;
      overflow: hidden;
      animation: containerFloat 6s ease-in-out infinite;
    }

    @keyframes containerFloat {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-10px); }
    }

    .dashboard-container::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
      animation: shimmer 3s infinite;
    }

    @keyframes shimmer {
      0% { left: -100%; }
      100% { left: 100%; }
    }

    .table-wrapper {
      overflow-x: auto;
      border-radius: 16px;
      position: relative;
      z-index: 1;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    thead tr {
      background: linear-gradient(135deg, #34d399, #10b981, #059669);
      color: white;
      text-transform: uppercase;
      font-size: 0.875rem;
      font-weight: 700;
      letter-spacing: 0.05em;
      position: relative;
    }

    thead tr::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 2px;
      background: linear-gradient(90deg, #fbbf24, #f59e0b, #d97706);
    }

    th {
      padding: 1.25rem 1rem;
      text-align: left;
      font-weight: 700;
      position: relative;
    }

    th::after {
      content: '';
      position: absolute;
      right: 0;
      top: 25%;
      height: 50%;
      width: 1px;
      background: rgba(255, 255, 255, 0.3);
    }

    th:last-child::after {
      display: none;
    }

    tbody {
      background: rgba(255, 255, 255, 0.9);
    }

    tbody tr {
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      border-bottom: 1px solid rgba(229, 231, 235, 0.5);
    }

    tbody tr:hover {
      background: linear-gradient(135deg, rgba(16, 185, 129, 0.05), rgba(5, 150, 105, 0.05));
      transform: translateY(-2px) scale(1.005);
      box-shadow: 
        0 10px 25px rgba(16, 185, 129, 0.15),
        0 0 0 1px rgba(16, 185, 129, 0.1);
    }

    tbody tr:hover::before {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      height: 100%;
      width: 4px;
      background: linear-gradient(135deg, #10b981, #059669);
      border-radius: 0 2px 2px 0;
    }

    td {
      padding: 1.25rem 1rem;
      color: #374151;
      font-weight: 500;
      position: relative;
    }

    td.italic {
      font-style: italic;
      color: #6b7280;
      font-weight: 400;
    }

    .btn-chain {
      padding: 0.75rem 1.5rem;
      border-radius: 50px;
      background: linear-gradient(135deg, #10b981, #059669);
      color: white;
      font-weight: 600;
      font-size: 0.875rem;
      border: none;
      cursor: pointer;
      position: relative;
      overflow: hidden;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4);
    }

    .btn-chain::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
      transition: left 0.5s;
    }

    .btn-chain:hover::before {
      left: 100%;
    }

    .btn-chain:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 30px rgba(16, 185, 129, 0.6);
      background: linear-gradient(135deg, #059669, #047857);
    }

    .btn-chain:active {
      transform: translateY(-1px);
    }

    .btn-disabled {
      background: linear-gradient(135deg, #d1fae5, #a7f3d0);
      color: #065f46;
      padding: 0.75rem 1.5rem;
      border-radius: 50px;
      font-weight: 600;
      font-size: 0.875rem;
      cursor: not-allowed;
      border: 2px solid #34d399;
      position: relative;
      overflow: hidden;
    }

    .btn-disabled::after {
      content: '✓';
      position: absolute;
      right: 0.75rem;
      top: 50%;
      transform: translateY(-50%);
      font-size: 1rem;
      animation: checkPulse 2s infinite;
    }

    @keyframes checkPulse {
      0%, 100% { transform: translateY(-50%) scale(1); }
      50% { transform: translateY(-50%) scale(1.2); }
    }

    .btn-qr {
      background: linear-gradient(135deg, #059669, #047857);
      color: white;
      padding: 0.75rem 1.5rem;
      border-radius: 50px;
      font-weight: 600;
      font-size: 0.875rem;
      border: none;
      cursor: pointer;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      box-shadow: 0 4px 15px rgba(5, 150, 105, 0.4);
      position: relative;
      overflow: hidden;
    }

    .btn-qr::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 0;
      height: 0;
      background: rgba(255, 255, 255, 0.3);
      border-radius: 50%;
      transform: translate(-50%, -50%);
      transition: all 0.3s ease;
    }

    .btn-qr:hover::before {
      width: 300px;
      height: 300px;
    }

    .btn-qr:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 30px rgba(5, 150, 105, 0.6);
      background: linear-gradient(135deg, #047857, #065f46);
    }

    /* QR Modal Improvements */
    #qrModal {
      backdrop-filter: blur(10px);
      animation: modalFadeIn 0.3s ease-out;
    }

    @keyframes modalFadeIn {
      from { opacity: 0; transform: scale(0.9); }
      to { opacity: 1; transform: scale(1); }
    }

    #qrModal .bg-white {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      border-radius: 24px;
      border: 1px solid rgba(255, 255, 255, 0.2);
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
      padding: 2rem;
      transform: scale(1);
      animation: modalSlideIn 0.3s ease-out;
    }

    @keyframes modalSlideIn {
      from { transform: translateY(-50px) scale(0.9); opacity: 0; }
      to { transform: translateY(0) scale(1); opacity: 1; }
    }

    #qrModal h2 {
      background: linear-gradient(135deg, #059669, #047857);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      font-weight: 700;
      font-size: 1.5rem;
      margin-bottom: 1.5rem;
    }

    #qrCodeContainer {
      padding: 1rem;
      background: white;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      margin-bottom: 1.5rem;
      border: 2px solid #10b981;
    }

    #qrModal button {
      padding: 0.75rem 1.5rem;
      border-radius: 50px;
      font-weight: 600;
      border: none;
      cursor: pointer;
      transition: all 0.3s ease;
      margin: 0 0.5rem;
      font-size: 0.875rem;
    }

    #qrModal button:first-of-type {
      background: linear-gradient(135deg, #10b981, #059669);
      color: white;
      box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4);
    }

    #qrModal button:first-of-type:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(16, 185, 129, 0.6);
    }

    #qrModal button:last-of-type {
      background: linear-gradient(135deg, #6b7280, #4b5563);
      color: white;
      box-shadow: 0 4px 15px rgba(107, 114, 128, 0.4);
    }

    #qrModal button:last-of-type:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(107, 114, 128, 0.6);
      background: linear-gradient(135deg, #4b5563, #374151);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      body {
        padding: 1rem 0.5rem;
      }

      .dashboard-container {
        padding: 1rem;
        border-radius: 16px;
      }

      h1 {
        font-size: 2rem;
        margin-bottom: 2rem;
      }

      th, td {
        padding: 0.75rem 0.5rem;
        font-size: 0.875rem;
      }

      .btn-chain, .btn-qr, .btn-disabled {
        padding: 0.5rem 1rem;
        font-size: 0.75rem;
      }

      #qrModal .bg-white {
        margin: 1rem;
        padding: 1.5rem;
      }
    }

    .text-center {
      text-align: center;
    }

    .hidden {
      display: none !important;
    }

    .fixed {
      position: fixed;
    }

    .inset-0 {
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
    }

    .bg-black {
      background-color: rgb(0 0 0);
    }

    .bg-opacity-50 {
      background-color: rgb(0 0 0 / 0.5);
    }

    .items-center {
      align-items: center;
    }

    .justify-center {
      justify-content: center;
    }

    .z-50 {
      z-index: 50;
    }

    .flex {
      display: flex;
    }

    /* Dark mode improvements */
    @media (prefers-color-scheme: dark) {
      body {
        background: linear-gradient(135deg, #052e16 0%, #064e3b 50%, #065f46 100%);
      }

      .dashboard-container {
        background: rgba(6, 78, 59, 0.95);
        border-color: rgba(16, 185, 129, 0.3);
      }

      tbody {
        background: rgba(6, 78, 59, 0.9);
      }

      tbody tr:hover {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(5, 150, 105, 0.1));
      }

      td {
        color: #f0fdf4;
      }

      td.italic {
        color: #bbf7d0;
      }

      #qrModal .bg-white {
        background: rgba(6, 78, 59, 0.95);
        color: #f0fdf4;
      }

      #qrCodeContainer {
        background: white;
      }
    }
  </style>

  <div class="page-container">
    <h1>🌱 Crops Dashboard</h1>

    <div class="dashboard-container">
      <div class="table-wrapper">
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
                      On Blockchain
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
    </div>
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

        document.getElementById('qrModal').classList.remove('hidden');
        document.getElementById('qrModal').classList.add('flex');
    }

    function closeQRModal() {
        document.getElementById('qrModal').classList.add('hidden');
        document.getElementById('qrModal').classList.remove('flex');
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

  <!-- QR Modal -->
  <div id="qrModal" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center hidden z-50">
      <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-lg text-center">
          <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">QR Code</h2>
          <div id="qrCodeContainer"></div>
          <button onclick="downloadQRImage()" class="bg-green-500 text-white px-4 py-2 rounded mb-2">Download QR Image</button><br>
          <button onclick="closeQRModal()" class="mt-4 px-4 py-2 bg-red-500 text-white rounded">Close</button>
      </div>
  </div>

</x-filament-panels::page>