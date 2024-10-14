<?php $this->setVar('title', 'Content Calender');; ?>
<?= $this->extend('NewUser/layout/app'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
<style>
    .calendar-container {
        background-color: #d1d1d6;
        border-radius: 0.5rem;
        padding: 1rem;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    .calendar-header {
        border-bottom: 1px solid #000;
        padding-bottom: 0.5rem;
    }

    .calendar-controls button {
        border: none;
    }

    .table-bordered {
        border: none;
    }

    .table-bordered th,
    .table-bordered td {
        width: 14.285714%;
        height: 100px;
        border: 1px solid #dee2e6;
        position: relative;
        background-color: #f1f1f1;
    }

    .table-bordered th {
        height: 70px;
        border-top: 1px solid #dee2e6 !important;
        border-bottom: 1px solid #dee2e6 !important;
        border-left: none !important;
        border-right: none !important;
    }

    .event-rect,
    .event-rect-small,
    .event-rect-medium {
        color: white;
        padding: 5px;
        border-radius: 5px;
        text-align: center;
        position: absolute;
        width: 70%;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        cursor: pointer;
    }

    .event-rect {
        background-color: #007bff;
    }

    .event-rect-small {
        background-color: #28a745;
    }

    .event-rect-medium {
        background-color: #dc3545;
    }

    .event-detail strong {
        display: inline-block;
        width: 110px;
    }

    .event-detail p {
        margin: 0.5em 0;
    }

    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
        color: black;
    }

    .tab button.active {
        background-color: #555;
        color: white;
    }

    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }

    .tab button.instagram:hover,
    .tab button.instagram.active:hover {
        background-color: #E1306C;
        color: white;
    }

    @media (max-width: 768px) {
        .calendar-container {
            padding: 0.75rem;
        }

        .calendar-controls button {
            font-size: 0.75rem;
        }

        .event-rect,
        .event-rect-small,
        .event-rect-medium {
            font-size: 9px;
            width: 90%;
            top: 50px;
        }

        .table-bordered td {
            height: 80px;
        }
    }

    @media (max-width: 576px) {
        .calendar-container {
            padding: 0.5rem;
        }

        .calendar-controls button {
            font-size: 0.65rem;
        }

        .head h5 {
            font-size: 15px;
        }

        .head .btn-success {
            font-size: 7px;
        }

        .head input {
            font-size: 10px;
        }

        .head .btn-light {
            font-size: 8px;
        }

        .head i {
            font-size: 9px;
        }

        .table-responsive {
            font-size: 13px;
        }

        .event-rect,
        .event-rect-small,
        .event-rect-medium {
            font-size: 0.35rem;
            width: 60px;
            top: 40px;
        }

        .table-bordered td {
            height: 60px;
        }
    }

    /* @media (max-width: 320px) {
        .calendar-controls button {
            font-size: 0.5rem;
        }

        .head h5 {
            font-size: 7px;
        }

        .head .add {
            width: 35px;
            height: 17px;
            font-size: 2.5px;
            position: relative;
            right: 10px;
        }

        .head .add2 {
            width: 35px;
            height: 17px;
            font-size: 5px;
        }

        .head input {
            font-size: 5px;
            position: relative;
            left: 10px;
        }

        .head .btn-light {
            font-size: 7px;
            width: 7px;
            height: 20px;
            position: relative;
            left: 20px;
        }

        .head i {
            font-size: 10px;
            position: relative;
            right: 5px;
            bottom: 3px;
        }

        .table-responsive {
            font-size: 10px;
        }

        .event-rect,
        .event-rect-small,
        .event-rect-medium {
            font-size: 0.25rem;
            width: 80%;
            top: 35px;
        }

        .table-bordered td {
            height: 50px;
        }

        .modal {
            width: 300px;
            left: 10px;
        }
    } */
</style>

