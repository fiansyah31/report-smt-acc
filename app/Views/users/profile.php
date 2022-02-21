<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">My Profile</h6>
                        </div>
                    <div class="card-body">
                    <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                            <table class="table">
                                <tbody>
                                    <tr>
                                    <td>NIM</td>
                                    <td>:</td>
                                    <td><?= user()->nim; ?></td>
                                    </tr>
                                    <tr>
                                    <td>Full name</td>
                                    <td>:</td>
                                    <td><?= user()->username; ?></td>
                                    </tr>
                                    <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?= user()->email; ?></td>
                                    </tr>
                                    <tr>
                                    <td>NO HP</td>
                                    <td>:</td>
                                    <td><?= user()->no_hp; ?></td>
                                    </tr>
                                    <tr>
                                    <td>Address</td>
                                    <td>:</td>
                                    <td><?= user()->alamat; ?></td>
                                    </tr>
                                    <tr>
                                    <td>Universitas</td>
                                    <td>:</td>
                                    <td><?= user()->universitas; ?></td>
                                    </tr>
                                    <tr>
                                    <td>Jurusan</td>
                                    <td>:</td>
                                    <td><?= user()->jurusan; ?></td>
                                    </tr>
                                    <td><a href="/users/change_profile/<?= user()->id; ?>" class="btn btn-info px-3">Change</a></td>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    <!-- Copy Fields -->
                    </div>
                </div>
 
<?= $this->endSection() ?> 