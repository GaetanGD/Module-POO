<?php
/*
 * Classe représentant tout type de monstre.
 * 
 * Elle n'est jamais directement instanciée, il s'agit d'une classe abstraite.
 * Une classe abstraite n'est pas entièrement implémentée, il faut passer par une
 * classe enfant qui sera plus concrète.
 */
abstract class Monster{

    private $_name;
    protected $_pv;
    protected $_pa;

    public function __construct($nameVal)
    {
        $this->_name = $nameVal;
    }

    public function intro(){
        echo '<p>Le monstre est un '.$this->_name.' avec '.$this->_pv.' points de vie.</p>';
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

    public function setName($name){
        $this->_name = $name;
    }
    public function setPV($pv){
        $this->_pv = $pv;
    }
    public function setPA($pa){
        $this->_pa = $pa;
    }

    public function attack($adversaire){
        $this->_pa = random_int(20, 40);
        $adversaire->setPv($adversaire->getPv() - $this->_pa);
    }

    public function explain($adversaire){
        echo '<p>Le '.$this->_name.' attaque et inflige ' . $this->_pa . ' point de dégat a ' . $adversaire->getName() . '</p>';
    }

}