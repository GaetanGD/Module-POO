<?php

class RedDragon extends Monster{

    public function __construct($name)
    {
        parent::__construct("Red dragon");

        $this->_pv = random_int(200, 250);
        $this->_pa = random_int(30, 40);
    }

}