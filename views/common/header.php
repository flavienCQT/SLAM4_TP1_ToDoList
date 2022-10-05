<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini MVC Sample</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/style/main.css">
</head>

<body class="<?= isset($_GET['id']) ? 'brick' : '' ?>">
<nav class="navbar navbar-expand-lg navbar-dark bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" style="color: black;" href="/">To Do List</a>
        <ul class="nav nav-pills">
        <li class="nav-item"><a href="./about" class="nav-link">À propos</a></li>
            <?php
            if (\utils\SessionHelpers::isLogin()) {
                echo '<li class="nav-item"><a href="../todo/liste" class="nav-link">Liste</a></li>';
                echo '<li class="nav-item"><a href="./me" class="nav-link">Mon compte</a></li>';
                //echo '<li class="nav-item"><a href="../deco" class="btn btn-">Se deconnecter</a></li>';
                echo '<li class="nav-item"><a href="../deco" class="nav-link" class="bi bi-box-arrow-right">Se deconnecter</a></li>';                
            }
            else {
                echo '<li class="nav-item"><a href="users/inscription" class="nav-link">Se connecter</a></li>';
            }
            ?>
        </ul>
    </div>
</nav>