<?php if ($role == 'User') : ?>
	<li class="<?php if($title == 'Dashboard'){echo 'active';} ?>">
		<a href="<?php echo base_url(); ?>User">
			<i class="material-icons <?php if($title == 'Dashboard'){echo 'col-green';} ?>">home</i>
			<span>Beranda</span>
		</a>
	</li>
	<li class="<?php if($title == 'Profil'){echo 'active';} ?>">
		<a href="<?php echo base_url(); ?>User/profil">
			<i class="material-icons <?php if($title == 'Profil'){echo 'col-green';} ?>">edit</i>
			<span>Profil</span>
		</a>
	</li>
	<li class="<?php if($title == 'Alumni'){echo 'active';} ?>">
		<a href="<?php echo base_url(); ?>User/alumni">
			<i class="material-icons <?php if($title == 'Alumni'){echo 'col-green';} ?>">person</i>
			<span>Alumni</span>
		</a>
	</li>
	<li class="<?php if($title == 'Password'){echo 'active';} ?>">
		<a href="<?php echo base_url(); ?>User/password">
			<i class="material-icons  <?php if($title == 'Password'){echo 'col-green';} ?>">vpn_key</i>
			<span>Kata Sandi</span>
		</a>
	</li>
	<li class="<?php if($title == 'Contact Person'){echo 'active';} ?>">
		<a href="<?php echo base_url(); ?>User/cp">
			<i class="material-icons <?php if($title == 'Contact Person'){echo 'col-green';} ?>">call</i>
			<span>Narahubung</span>
		</a>
	</li>
<?php elseif ($role == 'Administrator') : ?>
	<li class="<?php if($title == 'Dashboard'){echo 'active';} ?>">
		<a href="<?php echo base_url(); ?>Admin">
			<i class="material-icons <?php if($title == 'Dashboard'){echo 'col-green';} ?>">home</i>
			<span>Beranda</span>
		</a>
	</li>
	<li class="<?php if($title == 'Alumni'){echo 'active';} ?>">
		<a href="<?php echo base_url(); ?>Admin/alumni">
			<i class="material-icons <?php if($title == 'Alumni'){echo 'col-green';} ?>">person</i>
			<span>Alumni</span>
		</a>
	</li>
	<li class="<?php if($title == 'Berita'){echo 'active';} ?>">
		<a href="<?php echo base_url(); ?>Admin/berita">
			<i class="material-icons <?php if($title == 'Berita'){echo 'col-green';} ?>">text_fields</i>
			<span>Berita</span>
		</a>
	</li>
	<li class="<?php if($title == 'Admin'){echo 'active';} ?>">
		<a href="<?php echo base_url(); ?>Admin/admin">
			<i class="material-icons <?php if($title == 'Admin'){echo 'col-green';} ?>">code</i>
			<span>Admin</span>
		</a>
	</li>
	<li class="<?php if($title == 'Contact Person'){echo 'active';} ?>">
		<a href="<?php echo base_url(); ?>Admin/cp">
			<i class="material-icons <?php if($title == 'Contact Person'){echo 'col-green';} ?>">call</i>
			<span>Narahubung</span>
		</a>
	</li>
<?php endif; ?>