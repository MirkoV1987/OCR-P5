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
          <div class="row text-justify-sm-center">
            <div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6">
              <h1 class="text-center">Blog de Mirko</h1>
              <p><a href="/OCR-P5/post">Retour à la liste des posts</a></p>
            <div class="news">
      <!-- SHOW POST-->
            <h2 style="color:red">Post</h2>
            <h2><?= htmlspecialchars($post['title']); ?></h2>
            <h3><?= htmlspecialchars($post['chapeau']); ?></h3>
            <time><?= $post['date_add_fr'] ?></time>
            <p><?= htmlspecialchars($post['content']); ?></p>
            <a href="http://localhost/OCR-P5/comment/index/<?= $post['id'] ?>" method="GET"  target=""><button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-zoom-in">AFFICHER LES COMMENTAIRES</button></a><br/>
          </div>
        </div>
      <div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6">
        <div class="row text-center" style="margin-top: 30px">
          <div class="col-lg-12">
             <a href="http://localhost/OCR-P5/post/update" method="GET" target=""><button class="btn btn-success btn-md"><span class="glyphicon glyphicon-plus">MODIFIER LE POST</span></button></a><br/>
          </div>
        </div>  

      <!--UPDATE POST-->
      <!-- <h2 style="color:red">Mettre à jour le post</h2>
      <form action="/OCR-P5/post/update/" method="post">
            <input type="hidden" class="form-control" name="id" id="id" value="<?= htmlspecialchars($post['id']); ?>">
        <div class="form-group">
            <label for="title">Title :</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Entrez le titre" value="<?= htmlspecialchars($post['title']); ?>">
        </div>
        <div class="form-group">
              <label for="text">Chapeau :</label>
            <input type="text" class="form-control" name="chapeau" id="chapeau" placeholder="Entrez le chapeau" value="<?= htmlspecialchars($post['chapeau']); ?>">
        </div>
        <div class="form-group">
              <label for="text">Date :</label>
            <input type="text" class="form-control" name="date" id="date" placeholder="Entrez la date" value="<?= htmlspecialchars($post['date_add_fr']); ?>">
        </div> -->
        <!-- <div class="form-group">
              <label for="text">Content :</label>
              <textarea type="textarea" class="form-control" name="content" id="content" rows="8" placeholder="Écrivez ici votre message" value=""><?= htmlspecialchars($post['content']); ?></textarea>
        </div>
        <div class="row text-center">
               <button type="submit" class="btn btn-primary" name="btn-update">UPDATE</button>
        </div>
       </form> -->

</body>
</html>
