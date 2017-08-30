<?php
/**
 * Created by PhpStorm.
 * User: f.dearcangelis
 * Date: 29/08/2017
 * Time: 14:43
 */
require_once ("./phplibs/validazione/StrumentiDiValidazioneForm.php");
class ValidazioneFormPasseggeri
{
    private $numeroAdultiValida = false;
    private $numeroAnimaliValida = false;
    private $numeroBambiniDa3A6Valida = false;
    private $numeroBambiniDa6A12Valida = false;
    private $nomeContattoValida = false;
    private $cognomeContattoValida = false;
    private $emailContattoValida = false;
    private $cellulareContattoValida = false;

    /**
     * ValidazioneFormArrivoDataPiuStruttura constructor.
     */
    public function __construct()
    {
        $this->numeroAdultiValida = $this->validazioneNumeroAdulti();
        $this->numeroAnimaliValida = $this->validazioneNumeroAnimali();
        $this->numeroBambiniDa3A6Valida = $this->validazioneNumeroBambiniDa3A6();
        $this->numeroBambiniDa6A12Valida = $this->validazioneNumeroBambiniDa6A12();
        $this->nomeContattoValida = $this->validazioneNomeContatto();
        $this->cognomeContattoValida = $this->validazioneCognomeContatto();
        $this->emailContattoValida = $this->validazioneEmailContatto();
        $this->cellulareContattoValida = $this->validazioneCellulareContatto();
    }

    public function datiValidi() {
        return      $this->numeroAdultiValida
                &&  $this->numeroAnimaliValida
                &&  $this->numeroBambiniDa3A6Valida
                &&  $this->numeroBambiniDa6A12Valida
                &&  $this->nomeContattoValida
                &&  $this->cognomeContattoValida
                &&  $this->emailContattoValida
                &&  $this->cellulareContattoValida
            ;
    }


    private function validazioneNumeroAdulti()
    {
        $valore = $_REQUEST["numeroAdulti"];
        return StrumentiDiValidazioneForm::isNumericoMaggioreUgualeZero($valore);
    }

    private function validazioneNumeroAnimali()
    {
        $valore = $_REQUEST["numeroAnimali"];
        return StrumentiDiValidazioneForm::isNumericoMaggioreUgualeZero($valore);
    }

    private function validazioneNumeroBambiniDa3A6()
    {
        $valore = $_REQUEST["numeroBambiniAnni3Anni6"];
        return StrumentiDiValidazioneForm::isNumericoMaggioreUgualeZero($valore);
    }

    private function validazioneNumeroBambiniDa6A12()
    {
        $valore = $_REQUEST["numeroBambiniAnni6Anni12"];
        return StrumentiDiValidazioneForm::isNumericoMaggioreUgualeZero($valore);
    }

    private function validazioneNomeContatto()
    {
        $valore = $_REQUEST["nomeContatto"];
        return StrumentiDiValidazioneForm::campoPresente($valore);
    }

    private function validazioneCognomeContatto()
    {
        $valore = $_REQUEST["cognomeContatto"];
        return StrumentiDiValidazioneForm::campoPresente($valore);
    }

    private function validazioneCellulareContatto()
    {
        $valore = $_REQUEST["cellulareContatto"];
        return StrumentiDiValidazioneForm::isValoreUnNumeroDiTelefono($valore);
    }

    private function validazioneEmailContatto()
    {
        $valore = $_REQUEST["emailContatto"];
        return StrumentiDiValidazioneForm::isValoreUnaEmail($valore);
    }
}