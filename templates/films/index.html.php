<?php foreach($films as $film) : ?>

    <br>
    <hr>
<p><?= $film->getTitre() ?></p>
    <img width="100px" src="images/<?=$film->getImage() ?> ">
<p><?=$film->getSynopsis() ?></p>
<a class="btn btn-success" href="?type=film&action=show&id=<?=$film->getId() ?>">Voir</a> <a class="btn btn-danger" href="?type=film&action=delete&id=<?=$film->getId() ?>">Delete</a>
    <hr>
    <br>
<?php endforeach; ?>