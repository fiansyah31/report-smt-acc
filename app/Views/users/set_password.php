
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
        <?php if (isset($validation)) { ?>
            <div class="col-md-12">
                <?php foreach ($validation->getErrors() as $error) : ?>
                    <div class="alert alert-warning" role="alert">
                        <i class="mdi mdi-alert-outline me-2"></i>
                        <?= esc($error) ?>
                    </div>
                <?php endforeach ?>
            </div>
        <?php } ?>
 
        <form action="<?= base_url(); ?>/users/setPassword" method="post">
        <input type="hidden" name="id" class="id" value="<?= $id; ?>">
        <div class="form-group row">
            <div class="col-6">
                <input type="password" name="password" class="form-control form-control-user <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>" autocomplete="off">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-6">
                <input type="password" name="pass_confirm" class="form-control form-control-user <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
 
    </form>
 
<?= $this->endSection() ?>  