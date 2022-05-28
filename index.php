<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="dependency/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/login.css">
    <title>Login</title>
    <style>
      body {
          background-image: url("./images/home_background.jpg")!important;
          background-size: cover;
          /* Full height */
          /* height: 80%; */
          /* opacity: 1; */
        
          /* Center and scale the image nicely */
          background-position: center;
          background-repeat: no-repeat;
          /* background-size: cover; */
      }

      .demo-content {
          position: relative;
      }

      .card {
        opacity: 0.9!important;
      }

      .map_container {
        margin-top: 10px!important;
        width: 498px;
        height: 300px;
        /* padding: 10px; */
        background-color: #EFE9E9;
        border-radius: 5px;
        /* margin-right: 200px!important; */
        /* margin-bottom: 10px!important; */
      }

    </style>
</head>
<body>
<section class="vh-100" >
  <div class="container-fluid py-5 h-100">
    <div class="row">
      <div class="col-lg-6">



      </div>

      <div class="col-lg-6">

      <div class="row mr-5" >
      <div class="col-lg-12 ">
        <div class="row d-flex flex-row-reverse mr-5">
  
            <div class="card shadow-2-strong" style="width: 500px!important;">
              <div class="card-body p-5 text-center">
    
                <div class="row" style="display:flex; justify-content: center;">
                  <h3>Sign In</h3>
                </div>
  
  
    
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
                    <input type="email" name="email" id="typeEmailX-2" class="form-control form-control-lg" />
                    <label class="form-label" for="typeEmailX-2">Email</label>
                  </div>
      
                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg" />
                    <label class="form-label" for="typePasswordX-2">Password</label>
                  </div>
      
                  <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                </form>
    
                <hr class="my-4">
    
                <a href="./pages/register.php" class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;">Request an Account </a>
    
              </div>
            </div>
      
        </div>

      </div>

      </div>

    <div class="row mr-5 ">
      <div class="col-lg-12 ">
        <div class="row d-flex flex-row-reverse mr-5">
          <div class="row d-flex justify-content-center mr-1">
            <div class=" map_container" >
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3870.3967596585408!2d121.1543699!3d14.0537329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd6f26a93b334b%3A0x1116caae88efe48!2sRural%20Health%20Unit!5e0!3m2!1sen!2sus!4v1653481487956!5m2!1sen!2sus" width="100%" height="100%" frameborder="0" style="border:0"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
        

      </div>
    </div>



  </div>
</section>

<footer class="bg-light text-lg-start">
  <!-- Copyright -->
  <div class=" p-3" style="background-color: rgba(0, 0, 0, 0.2);">

   <div class="row">
      <div class="col-md-3"><h4>Contact Us</h4></div>
      <div class="col-md-3"> <h5><span><i class="fa fa-phone" aria-hidden="true"></i></span>&nbsp;&nbsp;&nbsp;&nbsp;+6390-9075-8942</h5></div>
      <div class="col-md-3"><h5><span><i class="fa fa-envelope" aria-hidden="true"></i></span>&nbsp;&nbsp;&nbsp;&nbsp;malvarhc@gmail.com</h5></div>
      <div class="col-md-3"><h5><span><i class="fa fa-map-marker" aria-hidden="true"></i></span>&nbsp;&nbsp;&nbsp;&nbsp;Malvar City Batangas</h5></div>
   </div>
    
  </div>
  <!-- Copyright -->
</footer>

<script src="dependency/jquery.min.js"></script>
<script src="dependency/popper.min.js"></script>
<script src="dependency/bootstrap/js/bootstrap.min.js"></script>
<script src="dependency/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>