      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Selamat Datang di
            <small>SimPaTiS</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?= base_url() ?>"><i class="fa fa-home"></i> Dashboard</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <?php 
            if (isset($widget1)) {
            foreach ($widget1 as $widgets) : 
               ?>
              <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box <?= $widgets->warna; ?>">
                <div class="inner">
                  <h3><?php 
                  switch ($widgets->data) {
                    case 'count1':
                      echo $count1 ;
                      break;
                    case 'count2':
                      echo $count2 ;
                      break;
                    case 'count3':
                      echo $count3 ;
                      break;
                    case 'count4':
                      echo $count4 ;
                      break;
                    case 'count5':
                      echo $count5 ;
                      break;
                    case 'count6':
                      echo $count6 ;
                      break;
                    case 'count7':
                      echo $count7 ;
                      break;
                    case 'count8':
                      echo $count8 ;
                      break;
                    
                    default:
                      break;
                  }
                  ?></h3>
                  <p><?= $widgets->nama_widget; ?></p>
                </div>
                <div class="icon">
                  <i class="<?= $widgets->icon ; ?>"></i>
                </div>
                <?= anchor('','More info <i class="fa fa-arrow-circle-right"></i>',['class'=>'small-box-footer']); ?>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
          <?php }?>

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
              <div class="row">
                <?php if (isset($userPelanggan)) { ?>
                <div class="<?php if(!isset($userKaryawan)){
                  echo 'col-md-12';
                } else {
                  echo 'col-md-6';
                }?>">
                  <!-- USERS LIST -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">User Pelanggan Tarbaru</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">
                        <?php foreach ($userPelanggan as $pelanggan) : ?>
                        <li>
                          <img src="<?= base_url()."assets/dist/img/user/".$pelanggan->foto; ?>" alt="User Image">
                          <a class="users-list-name" href=""><?= $pelanggan->nama; ?></a>
                          <span class="users-list-date"><?= substr($pelanggan->perusahaan_main, 0, 9).'...'; ?></span>
                        </li>  
                        <?php endforeach; ?>
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">
                      <a href="javascript::" class="uppercase">Lihat Semua User Pelanggan</a>
                    </div><!-- /.box-footer -->
                  </div><!--/.box -->
                </div><!-- /.col -->
                <?php } ?>

                <?php if (isset($userPelanggan)) { ?>
                <div class="<?php if(!isset($userPelanggan)){
                  echo 'col-md-12';
                } else {
                  echo 'col-md-6';
                }?>">
                  <!-- USERS LIST -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">User Karyawan Tarbaru</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">
                        <?php foreach ($userKaryawan as $karyawan) : ?>
                        <li>
                          <img src="<?= base_url()."assets/dist/img/user/".$karyawan->foto; ?>" alt="User Image">
                          <a class="users-list-name" href=""><?= $karyawan->nama; ?></a>
                          <span class="users-list-date"><?= $karyawan->hakakses; ?></span>
                        </li>  
                        <?php endforeach; ?>
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">
                      <a href="javascript::" class="uppercase">Lihat Semua User Karyawan</a>
                    </div><!-- /.box-footer -->
                  </div><!--/.box -->
                </div><!-- /.col -->
                <?php } ?>

                
              </div><!-- /.row -->

              <!-- TABLE: LATEST ORDERS -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Orders</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>Order ID</th>
                          <th>Item</th>
                          <th>Status</th>
                          <th>Popularity</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR9842</a></td>
                          <td>Call of Duty IV</td>
                          <td><span class="label label-success">Shipped</span></td>
                          <td><div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div></td>
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR1848</a></td>
                          <td>Samsung Smart TV</td>
                          <td><span class="label label-warning">Pending</span></td>
                          <td><div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div></td>
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR7429</a></td>
                          <td>iPhone 6 Plus</td>
                          <td><span class="label label-danger">Delivered</span></td>
                          <td><div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div></td>
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR7429</a></td>
                          <td>Samsung Smart TV</td>
                          <td><span class="label label-info">Processing</span></td>
                          <td><div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div></td>
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR1848</a></td>
                          <td>Samsung Smart TV</td>
                          <td><span class="label label-warning">Pending</span></td>
                          <td><div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div></td>
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR7429</a></td>
                          <td>iPhone 6 Plus</td>
                          <td><span class="label label-danger">Delivered</span></td>
                          <td><div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div></td>
                        </tr>
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
                  <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->

            <div class="col-md-4">
              <!-- Info Boxes Style 2 -->
              <?php if(isset($widget2)){ 
              foreach ($widget2 as $widgets) : ?>
              <div class="info-box <?= $widgets->warna?>">
                <span class="info-box-icon"><i class="<?= $widgets->icon ; ?>"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"><?= $widgets->nama_widget ; ?></span>
                  <span class="info-box-number">
                    <?php 
                  switch ($widgets->data) {
                    case 'count1':
                      echo $count1 ;
                      break;
                    case 'count2':
                      echo $count2 ;
                      break;
                    case 'count3':
                      echo $count3 ;
                      break;
                    case 'count4':
                      echo $count4 ;
                      break;
                    case 'count5':
                      echo $count5 ;
                      break;
                    case 'count6':
                      echo $count6 ;
                      break;
                    case 'count7':
                      echo $count7 ;
                      break;
                    case 'count8':
                      echo $count8 ;
                      break;
                    
                    default:
                      break;
                  }
                  ?>
                  </span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                  </div>
                  <span class="progress-description">
                    <?= anchor('','More info <i class="fa fa-arrow-circle-right"></i>',['style'=>'color:white;']); ?>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              <?php endforeach; 
              }
              ?>

              <!-- PRODUCT LIST -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Recently Added Products</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <li class="item">
                      <div class="product-img">
                        <img src="assets/dist/img/default-50x50.gif" alt="Product Image">
                      </div>
                      <div class="product-info">
                        <a href="javascript::;" class="product-title">Samsung TV <span class="label label-warning pull-right">$1800</span></a>
                        <span class="product-description">
                          Samsung 32" 1080p 60Hz LED Smart HDTV.
                        </span>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="assets/dist/img/default-50x50.gif" alt="Product Image">
                      </div>
                      <div class="product-info">
                        <a href="javascript::;" class="product-title">Bicycle <span class="label label-info pull-right">$700</span></a>
                        <span class="product-description">
                          26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                        </span>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="assets/dist/img/default-50x50.gif" alt="Product Image">
                      </div>
                      <div class="product-info">
                        <a href="javascript::;" class="product-title">Xbox One <span class="label label-danger pull-right">$350</span></a>
                        <span class="product-description">
                          Xbox One Console Bundle with Halo Master Chief Collection.
                        </span>
                      </div>
                    </li><!-- /.item -->
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="javascript::;" class="uppercase">View All Products</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->