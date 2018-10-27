<!-- Widgets -->
<div class="row clearfix">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-pink hover-expand-effect">
            <div class="icon">
                <i class="material-icons">account_balance</i>
            </div>
            <div class="content">
                <div class="text">MTs</div>
                <div class="number count-to" data-from="0" data-to="<?php echo $jumlah_mts[0]->count; ?>" data-speed="15" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-cyan hover-expand-effect">
            <div class="icon">
                <i class="material-icons">account_balance</i>
            </div>
            <div class="content">
                <div class="text">MA</div>
                <div class="number count-to" data-from="0" data-to="<?php echo $jumlah_ma[0]->count; ?>" data-speed="1000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-light-green hover-expand-effect">
            <div class="icon">
                <i class="material-icons">account_balance</i>
            </div>
            <div class="content">
                <div class="text">MMH</div>
                <div class="number count-to" data-from="0" data-to="<?php echo $jumlah_mmh[0]->count; ?>" data-speed="1000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-orange hover-expand-effect">
            <div class="icon">
                <i class="material-icons">group</i>
            </div>
            <div class="content">
                <div class="text">TOTAL</div>
                <div class="number count-to" data-from="0" data-to="<?php echo $jumlah_total[0]->count; ?>" data-speed="1000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function ()
    {
        //Widgets count
        $('.count-to').countTo();
    });
</script>

<div class="row clearfix">
    <div class="col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Grafik Pengunjung</h2>
            </div>
            <div class="body">
                <canvas id="pengunjung" height="76"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Berita</h2>
            </div>
            <div class="body">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php foreach ($berita as $b): ?>
                        <div class="panel panel-col-cyan">
                            <div class="panel-heading" role="tab" id="heading<?php echo $b->id ?>">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $b->id ?>" aria-expanded="true" aria-controls="collapse<?php echo $b->id ?>">
                                        <?php echo $b->judul ?>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse<?php echo $b->id ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading<?php echo $b->id ?>">
                                <div class="panel-body">
                                    <small><?php echo $b->tanggal ?> by <a href="#"><?php echo $b->admin ?></a></small>
                                    <div class="well">
                                        <?php echo $b->konten ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="align-right">
                    <a class="btn bg-cyan waves-effect" href="<?php echo base_url(); ?>User/berita_lama/<?php echo date('Y') ?>">Berita Lama</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        new Chart(document.getElementById("pengunjung").getContext("2d"), getChartJs('line'));
    });

    function getChartJs(type)
    {
        var config = null;

        if (type === 'line')
        {
            config =
            {
                type: 'line',
                data:
                {
                    labels:
                    [
                        <?php
                            $i = 7;
                            while($i)
                            {
                                if ($i != 1)
                                {
                                    echo '"'.date("F", strtotime("-".--$i." month")).'", ';
                                }
                                else
                                {
                                    echo '"'.date("F", strtotime("now")).'"';
                                    $i = 0;
                                }
                            }
                        ?>
                    ],
                    datasets: [{
                        label: "Jumlah Pengunjung",
                        data:
                        [
                            <?php
                                $i = count($jumlah_pengunjung);
                                while($i)
                                {
                                    echo $jumlah_pengunjung[--$i];
                                    if ($i != 0) echo ', ';
                                }
                            ?>
                        ],
                        borderColor: 'rgba(0, 188, 212, 0.75)',
                        backgroundColor: 'rgba(0, 188, 212, 0.3)',
                        pointBorderColor: 'rgba(0, 188, 212, 0)',
                        pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                        pointBorderWidth: 1
                    }]
                },
                options:
                {
                    responsive: true,
                    legend: false
                }
            }
        }
        return config;
    }
</script>