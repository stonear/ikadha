<div class="row clearfix">
	<div class="col-sm-3 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>FOTO</h2>
				<ul class="header-dropdown m-r--5">
					<li class="dropdown">
						<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<i class="material-icons">more_vert</i>
						</a>
						<ul class="dropdown-menu pull-right">
							<li><a data-toggle="modal" data-target="#foto">Perbarui</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="body">
				<?php $path = FCPATH."uploads/".$user[0]->username.".jpg"; ?>
				<?php if (file_exists($path)): ?>
					<img class="img-responsive" src="<?php echo base_url().'uploads/'.$user[0]->username.'.jpg' ?>" />
				<?php else : ?>
					<img class="img-responsive" src="<?php echo base_url(); ?>asset/images/user.png" />
				<?php endif ?>
			</div>
		</div>
	</div>
	<div class="col-sm-9 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>BIODATA</h2>
			</div>
			<div class="body">
				<form class="form-horizontal" autocomplete="off" role="form" action="<?php echo base_url(); ?>Admin/update_alumni2/<?php echo $user[0]->username ?>" method="post">
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="username">NIK<span class="col-red"> *</span></label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" name="-" id="-" class="form-control" value="<?php echo $user[0]->username ?>" disabled>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="nama">Nama Lengkap<span class="col-red"> *</span></label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="nama" name="nama" class="form-control" placeholder="masukkan nama lengkap" value="<?php echo $user[0]->nama ?>" required>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="jenis_kelamin">Jenis Kelamin</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<select name="jenis_kelamin" class="form-control">
									<option disabled selected value style="display:none">pilih jenis kelamin</option>
									<option value="L" <?php if ($user[0]->jenis_kelamin == 'L') echo 'selected'?>>Laki-laki</option>
									<option value="P" <?php if ($user[0]->jenis_kelamin == 'P') echo 'selected'?>>Perempuan</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="tempat_lahir">Tempat Lahir</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" name="tempat_lahir" class="form-control" placeholder="masukkan tempat lahir" value="<?php echo $user[0]->tempat_lahir ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="tanggal_lahir">Tanggal Lahir</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" name="tanggal_lahir" class="datepicker form-control" placeholder="masukkan tanggal lahir" value="<?php echo $user[0]->tanggal_lahir ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="email">e-Mail</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="email" name="email" class="form-control" placeholder="masukkan email" value="<?php echo $user[0]->email ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="noHP">No. HP</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" name="noHP" class="form-control" placeholder="masukkan no. hp" pattern="[0-9]+" value="<?php echo $user[0]->noHP ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="noWA">No. WA</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" name="noWA" class="form-control" placeholder="masukkan no. wa" pattern="[0-9]+" value="<?php echo $user[0]->noWA ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="masuk_tahun">Masuk Tahun</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<!-- <div class="form-line">
									<input type="number" name="masuk_tahun" class="form-control" placeholder="masukkan tahun" min="1">
								</div> -->
								<select name="masuk_tahun" class="form-control">
									<option disabled selected value style="display:none">pilih tahun masuk</option>
									<?php for ($tahun = 1968; $tahun <= date("Y"); $tahun++): ?>
										<option value="<?php echo $tahun ?>" <?php if ($user[0]->masuk_tahun == $tahun) echo 'selected'?>><?php echo $tahun ?></option>
									<?php endfor ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 align-right" style="margin-bottom: 0px;">
	                        <label>Alumni MTs</label>
						</div>
	                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7" style="padding-left: 0px;margin-bottom: 0px;">
	                        <input type="checkbox" id="mts" name="mts" class="filled-in" <?php if ($user[0]->lulus_mts > 0) echo 'checked'?>>
	                        <label for="mts"></label>
	                    </div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="lulus_mts">Lulus MTs</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<!-- <div class="form-line">
									<input type="number" id="lulus_mts" name="lulus_mts" class="form-control" placeholder="masukkan tahun" min="1" value="<?php if (!empty($lulus_mts)) echo $lulus_mts ?>" disabled>
								</div> -->
								<select name="lulus_mts" id="lulus_mts" class="form-control" <?php if ($user[0]->lulus_mts < 0) echo 'disabled'?>>
									<option disabled selected value style="display:none">pilih tahun lulus MTs</option>
									<?php for ($tahun = 1968; $tahun <= date("Y"); $tahun++): ?>
										<option value="<?php echo $tahun ?>" <?php if ($user[0]->lulus_mts == $tahun) echo 'selected'?>><?php echo $tahun ?></option>
									<?php endfor ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 align-right" style="margin-bottom: 0px;">
	                        <label>Alumni MA</label>
						</div>
	                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7" style="padding-left: 0px;margin-bottom: 0px;">
	                        <input type="checkbox" id="ma" name="ma" class="filled-in" <?php if ($user[0]->lulus_ma > 0) echo 'checked'?>>
	                        <label for="ma"></label>
	                    </div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="lulus_ma">Lulus MA</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<!-- <div class="form-line">
									<input type="number" id="lulus_ma" name="lulus_ma" class="form-control" placeholder="masukkan tahun" min="1" value="<?php if (!empty($lulus_ma)) echo $lulus_ma ?>" disabled>
								</div> -->
								<select name="lulus_ma" id="lulus_ma" class="form-control" <?php if ($user[0]->lulus_ma < 0) echo 'disabled'?>>
									<option disabled selected value style="display:none">pilih tahun lulus MA</option>
									<?php for ($tahun = 1968; $tahun <= date("Y"); $tahun++): ?>
										<option value="<?php echo $tahun ?>" <?php if ($user[0]->lulus_ma == $tahun) echo 'selected'?>><?php echo $tahun ?></option>
									<?php endfor ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 align-right" style="margin-bottom: 0px;">
	                        <label>Alumni MMH</label>
						</div>
	                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7" style="padding-left: 0px;margin-bottom: 0px;">
	                        <input type="checkbox" id="mmh" name="mmh" class="filled-in" <?php if ($user[0]->lulus_mmh > 0) echo 'checked'?>>
	                        <label for="mmh"></label>
	                    </div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="lulus_mmh">Lulus MMH</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<!-- <div class="form-line">
									<input type="number" id="lulus_mmh" name="lulus_mmh" class="form-control" placeholder="masukkan tahun" min="1" value="<?php if (!empty($lulus_mmh)) echo $lulus_mmh ?>" disabled>
								</div> -->
								<select name="lulus_mmh" id="lulus_mmh" class="form-control" <?php if ($user[0]->lulus_mmh < 0) echo 'disabled'?>>
									<option disabled selected value style="display:none">pilih tahun lulus MMH</option>
									<?php for ($tahun = 1968; $tahun <= date("Y"); $tahun++): ?>
										<option value="<?php echo $tahun ?>" <?php if ($user[0]->lulus_mmh == $tahun) echo 'selected'?>><?php echo $tahun ?></option>
									<?php endfor ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label>Alamat</label>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="provinsi">Provinsi</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<select name="provinsi" id="provinsi" class="form-control">
									<option disabled selected value style="display:none">pilih provinsi</option>
									<?php foreach ($provinces as $p): ?>
										<option value="<?php echo $p->id ?>" <?php if ($user[0]->provinsi == $p->id) echo 'selected'?>><?php echo $p->name ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="kabupaten">Kota/Kabupaten</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<select name="kabupaten" id="kabupaten" class="form-control">
									<option disabled selected value style="display:none">pilih kabupaten</option>
									<?php foreach ($regencies as $r): ?>
										<option value="<?php echo $r->id ?>" <?php if ($user[0]->kabupaten == $r->id) echo 'selected'?>><?php echo $r->name ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="kecamatan">Kecamatan</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<select name="kecamatan" id="kecamatan" class="form-control">
									<option disabled selected value style="display:none">pilih kecamatan</option>
									<?php foreach ($districts as $d): ?>
										<option value="<?php echo $d->id ?>" <?php if ($user[0]->kecamatan == $d->id) echo 'selected'?>><?php echo $d->name ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="kelurahan">Kelurahan/Desa</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<select name="kelurahan" id="kelurahan" class="form-control">
									<option disabled selected value style="display:none">pilih kelurahan</option>
									<?php foreach ($villages as $v): ?>
										<option value="<?php echo $v->id ?>" <?php if ($user[0]->kelurahan == $v->id) echo 'selected'?>><?php echo $v->name ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="alamat">Keterangan Alamat</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<textarea rows="3" name="alamat" class="form-control no-resize auto-growth" placeholder="Masukkan jalan, rt/rw, dan/atau kode pos, sebagai informasi tambahan"><?php echo $user[0]->alamat ?></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="label_pendidikan">Pendidikan Terakhir</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<select name="label_pendidikan" id="label_pendidikan" class="form-control">
									<option disabled selected value style="display:none">pilih jenjang pendidikan</option>
									<option value="0" <?php if ($user[0]->label_pendidikan == '0') echo 'selected'?>>Tidak berpendidikan formal</option>
									<option value="1" <?php if ($user[0]->label_pendidikan == '1') echo 'selected'?>>SD/MI</option>
									<option value="2" <?php if ($user[0]->label_pendidikan == '2') echo 'selected'?>>SMP/MTs</option>
									<option value="3" <?php if ($user[0]->label_pendidikan == '3') echo 'selected'?>>SMA/MA</option>
									<option value="4" <?php if ($user[0]->label_pendidikan == '4') echo 'selected'?>>D1</option>
									<option value="5" <?php if ($user[0]->label_pendidikan == '5') echo 'selected'?>>D2</option>
									<option value="6" <?php if ($user[0]->label_pendidikan == '6') echo 'selected'?>>D3</option>
									<option value="7" <?php if ($user[0]->label_pendidikan == '7') echo 'selected'?>>D4</option>
									<option value="8" <?php if ($user[0]->label_pendidikan == '8') echo 'selected'?>>S1</option>
									<option value="9" <?php if ($user[0]->label_pendidikan == '9') echo 'selected'?>>S2</option>
									<option value="10" <?php if ($user[0]->label_pendidikan == '10') echo 'selected'?>>S3</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="pendidikan">Detail Pendidikan Terakhir</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<textarea rows="3" name="pendidikan" id="pendidikan" class="form-control no-resize auto-growth" placeholder="Masukkan detail pendidikan terakhir. Contoh: Informatika, Institut Teknologi Sepuluh Nopember, Surabaya"><?php echo $user[0]->pendidikan ?></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="label_aktifitas">Pekerjaan</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<select name="label_aktifitas" id="label_aktifitas" class="form-control">
									<option disabled selected value style="display:none">pilih jenis pekerjaan</option>
									<option value="1" <?php if ($user[0]->label_aktifitas == '1') echo 'selected'?>>(01) Tidak Bekerja</option>
									<option value="2" <?php if ($user[0]->label_aktifitas == '2') echo 'selected'?>>(02) Pensiunan/Almarhum</option>
									<option value="3" <?php if ($user[0]->label_aktifitas == '3') echo 'selected'?>>(03) PNS (selain poin 05 dan 10)</option>
									<option value="4" <?php if ($user[0]->label_aktifitas == '4') echo 'selected'?>>(04) TNI/Polisi</option>
									<option value="5" <?php if ($user[0]->label_aktifitas == '5') echo 'selected'?>>(05) Guru/Dosen</option>
									<option value="6" <?php if ($user[0]->label_aktifitas == '6') echo 'selected'?>>(06) Pegawai Swasta</option>
									<option value="7" <?php if ($user[0]->label_aktifitas == '7') echo 'selected'?>>(07) Pengusaha/Wiraswasta</option>
									<option value="8" <?php if ($user[0]->label_aktifitas == '8') echo 'selected'?>>(08) Pengacara/Hakim/Jaksa/Notaris</option>
									<option value="9" <?php if ($user[0]->label_aktifitas == '9') echo 'selected'?>>(09) Seniman/Pelukis/Artis/Sejenis</option>
									<option value="10" <?php if ($user[0]->label_aktifitas == '10') echo 'selected'?>>(10) Dokter/Bidan/Perawat</option>
									<option value="11" <?php if ($user[0]->label_aktifitas == '11') echo 'selected'?>>(11) Pilot/Pramugari</option>
									<option value="12" <?php if ($user[0]->label_aktifitas == '12') echo 'selected'?>>(12) Pedagang</option>
									<option value="13" <?php if ($user[0]->label_aktifitas == '13') echo 'selected'?>>(13) Petani/Peternak</option>
									<option value="14" <?php if ($user[0]->label_aktifitas == '14') echo 'selected'?>>(14) Nelayan</option>
									<option value="15" <?php if ($user[0]->label_aktifitas == '15') echo 'selected'?>>(15) Buruh (Tani/Pabrik/Bangunan)</option>
									<option value="16" <?php if ($user[0]->label_aktifitas == '16') echo 'selected'?>>(16) Sopir/Masinis/Kondektur</option>
									<option value="17" <?php if ($user[0]->label_aktifitas == '17') echo 'selected'?>>(17) Politikus</option>
									<option value="18" <?php if ($user[0]->label_aktifitas == '18') echo 'selected'?>>(18) Lainnya</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="aktifitas">Detail Pekerjaan</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<textarea rows="3" name="aktifitas" id="aktifitas" class="form-control no-resize auto-growth" placeholder="Masukkan detail pekerjaan (Tempat, Jabatan, dan/atau Keterangan lain)"><?php echo $user[0]->aktifitas ?></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-4 col-xs-offset-5">
							<button type="submit" class="btn btn-primary m-t-15 waves-effect">PERBARUI</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="foto" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="<?php echo base_url(); ?>Admin/foto_alumni/<?php echo $user[0]->username ?>" method="post" enctype="multipart/form-data">
				<div class="modal-header">
					<h4 class="modal-title" id="defaultModalLabel">Perbarui Foto</h4>
				</div>
				<div class="modal-body">
					<div class="row clearfix">
						<div class="col-xs-12">
							<div class="form-group">
								<div class="form-line">
									<input style="opacity: 0; cursor: pointer;" type="file" id="file" name="img" class="form-control" accept="image/jpeg, image/pjpeg, image/png', image/x-png" required>
									<label for="file" id="labelfile" style="cursor: pointer;">Pilih foto . . .</label>
								</div>
							</div>
							<small>Ukuran maksimal foto yang diperbolehkan adalah <strong>1 MB</strong>.</small><br>
							<small>Foto yang diunggah, merupakan foto resmi/sopan.</small>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
					<button type="submit" class="btn btn-link waves-effect">PERBARUI</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	$(function ()
	{
		$('.datepicker').bootstrapMaterialDatePicker({
			format: 'dddd, DD MMMM YYYY',
			clearButton: true,
			weekStart: 1,
			time: false,
			lang: 'id',
			clearText: 'Hapus',
			cancelText: 'Batal',
			okText: 'OK'
		});
		$('#provinsi').change(function(){
			var provinsi = $(this).val();
			$.ajax({
                url : "<?php echo base_url(); ?>Admin/get_kabupaten",
                method : "POST",
                data : {province_id: provinsi},
                async : false,
                dataType : 'json',
                success: function(data)
                {
                	var html = '';
					var i;
					html += '<option disabled selected style="display:none">pilih kabupaten</option>';
					for(i = 0; i < data.length; i++)
					{
					   html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
					}
					$('#kabupaten').html(html).selectpicker('refresh');

					html2 = '<option disabled selected style="display:none">pilih kecamatan</option>';
					$('#kecamatan').html(html2).selectpicker('refresh');
					html3 = '<option disabled selected style="display:none">pilih kelurahan</option>';
					$('#kelurahan').html(html3).selectpicker('refresh');
               	}
           });
		});
		$('#kabupaten').change(function(){
			var kabupaten = $(this).val();
			$.ajax({
                url : "<?php echo base_url(); ?>Admin/get_kecamatan",
                method : "POST",
                data : {regency_id: kabupaten},
                async : false,
                dataType : 'json',
                success: function(data)
                {
                	var html = '';
					var i;
					html += '<option disabled selected style="display:none">pilih kecamatan</option>';
					for(i = 0; i < data.length; i++)
					{
					   html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
					}
					$('#kecamatan').html(html).selectpicker('refresh');

					html3 = '<option disabled selected style="display:none">pilih kelurahan</option>';
					$('#kelurahan').html(html3).selectpicker('refresh');
               	}
           });
		});
		$('#kecamatan').change(function(){
			var kecamatan = $(this).val();
			$.ajax({
                url : "<?php echo base_url(); ?>Admin/get_kelurahan",
                method : "POST",
                data : {district_id: kecamatan},
                async : false,
                dataType : 'json',
                success: function(data)
                {
                	var html = '';
					var i;
					html += '<option disabled selected style="display:none">pilih kelurahan</option>';
					for(i = 0; i < data.length; i++)
					{
					   html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
					}
					$('#kelurahan').html(html).selectpicker('refresh');
               	}
           });
		});
		$('#mts').change(function(){
			if (this.checked)
			{
	            $('#lulus_mts').prop("disabled", false);
	        }
	        else
	        {
	        	$('#lulus_mts').prop("disabled", true);
	        	$('#lulus_mts').val("");
	        }
	        $('#lulus_mts').selectpicker('refresh');
		});
		$('#ma').change(function(){
			if (this.checked)
			{
	            $('#lulus_ma').prop("disabled", false);
	        }
	        else
	        {
	        	$('#lulus_ma').prop("disabled", true);
	        	$('#lulus_ma').val("");
	        }
	        $('#lulus_ma').selectpicker('refresh');
		});
		$('#mmh').change(function(){
			if (this.checked)
			{
	            $('#lulus_mmh').prop("disabled", false);
	        }
	        else
	        {
	        	$('#lulus_mmh').prop("disabled", true);
	        	$('#lulus_mmh').val("");
	        }
	        $('#lulus_mmh').selectpicker('refresh');
		});
		// $('#label_aktifitas').change(function(){
		// 	if (this.value == 1)
		// 	{
		// 		$('#aktifitas').prop("placeholder", "Masukkan nama instansi kuliah/pondok. Contoh: 'S1 Teknik Informatika - Institut Teknologi Sepuluh Nopember'").val("").focus().blur();
		// 	}
		// 	else if (this.value == 2)
		// 	{
		// 		$('#aktifitas').prop("placeholder", "Masukkan detail pekerjaan. Contoh: 'Dosen di IAIN Ponorogo'").val("").focus().blur();
		// 	}
		// 	else if (this.value == 3)
		// 	{
		// 		$('#aktifitas').prop("placeholder", "Masukkan detail aktifitas").val("").focus().blur();
		// 	}
		// });
	});
</script>