<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm mb-4 border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form <?= $title; ?>
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('user') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Kembali
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body pb-2">
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_open(); ?>

                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="INDUK_COA">INDUK_COA</label>
                    <div class="col-md-6">
                    <select class="form-control" name="INDUK_COA">
                          <option>--Pilih Induk Coa--</option>
                          <?php
                          foreach ($coa as $row) { ?>

                            <option value="<?= $row->INDUK_COA ?>"><?= $row->INDUK_COA?> : <?= $row->NAMA_PERKIRAAN ?> </option>
                          <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="NO_SUB_COA_1">NO_SUB_COA_1</label>
                    <div class="col-md-6">
                    <select class="form-control" name="NO_SUB_COA_1">
                          <option>--Pilih Sub Coa 1--</option>
                          <?php
                          foreach ($subcoa1 as $row) { ?>

                            <option value="<?= $row->NO_SUB_COA_1 ?>"><?= $row->NO_SUB_COA_1?> : <?= $row->NAMA_PERKIRAAN ?> </option>
                          <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="NO_SUB_COA_2">NO_SUB_COA_2</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('NO_SUB_COA_2'); ?>" type="text" id="NO_SUB_COA_2" name="NO_SUB_COA_2" class="form-control" placeholder="NO_SUB_COA_2">
                        <?= form_error('NO_SUB_COA_2', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                

                

                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="NAMA_PERKIRAAN">NAMA_PERKIRAAN</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('NAMA_PERKIRAAN'); ?>" type="text" id="NAMA_PERKIRAAN" name="NAMA_PERKIRAAN" class="form-control" placeholder="NAMA_PERKIRAAN">
                        <?= form_error('NAMA_PERKIRAAN', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="TIPE">TIPE</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('TIPE'); ?>" type="text" id="TIPE" name="TIPE" class="form-control" placeholder="TIPE">
                        <?= form_error('TIPE', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="BAGIAN">BAGIAN</label>
                    <div class="col-md-6">
                    <?php 
                        $role = $this->session->userdata('login_session')['role'];
                        ?>
                        <input value="<?= $role; ?>" type="text" id="BAGIAN" name="BAGIAN" class="form-control" placeholder="BAGIAN" readonly>
                        <?= form_error('BAGIAN', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                
                
                <br>
                <div class="row form-group justify-content-end">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon"><i class="fa fa-save"></i></span>
                            <span class="text">Simpan</span>
                        </button>
                        <button type="reset" class="btn btn-secondary">
                            Reset
                        </button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>