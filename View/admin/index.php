<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Mirko Venturi - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="/OCR-P5/Public/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/OCR-P5/Public/assets/css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-fixed-top" id="mainNav">
      <div class="container">
          <a class="navbar-brand" href="#page-top" style="font-family: 'Vladimir Script'; font-size: 1.6em;">Blog de Mirko Venturi</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
      </div>
      <a class="nav-link dropdown-toggle">
        <span class="mr-1 d-none d-lg-inline text-white middle">Bonjour, <?= $_SESSION['user']['username']; ?></span>
        <img class="img-profile rounded-circle img-thumbnail" src="/OCR-P5/Public/img/user/<?= $_SESSION['user']['imageUrl']; ?>" width="30px" height="auto">
      </a>
    </nav>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary align-items-bottom sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Vue rapide</div>
      </a>

    <!-- End of Sidebar -->

      <li class="nav-item active">
        <a class="nav-link" href="/OCR-P5/admin/index">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
        <a class="btn btn-md btn-warning mx-2 my-2 px-2 text-lowercase text-center" href="/OCR-P5/post/add/">
          <i class="fas fa-plus px-1"></i>
          <span>Ajouter un post</span>
        </a>
        <a class="btn btn-md btn-danger mx-2 px-2 text-lowercase text-center" href="/OCR-P5/user/logout">
          <i class="fas fa-sign-out-alt px-1"></i>
          <span>Déconnexion</span>
        </a>
      <img class="img-fluid my-4 px-2 py-2 " src="/OCR-P5/Public/img/user/<?= filter_var($_SESSION['user']['imageUrl']); ?>" alt="ImgResponsive" />
      <!--User add-->
        <a class="btn btn-md btn-warning mx-2 my-2 px-2 text-lowercase text-center" href="/OCR-P5/user/add/">
          <i class="fas fa-user px-1"></i>
          <span>Ajouter un profil</span>
        </a>

    </ul>
    <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">  
        <i class="fa fa-bars"></i>
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
            <table class="table table-striped table-light text-center">
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
                <?php foreach($posts as $post) :  ?> 
                  <tr> 
                    <th scope="row"><?= $post->getId(); ?></th>
                      <td><?= $post->getAuthor(); ?></td>
                      <td><?= $post->getTitle(); ?></td>
                      <td><?= $post->getChapeau(); ?></td>
                      <td><?= $post->getDate_add(); ?></td>
                      <td>
                      <a class="btn btn-sm btn-success shadow-sm" data-toggle="modal" href="http://localhost/OCR-P5/post/view/<?= $post->getId(); ?>-<?= $post->getTitle(); ?>">Voir</a>
                      <a class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" href="http://localhost/OCR-P5/post/update/<?= $post->getId(); ?>">Modifier</a>
                      <a class="btn btn-sm btn-danger shadow-sm" data-toggle="modal" href="http://localhost/OCR-P5/post/delete/<?= $post->getId(); ?>">Supprimer</a>
                      </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div> 
    </div>
        <!-- </div> -->

            <div class="row">

            <!-- Comments Array -->
            <div class="col-lg-6 mb-8">

                <div class="card shadow mb-8">
                  <div class="card-header py-3 bg-dark">
                    <h6 class="m-0 font-weight-bold text-white">Commentaires récents</h6>
                  </div>
                    <div class="card-body">
                      <table class="table table-striped table-light text-center">
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
                          <?php foreach($comments as $comment): ?>   
                            <tr>
                              <th scope="row">
                              <?= $comment->getId(); ?>
                              </th>
                              <td><?= $comment->getPseudo(); ?></td>
                              <td><?= $comment->getContent(); ?></td>
                              <td><?= $comment->getDate_add(); ?></td>
                              <td>
                              <?php if(!$comment->getActive()) : ?> 
                              <a class="btn btn-sm btn-success shadow-sm my-2" data-toggle="modal" href="http://localhost/OCR-P5/comment/validate/<?= $comment->getId(); ?>">Valider</a>
                              <?php endif ?>
                              <a class="btn btn-sm btn-danger shadow-sm" data-toggle="modal" href="http://localhost/OCR-P5/comment/delete/<?= $comment->getId(); ?>">Supprimer</a>
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
                    <table class="table table-striped table-light text-center">
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
                          <?php foreach($users as $user): ?>   
                            <tr>
                              <th scope="row">
                              <?= filter_var($user->getId() ); ?>
                              </th>
                              <td><?= filter_var($user->getUsername() ); ?></td>
                              <td><?= filter_var($user->getEmail() ); ?></td>
                              <td><?= filter_var($user->getRole() ); ?></td>
                              <td><a class="btn btn-sm btn-success shadow-sm" data-toggle="modal" href="http://localhost/OCR-P5/user/view/<?= filter_var($user->getId() ); ?>">Voir</a>
                              <a class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" href="http://localhost/OCR-P5/user/update/<?= filter_var($user->getId() ); ?>">Modifier</a>
                              <a class="btn btn-sm btn-danger shadow-sm" data-toggle="modal" href="http://localhost/OCR-P5/user/delete/<?= filter_var($user->getId() ); ?>">Supprimer</a>
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
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="OCR-P5/Public/assets/vendor/jquery/jquery.min.js"></script>
  <script src="OCR-P5/Public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="OCR-P5/Public/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="OCR-P5/Public/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="OCR-P5/Public/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="OCR-P5/Public/js/demo/chart-area-demo.js"></script>
  <script src="OCR-P5/Public/js/demo/chart-pie-demo.js"></script>

</body>

</html>
