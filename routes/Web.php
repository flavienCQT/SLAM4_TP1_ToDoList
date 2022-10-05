<?php

namespace routes;

use routes\base\Route;
use controllers\Account;
use controllers\AuthController;
use controllers\TodoWeb;
use controllers\VideoWeb;
use utils\SessionHelpers;
use controllers\SampleWeb;
use controllers\usersController;

class Web
{
    function __construct()
    {
        $main = new SampleWeb();

        Route::Add('/', [$main, 'home']);
        Route::Add('/about', [$main, 'about']);
        Route::Add('/users/inscription', [$main, 'inscription']);
        /*Route::Add('/sample/{id}', [$main, 'sample']);
        Route::Add('/todos/liste', [$main, 'liste']);
        Route::Add('/todos/liste', [$main, 'liste']);*/

        $authentification = new AuthController();

        Route::Add('/users/inscription', [$authentification, 'auth']);
        Route::Add('/users/home', [$authentification, 'home']);
        Route::Add('/users/authh', [$authentification, 'auth']);
        //Route::Add('/login/inscrire', [$Auth, 'inscrire']);
        //Route::Add('/users/create', [$Auth, 'create']);

        //        Exemple de limitation d'accès à une page en fonction de la SESSION.
        //        if (SessionHelpers::isLogin()) {
        //            Route::Add('/logout', [$main, 'home']);
        //        }

        $todo = new TodoWeb();
        if (SessionHelpers::isLogin()){
        Route::Add('/todo/liste', [$todo, 'liste']);
        Route::Add('/todo/listeUser', [$todo, 'listeUser']);
        Route::Add('/todo/ajouter', [$todo, 'ajouter']);
        Route::Add('/todo/terminer', [$todo, 'terminer']);
        Route::Add('/todo/supprimer', [$todo, 'supprimer']);
        Route::Add('/sample/{id}', [$todo, 'sample']);
        Route::Add('/deco', [$authentification, 'logout']);
        }
        

    }
}

