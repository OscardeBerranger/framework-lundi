<?php

namespace Controllers;
use App\File;
use Attributes\DefaultEntity;
use Attributes\TargetEntity;
use Entity\Film;


#[DefaultEntity(entityName: Film::class)]
class FilmController extends AbstractController
{

    public function index()
    {
        return $this->render("films/index", [
            "pageTitle"=>"films",
            "films"=>$this->repository->findAll("titre")
        ]);
    }
    public function show(){
        $id = null;

        if (!empty($_GET['id'])&&ctype_digit($_GET['id'])){
            $id = $_GET['id'];
        }

        if (!$id){return $this->redirect();}

        $film = $this->repository->findById($id);

        if (!$film){return $this->redirect();}

        return $this->render("films/show",[
            "film"=>$film,
            "pageTitle"=>$film->getTitre()
        ]);
    }

    public function create(){
        $titre = null;
        $synopsis = null;

        if (!empty($_POST['titre'])){$titre = $_POST['titre'];}
        if (!empty($_POST['synopsis'])){$synopsis = $_POST['synopsis'];}

        if ($titre && $synopsis){

            $image = new File("imageFilm");

            $film = new Film();

            $film->setTitre($titre);

            $film->setSynopsis($synopsis);

            if ($image->isImage()){$image->upload();}

            $film->setImage($image->getName());

            $this->repository->insert($film);

            return $this->redirect();

        }
        return $this->render("films/create", ["pageTitle"=>"nouveau film"]);
    }

    public function delete(){
        $id = null;

        if (!empty($_GET['id'])){$id = $_GET['id'];}

        $film = $this->repository->findById($id);

        if ($film){
            $this->repository->delete($film);
            return $this->redirect();
        }
        return $this->render("film/index", ["pageTitle"=>"home"]);
    }
}