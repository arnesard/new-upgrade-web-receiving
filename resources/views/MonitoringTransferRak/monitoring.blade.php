@extends('MonitoringTransferRak.app')

@section('title', 'Monitoring Transfer Rak')

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html,
    body {
        width: 100%;
        height: 100%;
    }

    body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', sans-serif;
        background:
            radial-gradient(circle at 20% 20%, rgba(59, 130, 246, 0.25), transparent 45%),
            radial-gradient(circle at 80% 10%, rgba(99, 102, 241, 0.18), transparent 40%),
            radial-gradient(circle at 50% 90%, rgba(168, 85, 247, 0.12), transparent 50%),
            #0b1220;
        background-attachment: fixed;
        color: #e2e8f0;
        overflow: hidden;
    }

    .container {
        width: 100%;
        height: 100vh;
        max-width: 100%;
        display: flex;
        flex-direction: column;
        background: rgba(255, 255, 255, 0.02);
        backdrop-filter: blur(12px);
    }

    /* ===== HEADER INFO ===== */
    .header-info {
        background: linear-gradient(180deg, rgba(15, 23, 42, 0.8), rgba(15, 23, 42, 0.5));
        border-bottom: 1px solid rgba(59, 130, 246, 0.2);
        padding: 16px;
        flex-shrink: 0;
    }

    .header-title {
        text-align: center;
        font-weight: 800;
        font-size: 16px;
        color: #64c8ff;
        text-shadow: 0 0 10px rgba(100, 200, 255, 0.3);
        margin-bottom: 16px;
    }

    .info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 10px;
    }

    .info-item {
        background: rgba(59, 130, 246, 0.1);
        border: 1px solid rgba(59, 130, 246, 0.2);
        border-radius: 10px;
        padding: 10px;
    }

    .info-item label {
        font-size: 10px;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        display: block;
        margin-bottom: 4px;
    }

    .info-item input {
        width: 100%;
        background: transparent;
        border: none;
        color: #64c8ff;
        font-size: 13px;
        font-weight: 600;
        outline: none;
        padding: 0;
    }

    .info-item input::placeholder {
        color: #475569;
    }

    /* ===== MAIN CONTENT ===== */
    .main-content {
        flex: 1;
        display: flex;
        flex-direction: column;
        padding: 16px;
        gap: 12px;
        overflow-y: auto;
    }

    /* ===== COUNTER ===== */
    .counter-section {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.15), rgba(99, 102, 241, 0.1));
        border: 1px solid rgba(100, 200, 255, 0.3);
        border-radius: 12px;
        padding: 16px;
        text-align: center;
        flex-shrink: 0;
    }

    .counter-label {
        font-size: 12px;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
    }

    .counter-value {
        font-size: 48px;
        font-weight: 900;
        color: #64c8ff;
        text-shadow: 0 0 30px rgba(100, 200, 255, 0.6);
    }

    /* ===== SCAN BOX ===== */
    .scan-section {
        background: rgba(59, 130, 246, 0.08);
        border: 2px solid rgba(59, 130, 246, 0.3);
        border-radius: 12px;
        padding: 12px;
        flex-shrink: 0;
    }

    .scan-label {
        font-size: 11px;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
        display: block;
    }

    .scan-section input {
        width: 100%;
        padding: 14px;
        border-radius: 10px;
        border: 2px solid rgba(59, 130, 246, 0.4);
        background: rgba(59, 130, 246, 0.1);
        color: #e2e8f0;
        font-size: 16px;
        text-align: center;
        letter-spacing: 1px;
        font-weight: 600;
        outline: none;
        transition: all 0.3s ease;
    }

    .scan-section input::placeholder {
        color: #94a3b8;
    }

    .scan-section input:focus {
        border-color: #60a5fa;
        background: rgba(59, 130, 246, 0.15);
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
    }

    /* ===== SCAN LIST ===== */
    .scan-list {
        flex: 1;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-top: 12px;
        padding-right: 4px;
    }

    .scan-item {
        background: rgba(34, 197, 94, 0.1);
        border: 1px solid rgba(34, 197, 94, 0.2);
        border-radius: 8px;
        padding: 10px 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 13px;
        animation: slideGlow 0.3s ease;
    }

    .scan-item-no {
        font-weight: 700;
        color: #94a3b8;
        width: 28px;
        text-align: center;
    }

    .scan-item-code {
        font-family: 'Courier New', monospace;
        font-weight: 600;
        color: #22c55e;
        flex: 1;
        text-align: center;
    }

    .scan-item-badge {
        background: rgba(34, 197, 94, 0.3);
        color: #22c55e;
        padding: 3px 8px;
        border-radius: 4px;
        font-size: 10px;
        font-weight: 700;
    }

    /* ===== BUTTON ===== */
    .button-footer {
        display: flex;
        gap: 8px;
        flex-shrink: 0;
        padding-top: 8px;
        border-top: 1px solid rgba(255, 255, 255, 0.04);
    }

    button {
        flex: 1;
        padding: 12px;
        border-radius: 10px;
        border: none;
        font-weight: 700;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #22c55e, #16a34a);
        color: white;
        box-shadow: 0 4px 15px rgba(34, 197, 94, 0.2);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(34, 197, 94, 0.35);
    }

    .btn-primary:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        transform: none;
    }

    .btn-secondary {
        background: rgba(255, 255, 255, 0.08);
        color: #94a3b8;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.12);
        color: #cbd5e1;
    }

    /* ===== ANIMATIONS ===== */
    @keyframes slideGlow {
        from {
            transform: translateX(-20px) scale(0.95);
            opacity: 0;
        }

        to {
            transform: translateX(0) scale(1);
            opacity: 1;
        }
    }

    .error-toast {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(244, 67, 54, 0.15);
        border: 1px solid rgba(244, 67, 54, 0.4);
        color: #ff6b6b;
        padding: 12px 16px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
        box-shadow: 0 8px 20px rgba(244, 67, 54, 0.2);
        animation: toastSlideUp 0.3s ease;
        z-index: 1000;
    }

    @keyframes toastSlideUp {
        from {
            transform: translateX(-50%) translateY(30px);
            opacity: 0;
        }

        to {
            transform: translateX(-50%) translateY(0);
            opacity: 1;
        }
    }

    /* ===== SCROLLBAR ===== */
    .scan-list::-webkit-scrollbar {
        width: 6px;
    }

    .scan-list::-webkit-scrollbar-track {
        background: rgba(59, 130, 246, 0.05);
    }

    .scan-list::-webkit-scrollbar-thumb {
        background: rgba(59, 130, 246, 0.3);
        border-radius: 3px;
    }

    .scan-list::-webkit-scrollbar-thumb:hover {
        background: rgba(59, 130, 246, 0.5);
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 480px) {
        .header-info {
            padding: 12px;
        }

        .header-title {
            font-size: 15px;
            margin-bottom: 12px;
        }

        .info-grid {
            gap: 8px;
        }

        .info-item {
            padding: 8px;
        }

        .info-item label {
            font-size: 9px;
        }

        .info-item input {
            font-size: 12px;
        }

        .main-content {
            padding: 12px;
            gap: 10px;
        }

        .counter-section {
            padding: 12px;
        }

        .counter-value {
            font-size: 40px;
        }

        button {
            font-size: 12px;
            padding: 10px;
        }
    }
