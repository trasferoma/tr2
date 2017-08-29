<?php
/**
 * Created by PhpStorm.
 * User: f.dearcangelis
 * Date: 29/08/2017
 * Time: 14:43
 */
require_once ("./phplibs/validazione/StrumentiDiValidazioneForm.php");

class ValidazioneFormArrivoVoloPiuOrario
{
    private $voloPiuOrario = false;
    /**
     * ValidazioneFormArrivoVoloPiuOrario constructor.
     */
    public function __construct()
    {
        $this->voloPiuOrario = $this->validazioneVoloPiuOrario();
    }

    public function datiValidi() {
        /*
                echo "<br>data valida:" . $this->dataValida;
                echo "<br>struttura valida:" . $this->strutturaValida;
                exit;
        */
        return $this->voloPiuOrario;
    }


    private function validazioneVoloPiuOrario()
    {
        $valore = $_REQUEST["voloPiuOrario"];

        $valorePresente = StrumentiDiValidazioneForm::campoPresente($valore);

        return $valorePresente;
    }

    /**
     * @return bool
     */
    public function isVoloPiuOrarioValido()
    {
        return $this->voloPiuOrario;
    }
}