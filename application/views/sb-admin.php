<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dapur Rumah Sejahtera</title>

    <!-- Custom fonts for this template -->
    <link href="<?= base_url()."assets/sb-admin/" ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url()."assets/sb-admin/" ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url()."assets/sb-admin/" ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>" />

    <!-- Select2 CSS --> 
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> 

    <style>
    .dataTables_wrapper {
        min-height: 500px
    }

    .dataTables_processing {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        margin-left: -50%;
        margin-top: -25px;
        padding-top: 20px;
        text-align: center;
        font-size: 1.2em;
        color: grey;
    }
    </style>
    <?php  
	$status = $this->session->userdata('status');
 
	if($status=="1")
	{
		echo '
		<script type="text/javascript"> 
		$(document).ready(function() {
			swal({
				position: "top-end",
				type: "success",
				title: "'.$this->session->userdata('message').'",
				showConfirmButton: false,
				timer: 1500
			}) ;  
		}); 
		</script>
		'; 
	}
	else if($status=="0" || $status=="2")
	{
		echo '<script type="text/javascript"> 
		$(document).ready(function() {
			swal({
				position: "top-end",
				type: "error",
				title: "'.$this->session->userdata('message').'",
				showConfirmButton: false,
				timer: 1500
			}) ;  
		}); 
		</script>
		';
	}
 	?>
</head>



<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-mart"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Dapur Rumah Sejahtera</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>


            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url()."Home" ?>">
                    <i class="fas fa-fw fa-user-md"></i>
                    <span>API</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url()."Transaksi" ?>">
                    <i class="fas fa-fw fa-user-md"></i>
                    <span>Transaksi</span></a>
            </li>

			<li class="nav-item">
                <a class="nav-link" href="<?= base_url()."Data_transaksi" ?>">
                    <i class="fas fa-fw fa-user-md"></i>
                    <span>Data transaksi</span></a>
            </li>

			<li class="nav-item">
                <a class="nav-link" href="<?= base_url()."Palindrom" ?>">
                    <i class="fas fa-fw fa-user-md"></i>
                    <span>Palindrom</span></a>
            </li>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('username') ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url()."assets/sb-admin/" ?>img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url()."Welcome/logout" ?>">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <?php $this->load->view($content); ?>

                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Dapur rumah serjahtera <?= date('Y') ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <script src="https://getbootstrap.com/docs/3.4/dist/js/bootstrap.min.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url()."assets/sb-admin/" ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url()."assets/sb-admin/" ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url()."assets/sb-admin/" ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url()."assets/sb-admin/" ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url()."assets/sb-admin/" ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url()."assets/sb-admin/" ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url()."assets/sb-admin/" ?>js/demo/datatables-demo.js"></script>

    <!-- Select2 JS -->
    <script src="<?= base_url() ?>assets/select2/dist/js/select2.min.js"></script>
</body>

</html>
