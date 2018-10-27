<?php Include "template/head.php"; ?>

<body class="theme-green">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Silahkan tunggu...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo base_url() ?>">IKADHA ~ Ikatan Alumni Pondok Pesantren <b>Darul Huda</b> Mayak</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="pull-right"><a href="<?php echo base_url(); ?>Auth/logout"><i class="material-icons">input</i></a>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <!-- <img src="<?php echo base_url(); ?>asset/images/user.png" width="48" height="48" alt="User" /> -->
                    <?php $path = FCPATH."uploads/".$username.".jpg"; ?>
                    <?php if (file_exists($path)) : ?>
                        <img src="<?php echo base_url().'uploads/'.$username.'.jpg' ?>" width="48" height="48" alt="User" style="object-fit: cover; object-position: 50% 0%;"/>
                    <?php else : ?>
                        <img src="<?php echo base_url(); ?>asset/images/user.png" width="48" height="48" alt="User" />
                    <?php endif; ?>
                </div>
                <div class="info-container">
                    <div class="name"><b><?php echo $this->session->userdata('username') ?></b></div>
                    
                    <?php if ($this->session->userdata('role') == 'Administrator'): ?>
                        <div class="email"><?php echo $this->session->userdata('role') ?></div>
                    <?php elseif ($this->session->userdata('role') == 'User'): ?>
                        <div class="email"><?php echo $this->session->userdata('nama').' ('.$this->session->userdata('role').')' ?></div>
                    <?php endif ?>

                    <?php if ($role == 'User'): ?>
                        <div class="btn-group user-helper-dropdown">
                            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="<?php echo base_url(); ?>User/profil"><i class="material-icons">person</i>Profil</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo base_url(); ?>Auth/logout"><i class="material-icons">input</i>Sign Out</a></li>
                            </ul>
                        </div>
                    <?php endif ?>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">NAVIGASI UTAMA</li>
                    <?php Include "template/module.php"; ?>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2017 - <?php echo date("Y"); ?> <a href="https://www.facebook.com/stone.ar" target="_blank">A. R. Stone</a>.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <!-- <div class="block-header">
                <h2><?php echo $title; ?></h2>
            </div> -->
            <?php if (!empty($message)) : ?>
                <div class="<?php echo 'alert '.$message_bg.' alert-dismissible'; ?>." role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            <?php Include strtolower($role)."/".$module.".php"; ?>  
        </div>
    </section>
</body>
</html>