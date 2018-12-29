<!DOCTYPE html>
<html>
<head>
	<style>
		@page { margin: 7px; }
		body { margin: 7px; }
	</style>
</head>
<body>
	<img src="<?php echo base_url() ?>asset/images/kop.png" style="width: 100%;  height: auto;">
	<table style="width: 100%;">
		<tr style="vertical-align:top;">
			<td style="white-space: nowrap;">
				<?php $path = FCPATH."uploads/".$user[0]->username.".jpg"; ?>
                <?php if (file_exists($path)) : ?>
                    <img src="<?php echo base_url().'uploads/'.$user[0]->username.'.jpg' ?>" style="width: 65;  height: auto; object-fit: cover; object-position: 50% 0%; border:1px solid rgb(204,204,204);" alt="User" />
                <?php else : ?>
                    <img src="<?php echo base_url(); ?>asset/images/user.png" style="width: 65;  height: auto; border:1px solid rgb(204,204,204);" alt="User" />
                <?php endif; ?>
			</td>
			<td style="width: 100%;">
				<table style="width: 100%; font-size: 7px;">
					<tr>
						<th style="width: 30%; white-space: nowrap;">NIK</th>
						<td>: <?php echo $user[0]->username ?></td>
					</tr>
					<tr>
						<th>Nama</th>
						<td>: <?php echo $user[0]->nama ?></td>
					</tr>
					<tr>
						<th>Jenis Kelamin</th>
						<td>
							: <?php
								if ($user[0]->jenis_kelamin == 'L') echo 'Laki-laki';
								elseif ($user[0]->jenis_kelamin == 'P') echo 'Perempuan';
							?>
						</td>
					</tr>
					<tr>
						<th>Tempat, Tanggal Lahir</th>
						<?php if (!empty($user[0]->tanggal_lahir)) $user[0]->tanggal_lahir = explode(', ', $user[0]->tanggal_lahir)[1]; ?>
						<td>: <?php echo $user[0]->tempat_lahir ?>, <?php echo $user[0]->tanggal_lahir ?></td>
					</tr>
					<tr>
						<th>Masuk Tahun</th>
						<td>
							: <?php
								if ($user[0]->masuk_tahun > 0) echo $user[0]->masuk_tahun;
								else echo '-';
							?>
						</td>
					</tr>
					<tr>
						<th>Alamat</th>
						<td>: <?php echo $user[0]->buff_alamat ?></td>
					</tr>
					<tr>
						<th></th>
						<td style="vertical-align:bottom;">
							<br><br>
							<?php for($i=0;$i<25;$i++) echo '&nbsp;'; ?>Mengetahui,
							<br><br><br><br>
							<?php for($i=0;$i<25;$i++) echo '&nbsp;'; ?>Pengurus Ikadha Pusat
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>