<?php
/**
 * Created by PhpStorm.
 * User: f.dearcangelis
 * Date: 29/08/2017
 * Time: 14:43
 */
require_once ("./phplibs/validazione/StrumentiDiValidazioneForm.php");
class ValidazioneFormDestinazioneShuttle
{
    private $nomeDestinazioneValido = false;
    private $indirizzoDestinazioneValido = false;

    /**
     * ValidazioneFormArrivoDataPiuStruttura constructor.
     */
    public function __construct()
    {
        $this->nomeDestinazioneValido = $this->validazioneNomeDestinazione();
        $this->indirizzoDestinazioneValido = $this->validazioneIndirizzoDestinazione();
    }

    public function datiValidi() {
        return      $this->nomeDestinazioneValido
                &&  $this->indirizzoDestinazioneValido
            ;
    }

    private function validazioneNomeDestinazione()
    {
        $valore = $_REQUEST["nomeDestinazioneShuttle"];
        return StrumentiDiValidazioneForm::campoPresente($valore);
    }

    private function validazioneIndirizzoDestinazione()
    {
        $valore = $_REQUEST["indirizzoDestinazioneShuttle"];
        return StrumentiDiValidazioneForm::campoPresente($valore);
    }
}