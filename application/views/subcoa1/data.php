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
                <a href="<?= base_url('subcoa1/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-user-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Sub Coa 1
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
                if ($subcoa1) :
                    foreach ($subcoa1 as $subcoaa1) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $subcoaa1['NO_SUB_COA_1']; ?></td>
                            <td><?= $subcoaa1['INDUK_COA']; ?></td>
                            <td><?= $subcoaa1['NAMA_PERKIRAAN']; ?></td>
                            <td><?= $subcoaa1['TIPE']; ?></td>
                            <td><?= $subcoaa1['BAGIAN']; ?></td>
                            <td>
                                
                                <a href="<?= base_url('subcoa1/edit/') . $subcoaa1['id'] ?>" class="btn btn-circle btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('subcoa1/delete/') . $subcoaa1['id'] ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
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