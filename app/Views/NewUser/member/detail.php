<?= $this->extend('NewUser/layout/app'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <!-- Member Details (Top Section for photo and information) -->
        <div class="col-lg-8">
            <div class="card p-4 shadow-sm">
                <!-- Image at the top -->
                <div class="text-center mb-3">
                    <img src="<?= base_url('uploads/photos/' . $member->foto_member) ?>" class="img-fluid rounded" alt="<?= $member->nama_member ?>" style="max-height: 350px; width: 100%; object-fit: cover;">
                </div>

                <!-- Member Information -->
                <h2 class="text-center mb-4"><?= strtoupper($member->nama_member ?? 'Nama Tidak Diketahui') ?></h2>

                <!-- Badge with city/region -->
                <div class="text-center mb-2">
                    <span class="badge badge-lg bg-light text-dark p-2" style="font-size: 18px;"><?= $member->nama_provinsi ?? 'Wilayah Tidak Diketahui' ?></span>
                </div> 

                <!-- Tabs Navigation -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="personal-info-tab" data-bs-toggle="tab" data-bs-target="#personal-info" type="button" role="tab" aria-controls="personal-info" aria-selected="true">Informasi Pribadi</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="education-job-tab" data-bs-toggle="tab" data-bs-target="#education-job" type="button" role="tab" aria-controls="education-job" aria-selected="false">Pendidikan & Pekerjaan</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="certification-tab" data-bs-toggle="tab" data-bs-target="#certification" type="button" role="tab" aria-controls="certification" aria-selected="false">Sertifikasi</button>
                    </li>
                </ul>

                <!-- Tabs Content -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="personal-info" role="tabpanel" aria-labelledby="personal-info-tab">
                    <h1></h1>
                    <h1></h1>
                    <h1></h1>
                    <h5>Informasi pribadi</h5>
                        <p><strong>Status Kepengurusan:</strong> <?= $member->status_kepengurusan ?? 'Tidak Diketahui' ?></p>
                        <p><strong>Alamat:</strong> <?= $member->alamat_member ?? 'Alamat Tidak Diketahui' ?></p>
                        <p><strong>No. HP:</strong> <?= $member->no_hp_member ?? 'No Telepon Tidak Diketahui' ?></p>
                        <p><strong>Email:</strong> <?= $member->email_member ?? 'Email Tidak Diketahui' ?></p>
                        <p><strong>Instagram:</strong> <?= $member->ig_member ?? 'Instagram Tidak Diketahui' ?></p>
                        <p><strong>Facebook:</strong> <?= $member->fb_member ?? 'Facebook Tidak Diketahui' ?></p>
                        <p><strong>Jenis Kelamin:</strong> <?= $member->jenis_kelamin ?? 'Jenis Kelamin Tidak Diketahui' ?></p>
                    </div>
                    <div class="tab-pane fade" id="education-job" role="tabpanel" aria-labelledby="education-job-tab">
                    <h1></h1>
                    <h1></h1>
                    <h1></h1> 
                    <h5>Pendidikan & Pekerjaan</h5>
                        <p><strong>Pendidikan:</strong> <?= $educationJob->pendidikan_member ?? 'Pendidikan Tidak Diketahui' ?></p>
                        <p><strong>Pekerjaan:</strong> <?= $educationJob->pekerjaan_member ?? 'Pekerjaan Tidak Diketahui' ?></p>
                    </div>
                    <div class="tab-pane fade" id="certification" role="tabpanel" aria-labelledby="certification-tab">
                    <h1></h1>
                    <h1></h1>
                    <h1></h1>    
                    <h5>Sertifikasi</h5>
                        <p><?= $member->sertifikasi_member ?? 'Sertifikasi Tidak Diketahui' ?></p>
                    </div>
                </div>

                <!-- Download CV button -->
                <div class="text-center">
                    <a href="<?= base_url('uploads/cv/' . $member->cv_member) ?>" class="btn btn-primary mt-3">
                        <i class="fas fa-download"></i> Download CV
                    </a>
                </div>
            </div>
        </div>

        <!-- Member Lainnya (right side) -->
        <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="mb-3">
                <div class="section-title mb-0">
                    <h4 class="m-0 text-uppercase font-weight-bold">
                        Member Lainnya
                        <?php if (!empty($other_members)): ?>
                            <?php if (!empty($other_members[0]->nama_kota)): ?>
                                <a class="badge badge-secondary text-uppercase font-weight-semi-bold p-1 mr-2 text-truncate"
                                    href="<?= base_url('kota/' . $other_members[0]->id_kota) ?>"
                                    style="font-size: 12px;">
                                    <?= $other_members[0]->nama_kota ?>
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </h4>
                </div>
                <div class="bg-light border border-top-0 p-3 rounded shadow-sm">
                    <?php if (!empty($other_members)): ?>
                        <?php foreach ($other_members as $other_member) : ?>
                            <div class="d-flex align-items-center bg-white mb-3 rounded border border-light overflow-hidden shadow-sm">
                                <img class="img-fluid" style="object-fit: cover; width: 100px; height: 100px;"
                                    src="<?= base_url('uploads/members/' . $other_member->foto_member) ?>" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center">
                                    <a href="<?= base_url('/member/detail/' . $other_member->id_member) ?>"
                                        class="text-dark text-uppercase font-weight-bold text-truncate"
                                        style="font-size: 12px; flex-grow: 0; margin-bottom: 10px; word-wrap: break-word; white-space: normal;">
                                        <?= $other_member->nama_member; ?>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-center text-muted">Tidak ada member terkait.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<style>
    .img-fluid {
        border-radius: 8px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        object-fit: cover;
    }

    .card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .card h2 {
        font-size: 28px;
        font-weight: bold;
    }

    .card p {
        margin: 5px 0;
        color: #666;
    }

    .badge-lg {
        font-size: 16px;
        padding: 10px 15px;
        border-radius: 8px;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
    }

    .section-title {
        border-bottom: 2px solid #ddd;
        margin-bottom: 10px;
        padding-bottom: 5px;
    }

    .bg-light {
        background-color: #f8f9fa !important;
    }

    .badge {
        font-size: 12px;
        padding: 5px 10px;
        background-color: #007bff;
        color: white;
    }

    /* Add spacing between tabs and content */
    .tab-content {
        margin-top: 20px; /* Adjust the value as needed */
    }

    /* Add spacing around the tabs */
    .navbar-nav {
        margin-bottom: 20px; /* Adjust the value as needed */
    }

    /* Add padding to the tab content */
    .tab-pane {
        padding: 20px; /* Adjust the value as needed */
        background-color: #f9f9f9; /* Optional: Add a background color for better visual separation */
        border-radius: 8px; /* Optional: Add rounded corners */
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); /* Optional: Add a shadow for better visual separation */
    }

    /* Add margin to the heading */
    .tab-pane h5 {
        margin-top: 20px; /* Adjust the value as needed */
    }

    /* Add margin to the top of the tab content */
    .tab-pane p {
        margin-top: 10px; /* Adjust the value as needed */
    }
</style>
