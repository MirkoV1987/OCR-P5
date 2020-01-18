<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Mirko Venturi - Dashboard</title>

<!--Tiny Cloud API-->
<script src="https://cdn.tiny.cloud/1/1nlzxk3pygg7o4durv60r55qvyx1x0q0xkvfsk10rwxnumu1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>

<!-- Custom fonts for this template-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="/Public/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="/Public/assets/css/sb-admin-2.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-fixed-top" id="mainNav" style="background-color:#000;" aria-labelledby="navbar">
    <div class="container">
    <a class="navbar-brand" href="#page-top" style="font-family: 'Vladimir Script'; font-size: 1.6em;">Blog de Mirko Venturi</a>
    </div>
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="mr-2 d-none d-lg-inline text-white middle">Bonjour, <?= $user['username']; ?></span>
      <img class="img-profile rounded-circle img-thumbnail" src="/Public/img/user/<?= $user['imageUrl']; ?>" width="30px" height="auto" alt="utilisateur">
    </a>
  </nav>

  <!-- Page Wrapper -->
  <div id="wrapper">
  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary align-items-bottom sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
    <div class="sidebar-brand-icon rotate-n-15">
    <strong class="fas fa-laugh-wink"></strong>
    </div>
    <div class="sidebar-brand-text mx-3">Vue rapide</div>
  </a>
  <!-- End of Sidebar -->
  <li class="nav-item active">
    <a class="nav-link" href="/admin/index">
    <strong class="fas fa-fw fa-tachometer-alt"></strong>
    <span>Dashboard</span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
    <div class="sidebar-heading">
      Interface
    </div>
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
      <a class="btn rounded-circle border-0 py-2 my-2" id="sidebarToggle" href="/admin/index"></a>
    </div>
      <a class="btn btn-md btn-danger mx-2 px-2 text-lowercase text-center" href="/user/logout">
      <strong class="fas fa-sign-out-alt px-1"></strong><span>Déconnexion</span></a>

  </ul>
  <!-- End of Sidebar -->


<div id="content-wrapper" class="d-flex flex-column">
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
    <div class="row-fluid">
      <div class="col d-flex justify-content-center">
        <div class="col-lg-8">

    <!-- Posts Form -->
    <div class="card shadow mb-4">
      <div class="card-header py-3 bg-dark">
        <h6 class="m-0 font-weight-bold text-white">Ajouter un post</h6>
      </div>
        <div class="card-body">
          <form action="/post/add" method="POST">
            <div class="form-group">
              <label for="title">Titre :</label>
              <input type="text" class="form-control" name="title"  placeholder="Entrez le titre" value="">
              <input type="hidden" class="form-control" name="user_id" value="">
              <label for="chapeau">Chapo :</label>
              <input type="text" class="form-control" name="chapeau"  placeholder="Entrez le chapo" value="">
              <label for="author">Auteur :</label>
              <input type="text" class="form-control" name="author"  placeholder="Auteur" value="">
              <label for="date">Date :</label>
              <input type="date" class="form-control" name="date_add"  placeholder="Renseignez la date" value="">
            </div>
            <div class="form-group">
              <label for="message">Contenu :</label>
              <textarea type="textarea" class="form-control" name="content" id="message" rows="12" placeholder="Écrivez ici votre post"></textarea>
              </div>
              <label for="image">Téléverser une image :</label>
              <input type="file" name="imageUrl" id="fileToUpload" value="<?= isset($post) ? $post['imageUrl'] : '' ; ?>"> 
              <div class="text-center">
              <input type="submit" name="submit" class="btn btn-warning" value="ajouter">
            </div>
          </form>
        </div>
      </div>
    <!--End of the card content-->
    </div> 
  </div>
</div>   

   <!-- Footer -->
   <footer class="sticky-footer">
    <div class="container my-auto" style="color: #000; padding: 0 4px;">
      <div class="row">
        <div class="col-md-12 text-center"> 
          <div class="list-inline-item social-buttons text-center py-4 px-4">
              <a class="text-dark text-decoration-none px-1" href="https://twitter.com/MirkoVenturi1" target="_blank" rel="noopener noreferrer">
              <strong class="fab fa-twitter text-black"></strong>
              </a>
              <a class="text-dark text-decoration-none px-1" href="https://www.facebook.com/mirko.venturi.79" target="_blank" rel="noopener noreferrer">
              <strong class="fab fa-facebook-f"></strong>
              </a>
              <a class="text-dark text-decoration-none px-1" href="https://fr.linkedin.com/in/mirkoventuri?trk=people-guest_profile-result-card_result-card_full-click" target="_blank" rel="noopener noreferrer">
              <strong class="fab fa-linkedin-in"></strong>
              </a>
              <a class="text-dark text-decoration-none px-1" href="https://github.com/MirkoV1987" target="_blank" rel="noopener noreferrer">
              <strong class="fab fa-github" aria-hidden="true"></strong>
              </a>
          </div>  
        </div>
      </div>
    </div>
    <div class="copyright text-center my-auto">
      <span>Copyright &copy;MIRKO VENTURI 2020</span>
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