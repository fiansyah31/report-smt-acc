<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Mengatur Email</h6>
                        </div>

                        <div class="card-body">
                        <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                        <div class="table">
                           
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <form action="<?php base_url(); ?>/email/updateemail/<?= $change['id_email'];?>" method="post">
                                        <input type="hidden" name="id" value="<?= $change['id_email']; ?>">
                                        <div class="form-group mb-3">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" value="<?= $change['email']; ?>">
                                            <div class="mt-2">
                                                <span  style="font-size: 13px;">Gunakan email yang aktif</span>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info px-3">Save</button>
                                        </form>
                                    </div>
                                                                 
                                  
                                </div>
                         
                        </div>
                        </div>
                     
                    </div>
 
  
 
 
<?= $this->endSection() ?>  