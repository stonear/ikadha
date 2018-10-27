<div class="row">
	<div class="col-xs-3">
		<div class="card">
			<div class="body">
				<?php $path = FCPATH."uploads/".$user[0]->username.".jpg"; ?>
                <?php if (file_exists($path)) : ?>
                    <img src="<?php echo base_url().'uploads/'.$user[0]->username.'.jpg' ?>" width="113.38582677" class="img-responsive center-block" alt="User" style="object-fit: cover; object-position: 50% 0%;"/>
                <?php else : ?>
                    <img src="<?php echo base_url(); ?>asset/images/user.png" width="113.38582677" class="img-responsive center-block" alt="User" />
                <?php endif; ?>
				<!-- <img src="<?php echo base_url(); ?>asset/images/user.png" width="113.38582677" class="img-responsive center-block"> -->
			</div>
		</div>
	</div>
	<div class="col-xs-9">
		<div class="card">
			<div class="header">
		        <h2>Biodata <?php echo $user[0]->nama ?></h2>
		    </div>
		    <div class="body">
				<div class="row clearfix">
					<div class="col-xs-4">
						<label>NIK</label>
					</div>
					<div class="col-xs-8">
						: <?php echo $user[0]->username ?>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-xs-4">
						<label>Nama</label>
					</div>
					<div class="col-xs-8">
						: <b><?php echo $user[0]->nama ?></b>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-xs-4">
						<label>Jenis Kelamin</label>
					</div>
					<div class="col-xs-8">
						: <?php
							if ($user[0]->jenis_kelamin == 'L') echo 'Laki-laki';
							elseif ($user[0]->jenis_kelamin == 'P') echo 'Perempuan';
						?>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-xs-4">
						<label>Tempat, Tanggal Lahir</label>
					</div>
					<div class="col-xs-8">
						<?php if (!empty($user[0]->tanggal_lahir)) $user[0]->tanggal_lahir = explode(', ', $user[0]->tanggal_lahir)[1]; ?>
						: <?php echo $user[0]->tempat_lahir ?>, <?php echo $user[0]->tanggal_lahir ?>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-xs-4">
						<label>E-mail</label>
					</div>
					<div class="col-xs-8">
						: <?php echo $user[0]->email ?>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-xs-4">
						<label>No. Telp (HP/WA)</label>
					</div>
					<div class="col-xs-8">
						: <?php
							if (empty($user[0]->noHP)) echo '-';
							else echo $user[0]->noHP;
							echo '/';
							if (empty($user[0]->noWA)) echo '-';
							else echo $user[0]->noWA;
						?>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-xs-4">
						<label>Masuk Tahun</label>
					</div>
					<div class="col-xs-8">
						: <?php
							if ($user[0]->masuk_tahun > 0) echo $user[0]->masuk_tahun;
							else echo '-';
						?>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-xs-4">
						<label>Lulus MTs</label>
					</div>
					<div class="col-xs-8">
						: <?php
							if ($user[0]->lulus_mts <= 0) echo '-';
							else echo $user[0]->lulus_mts;
						?>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-xs-4">
						<label>Lulus MA</label>
					</div>
					<div class="col-xs-8">
						: <?php
							if ($user[0]->lulus_ma <= 0) echo '-';
							else echo $user[0]->lulus_ma;
						?>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-xs-4">
						<label>Lulus MMH</label>
					</div>
					<div class="col-xs-8">
						: <?php
							if ($user[0]->lulus_mmh <= 0) echo '-';
							else echo $user[0]->lulus_mmh;
						?>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-xs-4">
						<label>Alamat</label>
					</div>
					<div class="col-xs-8">
						: <?php echo $user[0]->buff_alamat ?>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-xs-4">
						<label>Pendidikan Terakhir</label>
					</div>
					<div class="col-xs-8">
						: <?php
						if ($user[0]->label_pendidikan == '0') echo 'Tidak berpendidikan formal';
						else
						{
							if ($user[0]->label_pendidikan == '1') echo 'SD/MI';
							elseif ($user[0]->label_pendidikan == '2') echo 'SMP/MTs';
							elseif ($user[0]->label_pendidikan == '3') echo 'SMA/MA';
							elseif ($user[0]->label_pendidikan == '4') echo 'D1';
							elseif ($user[0]->label_pendidikan == '5') echo 'D2';
							elseif ($user[0]->label_pendidikan == '6') echo 'D3';
							elseif ($user[0]->label_pendidikan == '7') echo 'D4';
							elseif ($user[0]->label_pendidikan == '8') echo 'S1';
							elseif ($user[0]->label_pendidikan == '9') echo 'S2';
							elseif ($user[0]->label_pendidikan == '10') echo 'S3';

							echo ' - ';
							echo $user[0]->pendidikan;
						}
						?>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-xs-4">
						<label>Pekerjaan</label>
					</div>
					<div class="col-xs-8">
						: <?php
						if ($user[0]->label_aktifitas == '1') echo 'Tidak bekerja';
						else
						{
							if ($user[0]->label_aktifitas == '2') echo 'Pensiunan/Almarhum';
							elseif ($user[0]->label_aktifitas == '3') echo 'PNS';
							elseif ($user[0]->label_aktifitas == '4') echo 'TNI/Polisi';
							elseif ($user[0]->label_aktifitas == '5') echo 'Guru/Dosen';
							elseif ($user[0]->label_aktifitas == '6') echo 'Pegawai Swasta';
							elseif ($user[0]->label_aktifitas == '7') echo 'Pengusaha/Wiraswasta';
							elseif ($user[0]->label_aktifitas == '8') echo 'Pengacara/Hakim/Jaksa/Notaris';
							elseif ($user[0]->label_aktifitas == '9') echo 'Seniman/Pelukis/Artis/Sejenis';
							elseif ($user[0]->label_aktifitas == '10') echo 'Dokter/Bidan/Perawat';
							elseif ($user[0]->label_aktifitas == '11') echo 'Pilot/Pramugari';
							elseif ($user[0]->label_aktifitas == '12') echo 'Pedagang';
							elseif ($user[0]->label_aktifitas == '13') echo 'Petani/Peternak';
							elseif ($user[0]->label_aktifitas == '14') echo 'Nelayan';
							elseif ($user[0]->label_aktifitas == '15') echo 'Buruh (Tani/Pabrik/Bangunan)';
							elseif ($user[0]->label_aktifitas == '16') echo 'Sopir/Masinis/Kondektur';
							elseif ($user[0]->label_aktifitas == '17') echo 'Politikus';
							elseif ($user[0]->label_aktifitas == '18') echo 'Lainnya';

							echo ' - ';
							echo $user[0]->aktifitas;
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>