<!-- calendar -->
<div class="container mt-4">
    <h3>Content Calendar</h3>
    <hr>
    <div class="calendar-container mt-4">
        <div class="head d-flex flex-wrap justify-content-between align-items-center">
            <!-- Teks yang akan ditampilkan -->
            <h5 class="m-0 mb-2" id="dataDisplay"></h5>

            <!-- Kontrol kalender yang responsif -->
            <div class="calendar-controls d-flex align-items-center text-center ms-auto">
                <!-- Grouping picker bulan dengan tombol Cari -->
                <div class="input-group me-2 mb-md-0">
                    <input type="month" id="monthPicker" class="form-control-sm form-control" aria-label="Month Picker">
                    <button type="button" class="btn btn-primary" id="searchButton">
                        <i class="bi bi-search"></i>
                    </button>
                </div>

                <!-- Tombol Content Planner -->
                <a href="/content-planner" class="me-2">
                    <button type="button" class="add btn btn-success mb-md-0"><i class="bi bi-plus-lg"></i></button>
                </a>

                <!-- Tombol Bulan Sebelumnya dan Selanjutnya di sebelah kanan -->
                <button class="btn btn-light me-2" id="prevMonth">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button class="btn btn-light" id="nextMonth">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>
        </div>

        <div class="calendar-header mt-2"></div>
        <div class="table-responsive">
            <table class="table table-bordered text-center mt-4">
                <thead>
                    <tr id="daysRow">
                        <!-- Hari (Minggu-Sabtu) -->
                    </tr>
                </thead>
                <tbody class="text-end" id="datesBody">
                    <!-- Tanggal (Sesuai Bulan) -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Pop Up -->
