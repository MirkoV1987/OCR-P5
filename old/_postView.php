<?php

foreach($posts as $post): ?>

<h2><?= $post->title(); ?></h2>
<time><?= $post->date_add(); ?></time>
<h3><?= $post->chapeau(); ?></h3>
<p><?= $post->content(); ?></p>
<a href="http://localhost/OCR-P5/post/index" target="_blank">Retour à la liste des posts</a>
<?php endforeach; ?>