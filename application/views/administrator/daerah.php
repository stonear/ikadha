<div class="row clearfix">
	<div class="col-sm-3">
        <a href="<?php echo base_url() ?>Admin/daerah/1" class="btn bg-pink btn-block waves-effect">Provinsi</a>
        <br><br>
    </div>
    <div class="col-sm-3">
        <a href="<?php echo base_url() ?>Admin/daerah/2" class="btn bg-cyan btn-block waves-effect">Kabupaten/Kota</a>
        <br><br>
    </div>
    <div class="col-sm-3">
        <a href="<?php echo base_url() ?>Admin/daerah/3" class="btn bg-light-green btn-block waves-effect">Kecamatan</a>
        <br><br>
    </div>
    <div class="col-sm-3">
        <a href="<?php echo base_url() ?>Admin/daerah/4" class="btn bg-orange btn-block waves-effect">Kelurahan/Desa</a>
        <br><br>
    </div>
</div>
<div class="row clearfix">
	<div class="col-xs-12">
		<div class="card">
			<div class="body">
				<?php echo $output->output ?>
			</div>
		</div>
	</div>
</div>