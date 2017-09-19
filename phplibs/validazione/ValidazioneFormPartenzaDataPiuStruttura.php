<?php
/**
 * Created by PhpStorm.
 * User: f.dearcangelis
 * Date: 29/08/2017
 * Time: 14:43
 */
require_once ("./phplibs/validazione/StrumentiDiValidazioneForm.php");
class ValidazioneFormPartenzaDataPiuStruttura
{
    private $dataValida = false;
    private $strutturaValida = false;
    /**
     * ValidazioneFormArrivoDataPiuStruttura constructor.
     */
    public function __construct()
    {
        $this->dataValida = $this->validazioneDataPartenza();
        $this->strutturaValida = $this->validazioneStruttura();
    }

    public function datiValidi() {
/*
        echo "<br>data valida:" . $this->dataValida;
        echo "<br>struttura valida:" . $this->strutturaValida;
        exit;
*/
        return $this->dataValida && $this->strutturaValida;
    }

    private function validazioneDataPartenza()
    {
        $validazione = false;

        $valorePresente = false;
        $valoreDataValida = false;
        $dataArrivoAccettabile = false;

        $valore = $_REQUEST["dataDiPartenza"];
        $valorePresente = StrumentiDiValidazioneForm::campoPresente($valore);

        if ($valorePresente) {
            $valoreDataValida = StrumentiDiValidazioneForm::isValoreUnaDataValida($valore);

            if ($valoreDataValida) {
                $dataArrivoAccettabile = $this->isDataPartenzaAccettabile($valore);
            }
        }

        $validazione = $valorePresente && $valoreDataValida && $dataArrivoAccettabile;

        return $validazione;
    }

    private function validazioneStruttura()
    {
        $valore = $_REQUEST["struttura"];

        $valorePresente = StrumentiDiValidazioneForm::campoPresente($valore);

        return $valorePresente;
    }

    private function isDataPartenzaAccettabile($valore)
    {
        $validazione = StrumentiDiValidazioneForm::dataMaggioreUgualeOggi($valore);

        return $validazione;
    }

    /**
     * @return bool
     */
    public function isDataValida()
    {
        return $this->dataValida;
    }

    /**
     * @return bool
     */
    public function isStrutturaValida()
    {
        return $this->strutturaValida;
    }
}