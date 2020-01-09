<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog - Mirko Venturi</title>

  <!-- Bootstrap core CSS -->
  <link href="/Public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="/Public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="/Public/css/agency.min.css" type="text/css"  rel="stylesheet">
  <link href="/Public/css/sb-admin-2.css"  type="text/css" rel="stylesheet">
  <script src="/Public/notification-js/src/notification.js"></script>
  <link rel="stylesheet" href="/Public/notification-js/src/notification.css">

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
              <a class="nav-link js-scroll-trigger" href="/#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/#about">À propos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/#skills">Compétences</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/#portfolio">Portfolio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/#cv">Parcours</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/#contact">Me contacter</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/user/login">Connexion</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Créer un compte !</h1>
              </div>
              <form class="user" action="register" method="post">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="username" class="form-control form-control-user" id="pseudo" placeholder="Pseudo" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="email" name="email" class="form-control form-control-user" id="email" placeholder="email" required>
                  </div>
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Mot de passe" required>
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-user" id="password-verify" placeholder="Confirmer mot de passe" required>
                </div>
                <button type="submit" name="submit" id="register" value="Créer un compte" class="btn btn-primary btn-user btn-block" onclick="notification.notify( 'success', 'Votre compte a été créé !' );">Créer un compte</button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="/user/login">Vous avez déjà un compte ? Connectez-vous !</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  </div>

  <!-- Bootstrap core JavaScript --> 
  <script src="/Public/vendor/jquery/jquery.min.js"></script>
  <script src="/Public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="/Public/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="/Public/js/jqBootstrapValidation.js"></script>
  <script src="/Public/js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="/Public/js/agency.min.js"></script>

</body>

</html>