</style>

<div class="container">
    <!-- HEADER INFO -->
    <div class="header-info">
        <div class="header-title">Monitoring Transfer Rak</div>

        <div class="info-grid">
            <div class="info-item">
                <label>👤 Karyawan</label>
                <input type="text" id="namaKaryawan" placeholder="Belum dipilih" readonly>
            </div>
            <div class="info-item">
                <label>🚗 Supir</label>
                <input type="text" id="namaSupir" placeholder="Belum dipilih" readonly>
            </div>
            <div class="info-item">
                <label>🚙 Mobil</label>
                <input type="text" id="namaMobil" placeholder="Belum dipilih" readonly>
            </div>
        </div>
    </div>

    <!-- AUDIO -->
    <audio id="beepSuccess" preload="auto">
        <source src="{{ asset('sounds/WindowsDing.wav') }}" type="audio/wav">
    </audio>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <!-- SCAN INPUT -->
        <div class="scan-section">
            <label class="scan-label">🔍 Scan Barcode Rak</label>
            <input type="text" id="scanInput" placeholder="Arahkan ke barcode..." autofocus>
        </div>

        <!-- COUNTER -->
        <div class="counter-section">
            <div class="counter-label">Total Rak Terscan</div>
            <div class="counter-value" id="totalCount">0</div>
        </div>

        <!-- SCAN LIST -->
        <div class="scan-list" id="scanList"></div>

        <!-- BUTTONS -->
        <div class="button-footer">
            <button class="btn-secondary" id="btnReset">Reset</button>
            <button class="btn-primary" id="btnFinish" disabled>Selesai</button>
        </div>
    </div>
</div>

