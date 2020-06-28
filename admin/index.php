<?php
    include '../include/header.php';
    $id_user = $_SESSION['id_user'];
?>
<script type="text/javascript" src="../assets/js/Chart.min.js"></script>

<!-- query -->
<?php 
$jumlah_penduduk = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM penduduk"));
$status = mysqli_query($conn,"SELECT * FROM status");
$jumlah_kk = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM penduduk GROUP BY no_kk"));
?>
<!-- end query -->
<!-- user -->
<?php if($_SESSION['akses_level'] == "admin"){ ?>
<div class="row">

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <span style="font-size: 50px">
                            <?php echo $jumlah_penduduk ?></span>
                        <div><b>Total Pendududk</b></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-book fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <span style="font-size: 50px">
                            <?php echo $jumlah_kk ?></span>
                        <div><b>Total KK</b></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $status_nama = [] ?>
    <?php $status_jml = [] ?>
    <?php foreach ($status as $status_row): ?>
    <?php $id_status = $status_row['id_status'] ?>
    <?php $jml_penduduk_status = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM penduduk WHERE status = '$id_status' ")); ?>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <span style="font-size: 50px"><?php echo $jml_penduduk_status ?></span>
                        <div><b><?php echo $status_row['nama_status'] ?></b></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $status_nama[] = $status_row['nama_status'] ?>
    <?php $status_jml[] = $jml_penduduk_status ?>
    <?php endforeach ?>

   

</div>

<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                PIE CHART
            </div>
            <div class="panel-body">
                <canvas id="perbandingan" height="200px"></canvas>
            </div>
        </div>
    </div>
</div>

<?php 
$warna = [];
for ($i=0; $i < count($status_nama) ; $i++) { 
    $warna[] = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
}
?>
<script>
    var ctx = document.getElementById("perbandingan").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?= json_encode($status_nama) ?>,
            datasets: [{
                label: '# perbandingan',
                data: <?= json_encode($status_jml) ?>,
                backgroundColor: <?= json_encode($warna) ?>,
            }]
        },
    });

    </script>
<?php } ?>


<?php  
include '../include/footer.php';
?>