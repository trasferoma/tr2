<?php
/**
 * Created by PhpStorm.
 * User: f.dearcangelis
 * Date: 29/08/2017
 * Time: 14:43
 */
require_once ("./phplibs/validazione/StrumentiDiValidazioneForm.php");
class ValidazioneFormDettaglioStruttura
{
    private $tipo = false;
    private $attiva = false;
    private $descrizioneIt = false;
    private $descrizioneEn = false;
    private $descrizioneAbjad = false;

    /**
     * ValidazioneFormDettaglioStruttura constructor.
     */
    public function __construct()
    {
        $this->tipo = $this->validazioneTipo();
        $this->attiva = $this->validazioneAttiva();
        $this->descrizioneIt = $this->validazioneDescrizioneIt();
        $this->descrizioneEn = $this->validazioneDescrizioneEn();
        $this->descrizioneAbjad = $this->validazioneDescrizioneAbjad();
    }

    public function datiValidi() {
/*
        echo "<br>data valida:" . $this->dataValida;
        echo "<br>struttura valida:" . $this->strutturaValida;
        exit;
*/
        return $this->tipo && $this->attiva && $this->descrizioneIt && $this->descrizioneEn && $this->descrizioneAbjad;
    }

    private function validazioneTipo()
    {
        $valore = $_REQUEST["tipo"];
        $valorePresente = StrumentiDiValidazioneForm::campoPresente($valore);
        return $valorePresente;
    }

    private function validazioneAttiva()
    {
        $valore = $_REQUEST["attiva"];

        $valorePresente = StrumentiDiValidazioneForm::campoPresente($valore);

        return $valorePresente;
    }

    private function validazioneDescrizioneIt()
    {
        $valore = $_REQUEST["descrizione_it"];

        $valorePresente = StrumentiDiValidazioneForm::campoPresente($valore);

        return $valorePresente;
    }

    private function validazioneDescrizioneEn()
    {
        $valore = $_REQUEST["descrizione_en"];

        $valorePresente = StrumentiDiValidazioneForm::campoPresente($valore);

        return $valorePresente;
    }

    private function validazioneDescrizioneAbjad()
    {
        $valore = $_REQUEST["descrizione_abjad"];

        $valorePresente = StrumentiDiValidazioneForm::campoPresente($valore);

        return $valorePresente;
    }
}