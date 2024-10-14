<?php $this->setVar('title', 'Content Planner'); ?>
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

  <form action="<?= base_url('/content-planner/add'); ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
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
          <textarea name="gdrive_link" id="gdrive-link" type="url" placeholder="Contoh: https://drive.google.com/file/d/[ID]/view?usp=sharing" class="form-control border-0" autocomplete="off"></textarea>
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
                  <option value="<?= $sosmed['nama_sosial_media'] ?>"><?= $sosmed['nama_sosial_media'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <!-- Content Type -->
            <div class="col-md-4 mb-2">
              <div class="form-group">
                <label>Content Type</label>
                <select class="form-control" name="content_type" required>
                  <?php foreach ($c_types as $c_type): ?>
                    <option value="<?= $c_type['nama_content_type'] ?>"><?= $c_type['nama_content_type'] ?></option>
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
                    <option value="<?= $c_pillar['nama_content_pillar'] ?>"><?= $c_pillar['nama_content_pillar'] ?>
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
                  <option value="Planning">Planning</option>
                  <option value="In Progress">In Progress</option>
                </select>
              </div>
            </div>
          </div>

          <!-- Caption -->
          <div class="form-group">
            <label>Caption</label>
            <textarea class="form-control" rows="5" placeholder="Caption" name="caption"></textarea>
          </div>

          <!-- CTA Link -->
          <div class="form-group">
            <label>CTA / Link</label>
            <textarea type="text" class="form-control" placeholder="CTA / Link" name="cta_link"></textarea>
          </div>

          <!-- Hashtag -->
          <div class="form-group">
            <label>Hashtag</label>
            <textarea type="text" class="form-control" placeholder="Hashtag" name="hashtag"></textarea>
          </div>

          <!-- Date -->
          <div class="form-group">
            <label>Post Date</label>
            <input type="date" class="form-control" name="post_date" id="dateInput" required>
          </div>

          <!-- Button Add Content -->
          <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn btn-primary">
              Simpan
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

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var dateInput = document.getElementById('dateInput');
    var dateDisplay = document.getElementById('dateDisplay');

    // Ambil tanggal saat ini
    var today = new Date();
    var options = {
      day: '2-digit',
      month: 'long',
      year: 'numeric'
    };
    var formattedDate = today.toLocaleDateString('id-ID', options); // Format tanggal sesuai lokal ID

    // Tampilkan tanggal saat ini
    dateDisplay.textContent = formattedDate;

    // Set nilai input date ke tanggal saat ini
    dateInput.valueAsDate = today;

    dateInput.addEventListener('change', function() {
      var selectedDate = new Date(dateInput.value);
      var formattedDate = selectedDate.toLocaleDateString('id-ID', options);

      dateDisplay.textContent = formattedDate;
    });
  });
</script>


<?= $this->endSection('content'); ?>