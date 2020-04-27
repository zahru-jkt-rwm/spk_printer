

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data
            <small>Tabel Pertanyaan</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?= base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= base_url()."datapakar"; ?>">Data Pakar</a></li>
            <li class="active">Tabel Pertanyaan</li>
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
                    <?= anchor('tambahpertanyaan.php#tambahtanya','<i class="fa fa-file-o"></i> Tambah Pertanyaan',['class'=>'btn btn-info','data-toggle'=>'modal'])?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="tbl1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Deskripsi Pertanyaan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($tabel as $datatabels) : ?>
                      <tr>
                        <td><?= $datatabels->id_pertanyaan  ?></td>
                        <td><?= $datatabels->pertanyaan ?></td>
                        <td>
                          <div class="btn-group-vertical">
                          <?= anchor('tabelpertanyaan.php#edittanya'.$datatabels->id_pertanyaan,'<i class="fa fa-edit"></i> Ubah',['class'=>'btn btn-info','data-toggle'=>'modal'])?>
                          <?= anchor('tabelpertanyaan.php#hapustanya'.$datatabels->id_pertanyaan,'<i class="fa fa-remove"></i> Hapus',['class'=>'btn btn-danger','data-toggle'=>'modal'])?>
                          </div>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Deskripsi Pertanyaan</th>
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
      <div id="tambahtanya" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3>Tambah Data Pertanyaan</h3>
            </div>
            <?= form_open('datapakar/tambah/pertanyaan/tdp');?>
            <div class="modal-body">
              <div class="form-group">
                <?= form_label('ID Pertanyaan', 'id_pertanyaan', ['class'=>'control-label']);?>
                <?= form_input('id_pertanyaan', $idtdp, ['class'=>'form-control','disabled'=>''])?>
                <?= form_hidden('id_pertanyaan', $idtdp);?>
              </div>
              <div class="form-group">
                <?= form_label('Deskripsi Pertanyaan', 'pertanyaan', ['class'=>'control-label']);?>
                <?= form_textarea(array('name' => 'pertanyaan', 'value' => set_value('pertanyaan'), 'class'=>'form-control','rows'=>'3')); ?>
              </div>
            </div>
            <div class="modal-footer">
              <?= form_reset('reset','Reset',['class'=>'btn btn-danger'])?>
              <?= form_submit('tambahpertanyaan','Tambah Data',['class'=>'btn btn-info'])?>
            </div>
            <?= form_close();?>
          </div>
        </div>
      </div>
      <!-- End Model Tambah Trouble--> 

      <!-- Model Ubah Trouble-->
      <?php foreach ($tabel as $modaledits) : ?>
        <div id="<?= 'edittanya'.$modaledits->id_pertanyaan; ?>" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>Ubah Data Pertanyaan</h3>
              </div>
              <?= form_open('datapakar/ubah/pertanyaan/'.$modaledits->id_pertanyaan);?>
              <div class="modal-body">
                <div class="form-group">
                  <?= form_label('ID Pertanyaan', 'id_pertanyaan', ['class'=>'control-label']);?>
                  <?= form_input('id_pertanyaan', $modaledits->id_pertanyaan, ['class'=>'form-control','disabled'=>''])?>
                </div>
                <div class="form-group">
                  <?= form_label('Deskripsi Pertanyaan', 'pertanyaan', ['class'=>'control-label']);?>
                  <?= form_textarea(array('name' => 'pertanyaan', 'value' => $modaledits->pertanyaan, 'class'=>'form-control','rows'=>'3')); ?>
                </div>
              </div>
              <div class="modal-footer">
                <?= form_reset('reset','Reset',['class'=>'btn btn-danger'])?>
                <?= form_submit('ubahpertanyaan','Ubah Data',['class'=>'btn btn-info'])?>
              </div>
              <?= form_close();?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <!-- End Model Ubah Trouble-->

      <!-- Model Hapus Trouble-->
      <?php foreach ($tabel as $modaldeletes) : ?>
        <div id="<?= 'hapustanya'.$modaldeletes->id_pertanyaan; ?>" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h3>Hapus Data Pertanyaan</h3>
              </div>
              <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data trouble <?= $modaldeletes->id_pertanyaan; ?></p>
              </div>
              <div class="modal-footer">
                <?= form_button('tutup','Batal',['class'=>'btn btn-default','data-dismiss'=>'modal'])?>
                <?= anchor('datapakar/hapus/pertanyaan/'.$modaldeletes->id_pertanyaan,'Hapus Data',['class'=>'btn btn-danger'])?>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <!-- Model Ubah Trouble-->