<?php $this->setVar('title', 'SEO Checker');; ?>
<?= $this->extend('NewUser/layout/app'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    .card {
        background-color: #f5f5f5;
    }

    .result-section {
        border-radius: 5px;
        padding: 15px;
        margin: 10px 0;
        background-color: #fafafa;
    }

    .result-title {
        font-size: 1.2em;
        font-weight: bold;
        margin-bottom: 10px;
        color: #333;
    }

    .result-container {
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background-color: #fff;
        text-align: left;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .result-label {
        font-size: 1.1em;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .result-description {
        font-size: 0.9em;
        color: #666;
    }

    .result-good {
        color: green;
    }

    .result-needs-improvement {
        color: orange;
    }

    .result-poor {
        color: red;
    }

    .timestamp {
        font-size: 0.9em;
        color: #888;
        margin-top: 10px;
    }

    .loading {
        font-style: italic;
        color: #666;
    }

    .comparison-container {
        display: flex;
        justify-content: space-between;
        gap: 20px;
    }

    .comparison-container>div {
        flex: 1;
        padding: 15px;
        background-color: #fff;
        min-height: 400px;
    }

    .comparison-title {
        font-size: 1.2em;
        font-weight: bold;
        margin-bottom: 10px;
        color: #333;
    }

    .comparison-content {
        font-size: 0.9em;
        color: #666;
    }

    .card {
        min-height: 400px;
    }
</style>

<div class="container mt-4">
    <div class="card py-4 bg-secondary-subtle">
        <h2 class="text-center mb-4">PageSpeed Checker</h2>

        <!-- Input dan tombol sejajar pada layar besar, tombol berada di bawah input pada layar kecil -->
        <div class="container">
            <div class="row justify-content-center mb-3">
                <div class="col-12 col-md-8">
                    <div class="d-flex flex-column flex-md-row align-items-center">
                        <input type="text" id="url" class="form-control mb-2 mb-md-0 me-md-2 rounded" placeholder="Masukkan URL">
                        <button id="checkPerformance" class="btn btn-primary d-flex align-items-center">
                            <i class="bi bi-lightning-fill me-2"></i> Analisa
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <p id="status" class="status-message text-center">Masukkan URL untuk memulai pengecekan.</p>

        <!-- Tabs untuk Desktop/Mobile -->
        <div class="tabs-container text-center mb-3">
            <button id="desktop-btn" onclick="selectMainTab('desktop')" class="btn btn-outline-success rounded me-2">
                <i class="bi bi-display me-2"></i> Desktop
            </button>
            <button id="mobile-btn" onclick="selectMainTab('mobile')" class="btn btn-outline-primary">
                <i class="bi bi-phone me-2"></i> Mobile
            </button>
        </div>
    </div>

    <!-- Hasil dari kombinasi Desktop/Mobile dan URL Penuh/Asal -->
    <!-- <div class="comparison-container">
        <div id="desktop-full" class="result-section">
            <div class="comparison-title">Desktop</div>
            <div class="comparison-content" id="desktop-full-content"></div>
        </div>

        <div id="mobile-full" class="result-section">
            <div class="comparison-title">Mobile</div>
            <div class="comparison-content" id="mobile-full-content"></div>
        </div>
    </div> -->

    <div class="comparison-container">
        <!-- Card untuk Desktop -->
        <div id="desktop-full" class="card result-section">
            <div class="card-header">
                <div class="comparison-title">Desktop</div>
            </div>
            <div class="card-body">
                <div class="comparison-content" id="desktop-full-content">
                </div>
            </div>
        </div>

        <!-- Card untuk Mobile -->
        <div id="mobile-full" class=" card result-section">
            <div class="card-header">
                <div class="comparison-title">Mobile</div>
            </div>
            <div class="card-body">
                <div class="comparison-content" id="mobile-full-content">
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    let isProcessing = false;

    // Set default ke Desktop dan URL Penuh saat halaman dimuat
    window.onload = function() {
        selectMainTab('desktop');
        selectSubTab('full');
    };

    document.getElementById("checkPerformance").addEventListener("click", function() {
        if (isProcessing) return; // Hindari permintaan ganda

        const urlInput = document.getElementById("url").value;

        // Cek apakah URL kosong
        if (!urlInput) {
            document.getElementById("status").innerHTML = "URL belum diisi. Masukkan URL yang valid.";
            return;
        }

        isProcessing = true; // Tandai proses sedang berlangsung
        document.getElementById("status").innerHTML = "Sedang memproses URL... Mohon tunggu...";

        let urlFull;

        // Validasi dan parsing URL
        try {
            const parsedUrl = new URL(urlInput);
            urlFull = urlInput;
        } catch (error) {
            document.getElementById("status").innerHTML = "URL yang Anda masukkan tidak valid.";
            isProcessing = false;
            return;
        }

        // Menyimpan status progres
        let completedRequests = 0;
        const totalRequests = 2;

        // Reset data sebelum memulai pengecekan ulang
        clearPreviousResults();

        // Proses untuk keempat kombinasi
        checkAllCombinations(urlFull, function() {
            completedRequests++;
            if (completedRequests === totalRequests) {
                document.getElementById("status").innerHTML = "Semua data berhasil diproses. Pilih tab untuk melihat hasil.";
                isProcessing = false; // Tandai proses selesai
            }
        });
    });

    // Reset hasil sebelum memulai request baru
    function clearPreviousResults() {
        document.getElementById("desktop-full").innerHTML = "";
        document.getElementById("mobile-full").innerHTML = "";
    }

    // Proses semua kombinasi
    function checkAllCombinations(urlFull, onComplete) {
        // Cek desktop untuk URL penuh
        getPageSpeedData(urlFull, 'desktop', 'desktop-full', 'Desktop', onComplete);


        // Cek mobile untuk URL penuh
        getPageSpeedData(urlFull, 'mobile', 'mobile-full', 'Mobile', onComplete);
    }

    // Ambil data dari API dan tampilkan hasilnya
    function getPageSpeedData(url, strategy, tabId, title, onComplete) {
        const apiUrl = `https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url=${encodeURIComponent(url)}&strategy=${strategy}`;

        // Tampilkan status loading di tab yang sedang di-request
        if (document.getElementById(tabId).innerHTML === "") {
            document.getElementById(tabId).innerHTML = `<p class="loading">Sedang memproses ${strategy.toUpperCase()} - ${tabId.includes('full') ? 'URL Penuh' : 'URL Asal'}...</p>`;
        }

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    document.getElementById(tabId).innerHTML = "Data tidak ditemukan atau terjadi kesalahan.";
                } else {
                    displayResults(data, tabId, title);
                }
                onComplete();
            })
            .catch(error => {
                console.error("Error fetching PageSpeed data:", error);
                document.getElementById(tabId).innerHTML = "Terjadi kesalahan saat mengambil data.";
                onComplete();
            });
    }

    // Tampilkan hasil
    // Tampilkan hasil
    function displayResults(data, tabId, title) {
        const fcp = parseFloat(data.lighthouseResult.audits['first-contentful-paint'].displayValue);
        const lcp = parseFloat(data.lighthouseResult.audits['largest-contentful-paint'].displayValue);
        const cls = parseFloat(data.lighthouseResult.audits['cumulative-layout-shift'].displayValue);
        const tbt = parseFloat(data.lighthouseResult.audits['total-blocking-time'].displayValue);
        const performanceScore = data.lighthouseResult.categories.performance.score * 100;

        function getPerformanceCategory(value, thresholds) {
            if (value <= thresholds.low) return 'Baik';
            if (value <= thresholds.medium) return 'Memerlukan Peningkatan';
            return 'Buruk';
        }

        function getColorClass(value, thresholds) {
            if (value <= thresholds.low) return 'result-good';
            if (value <= thresholds.medium) return 'result-needs-improvement';
            return 'result-poor';
        }

        function formatMetric(value, thresholds, label, description) {
            const performanceLabel = getPerformanceCategory(value, thresholds);
            const colorClass = getColorClass(value, thresholds);
            return `
                <div class="result-container ${colorClass}">
                    <div class="result-label">${label}: ${value} detik</div>
                    <p class="result-category">${performanceLabel}</p>
                    <p class="result-description">${description}</p>
                </div>
            `;
        }

        // Thresholds untuk masing-masing metrik (dalam detik atau milidetik)
        const thresholdsLCP = {
            low: 2.5,
            medium: 4
        }; // Detik
        const thresholdsFCP = {
            low: 1.8,
            medium: 3
        }; // Detik
        const thresholdsCLS = {
            low: 0.1,
            medium: 0.25
        }; // Skor
        const thresholdsTBT = {
            low: 300,
            medium: 600
        }; // Milidetik

        // Hitung jumlah hasil yang baik, buruk, dan memerlukan peningkatan
        const metrics = [{
                value: fcp,
                thresholds: thresholdsFCP
            },
            {
                value: lcp,
                thresholds: thresholdsLCP
            },
            {
                value: cls,
                thresholds: thresholdsCLS
            },
            {
                value: tbt / 1000,
                thresholds: thresholdsTBT
            }, // TBT dalam detik
            {
                value: performanceScore,
                thresholds: {
                    low: 90,
                    medium: 50
                }
            }
        ];

        let baikCount = 0;
        let perluPerbaikanCount = 0;
        let burukCount = 0;

        metrics.forEach(metric => {
            const category = getPerformanceCategory(metric.value, metric.thresholds);
            if (category === 'Baik') baikCount++;
            if (category === 'Memerlukan Peningkatan') perluPerbaikanCount++;
            if (category === 'Buruk') burukCount++;
        });

        // Ambil waktu saat ini
        const currentTime = new Date();
        const formattedTime = `${currentTime.getDate()} ${currentTime.toLocaleString('id-ID', { month: 'short' })} ${currentTime.getFullYear()}, ${currentTime.toLocaleTimeString('id-ID')}`;

        // Format hasil dengan waktu, judul, dan jumlah kategori
        document.getElementById(tabId).innerHTML = `
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
            <h5 class="card-title">${title}</h5>
            <div class="score-category d-flex flex-wrap gap-2 mt-2 mt-lg-0">
                <span class="badge bg-primary">Skor: ${performanceScore}</span>
                <span class="badge bg-success">Baik: ${baikCount}</span>
                <span class="badge bg-warning text-dark">Perlu Perbaikan: ${perluPerbaikanCount}</span>
                <span class="badge bg-danger">Buruk: ${burukCount}</span>
            </div>
        </div>
        <div class="card-body">
            ${formatMetric(lcp, thresholdsLCP, 'Largest Contentful Paint (LCP)', 'Largest Contentful Paint (LCP) mengukur waktu yang dibutuhkan untuk elemen konten terbesar pada halaman dimuat dan terlihat oleh pengguna.')}
            ${formatMetric(fcp, thresholdsFCP, 'First Contentful Paint (FCP)', 'First Contentful Paint (FCP) mengukur waktu yang dibutuhkan hingga elemen konten pertama kali dirender pada halaman.')}
            ${formatMetric(cls, thresholdsCLS, 'Cumulative Layout Shift (CLS)', 'Cumulative Layout Shift (CLS) mengukur seberapa sering elemen halaman berpindah posisi saat halaman dimuat, yang dapat memengaruhi pengalaman pengguna.')}
            ${formatMetric(tbt / 1000, thresholdsTBT, 'Total Blocking Time (TBT)', 'Total Blocking Time (TBT) mengukur total waktu dalam milidetik di mana thread utama terblokir dan tidak dapat merespons input pengguna.')}
            <div class="result-container ${getColorClass(performanceScore, {low: 90, medium: 50})}">
                <div class="result-label">Skor Performa: ${performanceScore}/100</div>
                <p class="result-category">${getPerformanceCategory(performanceScore, {low: 90, medium: 50})}</p>
            </div>
            <p class="timestamp">Laporan dari ${formattedTime}</p>
        </div>
    </div>
`;
    }




    // Fungsi untuk memilih tab utama (Desktop/Mobile)
    function selectMainTab(mode) {
        const allSubTabs = ['desktop-full', 'mobile-full'];
        allSubTabs.forEach(tab => document.getElementById(tab).style.display = 'none');

        const desktopBtn = document.getElementById('desktop-btn');
        const mobileBtn = document.getElementById('mobile-btn');

        if (mode === 'desktop') {
            desktopBtn.classList.add('active');
            mobileBtn.classList.remove('active');
            document.getElementById('desktop-full').style.display = 'block';
        } else {
            mobileBtn.classList.add('active');
            desktopBtn.classList.remove('active');
            document.getElementById('mobile-full').style.display = 'block';
        }
    }

    // Fungsi untuk memilih sub-tab (URL Penuh/Asal)
    function selectSubTab(urlType) {
        const mode = document.getElementById('desktop-btn').classList.contains('active') ? 'desktop' : 'mobile';

        const allSubTabs = {
            'desktop': {
                'full': 'desktop-full',
            },
            'mobile': {
                'full': 'mobile-full',
            }
        };

        // Sembunyikan semua tab
        Object.values(allSubTabs[mode]).forEach(tab => document.getElementById(tab).style.display = 'none');

        // Tampilkan tab yang dipilih
        const tabToShow = allSubTabs[mode][urlType];
        document.getElementById(tabToShow).style.display = 'block';
    }
</script>
<?= $this->endsection('content'); ?>