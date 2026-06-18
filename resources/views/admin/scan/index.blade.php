<x-admin-layout>
    <x-slot name="title">Scan Tickets — Admin</x-slot>

    <div class="admin-header">
        <div>
            <h1 class="admin-page-title">Scan Tickets</h1>
            <p class="admin-page-sub">Verify tickets at the entrance</p>
        </div>
    </div>

    <div class="scan-layout">

        {{-- Kamera scanner --}}
        <div class="scan-camera-box">
            <div id="qrReader"></div>
            <div class="scan-controls">
                <button id="startBtn" class="btn-gold">Start Camera</button>
                <button id="stopBtn" class="admin-action-btn" style="display:none;">Stop</button>
            </div>
        </div>

        {{-- Hasil scan --}}
        <div class="scan-result" id="scanResult">
            <div class="scan-result-empty">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="1.2">
                    <path d="M3 7V5a2 2 0 0 1 2-2h2M17 3h2a2 2 0 0 1 2 2v2M21 17v2a2 2 0 0 1-2 2h-2M7 21H5a2 2 0 0 1-2-2v-2"/>
                    <line x1="3" y1="12" x2="21" y2="12"/>
                </svg>
                <p>Point camera at a ticket QR code</p>
            </div>
        </div>

    </div>

    @push('scripts')
    <script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>
    <script>
        const resultEl  = document.getElementById('scanResult');
        const startBtn  = document.getElementById('startBtn');
        const stopBtn   = document.getElementById('stopBtn');
        const csrfToken = "{{ csrf_token() }}";
        let html5Qr = null;
        let busy = false;
        let currentCode = null;

        function detailsHtml(order) {
            if (!order) return '';
            return `<div class="scan-card-details">
                <div><span>Code</span><span>${order.code}</span></div>
                <div><span>Event</span><span>${order.event}</span></div>
                <div><span>Buyer</span><span>${order.buyer}</span></div>
                <div><span>Type</span><span>${order.type}</span></div>
                <div><span>Quantity</span><span>${order.quantity}</span></div>
            </div>`;
        }

        function iconFor(status) {
            if (status === 'valid' || status === 'done') return '✓';
            if (status === 'used' || status === 'cancelled') return '!';
            return '✕';
        }

        // Tampilkan hasil cek (dengan tombol konfirmasi kalau valid)
        function renderCheck(status, message, order) {
            let html = `<div class="scan-card scan-${status}">`;
            html += `<div class="scan-card-icon">${iconFor(status)}</div>`;
            html += `<h3 class="scan-card-title">${message}</h3>`;
            html += detailsHtml(order);

            // Kalau valid → tampilkan tombol konfirmasi
            if (status === 'valid') {
                html += `<div class="scan-confirm-actions">
                    <button id="confirmBtn" class="btn-gold">Confirm Entry</button>
                    <button id="cancelBtn" class="admin-action-btn">Cancel</button>
                </div>`;
            } else {
                html += `<button id="againBtn" class="admin-action-btn" style="margin-top:16px;">Scan Again</button>`;
            }

            html += `</div>`;
            resultEl.innerHTML = html;

            // Pasang event tombol
            const confirmBtn = document.getElementById('confirmBtn');
            const cancelBtn  = document.getElementById('cancelBtn');
            const againBtn   = document.getElementById('againBtn');

            if (confirmBtn) confirmBtn.addEventListener('click', doConfirm);
            if (cancelBtn)  cancelBtn.addEventListener('click', resetScan);
            if (againBtn)   againBtn.addEventListener('click', resetScan);
        }

        // Hasil akhir setelah konfirmasi
        function renderDone(status, message, order) {
            let html = `<div class="scan-card scan-${status}">`;
            html += `<div class="scan-card-icon">${iconFor(status)}</div>`;
            html += `<h3 class="scan-card-title">${message}</h3>`;
            html += detailsHtml(order);
            html += `<button id="againBtn" class="admin-action-btn" style="margin-top:16px;">Scan Next</button>`;
            html += `</div>`;
            resultEl.innerHTML = html;
            document.getElementById('againBtn').addEventListener('click', resetScan);
        }

        // Step 1: cek tiket (tidak ubah status)
        async function checkCode(code) {
            if (busy) return;
            busy = true;
            currentCode = code;
            try {
                const res = await fetch("{{ route('admin.scan.check') }}", {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                    body: JSON.stringify({ code }),
                });
                const data = await res.json();
                renderCheck(data.status, data.message, data.order || null);
            } catch (e) {
                renderCheck('invalid', 'Terjadi kesalahan. Coba lagi.', null);
            }
        }

        // Step 2: konfirmasi (baru ubah status)
        async function doConfirm() {
            if (!currentCode) return;
            try {
                const res = await fetch("{{ route('admin.scan.confirm') }}", {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                    body: JSON.stringify({ code: currentCode }),
                });
                const data = await res.json();
                renderDone(data.status, data.message, data.order || null);
            } catch (e) {
                renderDone('invalid', 'Terjadi kesalahan. Coba lagi.', null);
            }
        }

        // Reset untuk scan berikutnya
        function resetScan() {
            busy = false;
            currentCode = null;
            resultEl.innerHTML = `<div class="scan-result-empty">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.2">
                    <path d="M3 7V5a2 2 0 0 1 2-2h2M17 3h2a2 2 0 0 1 2 2v2M21 17v2a2 2 0 0 1-2 2h-2M7 21H5a2 2 0 0 1-2-2v-2"/>
                    <line x1="3" y1="12" x2="21" y2="12"/>
                </svg>
                <p>Point camera at a ticket QR code</p>
            </div>`;
        }

        function onScanSuccess(decodedText) {
            checkCode(decodedText.trim());
        }

        startBtn.addEventListener('click', () => {
            html5Qr = new Html5Qrcode("qrReader");
            html5Qr.start(
                { facingMode: "environment" },
                { fps: 30, qrbox: { width: 240, height: 240 } },
                onScanSuccess
            ).then(() => {
                startBtn.style.display = 'none';
                stopBtn.style.display = 'inline-block';
            }).catch(err => {
                alert('Tidak bisa akses kamera: ' + err);
            });
        });

        stopBtn.addEventListener('click', () => {
            if (html5Qr) {
                html5Qr.stop().then(() => {
                    startBtn.style.display = 'inline-block';
                    stopBtn.style.display = 'none';
                });
            }
        });
    </script>
    @endpush

</x-admin-layout>