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
                <?= form_open('', [], ['id' => $inputsaldo['id']]); ?>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="INDUK_COA">INDUK_COA</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('INDUK_COA', $inputsaldo['INDUK_COA']); ?>" type="text" id="INDUK_COA" name="INDUK_COA" class="form-control" placeholder="INDUK_COA">
                        <?= form_error('INDUK_COA', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <hr>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="NAMA_PERKIRAAN">NAMA_PERKIRAAN</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('NAMA_PERKIRAAN', $inputsaldo['NAMA_PERKIRAAN']); ?>" type="text" id="NAMA_PERKIRAAN" name="NAMA_PERKIRAAN" class="form-control" placeholder="NAMA_PERKIRAAN">
                        <?= form_error('NAMA_PERKIRAAN', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="BAGIAN">BAGIAN</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('BAGIAN', $inputsaldo['BAGIAN']); ?>" type="text" id="BAGIAN" name="BAGIAN" class="form-control" placeholder="BAGIAN" readonly>
                        <?= form_error('BAGIAN', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="SALDO_AWAL">SALDO_AWAL</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('SALDO_AWAL', $inputsaldo['SALDO_AWAL']); ?>" type="text" id="SALDO_AWAL" name="SALDO_AWAL" class="form-control" placeholder="SALDO_AWAL">
                        <?= form_error('SALDO_AWAL', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="TOTAL_SALDO">TOTAL_SALDO</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('TOTAL_SALDO', $inputsaldo['TOTAL_SALDO']); ?>" type="text" id="TOTAL_SALDO" name="TOTAL_SALDO" class="form-control" placeholder="Total Saldo">
                        <?= form_error('TOTAL_SALDO', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="TGL_INPUT">TGL_INPUT</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('TGL_INPUT', $inputsaldo['TGL_INPUT']); ?>" type="text" id="TGL_INPUT" name="TGL_INPUT" class="form-control" placeholder="TGL_INPUT" readonly>
                        <?= form_error('TGL_INPUT', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                
                <br>
                <div class="row form-group justify-content-end">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon"><i class="fa fa-save"></i></span>
                            <span class="text">Simpan</span>
                        </button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>