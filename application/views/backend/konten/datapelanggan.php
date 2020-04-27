

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data
            <small>Pelanggan</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?= base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= base_url()."user"; ?>">User</a></li>
            <li class="active">Data Pelanggan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?= anchor('datapelanggan.php#adduser','<i class="fa fa-user-plus"></i> Tambah User',['class'=>'btn btn-info','data-toggle'=>'modal'])?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="tbl1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nama Peusahaan</th>
                        <th>Nama PIC</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($datausers as $datatabels) : ?>
                      <tr>
                        <td><?= $datatabels->id_user;  ?></td>
                        <td><?= $datatabels->perusahaan_main; ?><?php if ($datatabels->perusahaan_sub != "") {
                          echo ", ".$datatabels->perusahaan_sub;
                        } ?></td>
                        <td><?= $datatabels->nama; ?></td>
                        <td><?= $datatabels->status; ?></td>
                        <td>
                          <?= anchor('datakaryawan.php#viewdetil'.$datatabels->id_user,'<i class="fa fa-search"></i>',['class'=>'btn btn-info'])?>
                          <?= anchor('datakaryawan.php#edituser'.$datatabels->id_user,'<i class="fa fa-edit"></i>',['class'=>'btn btn-info'])?>
                          <?= anchor('datakaryawan.php#deleteuser'.$datatabels->id_user,'<i class="fa fa-eraser"></i>',['class'=>'btn btn-danger'])?>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Nama Peusahaan</th>
                        <th>Nama PIC</th>
                        <th>Status</th>
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
