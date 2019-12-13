<!DOCTYPE html>

<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="Public/css/styles.css">
      <?php ob_start(); ?>
    </head>

<body>
      <div class="container">
          <!--<div class="row text-justify-sm-center">-->
            <div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6 text-center">
              <h1 class="text-center">Blog de Mirko</h1>
              <?php foreach($posts as $post): ?>
                <h2><?= $post->getTitle(); ?></h2>
                <time><?= $post->getDate_add('fr'); ?></time>
                <h3><?= $post->getChapeau(); ?></h3>
                <p><?= $post->getContent(); ?></p>
                <div class="row text-center">
                  <div class="col-lg-offset-2 col-lg-4">
                    <a href="http://localhost/OCR-P5/post/view/<?= $post->getId(); ?>-<?= $post->getTitle(); ?>" method="GET" target=""><button class="btn btn-success btn-md"><span class="glyphicon glyphicon-zoom-in">AFFICHER LE POST</span></button></a><br/>
                  </div>
                  <div class="col-lg-4">
                    <a href="http://localhost/OCR-P5/post/delete/<?= $post->getId(); ?>"> <button class="btn btn-danger btn-md" onClick="return confirm('Do you really want to delete');"><span class="glyphicon glyphicon-trash">SUPPRIMER</span></button></a>
                  </div>
                </div>
              <?php endforeach; ?>
              <div class="row text-center" style="margin-top: 30px">
                <div class="col-lg-12">
                  <a href="http://localhost/OCR-P5/post/add" method="GET" target=""><button class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus">AJOUTER UN POST</span></button></a><br/>
                </div>
              </div>
            </div>
           </div>
        </div>
</body>
</html>