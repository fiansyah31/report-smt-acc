<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Laporan Baru</h6>
                        </div>
                    <div class="card-body">
                    <?php

use Kint\Zval\Value;

 if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                        <div class="row mb-5 mt-4 text-center">
                            <div class="col-sm-6 mb-2">
                                <img src="<?php base_url(); ?>/img/logo-inalum.png" alt="" class="img-fluid w-50">
                            </div>
                            <div class="col-sm-6 align-self-center">
                                <img src="<?php base_url(); ?>/img/Logo_BUMN_Untuk_Indonesia_2020.svg.png" alt="" class="img-fluid w-50">
                            </div>
                        </div>
                        <div class="mt-2 title-form">
                            <h2 class="text-center">
                                Weekly Inspection Report
                            </h2>
                        </div>
                        <div class="mt-2 mb-5 title-form">
                            <p class="text-center" style="font-size:20px;">
                            Anode Changing Crane
                            </p>
                        </div>
                    <form method="post" class="needs-validation" id="form_tambah" action="<?php base_url(); ?>/laporan/create" enctype="multipart/form-data">
                    <?php csrf_field() ?>
                    <input type="hidden" name="user_id[]" value="<?= user()->id; ?>">

                        <div class="row mb-3">
                            <div class="col-md-2">
                                <label for="inputEmail4" class="form-label">ID KARYAWAN</label>
                                <input type="text" class="form-control" name="idkaryawan" value="<?= user()->id_karyawan; ?>" id="idkaryawan" required>
                            </div>
                            <div class="col-md-2">
                                <label for="inputEmail4" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" value="<?= user()->fullname; ?>" id="namalengkap" required>
                            </div>
                            <div class="col-md-2">
                                <label for="inputEmail4" class="form-label">ACC</label>
                                <input type="text" class="form-control" name="acc" required>
                            </div>
                            <div class="col-md-2">
                                <label for="inputPassword4" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                            </div>
                            <div class="col-md-2">
                                <label for="inputPassword4" class="form-label">Jam Mulai</label>
                                <input type="time" class="form-control" name="jam_mulai" id="tanggal" required >
                            </div>
                            <div class="col-md-2">
                                <label for="inputPassword4" class="form-label">Jam Selesai</label>
                                <input type="time" class="form-control" name="jam_selesai" id="tanggal" required>
                            </div>                 
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Jenis kerusakan</label>
                            <table class="table table-striped kotak">
                                <tbody id="tabel_tambah">                           
                                    <tr>
                                    <td>
                                        <select class="form-control border-0 bg-transparent <?= ($validation->hasError('nama_mesin')) ?
                                                                    'is-invalid' : ''; ?>" name="nama_mesin[]" required >
                                            <option selected disabled value="">Pilih Mesin</option>                                       
                                            <option  value="Air Compressor - Oil(level/dirty)">Air Compressor - Oil(level/dirty)</option>
                                            <option  value="Air Compressor - Belt for inter cooler(Looseness)">Air Compressor - Belt for inter cooler(Looseness)</option>
                                            <option  value="Air Compressor - Pipes & Joints(Leakage)">Air Compressor - Pipes & Joints(Leakage)</option>
                                            <option  value="Air Compressor - V-Belt(Cracking, Looseness)">Air Compressor - V-Belt(Cracking, Looseness)</option>
                                            <option  value="Air Compressor - Oil Filter(Dirty)">Air Compressor - Oil Filter(Dirty)</option>
                                            <option  value="ELECTRIC ROOM COOLER - Evaporator(Dirty)">ELECTRIC ROOM COOLER - Evaporator(Dirty)</option>                                                                                     
                                            <option  value="ELECTRIC ROOM COOLER - Condensor(Dirty)">ELECTRIC ROOM COOLER - Condensor(Dirty)</option>                                                                                     
                                            <option  value="ELECTRIC ROOM COOLER - Air Filter(Dirty)">ELECTRIC ROOM COOLER - Air Filter(Dirty)</option>                                                                                     
                                            <option  value="ELECTRIC ROOM COOLER - Cover Bolt(Loosening)">ELECTRIC ROOM COOLER - Cover Bolt(Loosening)</option>                                                                                     
                                            <option  value="BREAKER MAST - CB Slewing Cyclo">BREAKER MAST - CB Slewing Cyclo</option>                                                                                     
                                            <option  value="BREAKER MAST - CB Slewing Cyclo - Setting Bolt(Loosening)">BREAKER MAST - CB Slewing Cyclo - Setting Bolt(Casing)</option>                                                                                     
                                            <option  value="BREAKER MAST - CB Slewing Cyclo - Stud Bolt(Casing) (Loosening)">BREAKER MAST - CB Slewing Cyclo - Stud Bolt(Casing) (Loosening)</option>                                                                                     
                                            <option  value="BREAKER MAST - CB Slewing Cyclo - Pind Bolt(Casing) (Loosening)">BREAKER MAST - CB Slewing Cyclo - Pind Bolt(Casing) (Loosening)</option>                                                                                     
                                            <option  value="BREAKER MAST - Swivel Joint(In B.Mast) (Lubrication)">Swivel Joint(In B.Mast) (Lubrication)</option>                                                                                     
                                            <option  value="BREAKER MAST - Swivel Joint(at A.Spout) (Lubrication)">Swivel Joint(at A.Spout) (Lubrication)</option>     
                                            <option  value="HYD PUMP P1 (Leakage on Shaft Seal)">HYD PUMP P1 (Leakage on Shaft Seal)</option>     
                                            <option  value="HYD PUMP P2 (Leakage on Shaft Seal)">HYD PUMP P2 (Leakage on Shaft Seal)</option>     
                                            <option  value="HYD PUMP P2 (Leakage on Flange)">HYD PUMP P2 (Leakage on Flange)</option>     
                                            <option  value="TRAVERSING UNIT - Coupling Bolt(Loosening)">TRAVERSING UNIT - Coupling Bolt(Loosening)</option>     
                                            <option  value="TRAVERSING UNIT - Rubber Ring(Elasticyty)">TRAVERSING UNIT - Rubber Ring(Elasticyty)</option>     
                                            <option  value="TRAVERSING UNIT - Bolt for Gear Coupling(Loosening)">TRAVERSING UNIT - Bolt for Gear Coupling(Loosening)</option>                                                                                                                                                                                  
                                            </select>
                              
                                    <div class="invalid-feedback">
                            <?= $validation->getError('nama_mesin'); ?>
                        </div>
                        <input type="text" class="form-control mt-2" placeholder="Temuan Tambahan(Optional)" name="temuan[]">
                            </td>
                    
                                    <td> 
                                    <select class="form-control border-0 bg-transparent <?= ($validation->hasError('result')) ?
                                                                    'is-invalid' : ''; ?>" name="result[]" required>
                                            <option selected disabled value="">Pilih Result</option>
                                            <option  value="Good">Good</option>
                                            <option value="Abnormal Condition">Abnormal Condition</option>
                                            <option value="Leaking(bocor)">Leaking(bocor)</option>
                                            <option value="Lower Level">Abnormal Condition</option>
                                            <option value="Upper Level">Upper Level</option>
                                            <option value="Loosening(lepas)">Loosening(lepas)</option>
                                            <option value="Stack(kendor)">Stack(kendor)</option>
                                            <option value="Rough Surface">Rough Surface</option>
                                            <option value="Crack(retak)">Crack(retak)</option>
                                            <option value="Broken(rusak,patah)">Broken(rusak,patah)</option>
                                            <option value="Wear(aus)">Wear(aus)</option>
                                            <option value="Clogging(sumbat)">Clogging(sumbat)</option>
                                            <option value="Bending(bengkok)">Bending(bengkok)</option>
                                            <option value="Miss Aligment">Miss Aligment</option>
                                            <option value="Dirty(kotor)">Dirty(kotor)</option>
                                    </select>
                                   
                                    <div class="invalid-feedback">
                            <?= $validation->getError('result'); ?>
                        </div>
                        
                                    </td>
                                    <td> 
                                    <select class="form-control border-0 bg-transparent <?= ($validation->hasError('judgement')) ?
                                                                    'is-invalid' : ''; ?>" name="judgement[]" required>
                                            <option selected disabled value="">Pilih Judgement</option>
                                            <option  value="Adjustment">Adjustment</option>
                                            <option value="Cleaning">Cleaning</option>
                                            <option value="Fastening">Fastening</option>
                                            <option value="Repair">Repair</option>
                                            <option value="Lubrication(lumasi)">Lubrication(lumasi)</option>
                                            <option value="Modification">Modification</option>
                                            <option value="Overhaul">Overhaul</option>
                                            <option value="Painting">Painting</option>
                                            <option value="Replacement">Replacement</option>
                                            <option value="Pengecheckan (Check Only)">Pengecheckan (Check Only)</option>
                                            <option value="Temuan belum bisa dikerjakan">Temuan belum bisa dikerjakan</option>
                                    </select>
                                    <div class="invalid-feedback">
                            <?= $validation->getError('judgement'); ?>
                        </div>
                                    </td>
                                    <td>
                                  <input type="file" name="file_gambar[]" class="form-control border-0 <?= ($validation->hasError('file_gambar')) ?
                                                                    'is-invalid' : ''; ?>" style="background: transparent;" value="<?= old('file_gambar'); ?>" >
                                  <div class="invalid-feedback">
                            <?= $validation->getError('file_gambar'); ?>
                        </div>
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
                            if (response[i].result) {
                                ipt_ngr.classList.remove('is-valid');
                                ipt_ngr.classList.add('is-invalid');
                                ipt_ngr.nextElementSibling.innerHTML = response[i].result;
                            } else {
                                ipt_ngr.classList.remove('is-invalid');
                                ipt_ngr.classList.add('is-valid');
                            }
                            let ipt_jud = document.getElementById('tabel_tambah').children[i].children[2].children[0];
                            // Menghilangkan element small
                            ipt_jud.nextElementSibling.nextElementSibling.nextElementSibling.style = 'display: none;';
                            // Jika pada input kewarganegaraan tersebut terdapat error
                            if (response[i].judgement) {
                                ipt_jud.classList.remove('is-valid');
                                ipt_jud.classList.add('is-invalid');
                                ipt_jud.nextElementSibling.innerHTML = response[i].judgement;
                            } else {
                                ipt_jud.classList.remove('is-invalid');
                                ipt_jud.classList.add('is-valid');
                            }
                            let ipt_gam = document.getElementById('tabel_tambah').children[i].children[2].children[0];
                            // Menghilangkan element small
                            ipt_gam.nextElementSibling.nextElementSibling.nextElementSibling.style = 'display: none;';
                            // Jika pada input kewarganegaraan tersebut terdapat error
                            if (response[i].file_gambar) {
                                ipt_gam.classList.remove('is-valid');
                                ipt_gam.classList.add('is-invalid');
                                ipt_gam.nextElementSibling.innerHTML = response[i].file_gambar;
                            } else {
                                ipt_gam.classList.remove('is-invalid');
                                ipt_gam.classList.add('is-valid');
                            }
                            let ipt_tem = document.getElementById('tabel_tambah').children[i].children[2].children[0];
                            // Menghilangkan element small
                            ipt_tem.nextElementSibling.nextElementSibling.nextElementSibling.style = 'display: none;';
                            // Jika pada input kewarganegaraan tersebut terdapat error
                            if (response[i].temuan) {
                                ipt_tem.classList.remove('is-valid');
                                ipt_tem.classList.add('is-invalid');
                                ipt_tem.nextElementSibling.innerHTML = response[i].temuan;
                            } else {
                                ipt_tem.classList.remove('is-invalid');
                                ipt_tem.classList.add('is-valid');
                            }
                            
                        }
                        return false;
        });


     

    // Jika tombol tambah form ditekan
    $('#btn_tambahform').click(function(e){
            // Append form baru
            $('#tabel_tambah').append(`<tr>
            
            <td>
                                        <select class="form-control border-0 bg-transparent <?= ($validation->hasError('nama_mesin')) ?
                                                                    'is-invalid' : ''; ?>" name="nama_mesin[]" required >
                                            <option selected disabled value="">Pilih Mesin</option>                                       
                                            <option  value="Air Compressor - Oil(level/dirty)">Air Compressor - Oil(level/dirty)</option>
                                            <option  value="Air Compressor - Belt for inter cooler(Looseness)">Air Compressor - Belt for inter cooler(Looseness)</option>
                                            <option  value="Air Compressor - Pipes & Joints(Leakage)">Air Compressor - Pipes & Joints(Leakage)</option>
                                            <option  value="Air Compressor - V-Belt(Cracking, Looseness)">Air Compressor - V-Belt(Cracking, Looseness)</option>
                                            <option  value="Air Compressor - Oil Filter(Dirty)">Air Compressor - Oil Filter(Dirty)</option>
                                            <option  value="ELECTRIC ROOM COOLER - Evaporator(Dirty)">ELECTRIC ROOM COOLER - Evaporator(Dirty)</option>                                                                                     
                                            <option  value="ELECTRIC ROOM COOLER - Condensor(Dirty)">ELECTRIC ROOM COOLER - Condensor(Dirty)</option>                                                                                     
                                            <option  value="ELECTRIC ROOM COOLER - Air Filter(Dirty)">ELECTRIC ROOM COOLER - Air Filter(Dirty)</option>                                                                                     
                                            <option  value="ELECTRIC ROOM COOLER - Cover Bolt(Loosening)">ELECTRIC ROOM COOLER - Cover Bolt(Loosening)</option>                                                                                     
                                            <option  value="BREAKER MAST - CB Slewing Cyclo">BREAKER MAST - CB Slewing Cyclo</option>                                                                                     
                                            <option  value="BREAKER MAST - CB Slewing Cyclo - Setting Bolt(Loosening)">BREAKER MAST - CB Slewing Cyclo - Setting Bolt(Casing)</option>                                                                                     
                                            <option  value="BREAKER MAST - CB Slewing Cyclo - Stud Bolt(Casing) (Loosening)">BREAKER MAST - CB Slewing Cyclo - Stud Bolt(Casing) (Loosening)</option>                                                                                     
                                            <option  value="BREAKER MAST - CB Slewing Cyclo - Pind Bolt(Casing) (Loosening)">BREAKER MAST - CB Slewing Cyclo - Pind Bolt(Casing) (Loosening)</option>                                                                                     
                                            <option  value="BREAKER MAST - Swivel Joint(In B.Mast) (Lubrication)">Swivel Joint(In B.Mast) (Lubrication)</option>                                                                                     
                                            <option  value="BREAKER MAST - Swivel Joint(at A.Spout) (Lubrication)">Swivel Joint(at A.Spout) (Lubrication)</option>     
                                            <option  value="HYD PUMP P1 (Leakage on Shaft Seal)">HYD PUMP P1 (Leakage on Shaft Seal)</option>     
                                            <option  value="HYD PUMP P2 (Leakage on Shaft Seal)">HYD PUMP P2 (Leakage on Shaft Seal)</option>     
                                            <option  value="HYD PUMP P2 (Leakage on Flange)">HYD PUMP P2 (Leakage on Flange)</option>     
                                            <option  value="TRAVERSING UNIT - Coupling Bolt(Loosening)">TRAVERSING UNIT - Coupling Bolt(Loosening)</option>     
                                            <option  value="TRAVERSING UNIT - Rubber Ring(Elasticyty)">TRAVERSING UNIT - Rubber Ring(Elasticyty)</option>     
                                            <option  value="TRAVERSING UNIT - Bolt for Gear Coupling(Loosening)">TRAVERSING UNIT - Bolt for Gear Coupling(Loosening)</option>                                                                                                                                                                                 
                                            </select>
                              
                                    <div class="invalid-feedback">
                            <?= $validation->getError('nama_mesin'); ?>
                        </div>
                        <input type="text" class="form-control mt-2" placeholder="Temuan Tambahan(Optional)" name="temuan[]">
                      
                            </td>
                    
                                    <td> 
                                    <select class="form-control border-0 bg-transparent <?= ($validation->hasError('result')) ?
                                                                    'is-invalid' : ''; ?>" name="result[]" required>
                                            <option selected disabled value="">Pilih Result</option>
                                            <option  value="Good">Good</option>
                                            <option value="Abnormal Condition">Abnormal Condition</option>
                                            <option value="Leaking(bocor)">Leaking(bocor)</option>
                                            <option value="Lower Level">Abnormal Condition</option>
                                            <option value="Upper Level">Upper Level</option>
                                            <option value="Loosening(lepas)">Loosening(lepas)</option>
                                            <option value="Stack(kendor)">Stack(kendor)</option>
                                            <option value="Rough Surface">Rough Surface</option>
                                            <option value="Crack(retak)">Crack(retak)</option>
                                            <option value="Broken(rusak,patah)">Broken(rusak,patah)</option>
                                            <option value="Wear(aus)">Wear(aus)</option>
                                            <option value="Clogging(sumbat)">Clogging(sumbat)</option>
                                            <option value="Bending(bengkok)">Bending(bengkok)</option>
                                            <option value="Miss Aligment">Miss Aligment</option>
                                            <option value="Dirty(kotor)">Dirty(kotor)</option>
                                    </select>
                                   
                                    <div class="invalid-feedback">
                            <?= $validation->getError('result'); ?>
                        </div>
                        
                                    </td>
                                    <td> 
                                    <select class="form-control border-0 bg-transparent <?= ($validation->hasError('judgement')) ?
                                                                    'is-invalid' : ''; ?>" name="judgement[]" required>
                                            <option selected disabled value="">Pilih Judgement</option>
                                            <option  value="Adjustment">Adjustment</option>
                                            <option value="Cleaning">Cleaning</option>
                                            <option value="Fastening">Fastening</option>
                                            <option value="Repair">Repair</option>
                                            <option value="Lubrication(lumasi)">Lubrication(lumasi)</option>
                                            <option value="Modification">Modification</option>
                                            <option value="Overhaul">Overhaul</option>
                                            <option value="Painting">Painting</option>
                                            <option value="Replacement">Replacement</option>
                                            <option value="Pengecheckan (Check Only)">Pengecheckan (Check Only)</option>
                                            <option value="Temuan belum bisa dikerjakan">Temuan belum bisa dikerjakan</option>
                                    </select>
                                    <div class="invalid-feedback">
                            <?= $validation->getError('judgement'); ?>
                        </div>
                                    </td>
                                    <td>
                                  <input type="file" name="file_gambar[]" class="form-control border-0 <?= ($validation->hasError('file_gambar')) ?
                                                                    'is-invalid' : ''; ?>" style="background: transparent;" value="<?= old('file_gambar'); ?>" >
                                  <div class="invalid-feedback">
                            <?= $validation->getError('file_gambar'); ?>
                        </div>
                                    </td>
                                    <td>
                                    <div class="input-group-btn"> 
                                        <button class="btn btn-danger" id="btn_hapusform" type="button"><i class="fas fa-minus"></i></button>
                                    </div>
                                    </td>
                                    </tr>`)
                                });
                });
                                
    
    // Pada dokumen jika ada, dan jalankan ketika btn_hapusform ditekan
    $(document).on('click', '#btn_hapusform', function() {
        $(this).parents('tr').remove();
    });
    $(document).on('click','#chkPassports' ,function () {
       
            if ($(this).is(":checked")) {
                $("#dvPassports").show();
            } else {
                $("#dvPassports").hide();
            }
        });




        // Jika tombol kembali ditekan
        $('#btn_kembali').click(function(e) {
            dataUser();
        });

</script>
 
<?= $this->endSection() ?>  