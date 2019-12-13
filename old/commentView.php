<!DOCTYPE html>

<html>
<head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="public/css/styles.css">
</head>

<body>
        <div class="container">
          <div class="row text-justify-sm-center">
            <div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6">
              <h1 class="text-center">Blog de Mirko</h1>
              <p><a href="/OCR-P5/post">Retour à la liste des posts</a></p>
              <?php foreach($comments as $comment):  ?>
                <h2><strong><?= $comment->getPseudo(); ?><strong></h2>
                <time><?= $comment->getDate_add('fr') ?></time>
                <p><?= nl2br($comment->getContent()); ?></p>
                <a href="http://localhost/OCR-P5/comment/view/<?= $comment->getId(); ?>-<?= $comment->getPseudo(); ?>" method="GET" target="">Afficher le commentaire</a><br/>
                <a href="http://localhost/OCR-P5/comment/delete/<?= $comment->getId(); ?>"> <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><span class="glyphicon glyphicon-trash">SUPPRIMER</span></button></a>
              <?php endforeach ?>
            <!-- </div>
          </div>
        </div> -->

<h2>Écrire un commentaire</h2>

       <form action="/OCR-P5/comment/add" method="post">
       <input type="hidden" class="form-control" name="post_id" id="pseudo" placeholder="Entrez votre pseudo" value="<?= $params['get'][0] ?>">
        <div class="form-group">
            <label for="pseudo">Pseudo :</label>
            <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Entrez votre pseudo" value="">
        </div>
        <div class="form-group">
              <label for="message">Message :</label>
              <textarea type="textarea" class="form-control" name="content" id="content" rows="12" placeholder="Écrivez ici votre message"></textarea>
        </div>
        <div class="row text-center">
               <button type="submit" class="btn btn-primary" name="send">ENVOYER</button>
        </div>
       </form>
    </div>
  <div></div>
  <div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6">
<div class="row text-center">

 </div>
   </div>
     </div>
       </div>
</body>

</html>