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
          <!--<div class="row text-justify-sm-center">-->
            <div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6">
              <h1 class="text-center">Blog de Mirko</h1>
              <?php foreach($posts as $post): ?>
                <h2><?= $post->getTitle(); ?></h2>
                <time><?= $post->getDate_add('fr'); ?></time>
                <h3><?= $post->getChapeau(); ?></h3>
                <p><?= $post->getContent(); ?></p>
                <a href="http://localhost/OCR-P5/post/view/<?= $post->getId(); ?>-<?= $post->getTitle(); ?>" method="GET" target="">Afficher le post</a><br/>
                <a href="http://localhost/OCR-P5/post/delete/<?= $post->getId(); ?>"> <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><span class="glyphicon glyphicon-trash">SUPPRIMER</span></button></a>
                <?php endforeach; ?>
            </div>
           </div>
        </div>

        <div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6">
            <h2>Ajouter un post</h2>

           <form action="/OCR-P5/post/add" method="post">
            <div class="form-group">
                <label for="title">Titre :</label>
                <input type="text" class="form-control" name="title"  placeholder="Entrez le titre" value="">
                <label for="chapeau">Chapo :</label>
                <input type="text" class="form-control" name="chapeau"  placeholder="Entrez le chapo" value="">
                <label for="date">Date :</label>
                <input type="date" class="form-control" name="date_add"  placeholder="Renseignez la date" value="">
            </div>
            <div class="form-group">
                <label for="message">Contenu :</label>
                <textarea type="textarea" class="form-control" name="content" id="message" rows="12" placeholder="Écrivez ici votre post"></textarea>
            </div>
            <div class="row text-center">
                    <button type="submit" name="send" class="btn btn-primary">ENVOYER</button>
            </div>
            </form>
        </div>

</body>
</html>
