<?php $this->setVar('title', 'Edit Content Planner'); ?>
<?= $this->extend('NewUser/layout/app'); ?>
<?= $this->section('content'); ?>
<!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" /> -->

<style>
    .card {
        background-color: #e9ecef;
        padding: 20px;
        border-radius: 30px;
        margin-bottom: 20px;
    }

    .card-content {
        padding: 15px;
        background-color: #ffff;
    }

    .container {
        margin-top: 20px;
    }

    .header {
        margin-top: 30px;
        position: relative;
        padding-bottom: 20px;
    }

    .form-control,
    .btn {
        border-radius: 0.25rem;
        /* Bootstrap default border-radius */
    }

    .button-container {
        display: flex;
        gap: 10px;
    }

    .button-container .btn {
        flex-shrink: 0;
        /* Mencegah tombol mengecil */
        white-space: nowrap;
        /* Mencegah teks membungkus ke baris berikutnya */
    }
</style>

<!-- start text header and line -->
<div class="container">
    <div class="mt-4">
        <div class="card bg-white">
            <div class="card-body d-flex flex-wrap justify-content-between align-items-center">
                <div class="col-12 col-md-6">
                    <h2 class="display-7 mb-0">Content Planner</h2>
                </div>
                <!-- Tambahkan d-flex justify-content-center pada layar kecil -->
                <div
                    class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end text-center text-md-end mt-3 mt-md-0">
                    <div class="dropdown">
                        <button id="current-page-btn" class="btn btn-primary dropdown-toggle px-3" style="border-radius: 10px;"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $title ?? 'Content Planner' ?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="<?= base_url('/content-calendar'); ?>">Content Calendar</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('/set-up'); ?>">Set Up</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('/kpi'); ?>">Matrics</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="contentPlannerForm" action="<?= base_url('/content-planner/update/' . $c_planners['id_content_planner']); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
        <input type="hidden" name="id" value="<?= $c_planners['id_content_planner']; ?>">
        <div class="card">
            <!-- Info Date -->
            <div class="mb-4 left-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 id="dateDisplay" class="m-0 text-primary fw-bold"></h5>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5 mb-4">
                    <!-- Link Video -->
                    <label for="gdrive-link">Link Google Drive</label>
                    <div class="input-group mb-3 px-2 py-2 bg-white shadow-sm">
                        <textarea name="gdrive_link" id="gdrive-link" type="url" placeholder="Contoh: https://drive.google.com/file/d/[ID]/view?usp=sharing" class="form-control border-0" autocomplete="off"><?= esc($c_planners['link_gdrive']) ?></textarea>
                    </div>
                </div>

                <!-- Form -->
                <div class="col-md-7">
                    <div class="row">
                        <!-- Social Media -->
                        <div class="form-group">
                            <label>Social Media</label>
                            <select class="form-control" name="sosial_media" required>
                                <?php foreach ($sosmeds as $sosmed): ?>
                                    <option value="<?= $sosmed['nama_sosial_media'] ?>"
                                        <?= $sosmed['nama_sosial_media'] == $c_planners['sosial_media'] ? 'selected' : '' ?>>
                                        <?= $sosmed['nama_sosial_media'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Content Type -->
                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label>Content Type</label>
                                <select class="form-control" name="content_type" required>
                                    <?php foreach ($c_types as $c_type): ?>
                                        <option value="<?= $c_type['nama_content_type'] ?>"
                                            <?= $c_type['nama_content_type'] == $c_planners['content_type'] ? 'selected' : '' ?>>
                                            <?= $c_type['nama_content_type'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <!-- Content Pillar -->
                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label>Content Pillar</label>
                                <select class="form-control" name="content_pillar" required>
                                    <?php foreach ($c_pillars as $c_pillar): ?>
                                        <option value="<?= $c_pillar['nama_content_pillar'] ?>"
                                            <?= $c_pillar['nama_content_pillar'] == $c_planners['content_pillar'] ? 'selected' : '' ?>>
                                            <?= $c_pillar['nama_content_pillar'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status" required>
                                    <option value="Planning" <?= $c_planners['status'] === 'Planning' ? 'selected' : '' ?>>
                                        Planning
                                    </option>
                                    <option value="In Progress" <?= $c_planners['status'] === 'In Progress' ? 'selected' : '' ?>>
                                        In Progress
                                    </option>
                                    <option value="Posted" <?= $c_planners['status'] === 'Posted' ? 'selected' : '' ?>>
                                        Posted
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Caption -->
                    <div class="form-group">
                        <label>Caption</label>
                        <textarea class="form-control" rows="5" placeholder="Caption" name="caption"><?= esc($c_planners['caption']) ?></textarea>
                    </div>

                    <!-- CTA Link -->
                    <div class="form-group">
                        <label>CTA / Link</label>
                        <textarea type="text" class="form-control" placeholder="CTA / Link" name="cta_link"><?= esc($c_planners['cta_link']) ?></textarea>
                    </div>

                    <!-- Hashtag -->
                    <div class="form-group">
                        <label>Hashtag</label>
                        <textarea type="text" class="form-control" placeholder="Hashtag" name="hashtag"><?= esc($c_planners['hashtag']) ?></textarea>
                    </div>

                    <!-- Date -->
                    <div class="form-group">
                        <label>Post Date</label>
                        <input type="date" class="form-control" name="post_date" id="dateInput" required>
                    </div>

                    <!-- Button Add Content -->
                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" id="submitBtn" class="btn btn-warning">
                            Ubah
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var submitBtn = document.getElementById('submitBtn');
        var form = document.getElementById('contentPlannerForm');
        var statusField = document.querySelector('select[name="status"]');

        submitBtn.addEventListener('click', function(e) {
            // Mencegah submit form langsung
            e.preventDefault();

            var selectedStatus = statusField.value;

            if (selectedStatus === 'Posted') {
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Jika Anda mengubah status menjadi 'Posted', file content planner akan dihapus.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, ubah!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika user menekan 'Ya', submit form
                        form.submit();
                    }
                    // Jika user menekan 'Batal', tidak ada tindakan yang dilakukan
                });
            } else {
                // Jika status bukan 'Posted', langsung submit form
                form.submit();
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        var dateInput = document.getElementById('dateInput');
        var dateDisplay = document.getElementById('dateDisplay');

        // Ambil tanggal saat ini
        var dateData = new Date("<?= date('Y-m-d', strtotime($c_planners['post_date'])) ?>");
        var options = {
            day: '2-digit',
            month: 'long',
            year: 'numeric'
        };
        var formattedDate = dateData.toLocaleDateString('id-ID', options); // Format tanggal sesuai lokal ID

        // Tampilkan tanggal saat ini
        dateDisplay.textContent = formattedDate;

        // Set nilai input date ke tanggal saat ini
        dateInput.valueAsDate = dateData;

        dateInput.addEventListener('change', function() {
            var selectedDate = new Date(dateInput.value);
            var formattedDate = selectedDate.toLocaleDateString('id-ID', options);

            dateDisplay.textContent = formattedDate;
        });
    });
</script>

<?= $this->endSection('content'); ?>