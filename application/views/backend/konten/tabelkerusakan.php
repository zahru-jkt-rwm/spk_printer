

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data
            <small>Tabel Kerusakan</small>
          </h1>
          <ol class="breadcrumb">
            <li><?= anchor('base_url()', '<i class="fa fa-home"></i> Home'); ?></li>
            <li><?= anchor('datapakar', 'Data Pakar'); ?></li>
            <li class="active">Tabel Kerusakan</li>
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
                    <div class="btn-group">
                      <button type="button" class="btn btn-info">Tambah Kerusakan</button>
                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a data-toggle="modal" href="tabelkerusakan.php#tambahtrobleqit">Permasalahan Kuaitas Image</a></li>
                        <li><a data-toggle="modal" href="tabelkerusakan.php#tambahtroblectc">Permasalah Tampil Kode</a></li>
                      </ul>
                    </div>
                  </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="tbl1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Deskripsi Kerusakan</th>
                        <th>Gambar</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($tabel as $datatabels) : ?>
                      <tr>
                        <td><?= $datatabels->id_kerusakan  ?></td>
                        <td><?= $datatabels->kerusakan ?></td>
                        <td><?= $datatabels->image  ?></td>
                        <td>
                          <?= anchor('tabelkerusakan.php#edittroble'.$datatabels->id_kerusakan,'<i class="fa fa-edit"></i>',['class'=>'btn btn-info','data-toggle'=>'modal'])?>
                          <?= anchor('tabelkerusakan.php#hapustroble'.$datatabels->id_kerusakan,'<i class="fa fa-eraser"></i>',['class'=>'btn btn-danger','data-toggle'=>'modal'])?>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Deskripsi Kerusakan</th>
                        <th>Gambar</th>
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
      <div id="tambahtrobleqit" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3>Tambah Data Kerusakan</h3>
            </div>
            <?= form_open('datapakar/tambah/kerusakan/qit');?>
            <div class="modal-body">
              <div class="form-group">
                <?= form_label('ID Kerusakan', 'id_kerusakan', ['class'=>'control-label']);?>
                <?= form_input('id_kerusakan', $idqit, ['class'=>'form-control','disabled'=>''])?>
                <?= form_hidden('id_kerusakan', $idqit); ?>
              </div>
              <div class="form-group">
                <?= form_label('Deskripsi Kerusakan', 'kerusakan', ['class'=>'control-label']);?>
                <?= form_input('kerusakan', set_value('kerusakan'), ['class'=>'form-control','placeholder'=>'Permasalahan Gambar/Hasil yang terjadi'])?>
              </div>
            </div>
            <div class="modal-footer">
              <?= form_reset('reset','Reset',['class'=>'btn btn-danger'])?>
              <?= form_submit('tambahtroble','Tambah Data',['class'=>'btn btn-info'])?>
            </div>
            <?= form_close();?>
          </div>
        </div>
      </div>

      <div id="tambahtroblectc" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3>Tambah Data Kerusakan</h3>
            </div>
            <?= form_open('datapakar/tambahkerusakan/ctc');?>
            <div class="modal-body">
              <div class="form-group">
                <?= form_label('ID Kerusakan', 'id_kerusakan', ['class'=>'control-label']);?>
                <div class="input-group">
                    <span class="input-group-addon">CT</span>
                    <?= form_input('id_kerusakan', set_value('id_kerusakan'), ['class'=>'form-control','placeholder'=>'Kode Permasalahan'])?>
                  </div>
              </div>
              <div class="form-group">
                <?= form_label('Deskripsi Kerusakan', 'kerusakan', ['class'=>'control-label']);?>
                <?= form_input('kerusakan', set_value('kerusakan'), ['class'=>'form-control','placeholder'=>'Permasalahan Kode yang tampil'])?>
              </div>
            </div>
            <div class="modal-footer">
              <?= form_reset('reset','Reset',['class'=>'btn btn-danger'])?>
              <?= form_submit('tambahtroble','Tambah Data',['class'=>'btn btn-info'])?>
            </div>
            <?= form_close();?>
          </div>
        </div>
      </div>
      <!-- End Model Tambah Trouble--> 

      <!-- Model Ubah Trouble-->
      <?php foreach ($tabel as $modaledits) : ?>
        <div id="<?= 'edittroble'.$modaledits->id_kerusakan; ?>" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>Ubah Data Kerusakan</h3>
              </div>
              <?= form_open('datapakar/ubah/kerusakan/'.$modaledits->id_kerusakan);?>
              <div class="modal-body">
                <div class="form-group">
                  <?= form_label('ID Kerusakan', 'id_kerusakan', ['class'=>'control-label']);?>
                  <?= form_input('id_kerusakan', $modaledits->id_kerusakan, ['class'=>'form-control','disabled'=>''])?>
                </div>
                <div class="form-group">
                  <?= form_label('Deskripsi Kerusakan', 'kerusakan', ['class'=>'control-label']);?>
                  <?= form_input('kerusakan', $modaledits->kerusakan, ['class'=>'form-control'])?>
                </div>
              </div>
              <div class="modal-footer">
                <?= form_reset('reset','Reset',['class'=>'btn btn-danger'])?>
                <?= form_submit('ubahtroble','Ubah Data',['class'=>'btn btn-info'])?>
              </div>
              <?= form_close();?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <!-- End Model Ubah Trouble-->

      <!-- Model Hapus Trouble-->
      <?php foreach ($tabel as $modaldeletes) : ?>
        <div id="<?= 'hapustroble'.$modaldeletes->id_kerusakan; ?>" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h3>Hapus Data Kerusakan</h3>
              </div>
              <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data trouble <?= $modaldeletes->id_kerusakan; ?></p>
              </div>
              <div class="modal-footer">
                <?= form_button('tutup','Batal',['class'=>'btn btn-default','data-dismiss'=>'modal'])?>
                <?= anchor('datapakar/hapus/kerusakan/'.$modaldeletes->id_kerusakan,'Hapus Data',['class'=>'btn btn-danger'])?>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <!-- Model Ubah Trouble-->
