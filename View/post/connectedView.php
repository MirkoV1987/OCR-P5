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
  <script src="/OCR-P5/Public/vendor/jquery/jquery.min.js"></script>
  <script src="/OCR-P5/Public/js/notify.js"></script>

</head>

<body id="page-top">

<!-- Dashboard Navigation -->
<nav class="navbar navbar-expand-md dashboardNav navbar-dark bg-dark navbar-fixed-top py-3" id="mainNav" style="background-color:#000;">
  <div class="container">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fas fa-bars"></i>
    </button>
    <div class="" id="">
      <ul class="navbar-nav text-lowercase">
        <li class="nav-item active">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
        </li>
      </ul>
    </div>
    <div>
      <span class="mr-2 d-none d-lg-inline text-white">Bonjour, <?= esc_url(\Framework\Session::getSession()->getKey('user')['username']); ?> 
        <img class="img-profile rounded-circle img-thumbnail" src="/OCR-P5/Public/img/user/<?= esc_url(\Framework\Session::getSession()->getKey('user')['imageUrl']); ?>" width="30px" height="auto" alt="ImgResponsive" /> 
      </span>
        <a class="btn btn-md btn-danger mx-2 px-2 text-lowercase text-center" href="/OCR-P5/user/logout">Déconnexion</a>
    </div>
  </div>
</nav>

<!-- Navigation -->

<nav class="navbar navbar-expand-lg navbar-dark navbar-fixed-top" id="mainNav" style="background-color:#000;">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">Mirko Venturi</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav text-uppercase ml-auto">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="/OCR-P5/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="/OCR-P5/#about">Présentation</a>
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
      </ul>
    </div>
  </div>
</nav>

<!-- Post View -->
    
<section class="bg-light page-section" id="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-justify">
        <h1 class="section-heading text-uppercase"><?= filter_var($post['title']); ?></h1>
        <div class="elem-demo"></div>
        <h2 class="section-subheading text-muted"><?= filter_var($post['chapeau']); ?></h2>
        <div class="row my-6 py-4">
        <img class="img-fluid" src="/OCR-P5/Public/img/<?= filter_var($post['imageUrl']); ?>" alt="ImgResponsive" />
        </div>
        <div class="row my-6 py-4">
        <h4 class="section-subheading">De <?= filter_var($post['author']); ?> - <time class="section-subheading text-muted">Publié le <?= filter_var($post['date_add_fr']) ?></time></h4>
        <p class="text-justify"><?= filter_var($post['content']); ?></p>
        </div>
      </div>
    </div> 
 </section>

<!-- Content Column -->
<div class="col d-flex justify-content-center">
  <div class="col-lg-8">
    <div class="card my-4 shadow-md mb-1 bg-white rounded">
      <div class="card-header py-3 bg-dark">
        <h6 class="m-0 font-weight-bold text-white">Ecrire un commentaire</h6>
      </div>
        <div class="card-body">
          <!-- Comment Form -->
          <form action="/OCR-P5/comment/add/<?= filter_var($post['id']) ?>" method="POST">
            <div class="form-group">
            <label for="pseudo">Pseudo :</label>
            <input type="text" class="form-control my-2" name="pseudo" placeholder="Insérez votre pseudo" value="" required>
            <textarea type="textarea" class="form-control" name="content" id="message" rows="12" placeholder="Écrivez ici votre commentaire" required></textarea>
            </div>
            <div class="text-right">
              <input type="submit" name="submit" id="sendComment" class="btn btn-warning" value="Envoyer le commentaire" onclick="$('.elem-demo').notify('I\'m to the right of this box', { position:'right' });">
            </div>
          </form>
        </div>
      </div>
    </div> 
  </div>
</div>
<!-- Comment View -->
    
<section class="bg-light page-section" id="portfolio">
  <div class="container">             
    <h1 class="text-warning">Commentaires</h1>
      <?php foreach($comments as $comment): ?> 
        <div class="my-4 shadow-lg p-3 mb-1 bg-white rounded">
          <div class="row">
            <div class="col-lg-4 text-center">
              <h4 class="section-subheading text-uppercase text-left"><?= filter_var($comment['pseudo']); ?></h4><time><?= isset($date_add) ? filter_var($comment['date_add_fr']) : ''; ?></time>
            </div>
          </div>
          <div class="row my-4">
            <div class="col-lg-12 text-left">
              <p class="text-justify"><?= filter_var($comment['content']); ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>   
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

  <!-- Custom notify messages -->
  <script src="/OCR-P5/Public/vendor/jquery/jquery.min.js"></script>
  <script src="/OCR-P5/Public/js/notify.js"></script>

</body>
</html>