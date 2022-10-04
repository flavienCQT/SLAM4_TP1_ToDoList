<?php
namespace controllers;

use models\Log;
use utils\Template;
use controllers\base\Web;
use utils\SessionHelpers;



class AuthController extends Web
{
    
    function auth($username = "", $password = "")
    {
        //var_dump($username);
        //var_dump($password);
        $user = strip_tags($username);
        $pass = strip_tags($password);
        if (SessionHelpers::isLogin()) {
            $this->redirect("/");
        }

        $erreur = "";
        if (!empty($user) && !empty($password)) {
            $verificationLogin = new \models\Log();

            $Verif = $verificationLogin->authh($user, $pass);
            if ($Verif != null) {
                SessionHelpers::login($Verif);
                $this->redirect("../todo/liste");
            } else {
                SessionHelpers::logout();
                $this->redirect("../todo/liste");
                $erreur = "Connexion impossible avec vos identifiants";
            }
        }
        
        Template::render("views/users/inscription.php", array("erreur" => $erreur) ); // Affichage de votre vue.
        
    }

    function logout(): void
    {
        SessionHelpers::logout();
        $this->redirect("../users/inscription");
    }
}