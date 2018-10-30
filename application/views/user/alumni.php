<div class="row clearfix">
    <div class="col-xs-12">
        <div class="card">
            <div class="header">
                <h2>CARI ALUMNI</h2>
            </div>
            <div class="body">
                <form autocomplete="off" role="form" action="<?php echo base_url(); ?>User/alumni" method="post">
                    <div class="row clearfix">
                        <div class="col-md-11">
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <select name="mts" id="mts" class="form-control show-tick" required>
                                        <option value="0" selected>Tahun lulus MTs</option>
                                         <?php foreach ($tahun_mts as $mts): ?>
                                            <?php if ($mts->lulus_mts != 0): ?>
                                                <option value="<?php echo $mts->lulus_mts ?>" <?php if ($mts->lulus_mts == $lulus_mts) echo 'selected' ?>>
                                                    <?php
                                                        if ($mts->lulus_mts == -1) echo 'Bukan alumni MTs/Belum terdaftar';
                                                        else echo 'Alumni MTs th. '.$mts->lulus_mts;
                                                    ?>
                                                </option>
                                            <?php endif ?>
                                         <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select name="ma" id="ma" class="form-control show-tick" required>
                                        <option value="0" selected>Tahun lulus MA</option>
                                        <?php foreach ($tahun_ma as $ma): ?>
                                            <?php if ($ma->lulus_ma != 0): ?>
                                                <option value="<?php echo $ma->lulus_ma ?>" <?php if ($ma->lulus_ma == $lulus_ma) echo 'selected' ?>>
                                                    <?php
                                                        if ($ma->lulus_ma == -1) echo 'Bukan alumni MA/Belum terdaftar';
                                                        else echo 'Alumni MA th. '.$ma->lulus_ma;
                                                    ?>
                                                </option>
                                            <?php endif ?>
                                         <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select name="mmh" id="mmh" class="form-control show-tick" required>
                                        <option value="0" selected>Tahun lulus MMH</option>
                                        <?php foreach ($tahun_mmh as $mmh): ?>
                                            <?php if ($mmh->lulus_mmh != 0): ?>
                                                <option value="<?php echo $mmh->lulus_mmh ?>" <?php if ($mmh->lulus_mmh == $lulus_mmh) echo 'selected' ?>>
                                                    <?php
                                                        if ($mmh->lulus_mmh == -1) echo 'Bukan alumni MMH/Belum terdaftar';
                                                        else echo 'Alumni MMH th. '.$mmh->lulus_mmh;
                                                    ?>
                                                </option>
                                            <?php endif ?>
                                         <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-primary btn-block waves-effect"><i class="material-icons">search</i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-xs-12">
        <div class="card">
            <div class="header">
                <h2>ALUMNI</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Pendidikan Terakhir</th>
                                <th>Pekerjaan</th>
                                <th class="text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach ($alumni as $a): ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $a->username ?></td>
                                    <td><?php echo $a->nama ?></td>
                                    <td>
                                        <?php
                                            if ($a->jenis_kelamin == 'L') echo 'Laki-laki';
                                            elseif ($a->jenis_kelamin == 'P') echo 'Perempuan';
                                        ?>
                                    </td>
                                    <td><?php echo $a->buff_alamat ?></td>
                                    <td>
                                        <?php
                                            if ($a->label_pendidikan == '0') echo 'Tidak berpendidikan formal';
                                            else
                                            {
                                                if ($a->label_pendidikan == '1') echo 'SD/MI';
                                                elseif ($a->label_pendidikan == '2') echo 'SMP/MTs';
                                                elseif ($a->label_pendidikan == '3') echo 'SMA/MA';
                                                elseif ($a->label_pendidikan == '4') echo 'D1';
                                                elseif ($a->label_pendidikan == '5') echo 'D2';
                                                elseif ($a->label_pendidikan == '6') echo 'D3';
                                                elseif ($a->label_pendidikan == '7') echo 'D4';
                                                elseif ($a->label_pendidikan == '8') echo 'S1';
                                                elseif ($a->label_pendidikan == '9') echo 'S2';
                                                elseif ($a->label_pendidikan == '10') echo 'S3';

                                                echo ' - ';
                                                echo $a->pendidikan;
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if ($a->label_aktifitas == '1') echo 'Tidak bekerja';
                                            else
                                            {
                                                if ($a->label_aktifitas == '2') echo 'Pensiunan/Almarhum';
                                                elseif ($a->label_aktifitas == '3') echo 'PNS';
                                                elseif ($a->label_aktifitas == '4') echo 'TNI/Polisi';
                                                elseif ($a->label_aktifitas == '5') echo 'Guru/Dosen';
                                                elseif ($a->label_aktifitas == '6') echo 'Pegawai Swasta';
                                                elseif ($a->label_aktifitas == '7') echo 'Pengusaha/Wiraswasta';
                                                elseif ($a->label_aktifitas == '8') echo 'Pengacara/Hakim/Jaksa/Notaris';
                                                elseif ($a->label_aktifitas == '9') echo 'Seniman/Pelukis/Artis/Sejenis';
                                                elseif ($a->label_aktifitas == '10') echo 'Dokter/Bidan/Perawat';
                                                elseif ($a->label_aktifitas == '11') echo 'Pilot/Pramugari';
                                                elseif ($a->label_aktifitas == '12') echo 'Pedagang';
                                                elseif ($a->label_aktifitas == '13') echo 'Petani/Peternak';
                                                elseif ($a->label_aktifitas == '14') echo 'Nelayan';
                                                elseif ($a->label_aktifitas == '15') echo 'Buruh (Tani/Pabrik/Bangunan)';
                                                elseif ($a->label_aktifitas == '16') echo 'Sopir/Masinis/Kondektur';
                                                elseif ($a->label_aktifitas == '17') echo 'Politikus';
                                                elseif ($a->label_aktifitas == '18') echo 'Lainnya';

                                                echo ' - ';
                                                if (!empty($a->aktifitas)) echo $a->aktifitas;
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url() ?>User/detail_alumni/<?php echo $a->username ?>" class="btn btn-success btn-xs waves-effect"><i class="material-icons">search</i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function ()
    {
        //Exportable table
        $('.js-exportable').DataTable
        ({
            language: {
                "sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing":   "Sedang memproses...",
                "sLengthMenu":   "Tampilkan _MENU_ entri",
                "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix":  "",
                "sSearch":       "Cari:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext":     "Selanjutnya",
                    "sLast":     "Terakhir"
                }
            },
            dom: 'frtip',
            responsive: true
        });
     });
 </script>