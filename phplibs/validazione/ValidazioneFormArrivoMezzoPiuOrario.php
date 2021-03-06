<?php
/**
 * Created by PhpStorm.
 * User: f.dearcangelis
 * Date: 29/08/2017
 * Time: 14:43
 */
require_once ("./phplibs/validazione/StrumentiDiValidazioneForm.php");

class ValidazioneFormArrivoMezzoPiuOrario
{
    private $mezzoPiuOrario = false;
    private $indirizzoDestinazioneValido = false;
    /**
     * ValidazioneFormArrivoMezzoPiuOrario constructor.
     */
    public function __construct()
    {
        $this->mezzoPiuOrario = $this->validazioneMezzoPiuOrario();
        $this->indirizzoDestinazioneValido = $this->validazioneIndirizzoDestinazione();
    }

    public function datiValidi() {
        return $this->mezzoPiuOrario && $this->indirizzoDestinazioneValido;
    }


    private function validazioneMezzoPiuOrario()
    {
        $valore = $_REQUEST["mezzoPiuOrario"];

        $valorePresente = StrumentiDiValidazioneForm::campoPresente($valore);

        return $valorePresente;
    }

    /**
     * @return bool
     */
    public function isMezzoPiuOrarioValido()
    {
        return $this->mezzoPiuOrario;
    }

    /**
     * @return bool
     */
    public function isIndirizzoDestinazioneValido()
    {
        return $this->indirizzoDestinazioneValido;
    }

    private function validazioneIndirizzoDestinazione()
    {
        $valore = $_REQUEST["indirizzoDestinazioneShuttle"];
        return StrumentiDiValidazioneForm::campoPresente($valore);
    }
}
?>