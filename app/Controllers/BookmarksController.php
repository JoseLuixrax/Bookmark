<?php

namespace App\Controllers;


use App\Models\Bookmarks;
use App\Models\User;

class BookmarksController extends BaseController
{
    public function GetAllAction()
    {
        if (isset($_POST["nombre"]) && $_POST["nombre"] != "") {
            $bookmark = Bookmarks::getInstancia();
            $bookmark->setIdUsuario($_SESSION["idUsuario"]);
            $bookmark->setDescripcion($_POST["nombre"]);
            $data = $bookmark->getByName();
        } else {
            $bookmark = Bookmarks::getInstancia();
            $bookmark->setIdUsuario($_SESSION["idUsuario"]);
            $data = $bookmark->getAll();
        }
        // $data = array("message" => "Hola Mundo");
        $this->renderHTML("../views/index_view.php", $data);
    }

    public function EditAction()
    {
        if (isset($_POST['descripcion']) && isset($_POST['url'])) {
            $request = $_SERVER['REQUEST_URI'];
            $bookmark = Bookmarks::getInstancia();
            // explode("/", $request); // ["", "superheroes", "edit", "1"] otra forma de sacar el id
            $bookmark->setId(explode("/", $request)[3]);  // sacamos el id de la url
            $bookmark->setIdUsuario($_SESSION["idUsuario"]);
            $bookmark->setDescripcion($_POST['descripcion']);
            $bookmark->setBm_url($_POST['url']);
            $bookmark->edit();
            header("Location: /");
        } else {
            $request = $_SERVER['REQUEST_URI'];
            $bookmark = Bookmarks::getInstancia();
            $bookmark->setId(explode("/", $request)[3]);
            $data = $bookmark->get();
            $this->renderHTML("../views/edit_view.php", $data[0]);
        }
    }
}
