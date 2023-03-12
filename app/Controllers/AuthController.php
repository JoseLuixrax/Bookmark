<?php

namespace App\Controllers;

use App\Models\User;

class AuthController extends BaseController
{

    public function AuthLoginAction()
    {
        if (isset($_SESSION["idUsuario"])) {
            header("Location: /bookmarks");
        } else{
            if (isset($_POST["username"]) && isset($_POST["password"])) {
                $user = User::getInstancia();
                $user->setUser($_POST["username"]);
                $user->setPassword($_POST["password"]);
                $data = $user->getByUserAndPass();
                if ($data) {
                    $_SESSION["idUsuario"] = $data[0]["id"];
                    $_SESSION["user"] = $data;
                    header("Location: /bookmarks");
                } else {
                    $this->renderHTML("../views/login_view.php", array("message" => "Usuario o contraseña incorrectos"));
                }
            } else {
                $this->renderHTML("../views/login_view.php", array("message" => ""));
            }
        }
    }

    public function AuthLogoutAction()
    {
        session_destroy();
        header("Location: /");
    }
}
