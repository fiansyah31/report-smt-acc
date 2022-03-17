<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Mesin</h6>
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
                                        <form class="needs-validation" action="<?php base_url(); ?>/data/save" method="post" enctype="multipart/form-data">
                                        <?php csrf_field() ?>
                                        <div class="form-group mb-3">
                                            <label>Nama Mesin</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('mesin')) ?
                                                                    'is-invalid' : ''; ?>" name="mesin">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('mesin'); ?>
                                            </div>
                                        </div>
                                        <!--<div class="form-group mb-3">
                                            <label>Foto Mesin</label>
                                            <input type="file" class="form-control <?= ($validation->hasError('foto_mesin')) ?
                                                                    'is-invalid' : ''; ?>" name="foto_mesin" id="foto_mesin" onchange="PreviewImg()">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('foto_mesin'); ?>
                                            </div>
                                            <div class="mt-2 mb-3">
                                            <label>Preview</label>
                                            <img src="/img/default.png" alt="" class="img-fluid img-preview">
                                            </div>
                                        </div>-->
                                        <button type="submit" class="btn btn-info px-3">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                     
                    </div>
<?= $this->endSection() ?>  
<?= $this->section('script-js') ?>    
 
<script type="text/javascript">
    function PreviewImg() {
            const sampul = document.querySelector('#foto_mesin');
            const imgpreview = document.querySelector('.img-preview');
            const sampullabel = document.querySelector('.custom-file-label');

            sampullabel.textContent = sampul.files[0].name;

            const filesampul = new FileReader();
            filesampul.readAsDataURL(sampul.files[0]);

            filesampul.onload = function(e) {
                imgpreview.src = e.target.result;
            }
        }
</script>
 
<?= $this->endSection() ?>  