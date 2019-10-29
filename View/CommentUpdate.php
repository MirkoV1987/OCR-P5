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
                <p><a href="/OCR-P5/comment">Retour à la liste des commentaires</a></p>
                <div class="news">
                    <!-- SHOW COMMENT-->
                <h3 style="color:red">COMMENT</h3>
                <h2><?= htmlspecialchars($comment['pseudo']); ?></h2>
                <h3><?= $comment['date_add_fr']; ?></h3>
                <time><?= htmlspecialchars($comment['content']); ?></time>
                    <!--UPDATE COMMENT-->
                <h3 style="color:red">EDIT COMMENT</h3>
                    <form action="/OCR-P5/comment/update" method="post">
                            <input type="hidden" class="form-control" name="id" id="id" value="<?= htmlspecialchars($comment['id']); ?>">
                        <div class="form-group">
                            <label for="pseudo">Pseudo :</label>
                            <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Entrez votre pseudo" value="<?= htmlspecialchars($comment['pseudo']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="text">Content :</label>
                            <textarea type="textarea" class="form-control" name="content" id="content" rows="8" placeholder="Écrivez ici votre message" value=""><?= htmlspecialchars($comment['content']); ?></textarea>
                        </div>
                        <div class="row text-center">
                            <button type="submit" class="btn btn-primary" name="btn-comment-update">UPDATE</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</body>

</html>