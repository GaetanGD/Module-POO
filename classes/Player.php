<?php

const TYPE_ANGEL   = 'ange';
const TYPE_FIGHTER = 'guerrier';
const TYPE_WIZARD  = 'magicien';

// Classe représentant un joueur humain
class Player{

    private $_name;
    private $_pv;
    private $_pa;
    private $_type;

    public function __construct($nameVal, $typeVal, $difficulty)
    {
        $this->_name = $nameVal;
        $tabPvDifficulty = [
            'facile' => [200, 250],
            'normal' => [170, 200],
            'difficile' => [150, 170]
        ];

        $this->_pv = random_int($tabPvDifficulty[$difficulty][0], $tabPvDifficulty[$difficulty][1]);
        $this->_pa = random_int(50, 80);
        $this->_type = $typeVal;

        echo '<p>Le joueur s\'appel '.$this->_name.', il est du type '.$this->_type.' avec '.$this->_pv.' points de vie.</p>';
    }

    public function getName(){
        return $this->_name;
    }
    public function getPV(){
        return $this->_pv;
    }
    public function getPA(){
        return $this->_pa;
    }
    public function getType(){
        return $this->_type;
    }

    public function setName($name){
        $this->_name = $name;
    }
    public function setPV($pv){
        $this->_pv = $pv;
    }
    public function setPA($pa){
        $this->_pa = $pa;
    }
    public function setType($type){
        $this->_type = $type;
    }

    public function attack($adversaire){
        $randomInt = random_int(0,2);
        switch($randomInt){
            case 0:
                $this->basicAttack($adversaire);
                break;
            case 1:
                $this->attackOfDeath($adversaire);
                break;
            case 2:
                $this->guerison();
                break;
                
        }
    }

    private function basicAttack($adversaire){
        $this->_pa = random_int(80, 100);
        $adversaire->setPv($adversaire->getPv() - $this->_pa);
        echo '<p>Le joueur attaque avec l\'épée et inflige ' . $this->_pa . ' points de dégat à ' . $adversaire->getName() . '</p>';
    }

    private function attackOfDeath($adversaire){
        $adversaire->setPV(0);
        echo '<p>Le joueur attaque avec sont attaque ultime et tue '.$adversaire->getName().'</p>';
    }

    private function guerison(){
        $nbPVPlus = (($this->_pv * 50 ) / 100);
        $this->_pv = $this->_pv + $nbPVPlus;
        echo '<p>Le joueur régénère de '.$nbPVPlus.' points de vie.</p>';
    }

}