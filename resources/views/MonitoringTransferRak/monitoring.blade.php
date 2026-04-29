@extends('MonitoringTransferRak.app')

<<<<<<< HEAD
@section('title', 'Monitoring Transfer Rak')
=======
@section('title', 'Transfer Rak')
>>>>>>> b99a10f (29-04-2026)

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
<<<<<<< HEAD
    }

    body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', sans-serif;
        background:
            radial-gradient(circle at 20% 20%, rgba(59, 130, 246, 0.25), transparent 45%),
            radial-gradient(circle at 80% 10%, rgba(99, 102, 241, 0.18), transparent 40%),
            radial-gradient(circle at 50% 90%, rgba(168, 85, 247, 0.12), transparent 50%),
=======
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        background: radial-gradient(circle at 20% 20%, rgba(59, 130, 246, 0.25), transparent 45%),
            radial-gradient(circle at 80% 10%, rgba(99, 102, 241, 0.18), transparent 40%),
>>>>>>> b99a10f (29-04-2026)
            #0b1220;
        background-attachment: fixed;
        color: #e2e8f0;
        overflow: hidden;
    }

<<<<<<< HEAD
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
=======
    .app-wrap {
        width: 100%;
        height: 100vh;
        display: flex;
        flex-direction: column;
    }

    /* ── HEADER ── */
    .header {
        background: linear-gradient(180deg, rgba(15, 23, 42, 0.95), rgba(15, 23, 42, 0.7));
        border-bottom: 1px solid rgba(59, 130, 246, 0.2);
        padding: 10px 14px;
        flex-shrink: 0;
    }

    .header-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
    }

    .app-title {
        font-size: 14px;
        font-weight: 800;
        color: #64c8ff;
        text-shadow: 0 0 10px rgba(100, 200, 255, 0.3);
    }

    .operator-badge {
        display: flex;
        align-items: center;
        gap: 6px;
        background: rgba(59, 130, 246, 0.12);
        border: 1px solid rgba(59, 130, 246, 0.25);
        border-radius: 20px;
        padding: 4px 10px;
        font-size: 12px;
        color: #94a3b8;
        cursor: pointer;
        transition: all 0.2s;
    }

    .operator-badge span {
        color: #64c8ff;
        font-weight: 600;
        max-width: 100px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .operator-badge:hover {
        border-color: rgba(59, 130, 246, 0.5);
    }

    /* Transfer info pills */
    .transfer-info {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 6px;
    }

    .info-pill {
        background: rgba(59, 130, 246, 0.08);
        border: 1px solid rgba(59, 130, 246, 0.18);
        border-radius: 8px;
        padding: 6px 10px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .info-pill-icon {
        font-size: 13px;
    }

    .info-pill-body {
        flex: 1;
        min-width: 0;
    }

    .info-pill-label {
        font-size: 9px;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.4px;
    }

    .info-pill-value {
        font-size: 12px;
        font-weight: 600;
        color: #64c8ff;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .info-pill-value.empty {
        color: #475569;
    }

    /* ── SETUP PANEL ── */
    .setup-panel {
        background: rgba(15, 23, 42, 0.6);
        border-bottom: 1px solid rgba(59, 130, 246, 0.15);
        padding: 12px 14px 8px;
        flex-shrink: 0;
        transition: all 0.3s ease;
    }

    .setup-panel.hidden {
        display: none;
    }

    /* ── MULAI STICKY FOOTER ── */
    .mulai-footer {
        padding: 10px 14px;
        background: rgba(11, 18, 32, 0.98);
        border-top: 1px solid rgba(59, 130, 246, 0.15);
        flex-shrink: 0;
    }

    .mulai-footer.hidden {
        display: none;
    }

    .btn-start {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, #3b82f6, #6366f1);
        border: none;
        border-radius: 12px;
        color: white;
        font-size: 15px;
        font-weight: 800;
        cursor: pointer;
        transition: all 0.25s;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        box-shadow: 0 4px 20px rgba(59, 130, 246, 0.3);
    }

    .btn-start:not(:disabled):hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 28px rgba(59, 130, 246, 0.5);
    }

    .btn-start:not(:disabled) {
        animation: readyPulse 2s ease-in-out infinite;
    }

    .btn-start:disabled {
        background: rgba(255, 255, 255, 0.06);
        color: #475569;
        cursor: not-allowed;
        box-shadow: none;
        animation: none;
    }

    .btn-start-hint {
        font-size: 10px;
        color: #64748b;
        text-align: center;
        margin-top: 5px;
        min-height: 14px;
        transition: all 0.2s;
    }

    @keyframes readyPulse {

        0%,
        100% {
            box-shadow: 0 4px 20px rgba(59, 130, 246, 0.3);
        }

        50% {
            box-shadow: 0 4px 30px rgba(59, 130, 246, 0.6), 0 0 0 4px rgba(59, 130, 246, 0.1);
        }
    }

    .setup-row {
        margin-bottom: 10px;
    }

    .setup-label {
        font-size: 10px;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        margin-bottom: 4px;
        display: block;
    }

    .setup-input,
    .setup-select {
        width: 100%;
        padding: 10px 12px;
        background: rgba(59, 130, 246, 0.08);
        border: 1px solid rgba(59, 130, 246, 0.25);
        border-radius: 8px;
        color: #e2e8f0;
        font-size: 14px;
        outline: none;
        transition: border-color 0.2s;
        appearance: none;
    }

    .setup-input:focus,
    .setup-select:focus {
        border-color: #60a5fa;
        background: rgba(59, 130, 246, 0.13);
    }

    .setup-input::placeholder {
        color: #475569;
    }

    /* Datalist style hint */
    .input-hint {
        font-size: 10px;
        color: #475569;
        margin-top: 3px;
    }



    /* ── SCAN AREA ── */
    .scan-area {
        flex: 1;
        display: flex;
        flex-direction: column;
        padding: 12px 14px;
        gap: 10px;
        overflow: hidden;
    }

    .scan-input-wrap {
        background: rgba(59, 130, 246, 0.08);
        border: 2px solid rgba(59, 130, 246, 0.3);
        border-radius: 12px;
        padding: 10px 12px;
        flex-shrink: 0;
    }

    .scan-input-label {
        font-size: 10px;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        margin-bottom: 6px;
        display: block;
    }

    #scanInput {
        width: 100%;
        padding: 12px 14px;
        background: rgba(59, 130, 246, 0.1);
        border: 2px solid rgba(59, 130, 246, 0.35);
        border-radius: 8px;
        color: #e2e8f0;
        font-size: 16px;
        text-align: center;
        font-weight: 600;
        letter-spacing: 1px;
        outline: none;
        transition: all 0.2s;
    }

    #scanInput:focus {
        border-color: #60a5fa;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
    }

    #scanInput:disabled {
        opacity: 0.35;
        cursor: not-allowed;
    }

    #scanInput::placeholder {
        color: #475569;
        font-weight: 400;
        letter-spacing: 0;
    }

    /* Counter */
    .counter-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-shrink: 0;
    }

    .counter-box {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.15), rgba(99, 102, 241, 0.1));
        border: 1px solid rgba(100, 200, 255, 0.25);
        border-radius: 10px;
        padding: 10px 18px;
        text-align: center;
        flex: 1;
    }

    .counter-label {
        font-size: 10px;
        color: #64748b;
        text-transform: uppercase;
    }

    .counter-value {
        font-size: 42px;
        font-weight: 900;
        color: #64c8ff;
        text-shadow: 0 0 20px rgba(100, 200, 255, 0.5);
        line-height: 1;
    }

    /* Scan list */
