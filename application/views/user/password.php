<div class="row clearfix">
	<div class="col-sm-offset-3 col-sm-6 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>
					Perbarui Kata Sandi
				</h2>
			</div>
			<div class="body">
				<form autocomplete="off" role="form" action="<?php echo base_url(); ?>User/password2" method="post">
					<label for="password1">Kata Sandi Lama</label>
					<div class="form-group">
                    	<div class="form-line">
							<input type="password" id="password1" name="password1" class="form-control" placeholder="Masukkan Kata Sandi Lama" required>
						</div>
					</div>
					<label for="password2">Kata Sandi Baru</label>
					<div class="form-group">
                    	<div class="form-line">
							<input type="password" id="password2" name="password2" class="form-control" placeholder="Masukkan Kata Sandi Baru" required>
						</div>
					</div>
					<label for="password3">Konfirmasi Kata Sandi Baru</label>
					<div class="form-group">
                    	<div class="form-line">
							<input type="password" id="password3" name="password3" class="form-control" placeholder="Masukkan Kata Sandi Baru" required>
						</div>
					</div>
					<button type="submit" class="btn btn-primary m-t-15 waves-effect">PERBARUI</button>
				</form>
			</div>
		</div>
	</div>
</div>