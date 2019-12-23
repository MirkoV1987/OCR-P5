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

  <!-- Post View -->
    
<section class="bg-light page-section" id="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-justify">
        <h1 class="section-heading text-uppercase"><?= $post['title']; ?></h1>
        <h2 class="section-subheading text-muted"><?= $post['chapeau']; ?></h2>
        <div class="row my-6 py-4">
        <img class="img-fluid" src="/OCR-P5/Public/img/<?= $post['imageUrl']; ?>" alt="ImgResponsive" />
        </div>
        <div class="row my-6 py-4">
        <h4 class="section-subheading">De <?= $post['author']; ?> - <time class="section-subheading text-muted">Publié le <?= $post['date_add_fr']; ?></time></h4>
        <p class="text-justify"><?= $post['content']; ?></p>
      </div>
    </div>
  </div> 
</section>

<!-- Comment View -->
    
<section class="bg-light page-section" id="portfolio">
  <div class="container">             
    <h1 class="text-warning">Commentaires</h1>
      <?php foreach($comments as $comment): ?> 
        <div class="my-4 shadow-lg p-3 mb-1 bg-white rounded">
          <div class="row">
            <div class="col-lg-4 text-center">
              <h4 class="section-subheading text-uppercase text-left"><?= $comment['pseudo']; ?></h4><time><?= isset($date_add) ? $comment['date_add_fr'] : ''; ?></time>
            </div>
          </div>
          <div class="row my-4">
            <div class="col-lg-12 text-left">
              <p class="text-justify"><?= $comment['content']; ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>   
      <div class="row">
        <div class="col-lg-12">
          <a class="btn btn-lg btn-warning mx-2 px-4 block-right text-black" href="/OCR-P5/user/login">Veuillez vous connecter pour laisser un commentaire</a>
        </div>
      </div>
  </div> 
</section>

  <!-- Footer -->

  <footer class="footer bg-dark">
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
