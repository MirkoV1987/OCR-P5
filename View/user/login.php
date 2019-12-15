<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog - Mirko Venturi</title>

  <!-- Bootstrap core CSS -->
  <link href="public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="../Public/css/agency.min.css" type="text/css"  rel="stylesheet">
  <link href="../Public/css/sb-admin-2.css"  type="text/css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">
  <div class="row"> 


    <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Mirko Venturi</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/OCR-P5/#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/OCR-P5/#about">À propos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/OCR-P5/#skills">Compétences</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/OCR-P5/#portfolio">Portfolio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/OCR-P5/#cv">Parcours</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/OCR-P5/#contact">Me contacter</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/OCR-P5/user/login">Connexion</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>

<!-- Outer Row -->
        <div class="row justify-content-center">
          <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                  <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                  <div class="col-lg-6">
                <div class="p-5">
              <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Login</h1>
            </div>
            <form class="user" action="login" method="post">
              <div class="form-group">
                <input type="username" name="username" class="form-control form-control-user" id="username" placeholder="Utilisateur" required>
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password" required>
              </div>
              <button type="submit" name="submit" id="login" value="connexion" class="btn btn-primary btn-user btn-block">Connexion</button>
            </form>
            <hr>
            <div class="text-center">
              <a class="small" href="/OCR-P5/user/register/">Créer un compte!</a>
            </div>
          </div>
        </div>
      </div>

  <!--End of the Main Content-->    
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="/OCR-P5/Public/vendor/jquery/jquery.min.js"></script>
  <script src="/OCR-P5/Public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="/OCR-P5/Public/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="/OCR-P5/Public/js/jqBootstrapValidation.js"></script>
  <script src="/OCR-P5/Public/js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="/OCR-P5/Public/js/agency.min.js"></script>

  <script>

  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict';
     window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();

  </script>

</body>

</html>