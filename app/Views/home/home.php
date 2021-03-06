<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
<div class="row">
                        <?php if(in_groups('administrator')) : ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total User</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $user; ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif;?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Laporan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $laporan; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-6 col-sm-12 col-md-12">
                            <p>
                                <?= $catatan; ?>
                            </p>
                        </div>
                    </div>


<?= $this->endSection() ?>  