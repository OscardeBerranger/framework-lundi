<p><?=$film->getTitre() ?></p>
<img width="200px" src="images/<?=$film->getImage() ?>" alt="">
<p><?=$film->getSynopsis() ?></p>
<a class="btn btn-primary" href="?type=film&action=index">retour</a>
<a class="btn btn-danger" href="?type=film&action=delete&id=<?=$film->getId() ?>">Delete</a>