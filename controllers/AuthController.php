<?php
namespace controllers;

use utils\Template;
use controllers\base\Web;
use utils\SessionHelpers;



class AuthController extends Web
{
    
    function auth($login = "", $password = "")
    {
        if (SessionHelpers::isLogin()) {
            $this->redirect("/");
        }

        $erreur = "";
        if (!empty($login) && !empty($password)) {
            $loginModel = new \models\Log();

            $user = $loginModel->auth($login, $password);
            if ($user != null) {
                SessionHelpers::login($user);
                $this->redirect("todo/liste");
            } else {
                SessionHelpers::logout();
                $erreur = "Connexion impossible avec vos identifiants";
            }
        }
        
        Template::render("views/users/inscription.php", array("erreur" => $erreur) ); // Affichage de votre vue.
        
    }


}