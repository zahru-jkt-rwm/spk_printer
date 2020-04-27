

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tabel
            <small>Keputusan</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?= base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= base_url()."datapakar"; ?>">Data Pakar</a></li>
            <li class="active">Tabel Keputusan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="tbl1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID Kerusakan</th>
                        <th>Kerusakan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($tabel as $datatabels) : ?>
                      <tr>
                        <td><?= $datatabels->id_kerusakan; ?></td>
                        <td><?= $datatabels->kerusakan; ?></td>
                        <td>
                          <?php 
                            $b = $datatabels->id_kerusakan;
                            $tempfilter1 = array_filter($tabel3, function($a) use ($b)
                            {
                              return $a->id_kerusakan == $b;
                            }); 
                            if (count($tempfilter1) > 0) {
                              echo anchor('tabelkeputusan.php#detail'.$datatabels->id_kerusakan, '<i class="fa fa-th-list"></i> Lihat', ['class'=>'btn btn-default','data-toggle'=>'modal']);
                            } else {
                              echo anchor('tabelkeputusan.php#tambahkeputusan', '<i class="fa  fa-plus"></i> Tambah', ['class'=>'btn btn-info','data-toggle'=>'modal']);
                            }
                          ?>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID Kerusakan</th>
                        <th>Kerusakan</th>
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

      <?php foreach ($tabel as $modaldetail) {?>
      <div id="<?= 'detail'.$modaldetail->id_kerusakan; ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3>Data Pengetahuan <?= $modaldetail->id_kerusakan; ?></h3>
            </div>
            <div class="modal-body">
             <table id="tbl1" class="table table-bordered table-striped">
              <tr>
                <td>ID Pengetahuan</td>
                <td>ID Pertanyaan</td>
                <td>Keputusan</td>
                <td>Action</td>
              </tr>
               <?php 
                 $b = $modaldetail->id_kerusakan;
                 $hasil = array_filter($tabel3, function($a) use ($b)
                 {
                 return $a->id_kerusakan == $b;
                 });;
               foreach ($hasil as $hasils){
               ?>
               <tr>
                 <td><?= $hasils->id_knowledge;?></td>
                 <td>
                   <?php 
                   echo $hasils->id_pertanyaan;
                   $sqlpertanyaan = $this->db->where('id_pertanyaan',$hasils->id_pertanyaan)
                                             ->get('pertanyaan');
                   $pertanyaans = $sqlpertanyaan->row();
                   ?><br>
                   <?= $pertanyaans->pertanyaan ?>
                 </td>
                 <td>
                   <?php 
                   echo "Jika Ya :";
                   echo "<br>";
                   echo $hasils->yes_answer;
                   $ya = substr($hasils->yes_answer, 0, 3);
                   switch ($ya) {
                     case 'TDP':
                       $sqlya = $this->db->where('id_pertanyaan',$hasils->yes_answer)
                                             ->get('pertanyaan');
                       $ya = $sqlya->row();
                       $yesanswer = $ya->pertanyaan;
                       break;
                       case 'SST':
                       $sqlya = $this->db->where('id_solusi',$hasils->yes_answer)
                                             ->get('solusi');
                       $ya = $sqlya->row();
                       $yesanswer = $ya->solusi;
                       break;
                     
                     default:
                       # code...
                       break;
                   }
                   ?>
                   <br>
                   <?= $yesanswer;?>
                   <br>
                   <br>
                   <?php 
                   echo "Jika Tidak :";
                   echo "<br>";
                   echo $hasils->no_answer;
                   $no = substr($hasils->no_answer, 0, 3);
                   switch ($no) {
                     case 'TDP':
                       $sqlno = $this->db->where('id_pertanyaan',$hasils->no_answer)
                                             ->get('pertanyaan');
                       $no = $sqlno->row();
                       $noanswer = $no->pertanyaan;
                       break;
                       case 'SST':
                       $sqlno = $this->db->where('id_solusi',$hasils->no_answer)
                                             ->get('solusi');
                       $no = $sqlno->row();
                       $noanswer = $no->solusi;
                       break;
                     
                     default:
                       # code...
                       break;
                   }
                   ?>
                   <br>
                   <?= $noanswer;?>
                 </td>
                 <td>
                   <div class="btn-group-vertical">
                   <?= anchor('tabelkeputusan.php#edit'.$hasils->id_knowledge, '<i class="fa fa-edit"></i> Edit', ['class'=>'btn btn-info']); ?>
                   <?= anchor('tabelkeputusan.php#hapus'.$hasils->id_knowledge, '<i class="fa fa-remove"></i> Hapus', ['class'=>'btn btn-danger'])?>
                   </div>
                 </td>
               </tr>
               <?php } ?>
             </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
