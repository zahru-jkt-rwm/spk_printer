

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data
            <small>Pakar</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?= base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Data Pakar</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?= anchor('datapakar/tabelpertanyaan/tambah','<i class="fa fa-file-o"></i> Tambah Pertanyaan',['class'=>'btn btn-info'])?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="tbl1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Pertanyaan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($tabel as $datatabels) : ?>
                      <tr>
                        <td><?= $datatabels->id_question  ?></td>
                        <td><?= $datatabels->deskripsi ?></td>
                        <td>
                          <?= anchor('datapakar/tabelpertanyaan/edit/'.$datatabels->id_question,'<i class="fa fa-edit"></i>',['class'=>'btn btn-info'])?>
                          <?= anchor('datapakar/tabelpertanyaan/hapus/'.$datatabels->id_question,'<i class="fa fa-eraser"></i>',['class'=>'btn btn-danger'])?>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Pertanyaan</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?= anchor('datapakar/tabelkerusakan/tambah','<i class="fa fa-file-o"></i> Tambah Pertanyaan',['class'=>'btn btn-info'])?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="tbl2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Deskripsi Kerusakan</th>
                        <th>Bagian / Section Mesin</th>
                        <th>System Color</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($tabel as $datatabels) : ?>
                      <tr>
                        <td><?= $datatabels->id_trouble  ?></td>
                        <td><?= $datatabels->symptom ?></td>
                        <td><?= $datatabels->section  ?></td>
                        <td><?= $datatabels->color ?></td>
                        <td>
                          <?= anchor('datapakar/tabelpertanyaan/edit/'.$datatabels->id_trouble,'<i class="fa fa-edit"></i>',['class'=>'btn btn-info'])?>
                          <?= anchor('datapakar/tabelpertanyaan/hapus/'.$datatabels->id_trouble,'<i class="fa fa-eraser"></i>',['class'=>'btn btn-danger'])?>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Deskripsi Kerusakan</th>
                        <th>Bagian / Section Mesin</th>
                        <th>System Color</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?= anchor('datapakar/tabelpertanyaan/tambah','<i class="fa fa-file-o"></i> Tambah Pertanyaan',['class'=>'btn btn-info'])?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="tbl3" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Pertanyaan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($tabel as $datatabels) : ?>
                      <tr>
                        <td><?= $datatabels->id  ?></td>
                        <td><?= $datatabels->dolusi ?></td>
                        <td>
                          <?= anchor('datapakar/tabelpertanyaan/edit/'.$datatabels->id,'<i class="fa fa-edit"></i>',['class'=>'btn btn-info'])?>
                          <?= anchor('datapakar/tabelpertanyaan/hapus/'.$datatabels->id,'<i class="fa fa-eraser"></i>',['class'=>'btn btn-danger'])?>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Pertanyaan</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?= anchor('datapakar/tabelkeputusan/tambah','<i class="fa fa-file-o"></i> Tambah Pertanyaan',['class'=>'btn btn-info'])?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="tbl4" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID Pengetahuan</th>
                        <th>Pertanyaan</th>
                        <th>Jika Iya</th>
                        <th>Jika Tidak</th>
                        <th>Jabawan Ya</th>
                        <th>Jababan Tidak</th>
                        <th>ID Kerusakan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($tabel as $datatabels) : ?>
                      <tr>
                        <td><?= $datatabels->id_knowledge  ?></td>
                        <td><?= $datatabels->id_question ?></td>
                        <td><?= $datatabels->if_yes  ?></td>
                        <td><?= $datatabels->if_no ?></td>
                        <td><?= $datatabels->yes_answer  ?></td>
                        <td><?= $datatabels->no_answer ?></td>
                        <td><?= $datatabels->id_trouble  ?></td>
                        <td>
                          <?= anchor('datapakar/tabelpertanyaan/edit/'.$datatabels->ID_P,'<i class="fa fa-edit"></i>',['class'=>'btn btn-info'])?>
                          <?= anchor('datapakar/tabelpertanyaan/hapus/'.$datatabels->ID_P,'<i class="fa fa-eraser"></i>',['class'=>'btn btn-danger'])?>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID Pengetahuan</th>
                        <th>Pertanyaan</th>
                        <th>Jika Iya</th>
                        <th>Jika Iya</th>
                        <th>Jabawan Ya</th>
                        <th>Jabawan Tida</th>
                        <th>ID Kerusakan</th>
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
