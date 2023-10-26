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
                <a href="<?= base_url('subcoa2/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-user-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Sub Coa 2
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
                    <th>No Sub Coa 2</th>
                    <th>No Sub Coa 1</th>
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
                if ($subcoa2) :
                    foreach ($subcoa2 as $subcoaa2) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $subcoaa2['NO_SUB_COA_2']; ?></td>
                            <td><?= $subcoaa2['NO_SUB_COA_1']; ?></td>
                            <td><?= $subcoaa2['INDUK_COA']; ?></td>
                            <td><?= $subcoaa2['NAMA_PERKIRAAN']; ?></td>
                            <td><?= $subcoaa2['TIPE']; ?></td>
                            <td><?= $subcoaa2['BAGIAN']; ?></td>
                            <td>
                                
                                <a href="<?= base_url('subcoa2/edit/') . $subcoaa2['id'] ?>" class="btn btn-circle btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('subcoa2/delete/') . $subcoaa2['id'] ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
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