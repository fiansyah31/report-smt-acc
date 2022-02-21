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
                                        <div class="form-group mb-3">
                                            <label>Email Saat ini</label>
                                            <?php foreach ($email as $k) : ?>
                                            <input type="text" class="form-control" name="email" value="<?= $k['email'];?>" disabled>
                                            <?php endforeach; ?>
                                            <div class="mt-2">
                                                <span  style="font-size: 13px;">Email ini digunakan untuk mengirim informasi ke user dan menerima informasi dari user</span>
                                            </div>
                                        </div>
                                        <a href="<?php base_url();?>/email/change/<?= $k['id_email']; ?>" class="btn btn-info px-3">Change</a>
                                        <form class="mt-2" action="<?php base_url();?>/email/tesemail">
                                            <button type="submit" class="btn btn-primary px-3">Tes Email</button>
                                     </form>
                                    </div>
                                                                 
                                  
                                </div>
                           
                        </div>
                        </div>
                       
                    </div>
 
  
 
 
<?= $this->endSection() ?>  