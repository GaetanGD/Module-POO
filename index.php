<?php
include 'classes/player.php';
// Chargement des classes dépendantes
spl_autoload_register(function($class){
    require_once 'classes/'.$class.'.php';
});

// A-t'on reçu un formulaire ?
if(empty($_POST) == true) {
    // Non, affichage du menu du jeu (formulaire start)
    require 'templates/menu.phtml';
}
else {
    // Oui, exécution du jeu

    // Création du jeu avec les données du formulaire
    $game = new Game($_POST['player-name'], $_POST['player-type']);

    // Exécution du jeu, récupération de la liste des messages
    $game->startGame($_POST['difficulty']);

    // Récupération de l'image du vainqueur

    require 'templates/game-start.phtml';
}

