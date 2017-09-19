<?php
require_once ("./phplibs/pojo/Viaggio.php");
class Arrivo extends Viaggio {
    public function __construct()
    {
        $this->tipo = "arrivo_in_roma";
    }
}