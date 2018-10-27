<div class="row clearfix">
    <div class="col-xs-12 text-right tambah-admin">
        <button type="button" class="btn bg-light-blue waves-effect">Tambah Admin</button>
        <br><br>
    </div>
    <div class="col-xs-12">
        <div class="card">
            <div class="header">
                <h2>ADMIN</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th class="text-right" style="width: 50px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($admin as $a): ?>
                                <tr>
                                    <td><?php echo $a->username ?></td>
                                    <td class="text-right">
                                        <button type="button" class="update-admin-<?php echo $a->username ?> btn bg-light-blue btn-xs waves-effect"><i class="material-icons">edit</i></button>
                                        <button type="button" class="hapus-admin-<?php echo $a->username ?> btn btn-danger btn-xs waves-effect"><i class="material-icons">delete</i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahadmin" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form autocomplete="off" role="form" action="<?php echo base_url(); ?>Admin/tambah_admin/" method="post">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Tambah Admin</h4>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required pattern="[a-zA-Z0-9]+">
                                    <div class="help-info">Username hanya boleh mengandung karakter alfanumerik (A-Z, 0-9)</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                    <div class="help-info">Password harus 8 karakter atau lebih, mengandung huruf kapital, huruf kecil, dan angka.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CANCEL</button>
                    <button type="submit" class="btn bg-light-blue waves-effect">ADD</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php foreach ($admin as $a): ?>
    <div class="modal fade" id="updateadmin-<?php echo $a->username ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-col-light-blue">
                <form autocomplete="off" role="form" action="<?php echo base_url(); ?>Admin/update_admin/<?php echo $a->username ?>" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Update Admin</h4>
                    </div>
                    <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="username" class="form-control" placeholder="Masukkan Username" value="<?php echo $a->username ?>" required pattern="[a-zA-Z0-9]+">
                                     <div class="help-info col-white">Username hanya boleh mengandung karakter alfanumerik (A-Z, 0-9)</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                    <div class="help-info col-white">Password harus 8 karakter atau lebih, mengandung huruf kapital, huruf kecil, dan angka.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CANCEL</button>
                        <button type="submit" class="btn btn-link waves-effect">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="hapusadmin-<?php echo $a->username ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-col-red">
                <form autocomplete="off" class="form-horizontal" role="form" action="<?php echo base_url(); ?>Admin/hapus_admin/<?php echo $a->username ?>" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Hapus Admin</h4>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus <?php echo $a->username ?>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CANCEL</button>
                        <button type="submit" class="btn btn-link waves-effect">HAPUS</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<script>
    $(function ()
    {
        $('.tambah-admin .btn').on('click', function ()
        {
            $('#tambahadmin').modal('show');
        });
        <?php foreach ($admin as $a): ?>
            $('.update-admin-<?php echo $a->username ?>.btn').on('click', function ()
            {
                $('#updateadmin-<?php echo $a->username ?>').modal('show');
            });
            $('.hapus-admin-<?php echo $a->username ?>.btn').on('click', function ()
            {
                $('#hapusadmin-<?php echo $a->username ?>').modal('show');
            });
        <?php endforeach; ?>
    });
</script>