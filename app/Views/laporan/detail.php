<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
                        </div>
                        <div class="container">

                            </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <div class="row">
                                    <div class="col-md-6">     
                                        <tr>     
                                            <td>ID KARYAWAN</td>
                                            <td>:</td>
                                            <td><?=$detail['idkaryawan'];?></td>
                                        </tr>
                                    </div>
                                    <div class="col-md-6">     
                                        <tr>     
                                            <td>Nama Lengkap</td>
                                            <td>:</td>
                                            <td><?=$detail['nama'];?></td>
                                        </tr>
                                    </div>
                                    <div class="col-md-6">
                                        <tr>
                                            <td>Tanggal</td>
                                            <td>:</td>
                                            <td><?=$detail['tanggal'];?></td>
                                        </tr>
                                    </div>
                                </div>
                            </table>
                                <div class="row">
                                    <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Mesin</th>
                                                    <th>Result</th>
                                                    <th>Judgement</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($keterangan as $ke) {?>
                                                <tr>     
                                                    <td><?= $ke['nama_mesin']; ?></td>
                                                    <td><?= $ke['result']; ?></td>
                                                    <td><?= $ke['judgement']; ?></td>
                                                </tr>
                                                <?php } ?>                                  
                                            </tbody>
                                        </table>
                                        <a href="<?php base_url(); ?>/laporan/index" class="btn btn-secondary px-3">Kembali</a>
                                        <a href="<?php base_url(); ?>/laporan/viewpdf/<?= $detail['id_laporan']; ?>" class="btn btn-warning px-3">Donwload pdf</a>
                                    </div>
                                    </div>
                                </div>
                        </div>
                    </div>

<?= $this->endSection() ?>  

<?= $this->section('script-js') ?>  
<script type="text/javascript">
    $(document).ready(function(){
        // get Delete Page
        $('.btn-active-users').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            const active = $(this).data('active');
             

            // Set data to Form Edit
            $('.id').val(id);
            $('.active').val(active);
            // Call Modal Edit
            $('#activateModal').modal('show');
        });
        $('.btn-change-group').on('click',function(){
    const id = $(this).data('id');
     
    $('.id').val(id);
    $('#changeGroupModal').modal('show');
});

    });
</script>
 
<?= $this->endSection() ?>  