<script>
    const state = {
        karyawan: null,
        supir: null,
        mobil: null,
        scanList: []
    };

    const beep = document.getElementById('beepSuccess');

    // ===== LOAD DATA ON PAGE LOAD =====
    document.addEventListener('DOMContentLoaded', async () => {
        // Ambil data dari session/localStorage atau request ke backend
        await loadData();
        document.getElementById('scanInput').focus();
    });

    async function loadData() {
        try {
            const response = await fetch('/transfer-rak/session');
            const res = await response.json();

            console.log('SESSION DATA:', res);

            // 🔥 FIX DI SINI
            if (!res.success || !res.data) {
                showErrorToast('Session kosong, belum ada transaksi aktif!');
                return;
            }

            const data = res.data;

            state.karyawan = data.karyawan;
            state.supir = data.supir;
            state.mobil = data.mobil;

            document.getElementById('namaKaryawan').value =
                data.karyawan?.nama || 'Belum dipilih';

            document.getElementById('namaSupir').value =
                data.supir?.nama || 'Belum dipilih';

            document.getElementById('namaMobil').value =
                `${data.mobil?.nama_mobil ?? ''} (${data.mobil?.nomor_polisi ?? ''})`;

        } catch (err) {
            console.error(err);
            showErrorToast('Gagal load session');
        }
    }
    // ===== SCAN INPUT =====
    document.getElementById('scanInput').addEventListener('keypress', async (e) => {
        if (e.key === 'Enter') {
            e.preventDefault();

            const barcode = e.target.value.trim();
            if (!barcode) return;

            // Validasi data
            if (!state.karyawan || !state.supir || !state.mobil) {
                showErrorToast('⚠️ Data karyawan, supir & mobil belum lengkap!');
                e.target.value = '';
                return;
            }

            try {
                const response = await fetch('/transfer-rak/scan', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            ?.content || '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        barcode: barcode,
                        id_karyawan: state.karyawan.id,
                        id_supir: state.supir.id,
                        id_mobil: state.mobil.id
                    })
                });

                const data = await response.json();

                if (data.error) {
                    showErrorToast(data.error);
                } else {
                    // Play sound
                    beep.play().catch(() => {});

                    // Add to list
                    state.scanList.push({
                        barcode: barcode,
                        timestamp: new Date().toLocaleTimeString('id-ID')
                    });

                    updateScanList();
                    document.getElementById('btnFinish').disabled = false;
                }
            } catch (err) {
                showErrorToast('Error: ' + err.message);
            }

            e.target.value = '';
            e.target.focus();
        }
    });

    function updateScanList() {
        const listContainer = document.getElementById('scanList');
        const countDisplay = document.getElementById('totalCount');

        listContainer.innerHTML = '';
        state.scanList.forEach((item, idx) => {
            const div = document.createElement('div');
            div.classList.add('scan-item');
            div.innerHTML = `
                <span class="scan-item-no">${idx + 1}</span>
                <span class="scan-item-code">${item.barcode}</span>
                <span class="scan-item-badge">✓</span>
            `;
            listContainer.prepend(div);
        });

        countDisplay.textContent = state.scanList.length;
    }

    // ===== RESET BUTTON =====
    document.getElementById('btnReset').addEventListener('click', () => {
        if (confirm('Reset semua scan?')) {
            state.scanList = [];
            document.getElementById('scanList').innerHTML = '';
            document.getElementById('totalCount').textContent = '0';
            document.getElementById('btnFinish').disabled = true;
            document.getElementById('scanInput').focus();
        }
    });

    // ===== FINISH BUTTON =====
    document.getElementById('btnFinish').addEventListener('click', async () => {
        if (state.scanList.length === 0) {
            showErrorToast('Belum ada barcode yang di-scan!');
            return;
        }

        try {
            const response = await fetch('/transfer-rak/finish', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ||
                        '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    id_karyawan: state.karyawan.id,
                    id_supir: state.supir.id,
                    id_mobil: state.mobil.id,
                    scan_list: state.scanList
                })
            });

            const data = await response.json();

            if (data.success) {
                beep.play().catch(() => {});
                alert(`✓ Transfer Rak Selesai!\nTotal: ${state.scanList.length} unit`);

                // Reset
                state.scanList = [];
                document.getElementById('scanList').innerHTML = '';
                document.getElementById('totalCount').textContent = '0';
                document.getElementById('btnFinish').disabled = true;
                document.getElementById('scanInput').focus();
            } else {
                showErrorToast(data.error || 'Terjadi kesalahan');
            }
        } catch (err) {
            showErrorToast('Error: ' + err.message);
        }
    });

    function showErrorToast(message) {
        const toast = document.createElement('div');
        toast.classList.add('error-toast');
        toast.textContent = message;
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    // ===== AUDIO INIT =====
    *
</script>
