      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN MENU</li>
            <?php foreach ($mainmenu as $main) {
            	$submenu = $this->db->get_where('menu', array('is_main_menu' => $main->id_menu));
            	if ($submenu->num_rows() > 0) {
            	?>
            <li class="treeview">
              <a href="<?= base_url().$main->url; ?>">
                <i class="<?= $main->icon; ?>"></i> <span><?= $main->judul; ?></span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              	<?php foreach ($submenu->result() as $sub) { ?>
              		<li><a href="<?= base_url().$sub->url; ?>"><i class="<?= $sub->icon; ?>"></i><?= $sub->judul ?></a></li>
              	<?php } ?>
              </ul>
            </li>
            	<?php } else {?>
            <li>
              <a href="<?= base_url().$main->url; ?>">
                <i class="<?= $main->icon; ?>"></i> <span><?= $main->judul; ?></span>
              </a>
            </li>            
            	<?php } ?> 	
            <?php } ?>
            <li class="header">Information</li>
            <?php foreach ($infomenu as $info) { ?>
              <li><?= anchor($info->url, '<i class="'.$info->icon.'"></i> <span>'.$info->judul.'</span>', 'attributes'); ?>
                </li>
            <?php } ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>