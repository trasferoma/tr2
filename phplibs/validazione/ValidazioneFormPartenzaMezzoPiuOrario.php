<?php
/**
 * Created by PhpStorm.
 * User: f.dearcangelis
 * Date: 29/08/2017
 * Time: 14:43
 */
require_once ("./phplibs/validazione/StrumentiDiValidazioneForm.php");

class ValidazioneFormPartenzaMezzoPiuOrario
{
    private $mezzoPiuOrario = false;
    private $indirizzoRaccoltaShuttle = false;
    /**
     * ValidazioneFormArrivoMezzoPiuOrario constructor.
     */
    public function __construct()
    {
        $this->mezzoPiuOrario = $this->validazioneMezzoPiuOrario();
        $this->indirizzoRaccoltaShuttle = $this->validazioneIndirizzoRaccoltaShuttle();
    }

    public function datiValidi() {
        return $this->mezzoPiuOrario && $this->indirizzoRaccoltaShuttle;
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
    public function isIndirizzoRaccoltaShuttleValido()
    {
        return $this->indirizzoRaccoltaShuttle;
    }

    private function validazioneIndirizzoRaccoltaShuttle()
    {
        $valore = $_REQUEST["indirizzoRaccoltaShuttle"];
        return StrumentiDiValidazioneForm::campoPresente($valore);
    }
}
?>