<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Change Profile</h6>
                        </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <form action="<?php base_url(); ?>/users/update_profile">
                                <input type="hidden" name="id" value="<?= user()->id; ?>">
                                    <div class="form-group mb-3">
                                        <label for="inputEmail4" class="form-label">Full Name</label>
                                        <input type="text" name="username" class="form-control" value="<?= user()->username; ?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="inputEmail4" class="form-label">Email</label>
                                        <input type="text" name="email" class="form-control" value="<?= user()->email; ?>">
                                    </div>
                                    <input type="submit" class="btn btn-info px-3" value="Save">
                                </form>
                            </div>
                        </div>
                    <!-- Copy Fields -->
                    </div>
                </div>
 
<?= $this->endSection() ?> 