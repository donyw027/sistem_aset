<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Riwayat Tambah Saldo
                </h4>
                <?php if (is_admin()==true | is_yayasan() == true) { ?>
                    <br>
                <?php //$this->session->flashdata('pesan'); ?>
                <form method="get" action="<?= base_url() ?>riwayattambah/">
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
            <button class="btn btn-primary" type="submit">Riwayat Tambah Saldo</button>
          </div>
        </div>

<br>
        

      </form>
      <br>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th width="30">No.</th>
                    <th>Induk Coa</th>
                    <th>Bagian</th>
                    <th>Keterangan</th>
                    <th>Jumlah Tambah Saldo</th>
                    <th>Tgl Input</th>

                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($riwayattambah) :
                    foreach ($riwayattambah as $riwayattambahh) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                           
                            <td><?= $riwayattambahh['INDUK_COA']; ?></td>
                            <td><?= $riwayattambahh['BAGIAN']; ?></td>
                            <td><?= $riwayattambahh['KETERANGAN']; ?></td>
                            <td><?= $riwayattambahh['JUMLAH_TAMBAH']; ?></td>
                            <td><?= $riwayattambahh['TGL_INPUT']; ?></td>
                            <td>
                                <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('riwayattambah/delete/') . $riwayattambahh['id'] ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach;
                    else : ?>
                    <tr>
                        <td colspan="8" class="text-center">Silahkan tambahkan Coa baru</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>