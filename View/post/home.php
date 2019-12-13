<!DOCTYPE html>

<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="public/css/styles.css">
      <?php ob_start(); ?>
    </head>

<body>
      <div class="container">
         <div class="row">
          <div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6">
              <h1 class="text-center">Blog de Mirko</h1>
              <?php foreach($posts as $post): ?>
                <h2><?= $post->getTitle(); ?></h2>
                <time><?= $post->getDate_add('fr'); ?></time>
                <h3><?= $post->getChapeau(); ?></h3>
                <p><?= $post->getContent(); ?></p>
                <div class="row">
                  <div class="col-lg-4">
                   <a href="http://hostmirko/OCR-P5/post/view/<?= $post->getId(); ?>-<?= $post->getTitle(); ?>" method="GET" target=""><button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-zoom-in">AFFICHER LE POST</span></button></a><br/>
                  </div>
                  <div class="col-lg-4">
                  <a href="http://hostmirko/OCR-P5/post/delete/<?= $post->getId(); ?>"> <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><span class="glyphicon glyphicon-trash">SUPPRIMER</span></button></a>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
          </div>
          <div class="row" style="margin-top: 30px;"> <!--styles to be inserted in styles.css ! -->
               <p class="text-center"><a href="http://hostmirko/OCR-P5/post/add" method="GET" target=""><button class="btn btn-success btn-md"><span class="glyphicon glyphicon-plus">AJOUTER UN POST</span></button></a></p><br/>
          </div>
              </div>
           </div>
        </div>

</body>
</html>