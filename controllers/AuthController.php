<?php
namespace controllers;

use models\Log;
use utils\Template;
use controllers\base\Web;
use utils\SessionHelpers;



class AuthController extends Web
{
    
    function create($username = "", $password = "",$password1 = "", $mail = "")
    {

        $loginInscrire = htmlspecialchars($username);
        $mailInscrire = htmlspecialchars($mail);
        $mdp1 = strip_tags($password);
        $mdp2 = strip_tags($password1);
        $verificationLogin = new \models\Log();
        $VerifLoginInscrire = $verificationLogin->VerifLogin($loginInscrire);
        if(!$VerifLoginInscrire){
            if ($mdp1 == $mdp2 && !empty($password) && !empty($password1))
            {          
                $this->Log->createA($username, $password,$mail);
                $this->redirect("../users/inscription");
            }
            else
            {
                $erreur = "Vos mots de passe ne sont pas identiques";
            }
        }else $erreur = "Un compte portant se nom éxiste déjà";
        Template::render("views/users/connexion.php" , array('erreur' => $erreur));    
    }


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
                $this->redirect("./inscription");
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

    function inscrire(): void
    {
        Template::render("views/users/inscription.php", array());
    }
}