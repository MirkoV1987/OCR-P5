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
  <link href="/Public/css/agency.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Dashboard Navigation -->
<nav class="navbar navbar-expand-md dashboardNav navbar-dark bg-dark navbar-fixed-top  py-3" id="mainNav" style="background-color:#000;" aria-labelledby="navbar">
  <div class="container">
    <div class="navbar navbar-expand-lg navbar-dark navbar-fixed-top" id="">
      <ul class="navbar-nav text-lowercase">
        <li class="nav-item active">
        <a class="nav-link" href="/admin/index">
        <strong class="fas fa-fw fa-tachometer-alt"></strong>
        <span>Dashboard</span></a>
        </li>
      </ul>
    </div>
  <div>
    <a class="nav-link" href="/admin/index">
      <span class="mr-2 d-none d-lg-inline text-white">Bonjour, <?= $user['username']; ?>
      <?php if (isset($user['imageUrl'])) : ?> 
      <img class="img-profile rounded-circle img-thumbnail" src="/Public/img/user/<?= $user['imageUrl']; ?>" width="30px" height="auto" alt="utilisateur">
      <?php endif; ?>
      </span>
    </a>
  </div>
</nav>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-fixed-top" id="mainNav" style="background-color:#000;" aria-labelledby="navbar">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">Mirko Venturi</a>
      <a class="btn btn-md btn-danger mx-2 px-2 text-lowercase text-center" href="/user/logout">
        <strong class="fas fa-sign-out-alt px-1"></strong><span>Déconnexion</span>
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
                <?php if (isset($user['imageUrl'])) : ?>
                  <img class="img-fluid" src="/Public/img/user/<?= $user['imageUrl']; ?>" alt="utilisateur" width="260px" height="auto" />
                <?php endif; ?>
                </div>
              <div class="col-lg-6 py-2">
                <h3 class="section-heading text-regular"><strong class="fas fa-user"></strong> Pseudo : <?= $user['username']; ?></h3>
                <h4 class="section-subheading text-regular"><strong class="fas fa-at"></strong> Email : <?= $user['email']; ?></h4>
                <h4 class="section-subheading text-regular"><strong class="far fa-calendar-alt"></strong> Date de création : <?= $user['date_add_fr']; ?></h4>
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
            <a href="https://twitter.com/MirkoVenturi1" target="_blank" rel="noopener noreferrer">
              <strong class="fab fa-twitter"></strong>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="https://www.facebook.com/mirko.venturi.79" target="_blank" rel="noopener noreferrer">
              <strong class="fab fa-facebook-f"></strong>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="https://fr.linkedin.com/in/mirkoventuri?trk=people-guest_profile-result-card_result-card_full-click" target="_blank" rel="noopener noreferrer">
              <strong class="fab fa-linkedin-in"></strong>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="https://github.com/MirkoV1987" target="_blank" rel="noopener noreferrer">
              <strong class="fab fa-github" aria-hidden="true"></strong>
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