<div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #87D5C8">
                <h5 class="modal-title" id="eventModalLabel1"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5">
                <!-- Tab links -->
                <div class="tab">
                    <?php foreach ($sosialmedia as $item) : ?>
                        <button class="tablinks <?= $item['nama_sosial_media'] ?>"
                            style="--hover-color: <?= $item['warna_sosial_media'] ?>;"
                            onmouseover="this.style.backgroundColor=this.style.getPropertyValue('--hover-color'); this.style.color='white';"
                            onmouseout="this.style.backgroundColor=''; this.style.color='';"
                            onclick="openPlatform(event, '<?= $item['nama_sosial_media'] ?>')">
                            <?= $item['nama_sosial_media'] ?>
                        </button>
                    <?php endforeach; ?>
                </div>
                <?php foreach ($sosialmedia as $item) : ?>
                    <div id="<?= $item['nama_sosial_media'] ?>" class="tabcontent">
                        <!-- Content -->
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function openPlatform(evt, platformName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(platformName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    document.querySelector('.btn.btn-primary').addEventListener('click', function() {
        // Mendapatkan nilai dari input type="month"
        var monthPickerValue = document.getElementById('monthPicker').value;

        if (monthPickerValue) {
            // Pisahkan nilai menjadi tahun dan bulan
            var [year, month] = monthPickerValue.split('-');

            // Buat tanggal baru berdasarkan tahun dan bulan yang dipilih
            var selectedDate = new Date(year, month - 1); // Bulan dalam JavaScript berbasis 0

            // Perbarui currentDate dengan tanggal yang dipilih
            currentDate = selectedDate;

            // Perbarui tampilan dengan tanggal yang dipilih
            updateDateDisplay(currentDate);
            updateCalendar(currentDate);
        }
    });

    // Mendapatkan data dari PHP (eventsByDate dan socialMediaColors) sebagai objek JavaScript
    var eventsByDate = <?= json_encode($eventsByDate) ?>;
    var socialMediaColors = <?= json_encode($socialMediaColors) ?>;

    // Mendapatkan elemen untuk baris hari, tubuh tabel, dan tampilan bulan
    var daysRow = document.getElementById('daysRow');
    var datesBody = document.getElementById('datesBody');

    // Array nama hari dalam Bahasa Indonesia
    var dayNames = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

    // Menampilkan hari dari Minggu hingga Sabtu di baris pertama
    dayNames.forEach(function(day) {
        var th = document.createElement('th');
        th.textContent = day;
        daysRow.appendChild(th);
    });

    // Mendapatkan bulan dan tahun saat ini
    var currentDate = new Date();
    var options = {
        year: 'numeric',
        month: 'long'
    };

    // Mendapatkan tanggal hari ini
    var today = new Date();

    // Fungsi untuk memperbarui tampilan bulan dan tahun
    function updateDateDisplay(date) {
        document.getElementById('dataDisplay').textContent = date.toLocaleDateString('id-ID', options);
    }

    // Fungsi untuk memperbarui tampilan tanggal sesuai bulan
    function updateCalendar(date) {
        // Kosongkan isi datesBody
        datesBody.innerHTML = '';

        // Mendapatkan jumlah hari dalam bulan yang sedang ditampilkan
        var year = date.getFullYear();
        var month = date.getMonth();
        var daysInMonth = new Date(year, month + 1, 0).getDate();

        // Mendapatkan hari pertama dalam bulan ini (0 = Minggu, 1 = Senin, ..., 6 = Sabtu)
        var firstDay = new Date(year, month, 1).getDay();

        // Mengisi tanggal-tanggal sesuai dengan minggunya
        var currentDay = 1;
        var tr = document.createElement('tr'); // Buat baris baru untuk minggu pertama

        // Isi baris pertama dengan tanggal yang tepat
        for (var i = 0; i < 7; i++) {
            var td = document.createElement('td');

            if (i >= firstDay && currentDay <= daysInMonth) {
                var span = document.createElement('span');
                span.textContent = currentDay;
                span.style.display = 'inline-block';
                span.style.padding = '5px';
                span.style.width = '33px';
                span.style.height = '33px';
                span.style.lineHeight = '20px';
                span.style.textAlign = 'center';
                span.style.borderRadius = '50%';

                // Tanggal dalam format YYYY-MM-DD
                var currentDateStr = year + '-' + String(month + 1).padStart(2, '0') + '-' + String(currentDay).padStart(2, '0');

                // Cek apakah ada event pada tanggal ini
                if (eventsByDate[currentDateStr]) {
                    // Object untuk mengelompokkan event berdasarkan post_date
                    var eventsGroupedByPostDate = {};

                    // Mengelompokkan event berdasarkan post_date
                    eventsByDate[currentDateStr].forEach(function(event) {
                        if (!eventsGroupedByPostDate[event.post_date]) {
                            eventsGroupedByPostDate[event.post_date] = [];
                        }
                        eventsGroupedByPostDate[event.post_date].push(event);
                    });

                    // Membuat div untuk setiap group post_date
                    Object.keys(eventsGroupedByPostDate).forEach(function(postDate) {
                        var events = eventsGroupedByPostDate[postDate];
                        var eventDiv = document.createElement('div');
                        eventDiv.className = 'event-rect';
                        eventDiv.setAttribute('data-bs-toggle', 'modal');
                        eventDiv.setAttribute('data-bs-target', '#eventModal');

                        // Jika hanya ada satu event, gunakan content_pillar dari event tersebut
                        if (events.length === 1) {
                            eventDiv.textContent = events[0].content_pillar;
                        } else {
                            // Jika lebih dari satu event, tampilkan "[Jumlah Data] Plan"
                            eventDiv.textContent = events.length + ' Plan';
                        }

                        // Set background color berdasarkan sosial media dari event pertama
                        var color = socialMediaColors[events[0].sosial_media];
                        if (color) {
                            eventDiv.style.backgroundColor = color;
                        }

                        // Menambahkan event listener untuk mengisi data modal ketika diklik
                        eventDiv.addEventListener('click', function() {
                            fillEventModal(currentDateStr, events);
                        });

                        td.appendChild(eventDiv);
                    });
                }

                // Cek apakah tanggal ini adalah hari ini
                if (year === today.getFullYear() && month === today.getMonth() && currentDay === today.getDate()) {
                    span.style.backgroundColor = '#87D5C8';
                }

                td.appendChild(span);
                currentDay++;
            }

            tr.appendChild(td);
        }

        datesBody.appendChild(tr);

        // Isi baris berikutnya hingga semua tanggal habis
        while (currentDay <= daysInMonth) {
            tr = document.createElement('tr');
            for (var i = 0; i < 7; i++) {
                var td = document.createElement('td');
                if (currentDay <= daysInMonth) {
                    var span = document.createElement('span');
                    span.textContent = currentDay;
                    span.style.display = 'inline-block';
                    span.style.padding = '5px';
                    span.style.width = '33px';
                    span.style.height = '33px';
                    span.style.lineHeight = '20px';
                    span.style.textAlign = 'center';
                    span.style.borderRadius = '50%';

                    // Tanggal dalam format YYYY-MM-DD
                    var currentDateStr = year + '-' + String(month + 1).padStart(2, '0') + '-' + String(currentDay).padStart(2, '0');

                    // Cek apakah ada event pada tanggal ini
                    if (eventsByDate[currentDateStr]) {
                        // Object untuk mengelompokkan event berdasarkan post_date
                        var eventsGroupedByPostDate = {};

                        // Mengelompokkan event berdasarkan post_date
                        eventsByDate[currentDateStr].forEach(function(event) {
                            if (!eventsGroupedByPostDate[event.post_date]) {
                                eventsGroupedByPostDate[event.post_date] = [];
                            }
                            eventsGroupedByPostDate[event.post_date].push(event);
                        });

                        // Membuat div untuk setiap group post_date
                        Object.keys(eventsGroupedByPostDate).forEach(function(postDate) {
                            var events = eventsGroupedByPostDate[postDate];
                            var eventDiv = document.createElement('div');
                            eventDiv.className = 'event-rect';
                            eventDiv.setAttribute('data-bs-toggle', 'modal');
                            eventDiv.setAttribute('data-bs-target', '#eventModal');

                            // Jika hanya ada satu event, gunakan content_pillar dari event tersebut
                            if (events.length === 1) {
                                eventDiv.textContent = events[0].content_pillar;
                            } else {
                                // Jika lebih dari satu event, tampilkan "[Jumlah Data] Plan"
                                eventDiv.textContent = events.length + ' Plan';
                            }

                            // Set background color berdasarkan sosial media dari event pertama
                            var color = socialMediaColors[events[0].sosial_media];
                            if (color) {
                                eventDiv.style.backgroundColor = color;
                            }

                            // Menambahkan event listener untuk mengisi data modal ketika diklik
                            eventDiv.addEventListener('click', function() {
                                fillEventModal(currentDateStr, events);
                            });

                            td.appendChild(eventDiv);
                        });
                    }

                    // Cek apakah tanggal ini adalah hari ini
                    if (year === today.getFullYear() && month === today.getMonth() && currentDay === today.getDate()) {
                        span.style.backgroundColor = '#87D5C8';
                    }

                    td.appendChild(span);
                    currentDay++;
                }
                tr.appendChild(td);
            }
            datesBody.appendChild(tr);
        }
    }

    function getPreviewLink(url) {
        if (url) {
            return url.replace('/view?usp=sharing', '/preview');
        }
        return ''; // Return an empty string if URL is null or undefined
    }

    function fillEventModal(dateStr, events) {
        // Ubah format post_date menjadi [Nama Hari], [Angka Tanggal] [Nama Bulan] [Angka Tahun]
        var date = new Date(events[0].post_date); // Menggunakan post_date dari event pertama
        var options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        var formattedDateStr = date.toLocaleDateString('id-ID', options);

        var modalTitle = 'Detail Kegiatan (' + formattedDateStr + '):';
        document.querySelector('#eventModal .modal-title').innerHTML = modalTitle;

        var eventByPlatform = {};

        // Memisahkan event berdasarkan sosial media
        events.forEach(function(event) {
            if (!eventByPlatform[event.sosial_media]) {
                eventByPlatform[event.sosial_media] = [];
            }
            eventByPlatform[event.sosial_media].push(event);
        });

        // Bersihkan konten setiap tab
        document.querySelectorAll('.tabcontent').forEach(function(tabContent) {
            tabContent.innerHTML = ''; // Kosongkan setiap tab terlebih dahulu
        });

        // Untuk setiap sosial media, isi konten yang sesuai
        Object.keys(eventByPlatform).forEach(function(socialMedia) {
            var tabContent = document.getElementById(socialMedia);

            var modalBodyList = '';

            eventByPlatform[socialMedia].forEach(function(event, index) {
                var planNumber = eventByPlatform[socialMedia].length > 1 ? `${index + 1}` : '1';
                var socialMediaName = event.sosial_media; // Ambil nama sosial media
                modalBodyList += `
                <ol class="event-detail list-group list-group mt-3">
                    <li class="list-group-item">
                        <strong>Plan Ke:</strong> ${planNumber} dari ${socialMediaName}<br>
                        <strong>Status:</strong> ${event.status}<br>
                        <strong>Content Type:</strong> ${event.content_type}<br>
                        <strong>Content Pillar:</strong> ${event.content_pillar}<br>
                        <strong style="display: flex;">Caption:</strong> ${event.caption}<br>
                        <strong>CTA/Link:</strong> ${event.cta_link}<br>
                        <strong>Hashtag:</strong> ${event.hashtag}<br>
                    </li>
                </ol>
            `;

                var filePath = getPreviewLink(event.link_gdrive);

                var mediaContent;
                if (filePath) {
                    mediaContent = '<div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%;"><iframe src="' + filePath + '" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
                } else {
                    mediaContent = '<img src="https://via.placeholder.com/800x450" alt="File Kegiatan" class="img-fluid rounded shadow-sm">';
                }

                modalBodyList += `
            <div class="text-center mt-3">
                ${mediaContent}
            </div>
            <div class="text-center mt-3 mb-2">
                <a href="/content-planner/edit/${event.id_content_planner}" class="btn btn-warning btn-edit">Edit Content Plan</a>
                <a href="#" class="btn btn-danger btn-delete" data-id="${event.id_content_planner}">Delete Content Plan</a>
            </div>
        `;
            });

            tabContent.innerHTML = modalBodyList; // Isi konten tab dengan data yang sesuai

            // Tambahkan event listener untuk tombol delete
            tabContent.querySelectorAll('.btn-delete').forEach(function(deleteBtn) {
                deleteBtn.addEventListener('click', function(e) {
                    e.preventDefault(); // Mencegah aksi default

                    var contentId = this.getAttribute('data-id'); // Ambil ID konten

                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Anda akan menghapus konten ini!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Jika user menekan 'Ya', arahkan ke URL hapus
                            window.location.href = '/content-planner/delete/' + contentId;
                        }
                        // Jika user menekan 'Batal', tidak ada tindakan yang dilakukan
                    });
                });
            });
        });

        // Secara otomatis membuka tab sosial media pertama
        var firstTab = document.querySelector('.tablinks');
        if (firstTab) {
            firstTab.click();
        }
    }

    // Menampilkan bulan dan kalender saat ini pada tampilan pertama
    updateDateDisplay(currentDate);
    updateCalendar(currentDate);

    // Event listener untuk tombol "chevron-left"
    document.getElementById('prevMonth').addEventListener('click', function() {
        currentDate.setMonth(currentDate.getMonth() - 1);
        updateDateDisplay(currentDate);
        updateCalendar(currentDate);
    });

    // Event listener untuk tombol "chevron-right"
    document.getElementById('nextMonth').addEventListener('click', function() {
        currentDate.setMonth(currentDate.getMonth() + 1);
        updateDateDisplay(currentDate);
        updateCalendar(currentDate);
    });
</script>
<?= $this->endSection('content'); ?>