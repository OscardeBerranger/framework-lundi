<?php

namespace Repositories;

use Attributes\TargetEntity;
use Entity\Film;

#[TargetEntity(entityName: Film::class)]
class FilmRepository extends AbstractRepository
{
    public function insert(Film $film){
        $request = $this->pdo->prepare("INSERT INTO {$this->tableName} SET titre = :titre, synopsis = :synopsis, image = :image");

        $request->execute([
            "titre"=>$film->getTitre(),
            "synopsis"=>$film->getSynopsis(),
            "image"=>$film->getImage()
        ]);
    }

}