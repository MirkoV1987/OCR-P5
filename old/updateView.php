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
 <!--UPDATE POST-->
      <h2 style="color:red">Mettre à jour le post</h2>
      <form action="http://localhost/OCR-P5/post/update/" method="post">
            <input type="hidden" class="form-control" name="id" id="id" value="<?= htmlspecialchars($post['id']); ?>">
        <div class="form-group">
            <label for="title">Title :</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Entrez le titre" value="<?= htmlspecialchars($post['title']); ?>">
        </div>
        <div class="form-group">
              <label for="text">Chapeau :</label>
            <input type="text" class="form-control" name="chapeau" id="chapeau" placeholder="Entrez le chapeau" value="<?= htmlspecialchars($post['chapeau']); ?>">
        </div>
        <!-- <div class="form-group">
              <label for="text">Date :</label>
            <input type="text" class="form-control" name="date" id="date" placeholder="Entrez la date" value="<?= htmlspecialchars($post['date_add_fr']); ?>">
        </div> -->
        <div class="form-group">
              <label for="text">Content :</label>
              <textarea type="textarea" class="form-control" name="content" id="content" rows="8" placeholder="Écrivez ici votre message" value=""><?= htmlspecialchars($post['content']); ?></textarea>
        </div>
        <div class="row text-center">
               <button type="submit" class="btn btn-primary" name="btn-update">UPDATE</button>
        </div>
       </form>
       </div>
    </div>
 </div>
</body>

</html>