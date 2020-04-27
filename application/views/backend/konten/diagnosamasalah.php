<div class="content-wrapper">
	    <section class="content-header">
          <h1>
            Solusi Trouble
            <small>SimPaTiS</small>
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
        					<h3 id="teks">Silahkan Pilih Kerusakan yang Anda Alami !</h3>
        				</div>
        			</div>
        			<div class=" box-body">
                        <?= form_open('solusipakar/diagnosa'); ?>
        				<div class="form-group">
        					<?= form_label('Jenis Kerusakan :', 'jnsTrouble', ['class'=>'control-label']); ?>
        					<?= form_dropdown('jnsTrouble', $drpdwntrouble, '' ,['class'=>'form-control','id'=>'selectTroubel']); ?>
        				</div>
        				<div id="detilTrouble" class="form-group" hidden="true">
        					<?= form_label('Jenis Kerusakan :', 'jnsTrouble', ['class'=>'control-label']); ?>
        					<?= form_dropdown('jnsTrouble', '', '',['class'=>'form-control','id'=>'detilKerusakan']); ?>
        				</div>
                        <div id="actionDiagnosa" class="form-group" hidden="true">
                        <?= form_submit('diagnosaStart', 'Mulai Diagnosa',['class'=>'btn btn-info']); ?>
                        </div>
                        <?= form_close(); ?>
        			</div>
        		</div>
        	</div>
        </section>
</div>
