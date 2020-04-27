<div class="content-wrapper">
	    <section class="content-header">
          <h1>
            Diagnosa
            <small>Masalah</small>
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
                            <?php foreach ($pertanyaan as $tanya) :?>
                               <h3 id="teks" style="text-align: center;""><?= $tanya->pertanyaan.' ?'; ?></h3>
                            <?php endforeach; ?>
        				</div>
        			</div>
        			<div class="box-body">
                        <?= form_open('solusipakar/diagnosa'); ?>
                        <?php foreach ($pengetahuan as $knowledge) :?>
                        <div class="form-group" hidden="true">
                            <?= form_input('id_analisaresult', $idtra, ['class'=>'form-control']); ?>
                            <?= form_input('id_knowledge', $knowledge->id_knowledge, ['class'=>'form-control']); ?>
                            <?= form_input('id_pertanyaan', $knowledge->id_pertanyaan, ['class'=>'form-control']); ?>
                            <?= form_input('id_kerusakan', $knowledge->id_kerusakan, ['class'=>'form-control']); ?>
                            <?= form_input('yes_answer', $knowledge->yes_answer, ['class'=>'form-control']); ?>
                            <?= form_input('no_answer', $knowledge->no_answer, ['class'=>'form-control']); ?>
        				</div>
                        <div class="row">
                            <div class="col-md-6">
                                <?= form_button($buttonya); ?>
                            </div>
                            <div class="col-md-6">
                                <?= form_button($buttonno); ?>
                            </div>
                        </div>
                        <?php endforeach; ?>   
                        <?= form_close(); ?>
        			</div>
        		</div>
        	</div>
        </section>
</div>
