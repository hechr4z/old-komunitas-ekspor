<!DOCTYPE html>
<html lang="in">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Meta Tags -->
  <meta name="title" content="<?= $artikel['meta_title'] ?? $meta->meta_title ?? 'Jago Digital Marketing' ?>">
  <meta name="description" content="<?= $artikel['meta_description'] ?? $meta->meta_description ?? 'Default description for Jago Digital Marketing' ?>">

  <!-- Canonical Tag -->
  <link rel="canonical" href="<?= $canonicalUrl ?? base_url() ?>">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

  <title><?= $meta->meta_title ?? $artikel['meta_title'] ?? 'Jago Digital Marketing' ?></title>

  <link rel="icon" type="image/x-icon" href="<?= base_url('assets-new/images/favicon.png') ?>">
  <link href="<?= base_url('assets-new/css/jdm.css') ?>" rel="stylesheet">

</head>


<body>
  <?php
  $session = session();
  $loggedIn = $session->get('logged_in');

  // Check if the 'view' query parameter is set in the URL
  if (isset($_GET['view'])) {
    $selectedView = $_GET['view'];

    // Validate the selected view and store it in the session
    if (in_array($selectedView, ['admin', 'member', 'nonmember'])) {
      $session->set('admin_view', $selectedView);
    }
  }

  // Get the current view from the session
  $currentView = $session->get('admin_view');

  // Admin can switch views based on their selection
  if ($session->get('role') == 'admin' && $currentView) {
    if ($currentView == 'admin') {
      // Load admin view
      echo $this->include('NewUser/layout/headerAdmin.php');
    } elseif ($currentView == 'member') {
      // Load member view
      echo $this->include('NewUser/layout/headerMember.php');
    } elseif ($currentView == 'nonmember') {
      // Load non-member view
      echo $this->include('NewUser/layout/headerNonMember.php');
    }
  } else {
    // Default behavior for normal users (non-admins)
    if ($loggedIn) {
      echo $this->include('NewUser/layout/headerMember.php');
    } else {
      echo $this->include('NewUser/layout/headerNonMember.php');
    }
  }
  ?>



  <?= $this->renderSection('content'); ?>



  <!-- Remove the container if you want to extend the Footer to full width. -->
  <div class="section mt-5">
    <!-- Footer -->
    <footer
      class="text-center text-lg-start text-white"
      style="background-color: #87D5C8">
      <!-- Grid container -->
      <div class="container p-4 footer-links">
        <!-- Section: Links -->
        <section class="">
          <!--Grid row-->
          <div class="row">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">
                Jago Digital Marketing
              </h6>
              <p>
                <?= isset($contact['deskripsi']) ? $contact['deskripsi'] : 'All Rights Reserved'; ?>
              </p>
            </div>
            <!-- Grid column -->

            <hr class="w-100 clearfix d-md-none" />

            <!-- Grid column -->
            <hr class="w-100 clearfix d-md-none" />

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
              <p><i class="fas fa-home mr-3"></i><?= isset($contact['alamat']) ? $contact['alamat'] : 'All Rights Reserved'; ?></p>
              <p><i class="fas fa-envelope mr-3"></i> <?= isset($contact['email']) ? $contact['email'] : 'All Rights Reserved'; ?></p>
              <p><i class="fas fa-phone mr-3"></i> <?= isset($contact['no_hp']) ? $contact['no_hp'] : 'All Rights Reserved'; ?></p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>
              <?php if (!empty($socialmedia)): ?>
                <?php foreach ($socialmedia as $social): ?>
                  <a href="<?= $social->link_sosmed ?>">
                    <img src="/uploads/socialmedia_icons/<?= $social->icon_sosmed ?>" alt="<?= $social->nama_sosmed ?>">
                  </a>
                <?php endforeach; ?>
              <?php endif; ?>


            </div>

          </div>
          <!--Grid row-->
        </section>
        <!-- Section: Links -->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2); color: #fff;">
        &copy; <?= date('Y'); ?> <?= isset($layout['copyright']) ? $layout['copyright'] : 'All Rights Reserved'; ?>
      </div>

      <!-- Copyright -->
    </footer>
    <!-- Footer -->
  </div>
  <!-- End of .container -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Initialize Tabs -->
  <script>
    $(document).ready(function() {
      // Initialize Bootstrap tabs
      var triggerTabList = [].slice.call(document.querySelectorAll('#myTab button'))
      triggerTabList.forEach(function(triggerEl) {
        var tabTrigger = new bootstrap.Tab(triggerEl)
        triggerEl.addEventListener('click', function(event) {
          event.preventDefault()
          tabTrigger.show()
        })
      })
      // Activate the first tab by default
      document.getElementById("personal-info-tab").click()
    })
  </script>
</body>

</html>