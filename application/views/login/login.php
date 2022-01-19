<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url().'assets/login-theme/'; ?>fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= base_url().'assets/login-theme/'; ?>css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url().'assets/login-theme/'; ?>css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url().'assets/login-theme/'; ?>css/style.css">

    <title>Login Mini POS Majoo</title>
  </head>
  <body>
  

  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-md-2">
          <img src="<?= base_url().'assets/login-theme/'; ?>images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Sign In to <strong>Mini POS</strong></h3>
              <p class="mb-4">By. Majoo</p>
            </div>
            <form action="<?= base_url().'Welcome/login'; ?>" method="post">
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username">

              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                
              </div> 

              <input type="submit" value="Log In" class="btn text-white btn-block btn-primary">

               
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="<?= base_url().'assets/login-theme/'; ?>js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url().'assets/login-theme/'; ?>js/popper.min.js"></script>
    <script src="<?= base_url().'assets/login-theme/'; ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url().'assets/login-theme/'; ?>js/main.js"></script>
  </body>
</html>