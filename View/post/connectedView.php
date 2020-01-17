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
  <script src="/Public/vendor/jquery/jquery.min.js"></script>
  <script src="/Public/js/notify.js"></script>

</head>

<body id="page-top">

<!-- Dashboard Navigation -->
<nav class="navbar navbar-expand-md dashboardNav navbar-dark bg-dark navbar-fixed-top py-3" aria-label="" id="mainNav" style="background-color:#000;">
  <div class="container">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <em class="fas fa-bars"></em>
    </button>
    <div class="" id="">
      <ul class="navbar-nav text-lowercase">
        <li class="nav-item active">
        <em class="fas fa-fw fa-tachometer-alt"></em>
        <span>Dashboard</span>
        </li>
      </ul>
    </div>
    <div>
      <span class="mr-2 d-none d-lg-inline text-white">Bonjour, <?= $user['username']; ?>
        <?php if (isset($user['imageUrl'])) : ?>
        <img class="img-profile rounded-circle img-thumbnail" src="/Public/img/user/<?= $user['imageUrl'];  ?>" width="30px" height="auto" alt="Utilisateur" /> 
        <?php endif; ?>
      </span>
        <a class="btn btn-md btn-danger mx-2 px-2 text-lowercase text-center" href="/user/logout">Déconnexion</a>
    </div>
  </div>
</nav>

<!-- Navigation -->

<nav class="navbar navbar-expand-lg navbar-dark navbar-fixed-top" aria-label="" id="mainNav" style="background-color:#000;">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">Mirko Venturi</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <em class="fas fa-bars"></em>
      </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav text-uppercase ml-auto">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="/#about">Présentation</a>
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
        <div class="elem-demo"></div>
        <h2 class="section-subheading text-muted"><?= $post['chapeau']; ?></h2>
        <div class="row my-6 py-4">
        <?php if (isset($post['imageUrl'])) : ?>
        <img class="img-fluid" src="/Public/img/<?= $post['imageUrl']; ?>" alt="Utilisateur" />
        <?php endif; ?>
        </div>
        <div class="row my-6 py-4">
        <h4 class="section-subheading">De <?= $post['author']; ?> - <time class="section-subheading text-muted">Publié le <?= $post['date_add']; ?></time></h4>
        </div>
        <div class="row my-6 py-4">
        <p class="text-justify"><?= $post['content']; ?></p>
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
          <form action="/comment/add/<?= $post['id']; ?>" method="POST">
            <div class="form-group">
            <div>
            <p class="m-0 font-weight-bold text-black text-left text-uppercase my-4">
            <?php if (isset($user['imageUrl'])) : ?>
            <img class="img-profile rounded-circle" src="/Public/img/user/<?= $user['imageUrl']; ?>" width="80px" height="auto" alt="utilisateur" /> 
            <?php endif; ?>
            <?= $user['username']; ?>
            </p>
            <input type="hidden" id="pseudo" name="pseudo" value="<?= $user['username']; ?>">
            </div>
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
      <?php foreach ($comments as $comment): ?> 
        <div class="my-4 shadow-lg p-3 mb-1 bg-white rounded">
          <div class="row">
            <div class="col-lg-4 text-left font-weight-bold">
              <h4 class="section-subheading text-uppercase text-left"><?= $comment['pseudo']; ?></h4>
              <time class="section-subheading text-muted text-bold">Publié le <?= $comment['date_add']; ?></time>
            </div>
          </div>
          <div class="row my-4">
            <div class="col-lg-12 text-left">
              <p class="text-justify"><?= $comment['content']; ?></p>
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
              <em class="fab fa-twitter"></em>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#">
              <em class="fab fa-facebook-f"></em>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#">
              <em class="fab fa-linkedin-in"></em>
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

  <!-- Custom notify messages -->
  <script src="/Public/vendor/jquery/jquery.min.js"></script>
  <script src="/Public/js/notify.js"></script>

</body>
</html>