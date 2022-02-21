<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Laporan Baru</h6>
                        </div>
                    <div class="card-body">
                    <form method="post" id="form_tambah" action="<?php base_url(); ?>/laporan/create">
                    <input type="hidden" name="user_id[]" value="<?= user()->id; ?>">

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" id="namalengkap" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                            </div>
                         
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Jenis kerusakan</label>
                            <table class="table table-striped kotak">
                                <tbody id="tabel_tambah">
                                    <tr>
                                    <td><input type="text" name="nama_mesin[]" placeholder="Masukan Field..." class="form-control border-0" style="background: transparent ;" required></td>
                                    <td> 
                                    <select class="form-control border-0 bg-transparent" name="keterangan[]" required>
                                            <option>Pilih Keterangan</option>
                                            <option  value="result">Result</option>
                                            <option value="judgement">Judgement</option>
                                    </select>
                                    </td>
                                    <td>
                                    <div class="input-group-btn"> 
                                        <button class="btn btn-success" id="btn_tambahform" type="button"><i class="fas fa-plus"></i></button>
                                    </div>
                                    </td>
                                    </tr>  
                                </tbody>
                            </table>
                            </div>       
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                     <!-- Copy Fields -->
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

        $('#form_tambah').submit(function() {
                    preventDefault();
                        for (let i = 0; i < response.jumlah_data; i++) {
                            // Mengambil input nama user
                            let ipt_nama = document.getElementById('tabel_tambah').children[i].children[0].children[0];
                            // Menghilangkan element small
                            ipt_nama.nextElementSibling.nextElementSibling.nextElementSibling.style = 'display: none;';
                            // Jika pada input nama user tersebut terdapat error
                            if (response[i].nama) {
                                ipt_nama.classList.remove('is-valid');
                                ipt_nama.classList.add('is-invalid');
                                ipt_nama.nextElementSibling.innerHTML = response[i].nama;
                            } else {
                                ipt_nama.classList.remove('is-invalid');
                                ipt_nama.classList.add('is-valid');
                            }

                            // Mengambil input tanggal lahir
                            let ipt_tgl = document.getElementById('tabel_tambah').children[i].children[1].children[0];
                            // Menghilangkan element small
                            ipt_tgl.nextElementSibling.nextElementSibling.nextElementSibling.style = 'display: none;';
                            // Jika pada input tanggal lahir tersebut terdapat error
                            if (response[i].tanggal) {
                                ipt_tgl.classList.remove('is-valid');
                                ipt_tgl.classList.add('is-invalid');
                                ipt_tgl.nextElementSibling.innerHTML = response[i].tanggal;
                            } else {
                                ipt_tgl.classList.remove('is-invalid');
                                ipt_tgl.classList.add('is-valid');
                            }
                            // Mengambil input mesin
                            let ipt_mesin = document.getElementById('tabel_tambah').children[i].children[1].children[0];
                            // Menghilangkan element small
                            ipt_mesin.nextElementSibling.nextElementSibling.nextElementSibling.style = 'display: none;';
                            // Jika pada input tanggal lahir tersebut terdapat error
                            if (response[i].nama_mesin) {
                                ipt_mesin.classList.remove('is-valid');
                                ipt_mesin.classList.add('is-invalid');
                                ipt_mesin.nextElementSibling.innerHTML = response[i].nama_mesin;
                            } else {
                                ipt_mesin.classList.remove('is-invalid');
                                ipt_mesin.classList.add('is-valid');
                            }

                            // Mengambil input kewarganegaraan
                            let ipt_ngr = document.getElementById('tabel_tambah').children[i].children[2].children[0];
                            // Menghilangkan element small
                            ipt_ngr.nextElementSibling.nextElementSibling.nextElementSibling.style = 'display: none;';
                            // Jika pada input kewarganegaraan tersebut terdapat error
                            if (response[i].keterangan) {
                                ipt_ngr.classList.remove('is-valid');
                                ipt_ngr.classList.add('is-invalid');
                                ipt_ngr.nextElementSibling.innerHTML = response[i].keterangan;
                            } else {
                                ipt_ngr.classList.remove('is-invalid');
                                ipt_ngr.classList.add('is-valid');
                            }
                        }
                        return false;
        });
    // Jika tombol tambah form ditekan
    $('#btn_tambahform').click(function(e){
            // Append form baru
            $('#tabel_tambah').append(`<tr>
                          <td><input type="text" name="nama_mesin[]" placeholder="Masukan Field..." class="form-control border-0" style="background: transparent ;" required></td>
                             <td> 
                             <select class="form-control border-0 bg-transparent" name="keterangan[]">
                                        
                                            <option value="result">Result</option>
                                            <option value="judgement">Judgement</option>
                                       
                                    </select>
                                  </td>
                                   <td>
                                   <div class="input-group-btn"> 
                                <button class="btn btn-danger" id="btn_hapusform" type="button"><i class="fas fa-minus"></i></button>
                                </div>
                                </td>
                                    </tr>`)
        })
    });

    // Pada dokumen jika ada, dan jalankan ketika btn_hapusform ditekan
    $(document).on('click', '#btn_hapusform', function() {
        $(this).parents('tr').remove();
    });





        // Jika tombol kembali ditekan
        $('#btn_kembali').click(function(e) {
            dataUser();
        });

</script>
 
<?= $this->endSection() ?>  