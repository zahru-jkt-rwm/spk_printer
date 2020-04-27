

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data
            <small>Tabel Solusi</small>
          </h1>
          <ol class="breadcrumb">
            <li><?= anchor('dashboard','<i class="fa fa-home"></i> Home');?></li>
            <li><?= anchor('datapakar','Data Pakar')?></li>
            <li class="active">Tabel Solusi</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">
                    <div class="<?php if ($info != "") {echo "callout callout-success";}?>"><?= $info; ?></div>
                    <div class="<?php if ($alert != "") {echo "callout callout-danger";}?>"><?= $alert; ?></div>
                    <?= anchor('tabelsolusi.php#tambahsolusi','<i class="fa fa-file-o"></i> Tambah Solusi',['class'=>'btn btn-info','data-toggle'=>'modal'])?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="tbl1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Solusi</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($tabel as $datatabels) : ?>
                      <tr>
                        <td><?= $datatabels->id_solusi  ?></td>
                        <td><?= $datatabels->solusi ?></td>
                        <td>
                          <div class="btn-group-vertical">
                          <?= anchor('tabelsolusi.php#editsolusi'.$datatabels->id_solusi,'<i class="fa fa-edit"></i> Ubah',['class'=>'btn btn-info','data-toggle'=>'modal'])?>
                          <?= anchor('tabelsolusi.php#hapussolusi'.$datatabels->id_solusi,'<i class="fa fa-eraser"></i> Hapus',['class'=>'btn btn-danger','data-toggle'=>'modal'])?>
                          </div>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Solusi</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

            <!-- Model Tambah Trouble-->      
      <div id="tambahsolusi" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3>Tambah Data Solusi</h3>
            </div>
            <?= form_open('datapakar/tambah/solusi/sst');?>
            <div class="modal-body">
              <div class="form-group">
                <?= form_label('ID Solusi', 'id_solusi', ['class'=>'control-label']);?>
                <?= form_input('id_solusi', $idsst, ['class'=>'form-control','disabled'=>''])?>
                <?= form_hidden('id_solusi', $idsst);?>
              </div>
              <div class="form-group">
                <?= form_label('Deskripsi Solusi', 'solusi', ['class'=>'control-label']);?>
                <?= form_textarea(array('name' => 'solusi', 'value' => set_value('solusi'), 'class'=>'form-control','rows'=>'3')); ?>
              </div>
            </div>
            <div class="modal-footer">
              <?= form_reset('reset','Reset',['class'=>'btn btn-danger'])?>
              <?= form_submit('tambahsolusi','Tambah Data',['class'=>'btn btn-info'])?>
            </div>
            <?= form_close();?>
          </div>
        </div>
      </div>
      <!-- End Model Tambah Trouble--> 

      <!-- Model Ubah Trouble-->
      <?php foreach ($tabel as $modaledits) : ?>
        <div id="<?= 'editsolusi'.$modaledits->id_solusi; ?>" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>Ubah Data Solusi</h3>
              </div>
              <?= form_open('datapakar/ubah/solusi/'.$modaledits->id_solusi);?>
              <div class="modal-body">
                <div class="form-group">
                  <?= form_label('ID Solusi', 'id_solusi', ['class'=>'control-label']);?>
                  <?= form_input('id_solusi', $modaledits->id_solusi, ['class'=>'form-control','disabled'=>''])?>
                </div>
                <div class="form-group">
                  <?= form_label('Deskripsi Solusi', 'solusi', ['class'=>'control-label']);?>
                  <?= form_textarea(array('name' => 'solusi', 'value' => $modaledits->solusi, 'class'=>'form-control','rows'=>'3')); ?>
                </div>
              </div>
              <div class="modal-footer">
                <?= form_reset('reset','Reset',['class'=>'btn btn-danger'])?>
                <?= form_submit('ubahsolusi','Ubah Data',['class'=>'btn btn-info'])?>
              </div>
              <?= form_close();?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <!-- End Model Ubah Trouble-->

      <!-- Model Hapus Trouble-->
      <?php foreach ($tabel as $modaldeletes) : ?>
        <div id="<?= 'hapussolusi'.$modaldeletes->id_solusi; ?>" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h3>Hapus Data Solusi</h3>
              </div>
              <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data trouble <?= $modaldeletes->id_solusi; ?></p>
              </div>
              <div class="modal-footer">
                <?= form_button('tutup','Batal',['class'=>'btn btn-default','data-dismiss'=>'modal'])?>
                <?= anchor('datapakar/hapus/solusi/'.$modaldeletes->id_solusi,'Hapus Data',['class'=>'btn btn-danger'])?>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <!-- Model Ubah Trouble-->
