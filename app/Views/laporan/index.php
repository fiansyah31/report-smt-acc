<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Laporan</h6>
                        </div>
                        <form action="<?php base_url(); ?>/laporan/date" method="get">
                        <div class="card-body">
                        <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>

                  
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label>Tanggal Awal</label>
                                <input type="date" class="form-control" name="tanggal_awal" >
                            </div>
                            <div class="col-md-6">
                                <label>Sampai Tanggal</label>
                                <input type="date" class="form-control" name="tanggal_akhir" >
                            </div>
                            <div class="col-12 mt-3">
                                <button class="btn btn-info px-3" type="submit">Cari</button>
                            </div>
                        </div>
                        <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Lengkap</th>
                <th>Tanggal</th>
                <th style="width: 90px;">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 1; ?>
                    <?php foreach ($laporan as $k) { ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $k['nama']; ?></td>
                <td><?= $k['tanggal']; ?></td>
                <td style="width: 90px;">
                <a href="<?php base_url(); ?>/laporan/detail/<?= $k['id_laporan']; ?>" class="btn btn-info px-3">Lihat</a>
                <a href="<?php base_url(); ?>/laporan/delete/<?= $k['id_laporan']; ?>" class="btn btn-danger mt-2 px-3">Delete</a>
            </td>
            </tr>
            <?php } ?>
        </tbody>

        <tfoot>
            <tr>
                <th>ID</th>
                <th>Nama Lengkap</th>
                <th>Tanggal</th>
                <th style="width: 90px;">Action</th>
            </tr>
        </tfoot>
        <tbody>
                                          
        </tbody>
    </table>
</div>
                        </div>
                        </form>
                    </div>
 
<?= $this->endSection() ?>  
 
<?= $this->section('div-modal') ?>
     
<!-- ganti grup-->
<form action="<?= base_url(); ?>/users/changeGroup" method="post">
    <div class="modal fade" id="changeGroupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Grup</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="list-group-item p-3">
                        <div class="row align-items-start">
                            <div class="col-md-4 mb-8pt mb-md-0">
                                <div class="media align-items-left">
                                    <div class="d-flex flex-column media-body media-middle">
                                        <span
                                            class="card-title">Grup</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-8pt mb-md-0">
                                <select name="group" class="form-control" data-toggle="select" >
                                
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </div>
        </div>
    </div>
    </form>

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