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
            <?php// var_dump($post); ?>
            <h2><?= htmlspecialchars($post['title']); ?></h2>
            <h3><?= htmlspecialchars($post['chapeau']); ?></h3>
            <time><?= $post['date_add_fr'] ?></time>
            <p><?= htmlspecialchars($post['content']); ?></p>

          </div>
        </div>
      <div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6">

      <!--UPDATE POST-->
      <h2 style="color:red">Mettre à jour le post</h2>
      <form action="" method="post">
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
        </div>
        <div class="form-group">
              <label for="text">Content :</label>
              <textarea type="textarea" class="form-control" name="content" id="content" rows="8" placeholder="Écrivez ici votre message" value=""><?= htmlspecialchars($post['content']); ?></textarea>
        </div>
        <div class="row text-center">
               <button type="submit" class="btn btn-primary" name="btn-update">UPDATE</button>
        </div>
       </form>
    

<h2>Commentaires</h2>

       <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
        <div class="form-group">
            <label for="pseudo">Pseudo :</label>
            <input type="text" class="form-control" name="author" id="pseudo" aria-describedby="emailHelp" placeholder="Entrez votre pseudo" value="">
        </div>
        <div class="form-group">
              <label for="message">Message :</label>
              <textarea type="textarea" class="form-control" name="comment" id="message" rows="12" placeholder="Écrivez ici votre message"></textarea>
        </div>
        <div class="row text-center">
               <button type="submit" class="btn btn-primary">ENVOYER</button>
        </div>
       </form>
    </div>
  <div></div>
  <div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6">
<div class="row text-center">
<!-- <?php foreach($comments as $comment): ?>

<p><strong><?= htmlspecialchars($comment['author']); ?></strong> le <?= $comment['comment_date_fr']; ?><a href="index.php?action=viewComment&amp;ticket_id=<?= $comment['ticket_id']?>&amp;id=<?= $comment['id']?>">(modifier)</a>
<p><?= nl2br(htmlspecialchars($comment['comment'])); ?>

<?php endforeach ?> -->
 </div>
   </div>
     </div>
       </div>


</body>
</html>
