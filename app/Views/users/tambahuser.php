<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah User</h6>
                        </div>
                    <div class="card-body">
                    <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                            <form class="user" action="<?= base_url(); ?>/users/tambah" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" nama="id_karyawan"
                                        placeholder="ID Karyawan">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" nama="username"
                                        placeholder="Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" nama="email"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" nama="password_hash"
                                        placeholder="Password">
                                </div>
                                
                                <button type="submit" class="btn btn-primary px-3">
                                    Tambah user
                                </button>
                            </form>

                            </div>
                        </div>
                    <!-- Copy Fields -->
                    </div>
                </div>
 
<?= $this->endSection() ?> 