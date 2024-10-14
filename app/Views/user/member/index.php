<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

    <!-- News With Sidebar Start -->
    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h4 class="m-0 text-uppercase font-weight-bold">Data Member</h4>
                        <!-- Formulir Pencarian dalam Bentuk Combobox dan Kolom Cari Samping-sampingan -->
                        <form action="<?= base_url('member/search') ?>" method="get" class="d-flex flex-column flex-md-row align-items-md-center">
                            <label for="dpc" class="mr-2">DPC</label>
                            <select name="dpc" class="mr-2 red-theme form-control">
                                <?php if (empty($dpc)) : ?>
                                    <option value="" selected>Semua</option>
                                <?php else : ?>
                                    <option value="">Semua</option>
                                    <?php foreach ($dpc as $wilayahdpc) : ?>
                                        <option value="<?= $wilayahdpc->nama_dpc; ?>"><?= $wilayahdpc->nama_dpc; ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <div class="input-group mt-2 mt-md-0 ml-md-auto" style="width: 100%; max-width: 300px;">
                                <input type="text" class="form-control border-0" name="search" placeholder="Kata Kunci">
                                <div class="input-group-append">
                                    <button class="input-group-text bg-primary text-dark border-0 px-3" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <?php if (empty($member)) : ?>
                <div class="row mt-3">
                    <div class="col-lg-12">
                        <div class="container text-center" style="min-height: 50vh; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                            <p>Tidak Ada Data Member Terkait</p>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="row">
                    <?php foreach ($member as $row) : ?>
                        <div class="col-lg-4">
                            <div class="position-relative mb-3">
                                <a href="<?= base_url('/member/detail/' . $row['id_member'] . '/' . $row['slug']) ?>">
                                    <img class="img-fluid w-100" style="width: 410px; height: 310px; object-fit:cover" src="<?= base_url('assets-baru') ?>/img/<?= $row['foto_member']; ?>" loading="lazy">
                                </a>
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="<?= base_url('member/detail/' . $row['id_member'] . '/' . $row['slug']) ?>"><?= $row['nama_dpc']?></a>
                                        <a class="text-body" href="<?= base_url('/member/detail/' . $row['id_member'] . '/' . $row['slug']) ?>"></a>
                                    </div>
                                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="<?= base_url('/member/detail/' . $row['id_member'] . '/' . $row['slug']) ?>"><?= $row['nama_member']; ?></a>
                                    <p><?= substr($row['pekerjaan_member'], 0, 30) ?>...</p> 
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- News With Sidebar End -->

    <!-- Menyesuaikan tata letak untuk memastikan footer tetap di bagian bawah -->
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }
    </style>

<?= $this->endSection('content'); ?>
