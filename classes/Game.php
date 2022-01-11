<?php

const DIFFICULTY_EASY   = 'facile';
const DIFFICULTY_HARD   = 'difficile';
const DIFFICULTY_NORMAL = 'normal';


// Classe représentant le jeu en lui-même

/*
 * Cette classe est l'élément central du programme : elle manipule notamment le joueur
 * et le monstre pour qu'ils se battent jusqu'à la mort. Elle doit les instancier,
 * les initialiser, les "faire jouer" et obtenir des résultats : une liste de messages
 * générés pendant le jeu et l'image du vainqueur final.
 */
class Game{

    private $_winnner;
    private $_playerName;
    private $_playerType;

    public function __construct($playerName, $playerType)
    {
        $this->_playerName = $playerName;
        $this->_playerType = $playerType;
    }

    public function startGame($difficulty){

        echo '<p>Demarrage du jeu en mode normal</p>';

        $player = new Player($this->_playerName, $this->_playerType, $difficulty);
        $BoneDragon = new RedDragon("Dragon squelette");
        $blackDragon = new BlackDragon("Dragon Noir");
        $GreenDragon = new BlueDragon("Dragon vert");

        $tabDragon = [$BoneDragon, $blackDragon, $GreenDragon];

        $BoneDragon->intro();
        $blackDragon->intro();
        $GreenDragon->intro();

        while(
            $player->getPv() >= 0 && count($tabDragon) > 0
        ){

            $pileOuFace = random_int(0,1);
            $randomInt = random_int(0, count($tabDragon) - 1);
            if($pileOuFace == 1){
                //attaque du joueur
                $player->attack($tabDragon[$randomInt]);

            }else{
                //attaque du dragon
                $tabDragon[$randomInt]->attack($player);
                $tabDragon[$randomInt]->explain($player);
            }

            foreach($tabDragon as $key => $val){
                if($val->getPv() <= 0){
                    array_splice($tabDragon, $key, 1);
                }
            }
        }

        if($player->getPV() <= 0){
            if($BoneDragon->getPV() > 0)
            {
                echo '<img src="www/images/bone-dragon.png">';
            }
            if($blackDragon->getPV() > 0)
            {
                echo '<img src="www/images/black-dragon.png">';
            }
            if($GreenDragon->getPV() > 0)
            {
                echo '<img src="www/images/green-dragon.png">';
            }
            
        }else{
            echo '<img src="www/images/wizard.png">';
        }

    }

}