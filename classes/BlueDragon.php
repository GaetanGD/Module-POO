<?php

class BlueDragon extends Monster{

    public function __construct($name)
    {
        parent::__construct("Blue dragon");

        $this->_pv = random_int(200, 250);
        $this->_pa = random_int(30, 40);
    }

}