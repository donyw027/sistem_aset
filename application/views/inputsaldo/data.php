<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Input Saldo
                </h4>
                <?php if (is_admin()==true | is_yayasan() == true) { ?>
                    <br>
                <?php //$this->session->flashdata('pesan'); ?>
                <form method="get" action="<?= base_url() ?>inputsaldo/">
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
            <button class="btn btn-primary" type="submit">Lihat Input Saldo</button>
          </div>
        </div>

<br>
        

      </form>
      <br>
                <?php } ?>
            </div>
            <div class="col-auto">
                
            <?php if (!is_admin()==true) { ?>
                <button href="" class="btn btn-sm btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahsaldo" >
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Saldo
                    </span>
            </button>
            <?php } ?>
            
            <div id="tambahsaldo" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- konten modal-->
                    <div class="modal-content">
                        <!-- heading modal -->
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Saldo</h4>
                        </div>
                        <!-- body modal -->
                        <div class="modal-body">
                        
                        <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="INDUK_COA">Pilih Induk Coa</label>
                    <div class="col-md-6">
                    <?= $this->session->flashdata('pesan'); ?>
                    <select class="form-control" name="INDUK_COA" Change="INDUK_COA" id="INDUK_COA" onchange="getSaldo()">
                          <option>--Pilih Induk Coa--</option>
                          <?php
                          foreach ($coa as $row) { ?>

                            <option value="<?= $row->INDUK_COA ?>"><?= $row->INDUK_COA?> : <?= $row->NAMA_PERKIRAAN ?> </option>
                          <?php } ?>
                        </select>
                    </div>
                    <!-- <br><br> -->
                    <!-- <label class="col-md-4 text-md-right" for="BAGIAN">Bagian</label> -->
                    <!-- <div class="col-md-6"> -->
                        <?php  
                        $role = $this->session->userdata('login_session')['role'];
                        ?>
                    <input value="<?= $role; ?>" type="text" id="BAGIAN" name="BAGIAN" class="form-control" placeholder="Masukan Bagian" hidden>
                        <?= form_error('BAGIAN', '<span class="text-danger small">', '</span>'); ?>
                    <!-- </div> -->

                    <!-- <div id="txtHint">Customer info will be listed here...</div> -->
                    <br> <br> 
                    <label class="col-md-4 text-md-right" for="TOTAL_SALDO">Saldo Awal</label>
                    <div class="col-md-6">
                    <input value="<?= set_value('SALDO_AWAL'); ?>" type="text" id="SALDO_AWAL" name="SALDO_AWAL" class="form-control" placeholder="Saldo Awal"  readonly >
                        <?= form_error('SALDO_AWAL', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                    <br> <br> 
                    <label class="col-md-4 text-md-right" for="TOTAL_SALDO">Total Saldo</label>
                    <div class="col-md-6">
                    <input value="<?= set_value('TOTAL_SALDO'); ?>" type="text" id="TOTAL_SALDO" name="TOTAL_SALDO" class="form-control" placeholder="Total Saldo" readonly>
                        <?= form_error('TOTAL_SALDO', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                    <br><br>
                    <label class="col-md-4 text-md-right" for="KETERANGAN">Keterangan</label>
                    <div class="col-md-6">
                        <textarea value="<?= set_value('KETERANGAN'); ?>"  id="KETERANGAN" name="KETERANGAN" class="form-control" placeholder="Masukan Keterangan"></textarea>
                    <!-- <input value="<?= set_value('KETERANGAN'); ?>" type="text" id="KETERANGAN" name="KETERANGAN" class="form-control" placeholder="Masukan KETERANGAN"> -->
                        <?= form_error('KETERANGAN', '<span class="text-danger small">', '</span>'); ?>
                    </div><br>
                               <br> <br> 
                    <label class="col-md-4 text-md-right" for="JUMLAH_TAMBAH">Jumlah Tambah Saldo</label>
                    <div class="col-md-6">
                    <input value="<?= set_value('JUMLAH_TAMBAH'); ?>" type="text" id="JUMLAH_TAMBAH" name="JUMLAH_TAMBAH" class="form-control" placeholder="Masukan Tambah Saldo">
                        <?= form_error('JUMLAH_TAMBAH', '<span class="text-danger small">', '</span>'); ?>
                    </div>

                    <br> <br> 
                    <label class="col-md-4 text-md-right" for="TGL_INPUT">Tanggal Input</label>
                    <div class="col-md-6">
<?php date_default_timezone_set("Asia/Jakarta"); ?>

                    <?php $date = date('Y-m-d'); ?>
                        <input value="<?= $date; ?>" type="text" id="TGL_INPUT" name="TGL_INPUT" class="form-control" placeholder="TGL_INPUT" readonly>
                        <?= form_error('TGL_INPUT', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>

                <div class="row form-group justify-content-end">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary btn-icon-split" onclick="tambahsaldo()">
                            <span class="icon"><i class="fa fa-save"></i></span>
                            <span class="text">Simpan</span>
                        </button>
                          </div>
                          </div>

                        </div>
                        <!-- footer modal -->
                        <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup Pop-up</button>
                        </div> -->
                    </div>
                </div>
            </div>


                <?php if (!is_admin()== true) { ?>
                    <a href="<?= base_url('inputsaldo/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-user-plus"></i>
                    </span>
                    <span class="text">
                        Master Input Saldo
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
                    <th>Induk Coa</th>
                    <th>Nama Perkiraan</th>
                    <th>Bagian</th>
                    <th>Saldo Awal</th>
                    <th>Total Saldo</th>
                    <?php if (!is_admin()==true) { ?>
                        <th>Aksi</th>     
                    <?php } ?>                    

                    
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($input_saldo) :
                    foreach ($input_saldo as $input_saldoo) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= date('d-m-Y', strtotime($input_saldoo['TGL_INPUT'])); ?></td>
                            <td><?= $input_saldoo['INDUK_COA']; ?></td>
                            <td><?= $input_saldoo['NAMA_PERKIRAAN']; ?></td>
                            <td><?= $input_saldoo['BAGIAN']; ?></td>
                            <td>Rp. <?= number_format($input_saldoo['SALDO_AWAL'],0,',','.'); ?></td>
                            <td>Rp. <?= number_format($input_saldoo['TOTAL_SALDO'],0,',','.'); ?></td>
                            <?php if (!is_admin()==true) { ?>
                                <td>    
                                <a href="<?= base_url('inputsaldo/edit/') . $input_saldoo['id'] ?>" class="btn btn-circle btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('inputsaldo/delete/') . $input_saldoo['id'] ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
                            </td>
                            <?php } ?>
                            
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

<?php $CI =& get_instance(); ?>
<script> 
    var csrf_name = '<?php echo $CI->security->get_csrf_token_name(); ?>';
    var csrf_hash = '<?php echo $CI->security->get_csrf_hash(); ?>';
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
    function getSaldo(){
        // alert('ss');
        var INDUK_COA = $("#INDUK_COA").val();
     

        $.get("inputsaldo/getsaldo", {INDUK_COA: INDUK_COA} , function(data){
            var json = data,
            obj = JSON.parse(json);
            $('#SALDO_AWAL').val(obj.SALDO_AWAL);
            $('#TOTAL_SALDO').val(obj.TOTAL_SALDO);   
        });
    }

    function tambahsaldo(){
        var INDUK_COA = $("#INDUK_COA").val();

        var BAGIAN = $("#BAGIAN").val();
        var KETERANGAN = $("#KETERANGAN").val();
        var TGL_INPUT = $("#TGL_INPUT").val();


        var TOTAL_SALDO = $("#TOTAL_SALDO").val();
        var JUMLAH_TAMBAH = $("#JUMLAH_TAMBAH").val();


        $.post("inputsaldo/tambahsaldo", {INDUK_COA: INDUK_COA , BAGIAN: BAGIAN , KETERANGAN: KETERANGAN , TGL_INPUT: TGL_INPUT , TOTAL_SALDO : TOTAL_SALDO , JUMLAH_TAMBAH : JUMLAH_TAMBAH , csrf_test_name : csrf_hash} , function(data){
            var json = data,
            obj = JSON.parse(json);
            
            // console.log(data);
            alert('Sukses Tambah Saldo');
            location.reload()
            // $('#INDUK_COA').val(obj.INDUK_COA);
            // $('#SALDO_AWAL').val(obj.SALDO_AWAL);
            // $('#JUMLAH_TAMBAH').val(obj.JUMLAH_TAMBAH);   
        });
    }




</script>
