<<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

    <!-- News With Sidebar Start -->
    <div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="row">
               <div class="col-lg-8">
                    <div class="position-relative mb-3">
                        <!--<img class="img-fluid rounded" src="<?= base_url('assets-baru') ?>/img/<?= $member['foto_member']; ?>" style="max-width: 300px; height: auto; margin: auto; display: block;">-->
                        <img class=" w-100 rounded" src="<?= base_url('assets-baru') ?>/img/<?= $member['foto_member']; ?>" style="max-width: 400px; height: auto; margin: auto; display: block;">
                        <div class="bg-white border border-top-0 p-4">
                            <div class="mb-3">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                   href="<?= base_url('dpc/' . $member['id_dpc']) ?>"><?= $member['nama_dpc']?></a>
                                <a class="text-body"></a>
                            </div>
                            <h1 class="mb-3 text-secondary text-uppercase font-weight-bold"><?= $member['nama_member']; ?></h1>
                            <div class="mb-3">
                                <h5 class="text-secondary font-weight-bold">Informasi pribadi</h5>
                                <ul class="list-unstyled">
                                    <li><strong>Status Kepengurusan:</strong> <?= $member['status_kepengurusan']; ?></li>
                                    <li><strong>Alamat:</strong> <?= $member['alamat_member']; ?></li>
                                    <li><strong>No. HP:</strong> <?= $member['no_hp_member']; ?></li>
                                    <li><strong>Email:</strong> <?= $member['email_member']; ?></li>
                                    <li><strong>Instagram:</strong> <?= $member['ig_member']; ?></li>
                                    <li><strong>Facebook:</strong> <?= $member['fb_member']; ?></li>
                                    <li><strong>Jenis Kelamin:</strong> <?= $member['jenis_kelamin']; ?></li>
                                </ul>
                            </div>
                            <div class="mb-3">
                                <h5 class="text-secondary font-weight-bold">Pendidikan & Pekerjaan</h5>
                                <p><strong>Pendidikan:</strong> <?= $member['pendidikan_member']; ?></p>
                                <p><strong>Pekerjaan:</strong> <?= $member['pekerjaan_member']; ?></p>
                            </div>
                            <div class="mb-3">
                                <h5 class="text-secondary font-weight-bold">Sertifikasi</h5>
                                <p><?= $member['sertifikasi_member']; ?></p>
                            </div>
                           <div style="mb-3">
                                <a href="<?= base_url('assets-baru') ?>/img/<?= $member['cv_member']; ?>" download="cv_member">
                                    <button style="background-color: #D20000; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                                        Download CV
                                    </button>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Popular News Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Member Lainnya</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" style="object-fit: cover;" src="<?= base_url('assets-baru') ?>/img/<?= $member['foto_member']; ?>" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="<?= base_url('dpc/' . $member['id_dpc']) ?>"><?= $member['nama_dpc']?></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="<?= base_url('/member/detail/' . $member['id_member'] . '/' . $member['slug']) ?>"><?= $member['nama_member']; ?></a>
                                </div>
                            </div>
                            <?php foreach ($member_lain as $member_item) : ?>
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" style="object-fit: cover;" src="<?= base_url('assets-baru') ?>/img/<?= $member_item['foto_member']; ?>" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="<?= base_url('dpc/' . $member_item['id_dpc']) ?>"><?= $member_item['nama_dpc']?></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="<?= base_url('/member/detail/' . $member_item['id_member'] . '/' . $member_item['slug']) ?>"><?= $member_item['nama_member']; ?></a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->


<?= $this->endSection('content'); ?>