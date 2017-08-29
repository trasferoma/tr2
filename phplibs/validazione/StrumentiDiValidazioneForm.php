<?php
/**
 * Created by PhpStorm.
 * User: f.dearcangelis
 * Date: 29/08/2017
 * Time: 17:11
 */

class StrumentiDiValidazioneForm
{
    /**
     * Verifica che il valore sia diverso da "".
     *
     * @param $valore
     * @return bool
     */
    public function campoPresente($valore)
    {
        return $valore != null && $valore != "";
    }

    /**
     * Verifica che il valore sia una data valida.
     *
     * @param $valore
     * @return bool
     */
    public function isValoreUnaDataValida($valore)
    {
        DateTime::createFromFormat('d/m/Y', $valore);
        $esitoCreazioneData = DateTime::getLastErrors();
        $validazione = $esitoCreazioneData['warning_count'] == 0 && $esitoCreazioneData['error_count'] == 0;

        return $validazione;
    }

    public function dataMaggioreUgualeOggi($valore)
    {
        $dataInserita = DateTime::createFromFormat('d/m/Y', $valore);

        $dataOggi = new DateTime();

        if ( $dataInserita >= $dataOggi ) {
            $validazione = true;
        } else {
            $validazione = false;
        }
        return $validazione;
    }

}