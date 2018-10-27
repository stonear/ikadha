<?php Include "template/head.php"; ?>

<body class="login-page" style="background-color: #4caf50;">
    <div class="login-box">
        <div class="logo">
            <a href="<?php echo base_url(); ?>">IKA<b>DHA</b></a>
            <small>Ikatan Alumni - Pondok Pesantren Darul Huda Mayak</small>
        </div>
        <div class="card">
            <div class="body">
                <form autocomplete="off" id="sign_in" action="<?php echo base_url(); ?>Auth/post" method="POST">
                    <div class="msg">Masuk untuk memulai sesi anda</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="NIK" required autofocus>
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
                    <div class="row">
                        <div class="col-xs-offset-8 col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">MASUK</button>
                        </div>
                    </div>
                    <?php if (!empty($cp)): ?>
                        <div class="row m-t-15 m-b--20">
                            <div class="col-xs-5">
                                <a href="#" data-trigger="focus" data-container="body" data-toggle="popover" data-placement="top" title="Lupa Password?" data-content="Tenang saja, hubungi narahubung: <?php echo $cp[0]->nama.' ~ '.$cp[0]->no;; ?>">Lupa Kata Sandi?</a>
                            </div>
                            <div class="col-xs-7 align-right">
                                <span>Jangan khawatir, kami dapat membantu.</span>
                            </div>
                        </div>
                    <?php endif ?>
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
            });
            $('[data-toggle="popover"]').popover();
        });
    </script>
</body>
</html>