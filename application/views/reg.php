<?php Include "template/head.php"; ?>

<body class="login-page" style="background-color: #4caf50;">
    <div class="login-box">
        <div class="logo">
            <a href="<?php echo base_url(); ?>">IKA<b>DHA</b></a>
            <small>Ikatan Alumni - Pondok Pesantren Darul Huda Mayak</small>
        </div>
        <div class="card">
            <div class="body">
                <?php if (!empty($message)) : ?>
                    <div class="<?php echo 'alert '.$message_bg.' alert-dismissible'; ?>." role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>
                <form autocomplete="off" id="sign_in" action="<?php echo base_url(); ?>Reg/post" method="POST">
                    <div class="msg">Pendaftaran keanggotaan baru</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="NIK (16 digit, tanpa spasi)" required autofocus pattern="[0-9]{16}">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password2" placeholder="Konfirmasi Password" required>
                        </div>
                    </div>
                    <button class="btn btn-block bg-pink waves-effect" type="submit">DAFTAR</button>
                    <div class="m-t-25 m-b--5 align-center">
                        <a href="<?php echo base_url() ?>">Sudah pernah mendaftar?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>asset/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>asset/plugins/bootstrap/js/bootstrap.js"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>asset/plugins/node-waves/waves.js"></script>
    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url(); ?>asset/plugins/jquery-validation/jquery.validate.js"></script>
    <script src="<?php echo base_url(); ?>asset/plugins/jquery-validation/additional-methods.js"></script>
    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>asset/js/admin.js"></script>
    <script>
        $(function ()
        {
            $('#sign_in').validate(
            {
                highlight: function (input)
                {
                    console.log(input);
                    $(input).parents('.form-line').addClass('error');
                },
                unhighlight: function (input)
                {
                    $(input).parents('.form-line').removeClass('error');
                },
                errorPlacement: function (error, element)
                {
                    $(element).parents('.input-group').append(error);
                }
                rules: {
                    'username': {
                        pattern: /[0-9]{16,16}/
                    }
                }
            });
            $('[data-toggle="popover"]').popover();
        });
    </script>
</body>
</html>