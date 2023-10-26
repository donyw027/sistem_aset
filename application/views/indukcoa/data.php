<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Coa
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('indukcoa/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-user-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Coa
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th width="30">No.</th>
                    <th>Induk Coa</th>
                    <th>Nama Perkiraan</th>
                    <th>Tipe</th>
                    <th>Bagian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($indukcoa) :
                    foreach ($indukcoa as $indukcoaa) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                           
                            <td><?= $indukcoaa['INDUK_COA']; ?></td>
                            <td><?= $indukcoaa['NAMA_PERKIRAAN']; ?></td>
                            <td><?= $indukcoaa['TIPE']; ?></td>
                            <td><?= $indukcoaa['BAGIAN']; ?></td>
                            <td>
                                
                                <a href="<?= base_url('indukcoa/edit/') . $indukcoaa['id'] ?>" class="btn btn-circle btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('indukcoa/delete/') . $indukcoaa['id'] ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
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