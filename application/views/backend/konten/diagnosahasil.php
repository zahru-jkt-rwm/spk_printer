<div class="content-wrapper">
	    <section class="content-header">
          <h1>
            Hasil Diagnosa
            <small>Trouble</small>
          </h1>
          <ol class="breadcrumb">
            <li><?= anchor(base_url(), '<i class="fa fa-home"></i> Home'); ?></li>
            <li><?= anchor(base_url().'solusipakar', '<i class="fa fa-lightbulb-o"></i> Solusi Pakar'); ?></li>
            <li class="active">Trouble</li>
          </ol>
        </section>

        <section class="content">
        	<div class="row">
        		<div class="col-xs-12">
        			<div class="box-header">
        				<div class="box-title">
        					<h3>Hasil Diagnosa dan Kerusakan yang Anda Alami !</h3>
                            <p id="teks" hidden="true">Berikut ini adalah hasil diagnosa dan solusi atas kerusakan yang anda alami</p>
        				</div>
        			</div>
        			<div class=" box-body">
                        <div>
                            <?= anchor('solusipakar/trouble', '<i class="fa  fa-arrow-left"></i> Kembali', ['class'=>'btn btn-info']); ?>
                            <?= anchor('','<i class="fa fa-print"></i> print',['class'=>'btn btn-default'])?>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><h4>ID : <?= $hasil->id_analisaresult;?></h4></div>
                            <div class="col-md-6"><div class="pull-right"><p><?= $hasil->tanggal_analisa; ?></p></div></div>    
                        </div>
                        <div>
            				<dl class="dl-horizontal">
                                <dt>Kerusakans</dt>
                                <dd><?= $hasil->id_kerusakan; ?></dd>
                                <dt>Penyebab</dt>
                                <dd><?= $hasil->penyebab; ?></dd>
                                <dt>solusi</dt>
                                <dd><?= $hasil->solusi ?></dd>
                            </dl>
                        </div>
        			</div>
        		</div>
        	</div>
        </section>
</div>
