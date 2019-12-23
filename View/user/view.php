<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog - Mirko Venturi</title>

  <!-- Bootstrap core CSS -->
  <link href="/OCR-P5/Public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="/OCR-P5/Public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="/OCR-P5/Public/css/agency.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Dashboard Navigation -->
<nav class="navbar navbar-expand-md dashboardNav navbar-dark bg-dark navbar-fixed-top  py-3" id="mainNav" style="background-color:#000;">
  <div class="container">
    <div class="navbar navbar-expand-lg navbar-dark navbar-fixed-top" id="">
      <ul class="navbar-nav text-lowercase">
        <li class="nav-item active">
        <a class="nav-link" href="/OCR-P5/admin/index">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
        </li>
      </ul>
    </div>
  <div>
    <a class="nav-link" href="/OCR-P5/admin/index">
      <span class="mr-2 d-none d-lg-inline text-white">Bonjour, <?= $user['username']; ?> 
        <img class="img-profile rounded-circle img-thumbnail" src="/OCR-P5/Public/img/user/<?= $user['imageUrl']; ?>" width="30px" height="auto">
      </span>
    </a>
  </div>
</nav>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-fixed-top" id="mainNav" style="background-color:#000;">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">Mirko Venturi</a>
      <a class="btn btn-md btn-danger mx-2 px-2 text-lowercase text-center" href="/OCR-P5/user/logout">
        <i class="fas fa-sign-out-alt px-1"></i><span>Déconnexion</span>
      </a>
  </div>
</nav>

  <!-- User Profile -->
  <section class="bg-light page-section" id="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-justify">
          <div class="card shadow mb-4">
            <div class="card-header py-3 bg-dark">
              <h6 class="m-0 font-weight-bold text-white">Profil utilisateur</h6>
            </div>
            <div class="card-body">
              <div class="row my-6 py-4">
                <div class="col-lg-4">
                  <img class="img-fluid" src="/OCR-P5/Public/img/user/<?= $user['imageUrl']; ?>" alt="ImgResponsive" width="260px" height="auto" />
                </div>
              <div class="col-lg-6 py-2">
                <h3 class="section-heading text-regular"><i class="fas fa-user"></i> Pseudo : <?= $user['username']; ?></h3>
                <h4 class="section-subheading text-regular"><i class="fas fa-at"></i> Email : <?= $user['email']; ?></h4>
                <h4 class="section-subheading text-regular"><i class="far fa-calendar-alt"></i> Date de création : <?= $user['date_add_fr']; ?></h4>
              </div>
            </div> 
          </div>
      </div> 
  </section>

<!-- Footer -->
<footer class="footer fixed-bottom bg-dark" style="background-color: #000;">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4">
          <span class="copyright text-white">Copyright &copy;Mirko Venturi 2020</span>
        </div>
      <div class="col-md-4">
        <ul class="list-inline social-buttons">
          <li class="list-inline-item">
            <a href="#">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="col-md-4">
        <ul class="list-inline quicklinks">
          <li class="list-inline-item">
            <a href="#">Privacy Policy</a>
          </li>
          <li class="list-inline-item">
            <a href="#">Mentions légales</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>

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

</body>
</html>