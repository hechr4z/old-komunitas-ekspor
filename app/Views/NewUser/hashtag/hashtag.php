<?php $this->setVar('title', 'Hashtag Generator');; ?>
<?= $this->extend('NewUser/layout/app'); ?>
<?= $this->section('content'); ?>
<style>
    .hashtag-container {
        display: flex;
        flex-wrap: wrap;
        /* Ensure items wrap to a new line */
        gap: 10px;
        /* Space between each hashtag item */
        max-width: 100%;
        /* Make sure the container takes the full width */
        padding: 10px 0;
        word-wrap: break-word;
        /* Allow long words (hashtags) to break if too long */
    }

    .hashtag-item {
        display: inline-block;
        background-color: #f0f0f0;
        padding: 5px 10px;
        border-radius: 5px;
        margin-bottom: 10px;
        word-break: break-all;
        /* Ensure very long words break properly */
    }

    .hashtag-item input[type="checkbox"] {
        margin-right: 10px;
    }

    .card-body {
        margin-top: 10px;
    }

    .card-body {
        min-height: 200px;
    }

    .card-petunjuk {
        background-color: #5865f2;
    }
</style>
<div class="container mt-4">
    <div class="row">
        <!-- Left Panel -->
        <div class="col-md-6 col-lg-8 mb-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center mb-4"></i> Hashtag Generator</h2>
                    <form id="hashtag-form">
                        <div class="mb-3">
                            <label for="topic" class="form-label">Topik atau caption <span class="text-danger">*</span></label>
                            <input type="text" id="hashtag-input" class="form-control" placeholder="Masukan topik atau kata tanpa spasi">
                            <div id="alert-placeholder" class="mt-2"></div>
                        </div>
                        <button type="button" id="generate-btn" class="btn btn-primary w-100"><i class="fas fa-cogs"></i> Generate</button>
                    </form>

                    <div class="card mt-3">
                        <div class="card-body">
                            <div id="hasil" class="hashtag-container"></div>
                        </div>
                    </div>
                    <button id="select-all-btn" class="btn btn-secondary mt-3">Select All</button>
                    <button id="copy-btn" class="btn btn-success mt-3"><i class="fas fa-copy"></i> Copy</button>
                </div>
            </div>
        </div>

        <!-- Right Panel -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card card-petunjuk">
                <div class="card-body text-white">
                    <h4 class="text-center">Cara Penggunaan</h4>
                    <p class="paragraf">Tingkatkan jangkauan media sosial Anda dengan Pembuat Tagar kami yang canggih. Buat tagar yang relevan dan sedang tren untuk meningkatkan visibilitas konten Anda dan menarik minat audiens target Anda di berbagai platform.</p>
                    <ul class="list-unstyled mt-4">
                        <li class="mb-2"><i class="fas fa-check-circle"></i> Masukan kata atau topik yang terkait dengan konten</li>
                        <li class="mb-2"><i class="fas fa-check-circle"></i> Tekan Generate dan Pilih Hashtag yang ingin dipakai</li>
                        <li><i class="fas fa-check-circle"></i> Pilih Copy untuk menyalin hashtag</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JavaScript Libraries -->
<script src="<?= base_url('hashtag_generator/hashtag.js'); ?>"></script>

<?= $this->endsection(); ?>