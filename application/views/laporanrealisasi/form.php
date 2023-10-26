<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Form Reporting Hasil Realisasi
                </h4>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <?php //form_open(); ?>
                <form method="post" action="<?= base_url() ?>laporanrealisasi/print">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display:none" id="">
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="transaksi"> Realisasi</label>
                    <div class="col-md-9">
                    <?php if (is_admin()==true | is_yayasan() == true) { ?>
                        <select name="BAGIAN" id="" class="form-control">
                            <option value="keuangan">Keuangan</option>
                            <option value="marketing">Marketing</option>
                            <option value="pendidikan">Pendidikan</option>
                            <option value="sarpras">Sarpras</option>
                            <option value="akunting">Akunting</option>
                            <option value="sdm">SDM</option>
                            <option value="sekretariat">Sekretariat</option>
                            <option value="yayasan">Yayasan</option>
                            <option value="keseluruhan">Keseluruhan</option>
                        </select>
                    <?php }else{ ?>
                        <?php 
                        $role = $this->session->userdata('login_session')['role'];
                        ?>
                        <input value="<?= $role; ?>" type="text" id="BAGIAN" name="BAGIAN" class="form-control" placeholder="BAGIAN" readonly>
                        <?php } ?>

                        <?= form_error('transaksi', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <!-- <div class="row form-group">
                    <label class="col-lg-3 text-lg-right" for="tanggal">Periode</label>
                    <div class="col-lg-5">
                        <div class="input-group">
                            <input value="<?= set_value('tanggal'); ?>" name="tanggal" id="tanggal" type="text" class="form-control" placeholder="Periode">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-fw fa-calendar"></i></span>
                            </div>
                        </div>
                        <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div> -->
                <div class="row form-group">
                    <label class="col-lg-3 text-lg-right" for="t_mulai">Tgl Mulai</label>
                    <div class="col-lg-5">
                        <div class="input-group">
                            <input value="<?= set_value('t_mulai'); ?>" name="t_mulai" id="t_mulai" type="date" class="form-control" placeholder="Periode">
                           
                        </div>
                        <?= form_error('t_mulai', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div><div class="row form-group">
                    <label class="col-lg-3 text-lg-right" for="t_akhir">Tgl Akhir</label>
                    <div class="col-lg-5">
                        <div class="input-group">
                            <input value="<?= set_value('t_akhir'); ?>" name="t_akhir" id="t_akhir" type="date" class="form-control" placeholder="Periode">
                           
                        </div>
                        <?= form_error('t_akhir', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-lg-9 offset-lg-3">
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-print"></i>
                            </span>
                            <span class="text">
                                Cetak
                            </span>
                        </button>
                    </div>
                </div>
                <?php //form_close(); ?>
                    </form>
                    
            </div>
        </div>
    </div>
</div>