>>>>>>> b99a10f (29-04-2026)
    .scan-list {
        flex: 1;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
<<<<<<< HEAD
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
=======
        gap: 6px;
    }

    .scan-item {
        background: rgba(34, 197, 94, 0.08);
        border: 1px solid rgba(34, 197, 94, 0.2);
        border-radius: 8px;
        padding: 9px 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        animation: slideIn 0.25s ease;
    }

    .scan-item.duplicate {
        background: rgba(239, 68, 68, 0.08);
        border-color: rgba(239, 68, 68, 0.3);
        animation: shake 0.4s ease;
    }

    .scan-no {
        font-size: 11px;
        font-weight: 700;
        color: #64748b;
        width: 22px;
    }

    .scan-code {
        font-family: 'Courier New', monospace;
        font-size: 13px;
>>>>>>> b99a10f (29-04-2026)
        font-weight: 600;
        color: #22c55e;
        flex: 1;
        text-align: center;
    }

<<<<<<< HEAD
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
=======
    .scan-time {
        font-size: 10px;
        color: #475569;
    }

    /* Footer buttons */
    .btn-footer {
>>>>>>> b99a10f (29-04-2026)
        display: flex;
        gap: 8px;
        flex-shrink: 0;
        padding-top: 8px;
<<<<<<< HEAD
        border-top: 1px solid rgba(255, 255, 255, 0.04);
    }

    button {
=======
        border-top: 1px solid rgba(255, 255, 255, 0.05);
    }

    .btn {
>>>>>>> b99a10f (29-04-2026)
        flex: 1;
        padding: 12px;
        border-radius: 10px;
        border: none;
        font-weight: 700;
<<<<<<< HEAD
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
=======
        font-size: 13px;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-cancel {
        background: rgba(239, 68, 68, 0.12);
        color: #f87171;
        border: 1px solid rgba(239, 68, 68, 0.25);
    }

    .btn-cancel:hover {
        background: rgba(239, 68, 68, 0.2);
    }

    .btn-finish {
        background: linear-gradient(135deg, #22c55e, #16a34a);
        color: white;
        box-shadow: 0 4px 12px rgba(34, 197, 94, 0.2);
    }

    .btn-finish:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(34, 197, 94, 0.35);
    }

    .btn-finish:disabled {
        opacity: 0.35;
>>>>>>> b99a10f (29-04-2026)
        cursor: not-allowed;
        transform: none;
    }

<<<<<<< HEAD
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
=======
    /* ── TOAST ── */
    .toast {
        position: fixed;
        bottom: 24px;
        left: 50%;
        transform: translateX(-50%);
        padding: 11px 18px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
        z-index: 999;
        animation: toastUp 0.3s ease;
        white-space: nowrap;
    }

    .toast.error {
        background: rgba(239, 68, 68, 0.15);
        border: 1px solid rgba(239, 68, 68, 0.4);
        color: #f87171;
        box-shadow: 0 8px 20px rgba(239, 68, 68, 0.15);
    }

    .toast.success {
        background: rgba(34, 197, 94, 0.15);
        border: 1px solid rgba(34, 197, 94, 0.4);
        color: #4ade80;
        box-shadow: 0 8px 20px rgba(34, 197, 94, 0.15);
    }

    /* ── OVERLAY MODAL ── */
    .modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 500;
        padding: 20px;
    }

    .modal-overlay.hidden {
        display: none;
    }

    .modal-box {
        background: #111827;
        border: 1px solid rgba(59, 130, 246, 0.25);
        border-radius: 16px;
        padding: 20px;
        width: 100%;
        max-width: 340px;
    }

    .modal-title {
        font-size: 15px;
        font-weight: 700;
        color: #64c8ff;
        margin-bottom: 14px;
        text-align: center;
    }

    .modal-select {
        width: 100%;
        padding: 11px 12px;
        background: rgba(59, 130, 246, 0.08);
        border: 1px solid rgba(59, 130, 246, 0.25);
        border-radius: 8px;
        color: #e2e8f0;
        font-size: 14px;
        outline: none;
        margin-bottom: 12px;
        appearance: none;
    }

    .modal-btn {
        width: 100%;
        padding: 12px;
        background: linear-gradient(135deg, #3b82f6, #6366f1);
        border: none;
        border-radius: 8px;
        color: white;
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
    }

    /* ── ANIMATIONS ── */
    @keyframes slideIn {
        from {
            transform: translateX(-16px);
>>>>>>> b99a10f (29-04-2026)
            opacity: 0;
        }

        to {
<<<<<<< HEAD
            transform: translateX(0) scale(1);
=======
            transform: translateX(0);
>>>>>>> b99a10f (29-04-2026)
            opacity: 1;
        }
    }

<<<<<<< HEAD
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
=======
    @keyframes shake {

        0%,
        100% {
            transform: translateX(0)
        }

        25% {
            transform: translateX(-6px)
        }

        75% {
            transform: translateX(6px)
        }
    }

    @keyframes toastUp {
        from {
            transform: translateX(-50%) translateY(20px);
>>>>>>> b99a10f (29-04-2026)
            opacity: 0;
        }

        to {
            transform: translateX(-50%) translateY(0);
            opacity: 1;
        }
    }

<<<<<<< HEAD
    /* ===== SCROLLBAR ===== */
    .scan-list::-webkit-scrollbar {
        width: 6px;
    }

    .scan-list::-webkit-scrollbar-track {
        background: rgba(59, 130, 246, 0.05);
=======
    .scan-list::-webkit-scrollbar {
        width: 4px;
>>>>>>> b99a10f (29-04-2026)
    }

    .scan-list::-webkit-scrollbar-thumb {
        background: rgba(59, 130, 246, 0.3);
<<<<<<< HEAD
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
=======
        border-radius: 2px;
    }

    /* ── CENTER ACTION BUTTONS ── */
    .center-actions {
        display: none;
        justify-content: center;
        align-items: center;
        gap: 12px;
        flex-shrink: 0;
        padding: 8px 14px;
    }

    .center-actions.visible {
        display: flex;
    }

    .btn-center {
        flex: 1;
        max-width: 150px;
        padding: 16px 12px;
        border-radius: 16px;
        border: none;
        font-weight: 800;
        font-size: 15px;
        cursor: pointer;
        transition: all 0.25s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        letter-spacing: 0.3px;
    }

    .btn-center-cancel {
        background: rgba(239, 68, 68, 0.13);
        color: #f87171;
        border: 1.5px solid rgba(239, 68, 68, 0.35);
    }

    .btn-center-cancel:active {
        background: rgba(239, 68, 68, 0.25);
        transform: scale(0.97);
    }

    .btn-center-finish {
        background: linear-gradient(135deg, #22c55e, #16a34a);
        color: white;
        box-shadow: 0 4px 20px rgba(34, 197, 94, 0.35);
    }

    .btn-center-finish:not(:disabled):active {
        transform: scale(0.97);
    }

    .btn-center-finish:not(:disabled) {
        animation: finishPulse 2.5s ease-in-out infinite;
    }

    .btn-center-finish:disabled {
        background: rgba(255, 255, 255, 0.07);
        color: #475569;
        box-shadow: none;
        animation: none;
        cursor: not-allowed;
    }

    @keyframes finishPulse {

        0%,
        100% {
            box-shadow: 0 4px 20px rgba(34, 197, 94, 0.35);
        }

        50% {
            box-shadow: 0 6px 30px rgba(34, 197, 94, 0.6), 0 0 0 5px rgba(34, 197, 94, 0.12);
        }
    }

    .modal-select {
        color: #e2e8f0;
        background-color: #111827;
    }

    .modal-select option {
        color: #000;
        background-color: #fff;
    }
</style>

{{-- MODAL PILIH OPERATOR --}}
<div class="modal-overlay" id="operatorModal">
    <div class="modal-box">
        <div class="modal-title">👤 Pilih Operator</div>
        <select class="modal-select" id="modalKaryawanSelect">
            <option value="">-- Pilih Operator --</option>
            @foreach ($karyawan as $k)
                <option value="{{ $k->id }}" data-nama="{{ $k->name }}">{{ $k->name }}</option>
            @endforeach
        </select>
        <button class="modal-btn" id="btnConfirmOperator">Konfirmasi</button>
    </div>
</div>

<div class="app-wrap">
    {{-- HEADER --}}
    <div class="header">
        <div class="header-top">
            <div class="app-title">📦 Transfer Rak</div>
            <div class="operator-badge" id="operatorBadge" onclick="openOperatorModal()">
                👤 <span id="operatorName">Pilih Operator</span> ✏️
            </div>
        </div>
        <div class="transfer-info">
            <div class="info-pill">
                <span class="info-pill-icon">🚗</span>
                <div class="info-pill-body">
                    <div class="info-pill-label">Supir</div>
                    <div class="info-pill-value empty" id="displaySupir">Belum diisi</div>
                </div>
            </div>
            <div class="info-pill">
                <span class="info-pill-icon">🚙</span>
                <div class="info-pill-body">
                    <div class="info-pill-label">Kendaraan</div>
                    <div class="info-pill-value empty" id="displayMobil">Belum scan</div>
                </div>
            </div>
        </div>
    </div>

    {{-- SETUP PANEL --}}
    <div class="setup-panel" id="setupPanel">
        {{-- SUPIR --}}
        <div class="setup-row">
            <label class="setup-label">🚗 Nama Supir</label>
            <input list="driverList" class="setup-input" id="supirInput" placeholder="Ketik atau pilih supir..."
                autocomplete="off">
            <datalist id="driverList"></datalist>
            <div class="input-hint">Bisa pilih dari daftar atau ketik baru</div>
        </div>
        {{-- BARCODE MOBIL --}}
        <div class="setup-row" style="margin-bottom:0">
            <label class="setup-label">🚙 Scan Barcode Kendaraan</label>
            <input type="text" class="setup-input" id="mobilInput"
                placeholder="Arahkan scanner ke barcode kendaraan...">
        </div>
    </div>

    {{-- MULAI FOOTER (selalu visible) --}}
    <div class="mulai-footer" id="mulaiFooter">
        <button class="btn-start" id="btnMulai" disabled>
            <span id="btnMulaiIcon">🔒</span>
            <span id="btnMulaiText">MULAI TRANSFER</span>
        </button>
        <div class="btn-start-hint" id="btnMulaiHint">Isi supir &amp; scan kendaraan terlebih dahulu</div>
    </div>

    {{-- SCAN AREA --}}
    <div class="scan-area">
        <audio id="beepOk" preload="auto">
            <source src="{{ asset('sounds/WindowsDing.wav') }}" type="audio/wav">
        </audio>

        <div class="scan-input-wrap">
            <label class="scan-input-label">🔍 Scan Barcode Rak</label>
            <input type="text" id="scanInput" placeholder="Operator belum siap..." disabled autocomplete="off">
        </div>

        <div class="counter-row">
            <div class="counter-box">
                <div class="counter-label">Total Rak Terscan</div>
                <div class="counter-value" id="totalCount">0</div>
            </div>
        </div>

        {{-- TOMBOL DI TENGAH --}}
        <div class="center-actions" id="centerActions">
            <button class="btn-center btn-center-cancel" id="btnCancel">✕ Batal</button>
            <button class="btn-center btn-center-finish" id="btnFinish" disabled>✔ Selesai</button>
        </div>

        <div class="scan-list" id="scanList"></div>
    </div>

    <script>
        const CSRF = '{{ csrf_token() }}';

        const state = {
            operatorId: null,
            operatorName: null,
            transferId: null,
            scanList: [],
            isActive: false,
        };

        // ── OPERATOR MODAL ──
        function openOperatorModal() {
            document.getElementById('operatorModal').classList.remove('hidden');
        }
        document.getElementById('btnConfirmOperator').addEventListener('click', () => {
            const sel = document.getElementById('modalKaryawanSelect');
            const id = sel.value;
            const nama = sel.options[sel.selectedIndex]?.dataset?.nama;
            if (!id) {
                showToast('Pilih operator dulu!', 'error');
                return;
            }

            state.operatorId = id;
            state.operatorName = nama;
            document.getElementById('operatorName').textContent = nama;
            document.getElementById('operatorModal').classList.add('hidden');

            checkStartReady();
            showToast('✓ Operator dipilih', 'success');
        });

        // ── LOAD DRIVERS untuk datalist ──
        async function loadDrivers(q = '') {
            const res = await fetch(`/transfer-rak/drivers?q=${encodeURIComponent(q)}`);
            const data = await res.json();
            const dl = document.getElementById('driverList');
            dl.innerHTML = data.map(d => `<option value="${d.nama_karyawan}">`).join('');
        }
        loadDrivers();

        // ── SETUP INPUTS ──
        const supirInput = document.getElementById('supirInput');
        const mobilInput = document.getElementById('mobilInput');

        supirInput.addEventListener('input', () => {
            loadDrivers(supirInput.value);
            checkStartReady();
        });
        mobilInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                mobilInput.blur();
                checkStartReady();
            }
        });
        mobilInput.addEventListener('input', checkStartReady);

        function checkStartReady() {
            const hasOperator = !!state.operatorId;
            const hasSupir = supirInput.value.trim() !== '';
            const hasMobil = mobilInput.value.trim() !== '';
            const ok = hasOperator && hasSupir && hasMobil;

            const btn = document.getElementById('btnMulai');
            const hint = document.getElementById('btnMulaiHint');
            const icon = document.getElementById('btnMulaiIcon');

            btn.disabled = !ok;

            if (ok) {
                icon.textContent = '▶';
                hint.textContent = 'Siap! Tekan untuk mulai transfer';
                hint.style.color = '#22c55e';
            } else {
                icon.textContent = '🔒';
                const missing = [];
                if (!hasOperator) missing.push('operator');
                if (!hasSupir) missing.push('supir');
                if (!hasMobil) missing.push('kendaraan');
                hint.textContent = 'Belum isi: ' + missing.join(', ');
                hint.style.color = '#64748b';
            }
        }

        // ── MULAI TRANSFER ──
        document.getElementById('btnMulai').addEventListener('click', async () => {
            const btn = document.getElementById('btnMulai');
            const icon = document.getElementById('btnMulaiIcon');
            const text = document.getElementById('btnMulaiText');
            btn.disabled = true;
            icon.textContent = '⏳';
            text.textContent = 'Memulai...';

            try {
                const res = await fetch('/transfer-rak/start', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': CSRF
                    },
                    body: JSON.stringify({
                        id_karyawan: state.operatorId,
                        nama_supir: supirInput.value.trim(),
                        nama_kendaraan: mobilInput.value.trim(),
                    })
                });
                const data = await res.json();

                if (!data.success) throw new Error(data.error);

                state.transferId = data.transfer_id;
                state.isActive = true;
                state.scanList = [];

                // Update display
                document.getElementById('displaySupir').textContent = supirInput.value.trim();
                document.getElementById('displaySupir').classList.remove('empty');
                document.getElementById('displayMobil').textContent = mobilInput.value.trim();
                document.getElementById('displayMobil').classList.remove('empty');

                // Hide setup & mulaiFooter, tampilkan centerActions
                document.getElementById('setupPanel').classList.add('hidden');
                document.getElementById('mulaiFooter').classList.add('hidden');
                document.getElementById('centerActions').classList.add('visible');
                const scanInput = document.getElementById('scanInput');
                scanInput.disabled = false;
                scanInput.placeholder = 'Arahkan scanner ke barcode rak...';
                scanInput.focus();
                document.getElementById('scanList').innerHTML = '';
                document.getElementById('totalCount').textContent = '0';
                document.getElementById('btnFinish').disabled = true;

                showToast('✓ Transfer dimulai!', 'success');
            } catch (e) {
                showToast('❌ ' + e.message, 'error');
                btn.disabled = false;
                btn.textContent = '▶ MULAI TRANSFER';
            }
        });

        // ── SCAN RAK ──
        document.getElementById('scanInput').addEventListener('keypress', async (e) => {
            if (e.key !== 'Enter') return;
            e.preventDefault();

            const kode = e.target.value.trim();
            if (!kode) return;
            e.target.value = '';

            if (!state.transferId) {
                showToast('Transfer belum dimulai!', 'error');
>>>>>>> b99a10f (29-04-2026)
                return;
            }

            try {
<<<<<<< HEAD
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
=======
                const res = await fetch('/transfer-rak/scan', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': CSRF
                    },
                    body: JSON.stringify({
                        transfer_rak_id: state.transferId,
                        kode_rak: kode
                    })
                });
                const data = await res.json();

                if (data.duplicate) {
                    showToast('❌ Rak sudah pernah discan!', 'error');
                    addScanItem(kode, '--:--:--', true);
                    return;
                }
                if (!data.success) throw new Error(data.error);

                document.getElementById('beepOk').play().catch(() => {});
                state.scanList.push({
                    kode,
                    waktu: data.waktu_scan
                });
                addScanItem(kode, data.waktu_scan, false);
                document.getElementById('totalCount').textContent = data.total;
                document.getElementById('btnFinish').disabled = false;

            } catch (e) {
                showToast('❌ ' + e.message, 'error');
            }

            e.target.focus();
        });

        function addScanItem(kode, waktu, isDup) {
            const list = document.getElementById('scanList');
            const no = isDup ? '!' : (state.scanList.length);
            const div = document.createElement('div');
            div.className = 'scan-item' + (isDup ? ' duplicate' : '');
            div.innerHTML = `
        <span class="scan-no">${no}</span>
        <span class="scan-code">${kode}</span>
        <span class="scan-time">${waktu}</span>
    `;
            list.prepend(div);
            if (isDup) setTimeout(() => div.remove(), 2000);
        }

        // ── SELESAI ──
        document.getElementById('btnFinish').addEventListener('click', async () => {
            if (!confirm(`Selesaikan transfer?\nTotal: ${state.scanList.length} rak`)) return;

            try {
                const res = await fetch('/transfer-rak/finish', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': CSRF
                    },
                    body: JSON.stringify({
                        transfer_rak_id: state.transferId
                    })
                });
                const data = await res.json();
                if (!data.success) throw new Error(data.error);

                showToast(`✓ Selesai! ${data.total} rak tersimpan`, 'success');
                resetForNewTransfer();
            } catch (e) {
                showToast('❌ ' + e.message, 'error');
            }
        });

        // ── BATAL ──
        document.getElementById('btnCancel').addEventListener('click', async () => {
            if (!confirm('Batalkan transfer ini?')) return;

            if (state.transferId) {
                await fetch('/transfer-rak/cancel', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': CSRF
                    },
                    body: JSON.stringify({
                        transfer_rak_id: state.transferId
                    })
                });
            }
            showToast('Transfer dibatalkan', 'error');
            resetForNewTransfer();
        });

        function resetForNewTransfer() {
            state.transferId = null;
            state.isActive = false;
            state.scanList = [];

            // Reset supir & mobil (operator TETAP)
            supirInput.value = '';
            mobilInput.value = '';
            document.getElementById('displaySupir').textContent = 'Belum diisi';
            document.getElementById('displaySupir').classList.add('empty');
            document.getElementById('displayMobil').textContent = 'Belum scan';
            document.getElementById('displayMobil').classList.add('empty');

            // Tampilkan setup & mulaiFooter, sembunyikan centerActions
            document.getElementById('setupPanel').classList.remove('hidden');
            document.getElementById('mulaiFooter').classList.remove('hidden');
            document.getElementById('centerActions').classList.remove('visible');
            const scanInput = document.getElementById('scanInput');
            scanInput.disabled = true;
            scanInput.placeholder = 'Operator belum siap...';
            scanInput.value = '';

            document.getElementById('totalCount').textContent = '0';
            document.getElementById('scanList').innerHTML = '';
            document.getElementById('btnFinish').disabled = true;

            // Reset button state
            document.getElementById('btnMulaiIcon').textContent = '🔒';
            document.getElementById('btnMulaiText').textContent = 'MULAI TRANSFER';
            document.getElementById('btnMulaiHint').textContent = 'Isi supir & scan kendaraan terlebih dahulu';
            document.getElementById('btnMulaiHint').style.color = '#64748b';

            checkStartReady();
            supirInput.focus();
        }

        function showToast(msg, type = 'error') {
            const t = document.createElement('div');
            t.className = `toast ${type}`;
            t.textContent = msg;
            document.body.appendChild(t);
            setTimeout(() => t.remove(), 3000);
        }

        // Buka modal operator saat pertama load
        document.addEventListener('DOMContentLoaded', () => {
            openOperatorModal();

            // ── NAVBAR HIDE/SHOW on scan-list scroll ──
            const scanList = document.getElementById('scanList');
            const navbar = document.getElementById('navbar');
            let lastScroll = 0;

            scanList.addEventListener('scroll', () => {
                const current = scanList.scrollTop;
                if (current > lastScroll + 10 && current > 30) {
                    navbar?.classList.add('hide');
                } else if (current < lastScroll - 10) {
                    navbar?.classList.remove('hide');
                }
                lastScroll = current;
            }, {
                passive: true
            });
        });
    </script>
>>>>>>> b99a10f (29-04-2026)
