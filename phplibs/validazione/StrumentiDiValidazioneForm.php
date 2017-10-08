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
    static public function campoPresente($valore)
    {
        return $valore != null && $valore != "";
    }

    /**
     * Verifica che il valore sia una data valida.
     *
     * @param $valore
     * @return bool
     */
    static public function isValoreUnaDataValida($valore)
    {
        DateTime::createFromFormat('d/m/Y', $valore);
        $esitoCreazioneData = DateTime::getLastErrors();
        $validazione = $esitoCreazioneData['warning_count'] == 0 && $esitoCreazioneData['error_count'] == 0;

        return $validazione;
    }

    static public function dataMaggioreUgualeOggi($valore)
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

    static public function isNumericoMaggioreUgualeZero($valore)
    {
        $campoNumericoValido = false;

        $presente = StrumentiDiValidazioneForm::campoPresente($valore);

        if ($presente) {
            $campoNumericoValido = is_numeric($valore) && $valore >= 0;
        }

        return $presente && $campoNumericoValido;
    }

    /**
     * Elimina i caratteri non numerici, il risultato è considerato un numero di telefono se
     * il numero complessivo è della dimensione 7 o 10.
     *
     * @param $valore
     * @return bool
     */
    static function isValoreUnNumeroDiTelefono($valore) {
        $soloNumeri = preg_replace('/\D/', '', $valore);
        $numeroDicaratteri = strlen($soloNumeri);

        return $numeroDicaratteri == 7 or $numeroDicaratteri == 10;
    }

    public static function isValoreUnaEmail($valore)
    {
        return filter_var($valore, FILTER_VALIDATE_EMAIL);
    }
}