<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Realisasi Anggaran
                </h4>
                <?php if (is_admin()==true | is_yayasan()==true) { ?>
                    <br>
                <?php //$this->session->flashdata('pesan'); ?>
                <form method="get" action="<?= base_url() ?>realisasianggaran/">
        <div class="row" style="margin-left: 20px;">
          <label>Pilih Bagian</label>
          <div class="col-3">
          <select name="BAGIAN" id="" class="form-control">
                        <option value="yayasan">Pilih</option>
                            <option value="keuangan">Keuangan</option>
                            <option value="marketing">Marketing</option>
                            <option value="pendidikan">Pendidikan</option>
                            <option value="sarpras">Sarpras</option>
                            <option value="akunting">Akunting</option>
                            <option value="sdm">SDM</option>
                            <option value="sekretariat">Sekretariat</option>
                            <option value="yayasan">Yayasan</option>
                            <!-- <option value="keseluruhan">Keseluruhan</option> -->
                        </select>
          </div>
          <div class="col-3">
            <button class="btn btn-primary" type="submit">Lihat Realisasi</button>
          </div>
        </div>

<br>
        

      </form>
      <br>
                <?php } ?>
                
            </div>
            <div class="col-auto">
                <?php if (!is_admin()==true) { ?>
                    <a href="<?= base_url('realisasianggaran/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-user-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Realisasi Anggaran
                    </span>
                </a>
                <?php } ?>
                
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th width="30">No.</th>
                    <th>Tgl Input</th>
                    <th>Nama Perkiraan</th>
                    <th>Bagian</th>
                    <th>Nama Realisasi</th>
                    <th>Saldo Awal</th>
                    <th>Total Saldo</th>
                    <th>Biaya Realisasi</th>
                    <th>Sisa Saldo</th>
                    <th>No Coa</th>
                    <th>No Sub Coa 1</th>
                    <th>No Sub Coa 2</th>
                    <?php if (!is_admin()==true) { ?>
                    <th>Aksi</th>
                                
                    <?php } ?>  
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($realisasi) :
                    foreach ($realisasi as $realisasii) :
                        ?>
                        <tr>
                        
                            <td><?= $no++; ?></td>
                            <td><?= date('d-m-Y', strtotime($realisasii['TGL_INPUT'])); ?></td>
                            <td><?= $realisasii['NAMA_PERKIRAAN']; ?></td>
                            <td><?= $realisasii['BAGIAN']; ?></td>
                            <td><?= $realisasii['NAMA_REALISASI']; ?></td>
                            <td>Rp. <?= number_format($realisasii['SALDO_AWAL'],0,',','.'); ?></td>
                            <td>Rp. <?= number_format($realisasii['TOTAL_SALDO'],0,',','.'); ?></td>

                            <td>Rp. <?= number_format($realisasii['BIAYA_REALISASI'],0,',','.'); ?></td>
                            <td>Rp. <?= number_format($realisasii['SISA_SALDO'],0,',','.'); ?></td>
                            <td><?= $realisasii['NO_COA']; ?></td>
                            <td><?= $realisasii['NO_SUB_COA_1']; ?></td>
                            <td><?= $realisasii['NO_SUB_COA_2']; ?></td>
                            <?php if (!is_admin()==true) { ?>
                                <td>
                            <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('realisasianggaran/delete/') . $realisasii['id'] ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
                            </td>
                            <?php } ?>
                            
                           
                            
                        </tr>
                    <?php endforeach;
                    else : ?>
                    <tr>
                        <td colspan="13" class="text-center">Silahkan tambahkan Realisasi Baru</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>