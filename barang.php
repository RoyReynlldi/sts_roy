<?php
    require_once('database.php');
    $data=showdataBarang();
    $nomor=0;
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Barang Page</title>

    <!-- Custom fonts for this template-->
    <link href="resource/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="resource/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <div id="wrapper">
        
        <?php
            session_start();
            if($_SESSION['status']!="login"){
                header("location:login.php?msg=belum_login");
            } else{
                include("sidebar.php");
            }
        ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <div class=" container justify-content-end">
                        <a href="logout.php"><button type="button" class="btn btn-outline-dark">Log Out</button></a>
                    </div>
                </nav>

                <div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Table Barang</h1>

<div class="card shadow mb-4">
<div class="card-body">
        <div class="row justify-content-end pr-3">
        <a href="tambah-barang.php"><button type="button" class="btn btn-success">Tambah Data</button></a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Merk</th>
                        <th>Jumlah</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $barang) : ?> 
                    <?php $nomor++; ?>
                    <tr>
                        <th scope="row"><?php echo "$nomor"; ?></th>
                        <td><?php echo "$barang[kode_barang]";?></td>
                        <td><?php echo "$barang[nama_barang]";?></td>
                        <td><?php echo "$barang[kategori]";?></td>
                        <td><?php echo "$barang[merk]";?></td>
                        <td><?php echo "$barang[jumlah]";?></td>
                        <td>
                            <?php
                                echo "
                                <a href='edit-barang.php?id=$barang[id]'><button type='button' class='btn btn-warning btn-sm'>Edit</button></a>
                                |
                                <a href='javascript:deleteData(".$barang['id'].")'><button type='button' class='btn btn-danger btn-sm'>Hapus</button></a>
                                "
                            ?>
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

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <script language="JavaScript" type="text/javascript">
      function deleteData(id){
        if (confirm("Apakah anda yakin ingin menghapus ini?")){
          window.location.href = 'delete-barang.php?id=' + id;
        }
      }
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="resource/vendor/jquery/jquery.min.js"></script>
    <script src="resource/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="resource/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="resource/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="resource/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="resource/js/demo/chart-area-demo.js"></script>
    <script src="resource/js/demo/chart-pie-demo.js"></script>

</body>

</html>