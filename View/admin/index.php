<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Mirko Venturi - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="/Public/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/Public/assets/css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-fixed-top" id="mainNav" aria-labelledby="menu"> 
      <div class="container">
          <a class="navbar-brand" href="#page-top" style="font-family: 'Vladimir Script'; font-size: 1.6em;">Blog de Mirko Venturi</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <strong class="fas fa-bars"></strong>
        </button>
      </div>
      <a class="nav-link dropdown-toggle" href="/admin/index">
        <span class="mr-1 d-none d-lg-inline text-white middle">Bonjour, <?= $user['username']; ?></span>
        <?php if (isset($user['imageUrl'])) : ?>
        <img class="img-profile rounded-circle img-thumbnail" src="/Public/img/user/<?= $user['imageUrl']; ?>" width="30px" height="auto" alt="utilisateur">
        <?php endif; ?>
      </a>
    </nav>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary align-items-bottom sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon rotate-n-15 text-white">
        <strong class="fas fa-laugh-wink"></strong>
        </div>
        <div class="sidebar-brand-text text-white mx-3">Vue rapide</div>
      </a>

    <!-- End of Sidebar -->

      <li class="nav-item active">
        <a class="nav-link" href="/admin/index">
        <strong class="fas fa-fw fa-tachometer-alt"></strong>
        <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
        <a class="btn btn-md btn-warning mx-2 my-2 px-2 text-lowercase text-center" href="/post/add/">
          <strong class="fas fa-plus px-1"></strong>
          <span>Ajouter un post</span>
        </a>
        <a class="btn btn-md btn-danger mx-2 px-2 text-lowercase text-center" href="/user/logout">
          <strong class="fas fa-sign-out-alt px-1"></strong>
          <span>Déconnexion</span>
        </a>
      <?php if (isset($user['imageUrl'])) : ?>  
      <img class="img-fluid my-4 px-2 py-2 " src="/Public/img/user/<?= $user['imageUrl']; ?>" alt="user" />
      <?php endif; ?>
      <!--User add-->
        <a class="btn btn-md btn-warning mx-2 my-2 px-2 text-lowercase text-center" href="/user/add/">
          <strong class="fas fa-user px-1"></strong>
          <span>Ajouter un profil</span>
        </a>

    </ul>
    <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" aria-labelledby="navbar">
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">  
        <strong class="fa fa-bars"></strong>
        </button>
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      </nav>
      <!-- End of Topbar -->

  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
      <!-- Content Column -->
      <div class="col-lg-12 mb-8">
        <!-- Posts List -->
        <div class="card shadow mb-4">
          <div class="card-header py-3 bg-dark">
            <h6 class="m-0 font-weight-bold text-white">Articles récents</h6>
          </div>
          <div class="card-body">
            <table class="table table-striped table-light text-center" aria-describedby="liste des articles">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Auteur</th>
                  <th scope="col">Titre</th>
                  <th scope="col">Chapeau</th>
                  <th scope="col">Date de création</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($posts as $post) :  ?> 
                  <tr> 
                    <th scope="row"><?= $post->getId(); ?></th>
                      <td><?= $post->getAuthor(); ?></td>
                      <td><?= $post->getTitle(); ?></td>
                      <td><?= $post->getChapeau(); ?></td>
                      <td><?= $post->getDate_add(); ?></td>
                      <td>
                      <a class="btn btn-sm btn-success shadow-sm" data-toggle="modal" href="/post/view/<?= $post->getId(); ?>-<?= $post->getTitle(); ?>">Voir</a>
                      <a class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" href="/post/update/<?= $post->getId(); ?>">Modifier</a>
                      <a class="btn btn-sm btn-danger shadow-sm" data-toggle="modal" href="/post/delete/<?= $post->getId(); ?>">Supprimer</a>
                      </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div> 
    </div>

            <div class="row">

            <!-- Comments Array -->
            <div class="col-lg-6 mb-8">

                <div class="card shadow mb-8">
                  <div class="card-header py-3 bg-dark">
                    <h6 class="m-0 font-weight-bold text-white">Commentaires récents</h6>
                  </div>
                    <div class="card-body">
                      <table class="table table-striped table-light text-center" aria-describedby="liste des commentaires">
                          <thead>
                            <tr>
                              <th scope="col">Id</th>
                              <th scope="col">Auteur</th>
                              <th scope="col">Contenu</th>
                              <th scope="col">Date de création</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php foreach ($comments as $comment): ?>   
                            <tr>
                              <th scope="row">
                              <?= $comment->getId(); ?>
                              </th>
                              <td><?= $comment->getPseudo(); ?></td>
                              <td><?= $comment->getContent(); ?></td>
                              <td><?= $comment->getDate_add(); ?></td>
                              <td>
                              <?php if (!$comment->getActive()) : ?> 
                              <a class="btn btn-sm btn-success shadow-sm my-2" data-toggle="modal" href="/comment/validate/<?= $comment->getId(); ?>">Valider</a>
                              <?php endif ?>
                              <a class="btn btn-sm btn-danger shadow-sm" data-toggle="modal" href="/comment/delete/<?= $comment->getId(); ?>">Supprimer</a>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                          </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- End of Comments List -->

            <!-- Users List -->
            <div class="col-lg-6 mb-8">
              <div class="card shadow mb-8">
                <div class="card-header py-3 bg-dark">
                  <h6 class="m-0 font-weight-bold text-white">Utilisateurs</h6>
                </div>
                  <div class="card-body">
                    <table class="table table-striped table-light text-center" aria-describedby="liste des uilisateurs">
                      <thead>
                        <tr>
                          <th scope="col">Id</th>
                          <th scope="col">Pseudo</th>
                          <th scope="col">Email</th>
                          <th scope="col">Role</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                        <tbody>
                          <?php foreach ($users as $user): ?>   
                            <tr>
                              <th scope="row">
                              <?= $user->getId(); ?>
                              </th>
                              <td><?= $user->getUsername(); ?></td>
                              <td><?= $user->getEmail(); ?></td>
                              <td><?= $user->getRole(); ?></td>
                              <td><a class="btn btn-sm btn-success shadow-sm" data-toggle="modal" href="/user/view/<?= $user->getId(); ?>">Voir</a>
                              <a class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" href="/user/update/<?= $user->getId(); ?>">Modifier</a>
                              <a class="btn btn-sm btn-danger shadow-sm" data-toggle="modal" href="/user/delete/<?= $user->getId(); ?>">Supprimer</a>
                              </td>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            <!--End of the row-->
            </div>

        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy;MIRKO VENTURI 2020</span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <strong class="fas fa-angle-up"></strong>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="/Public/assets/vendor/jquery/jquery.min.js"></script>
  <script src="/Public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/Public/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/Public/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="/Public/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="/Public/js/demo/chart-area-demo.js"></script>
  <script src="/Public/js/demo/chart-pie-demo.js"></script>

</body>

</html>