<div class="row clearfix">
	<div class="col-sm-3 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>FOTO</h2>
				<ul class="header-dropdown m-r--5">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-trigger="focus" data-container="body" data-toggle="popover" data-placement="bottom" title="Help?" data-content="Foto profil dapat diubah setelah akun selesai dibuat.">
							<i class="material-icons">more_vert</i>
						</a>
					</li>
				</ul>
			</div>
			<div class="body">
				<img class="img-responsive" src="<?php echo base_url(); ?>asset/images/user.png" />
			</div>
		</div>
	</div>
	<div class="col-sm-9 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>BIODATA</h2>
			</div>
			<div class="body">
				<form class="form-horizontal" autocomplete="off" role="form" action="<?php echo base_url(); ?>Admin/tambah_alumni2" method="post">
					<div class="alert bg-pink alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						Akun baru yang akan dibuat menggunakan password default "Pass12345", tanpa tanda petik.
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="username">NIK<span class="col-red"> *</span></label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" name="username" id="username" class="form-control" placeholder="masukkan NIK (tanpa spasi)" required>
								</div>
								<div id="err-username" style="display:none"><small class="col-red">NIK telah digunakan.</small></div>
								<div id="success-username" style="display:none"><small class="col-green">NIK tersedia.</small></div>
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
									<input type="text" id="nama" name="nama" class="form-control" placeholder="masukkan nama lengkap" required>
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
									<option value="L">Laki-laki</option>
									<option value="P">Perempuan</option>
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
									<input type="text" name="tempat_lahir" class="form-control" placeholder="masukkan tempat lahir">
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
									<input type="text" name="tanggal_lahir" class="datepicker form-control" placeholder="masukkan tanggal lahir">
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
									<input type="email" name="email" class="form-control" placeholder="masukkan email">
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
									<input type="text" name="noHP" class="form-control" placeholder="masukkan no. hp" pattern="[0-9]+">
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
									<input type="text" name="noWA" class="form-control" placeholder="masukkan no. wa" pattern="[0-9]+">
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
										<option value="<?php echo $tahun ?>"><?php echo $tahun ?></option>
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
	                        <input type="checkbox" id="mts" name="mts" class="filled-in">
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
								<select name="lulus_mts" id="lulus_mts" class="form-control" disabled>
									<option disabled selected value style="display:none">pilih tahun lulus MTs</option>
									<?php for ($tahun = 1968; $tahun <= date("Y"); $tahun++): ?>
										<option value="<?php echo $tahun ?>"><?php echo $tahun ?></option>
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
	                        <input type="checkbox" id="ma" name="ma" class="filled-in">
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
								<select name="lulus_ma" id="lulus_ma" class="form-control" disabled>
									<option disabled selected value style="display:none">pilih tahun lulus MA</option>
									<?php for ($tahun = 1968; $tahun <= date("Y"); $tahun++): ?>
										<option value="<?php echo $tahun ?>"><?php echo $tahun ?></option>
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
	                        <input type="checkbox" id="mmh" name="mmh" class="filled-in">
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
								<select name="lulus_mmh" id="lulus_mmh" class="form-control" disabled>
									<option disabled selected value style="display:none">pilih tahun lulus MMH</option>
									<?php for ($tahun = 1968; $tahun <= date("Y"); $tahun++): ?>
										<option value="<?php echo $tahun ?>"><?php echo $tahun ?></option>
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
										<option value="<?php echo $p->id ?>"><?php echo $p->name ?></option>
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
									<textarea rows="3" name="alamat" class="form-control no-resize auto-growth" placeholder="Masukkan jalan, rt/rw, dan/atau kode pos, sebagai informasi tambahan"></textarea>
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
									<option value="0">Tidak berpendidikan formal</option>
									<option value="1">SD/MI</option>
									<option value="2">SMP/MTs</option>
									<option value="3">SMA/MA</option>
									<option value="4">D1</option>
									<option value="5">D2</option>
									<option value="6">D3</option>
									<option value="7">D4</option>
									<option value="8">S1</option>
									<option value="9">S2</option>
									<option value="10">S3</option>
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
									<textarea rows="3" name="pendidikan" id="pendidikan" class="form-control no-resize auto-growth" placeholder="Masukkan detail pendidikan terakhir. Contoh: Informatika, Institut Teknologi Sepuluh Nopember, Surabaya"></textarea>
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
									<option value="1">(01) Tidak Bekerja</option>
									<option value="2">(02) Pensiunan/Almarhum</option>
									<option value="3">(03) PNS (selain poin 05 dan 10)</option>
									<option value="4">(04) TNI/Polisi</option>
									<option value="5">(05) Guru/Dosen</option>
									<option value="6">(06) Pegawai Swasta</option>
									<option value="7">(07) Pengusaha/Wiraswasta</option>
									<option value="8">(08) Pengacara/Hakim/Jaksa/Notaris</option>
									<option value="9">(09) Seniman/Pelukis/Artis/Sejenis</option>
									<option value="10">(10) Dokter/Bidan/Perawat</option>
									<option value="11">(11) Pilot/Pramugari</option>
									<option value="12">(12) Pedagang</option>
									<option value="13">(13) Petani/Peternak</option>
									<option value="14">(14) Nelayan</option>
									<option value="15">(15) Buruh (Tani/Pabrik/Bangunan)</option>
									<option value="16">(16) Sopir/Masinis/Kondektur</option>
									<option value="17">(17) Politikus</option>
									<option value="18">(18) Lainnya</option>
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
									<textarea rows="3" name="aktifitas" id="aktifitas" class="form-control no-resize auto-growth" placeholder="Masukkan detail pekerjaan (Tempat, Jabatan, dan/atau Keterangan lain)"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-4 col-xs-offset-5">
							<button type="submit" class="btn btn-primary m-t-15 waves-effect">TAMBAH</button>
						</div>
					</div>
				</form>
			</div>
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
			lang: 'id'
		});
		$('[data-toggle="popover"]').popover();
		$('#username').change(function(){
			var username = $(this).val();
			$.ajax({
                url : "<?php echo base_url(); ?>Admin/check_alumni",
                method : "POST",
                data : {username: username},
                async : false,
                dataType : 'json',
                success: function(data)
                {
                	if (data.exist == true)
                	{
                		// $('#err-username').css("display", "block");
                		$('#success-username').hide();
                		$('#err-username').show();
                	}
                	else if (data.exist == false)
                	{
                		// $('#err-username').css("display", "none");
                		$('#err-username').hide();
                		$('#success-username').show();
                	}
               }
           });
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