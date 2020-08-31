<?php

?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php" style="padding: 4px!important">
                <img src="../uploads/logo/<?php echo $setting['logo']; ?>" height="100%">
            </a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><b>
                <?php echo $setting['nama_website']; ?></b>
            </a>
                <ul class="nav navbar-nav">
                    <li><a href="desa.php"><span class="fa fa-book"></span> Data Desa</a></li>
                    <li><a href="penduduk.php"><span class="fa fa-users"></span> Data Penduduk</a></li>
                    <li><a href="penduduk_khusus.php"><span class="fa fa-users"></span> Data Khusus</a></li>
                    <li><a href="status.php"><span class="fa fa-bookmark"></span> Data Status</a></li>
                    <li><a href="laporan.php"><span class="fa fa-print"></span> Laporan</a></li>
                    <?php if($_SESSION['akses_level'] == "admin"){ ?>
                    <li><a href="user.php"><span class="fa fa-user"></span> User</a></li>
                    <?php } ?>
                </ul>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['nama'] ?> <span class="label label-info"><?php echo $_SESSION['akses_level'] ?></span></a>
                </li>
                <?php if($_SESSION['akses_level'] == "admin"){ ?>
                    <li><a href="setting.php"><span class="glyphicon glyphicon-cog"></span> Setting</a></li>
                <?php  } ?>
                <li><a href="logout.php" onclick="return confirm('Yakin Keluar?')"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- notif pesan success -->
            <?php if (!empty($_SESSION['pesan'])) { ?>
                <div class="alert alert-success">
                    <i class="fa fa-check"></i>
                    <?php echo $_SESSION['pesan']; ?>
                    <?php $_SESSION['pesan'] = ''; ?>
                </div>
                <br>
            <?php } ?>
            <!-- end notif pesan success -->
            <!-- notif pesan ewrror -->
            <?php if (!empty($_SESSION['error'])) { ?>
                <div class="alert alert-danger">
                    <i class="fa fa-check"></i>
                    <?php echo $_SESSION['error']; ?>
                    <?php $_SESSION['error'] = ''; ?>
                </div>
                <br>
            <?php } ?>
                <!-- end notif pesan ewrror -->