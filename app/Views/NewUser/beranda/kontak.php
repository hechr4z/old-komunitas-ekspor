<?= $this->extend('NewUser/layout/app'); ?>
<?= $this->section('content'); ?>

<section class="banner">
    <div class="container">
        <div class="row align-items-center">
            <!-- Contact Section -->
            <div class="col-md-6">
                <div class="contact-section">
                    <h1 class="contact-title">Kontak</h1>
                    <hr class="contact-divider">
                    
                    <!-- Contact Form -->
                    <form action="<?= base_url('contact/submit') ?>" method="post">
                        <div class="form-group">
                            <label for="name">Nama:</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan Nama" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan Email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">No HP:</label>
                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Masukkan No.HP" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Pesan:</label>
                            <textarea id="message" name="message" class="form-control" rows="4" placeholder="Masukkan Pesan" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>

            <!-- Map Section -->
            <div class="col-md-5">
                <div class="map-container">
                    <div id="map" class="map"></div>
                    <!-- Logo and Address Section -->
                    <div class="map-info">
                        <i class="fas fa-map-marker-alt map-icon"></i>
                        <p class="map-address">Jalan Danau Amora No.C5 E8, Sawojajar, 1 Kota Malang, Jawa Timur 65138</p>
                    </div>
                    <div id="telephone" class="telephone"></div>
        <!-- Logo and Address Section -->
                    <div class="telephone-info">
                        <i class="fas fa-phone-alt map-icon"></i>
                        <p class="telephone-address">0822-9266-7951 (WhatsApp)</p>
                    </div>

                    <div class="email-info">
    <i class="fas fa-at map-icon"></i>
    <p class="email-address">hello@coding.id</p>
</div>

<div class="instagram-info">
                        <i class="fab fa-instagram map-icon"></i>
                        <p class="instagram-address">coding_id</p>
                    </div>

                    <div class="telegram-info">
                        <i class="fab fa-telegram map-icon"></i>
                        <p class="telegram-address">Coding.ID Information</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid features-section">
    <div class="content-wrapper">
        <div class="row feature-details">
            <div class="col-md-6 mt-5">
                <!-- Additional content -->
            </div>
        </div>
    </div>
</section>

<style>
    /* Banner Section */
    .banner {
        padding: 100px;
    }

    .banner .row.align-items-center {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        justify-content: center;
        max-width: 1200px;
        flex-wrap: wrap;
    }

    /* Contact Section */
    .contact-section {
        background-color: transparent;
        border: none;
        box-shadow: none;
        margin-bottom: 30px;
    }

    .contact-title {
        color: #87D5C8;
        margin-bottom: 0;
    }

    .contact-divider {
        border: none;
        border-top: 6px solid #87D5C8;
        width: 130px;
        margin-top: 0;
    }

    /* Form Styling */
    .form-group {
        margin-bottom: 15px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    /* Button Styling */
    .btn-primary {
        background-color: #F69E00;
        border: none;
        padding: 10px 20px;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #d68900;
    }

    /* Map Section */
    .map-container {
        width: 100%;
        height: 400px; 
        margin-bottom: 30px;
        position: relative; /* To position the logo and text correctly */
    }

    .map {
        width: 90%;
        height: 50%;
    }

    .map-info {
        position: absolute;
        bottom: 100px;
        left: 10px;
        background-color: rgba(255, 255, 255, 0.7); /* Semi-transparent background */
        padding: 10px;
        border-radius: 5px;
        display: flex;
        align-items: center;
        
    }

    .map-icon {
    font-size: 24px; /* Adjust icon size as needed */
    margin-right: 15px; /* Space between icon and address */
    }

    .map-address {
        margin: 0;
        font-size: 14px;
    }

    /* Telephone Section */
    .telephone-container {
        width: 100%;
        height: 400px; 
        margin-bottom: 30px;
        position: relative; /* To position the logo and text correctly */
    }

    .telephone-info {
        position: absolute;
        bottom: 60px;
        left: 10px;
        background-color: rgba(255, 255, 255, 0.7); /* Semi-transparent background */
        padding: 10px;
        border-radius: 5px;
        display: flex;
        align-items: center;
        
    }

    .telephone-icon {
    font-size: 24px; /* Adjust icon size as needed */
    margin-right: 15px; /* Space between icon and address */
    }

    .telephone-address {
        margin: 0;
        font-size: 14px;
    }

    /*Email Section { */
    .email-container {
    width: 100%;
    height: 400px; 
    margin-bottom: 70px;
    position: relative; /* Untuk memposisikan logo dan teks dengan benar */
}

.email-info {
    position: absolute;
    bottom: 20px;
    left: 10px;
    background-color: rgba(255, 255, 255, 0.7); /* Latar belakang semi-transparan */
    padding: 10px;
    border-radius: 5px;
    display: flex;
    align-items: center;
}

    .email-icon {
    font-size: 24px; /* Adjust icon size as needed */
    margin-right: 15px; /* Space between icon and address */
    }

    .email-address {
        margin: 0;
        font-size: 14px;
    }

    /* Instagram Section */
    .instagram-container {
        width: 100%;
        height: 400px; 
        margin-bottom: 30px;
        position: relative; /* To position the logo and text correctly */
    }

    .instagram-info {
        position: absolute;
        bottom: -20px;
        left: 15px;
        background-color: rgba(255, 255, 255, 0.7); /* Semi-transparent background */
        padding: 10px;
        border-radius: 5px;
        display: flex;
        align-items: center;
        
    }

    .instagram-icon {
    font-size: 24px; /* Adjust icon size as needed */
    margin-right: 15px; /* Space between icon and address */
    }

    .instagram-address {
        margin: 0;
        font-size: 14px;
    }

    /* Telegram Section */
    .telegram-container {
        width: 100%;
        height: 400px; 
        margin-bottom: 30px;
        position: relative; /* To position the logo and text correctly */
    }

    .telegram-info {
        position: absolute;
        bottom: -60px;
        left: 15px;
        background-color: rgba(255, 255, 255, 0.7); /* Semi-transparent background */
        padding: 10px;
        border-radius: 5px;
        display: flex;
        align-items: center;
        
    }

    .telegram-icon {
    font-size: 24px; /* Adjust icon size as needed */
    margin-right: 15px; /* Space between icon and address */
    }

    .telegram-address {
        margin: 0;
        font-size: 14px;
    }



</style>

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<!-- Leaflet JavaScript -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    // Initialize map
    var map = L.map('map', {
        center: [51.505, -0.09],
        zoom: 13,
        dragging: false // Disable dragging
    });

    // Add tile layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Add marker
    L.marker([51.5, -0.09]).addTo(map)
        .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
        .openPopup();
</script>
<?= $this->endsection(); ?>
