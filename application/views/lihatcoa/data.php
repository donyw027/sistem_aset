<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                     Coa
                </h4>
            </div>
            
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped dt-responsive nowrap" id="dataTable3">
            <thead>
                <tr>
                    
                    <th>Induk Coa</th>
                    <th>Nama Perkiraan</th>
                    <?php if (is_admin()==true) { ?>
                    <th>Bagian</th>
                    <?php } ?>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($indukcoa) :
                    foreach ($indukcoa as $indukcoaa) :
                        ?>
                        <tr>
                         
                           
                            <td><?= $indukcoaa['INDUK_COA']; ?></td>
                            <td><?= $indukcoaa['NAMA_PERKIRAAN']; ?></td>
                            <?php if (is_admin()==true) { ?>
                                <td><?= $indukcoaa['BAGIAN']; ?></td>

                            <?php } ?>
                            
                        </tr>
                    <?php endforeach;
                    else : ?>
                    <tr>
                        <td colspan="2" class="text-center">Silahkan tambahkan Coa baru</td>
                    </tr>
                <?php endif; ?> 
            </tbody>
        </table>
    </div>
    
</div>

<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Sub Coa 1
                </h4>
            </div>
            
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped dt-responsive nowrap" id="dataTable3">
            <thead>
                <tr>
                    
                    <th>Induk Coa</th>
                    <th>Sub Coa 1</th>
                    <th>Nama Perkiraan</th>
                    <?php if (is_admin()==true) { ?>
                    <th>Bagian</th>
                    <?php } ?>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($sub_coa_1) :
                    foreach ($sub_coa_1 as $sub_coaa1) :
                        ?>
                        <tr>
                         
                           
                            <td><?= $sub_coaa1['INDUK_COA']; ?></td>
                            <td><?= $sub_coaa1['NO_SUB_COA_1']; ?></td>

                            <td><?= $sub_coaa1['NAMA_PERKIRAAN']; ?></td>
                            <?php if (is_admin()==true) { ?>
                                <td><?= $sub_coaa1['BAGIAN']; ?></td>

                            <?php } ?>
                            
                        </tr>
                    <?php endforeach;
                    else : ?>
                    <tr>
                        <td colspan="3" class="text-center">Silahkan tambahkan Sub Coa 1 baru</td>
                    </tr>
                <?php endif; ?> 
            </tbody>
        </table>
    </div>
    
</div>

<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Sub Coa 2
                </h4>
            </div>
            
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped dt-responsive nowrap" id="dataTable3">
            <thead>
                <tr>
                    
                    <th>Induk Coa</th>
                    <th>No Sub Coa 1</th>
                    <th>No Sub Coa 2</th>

                    <th>Nama Perkiraan</th>
                    <?php if (is_admin()==true) { ?>
                    <th>Bagian</th>
                    <?php } ?>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($sub_coa_2) :
                    foreach ($sub_coa_2 as $sub_coaa_2) :
                        ?>
                        <tr>
                         
                           
                            <td><?= $sub_coaa_2['INDUK_COA']; ?></td>
                            <td><?= $sub_coaa_2['NO_SUB_COA_1']; ?></td>
                            <td><?= $sub_coaa_2['NO_SUB_COA_2']; ?></td>

                            <td><?= $sub_coaa_2['NAMA_PERKIRAAN']; ?></td>
                            <?php if (is_admin()==true) { ?>
                                <td><?= $sub_coaa_2['BAGIAN']; ?></td>

                            <?php } ?>
                            
                        </tr>
                    <?php endforeach;
                    else : ?>
                    <tr>
                        <td colspan="4" class="text-center">Silahkan tambahkan Sub Coa 2 baru</td>
                    </tr>
                <?php endif; ?> 
            </tbody>
        </table>
    </div>
    
</div>