<div class="row clearfix">
	<div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>PERBARUI NARAHUBUNG</h2>
				<small>Data narahubung ini akan tampil pada laman <i>login</i></small>
			</div>
			<div class="body">
				<form autocomplete="off" class="form-horizontal" role="form" action="<?php echo base_url(); ?>Admin/update_cp/" method="post">
					<div class="row clearfix">
						<div class="col-sm-4 col-xs-5 form-control-label">
							<label for="no">Data CP</label>
						</div>
						<div class="col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<textarea rows="3" name="no" class="form-control no-resize auto-growth" placeholder="Masukkan Nama dan No Telp"><?php echo $cp[0]->no ?></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
							<button type="submit" class="btn btn-primary m-t-15 waves-effect">PERBARUI</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>