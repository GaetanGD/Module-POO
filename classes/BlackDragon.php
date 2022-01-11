<?php

class BlackDragon extends Monster{

    public function __construct($name)
    {
        parent::__construct("Black dragon");

        $this->_pv = random_int(200, 250);
        $this->_pa = random_int(30, 40);
    }

}