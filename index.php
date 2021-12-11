<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dependency/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/login.css">
    <title>Login</title>
</head>
<body style="background-color: #508bfc; height: 100% !important;">
<section class="vh-100" >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Sign in</h3>

            <form action="./operations/loginOperation.php" method="POST">

            <?php if(isset($_GET['error'])) : ?>
                            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                            <?php echo $_GET['error'] ?>    
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
              <?php endif; ?>

              <div class="form-outline mb-4">
                <input type="text" name="email" id="typeEmailX-2" class="form-control form-control-lg" />
                <label class="form-label" for="typeEmailX-2">Email</label>
              </div>
  
              <div class="form-outline mb-4">
                <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg" />
                <label class="form-label" for="typePasswordX-2">Password</label>
              </div>
  
              <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
            </form>

            <hr class="my-4">

            <a href="./pages/register.php" class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;"><i class="fab fa-facebook-f me-2"></i>Request an Account </a>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="dependency/jquery.min.js"></script>
<script src="dependency/popper.min.js"></script>
<script src="dependency/bootstrap/js/bootstrap.min.js"></script>
<script src="dependency/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>