<?php
require_once ("./phplibs/pojo/Viaggio.php");
class Partenza extends Viaggio {
    public function __construct()
    {
        $this->tipo = "partenza_da_roma";
    }

    public function getIndirizzoRaccoltaShuttle() {
        return $this->indirizzoDestinazione;
    }

    public function setIndirizzoRaccoltaShuttle($indirizzo) {
        $this->indirizzoDestinazione = $indirizzo;
    }
}
?>