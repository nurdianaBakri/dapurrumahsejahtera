<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Majoo Teknologi Indonesia</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?= base_url()."assets/store-theme/";?>css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand text-white" href="#!">Majoo Teknologi Indonesia</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            </div>
        </nav>
        <!-- Header-->
		<section class="py-2">
            <div class="container px-4 px-lg-5 mt-5">
			<h3>Produk</h3> 
		</div>
		</div>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">


				<?php

				foreach ($data as $key) { ?>
					 <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="<?= base_url().'uploads/'.$key->gambar ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?= $key->nama ?></h5>
                                    <!-- Product price-->
                                    <?= "Rp. ".number_format($key->harga); ?>
                                </div>

								<br>
								<?= $key->deskripsi ?>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-success mt-auto" href="#">Beli</a></div>
                            </div>
                        </div>
                    </div>
				<?php } ?>
 
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-success">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; 2019 @ PT Majoo Teknologi Indonesia</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?= base_url()."assets/store-theme/";?>js/scripts.js"></script>
    </body>
</html>
