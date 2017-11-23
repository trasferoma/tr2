<?php
require_once("./phplibs/db/PrenotazioniDb.php");
require_once("./phplibs/db/PasseggeriDb.php");
require_once("./phplibs/db/ShuttleDb.php");



class GestorePrenotazione
{
    /**
     * - Salva la prenotazione;
     * - Numero di passeggeri del gruppo;
     * - Prendi shuttle (o crealo) dove entra il gruppo;
     * - Inserisci i passeggeri nello shuttle;
     *
     * @param $hCtx
     * @param $partenza
     */
    public function aggiungiPrenotazionePartenzaDaRoma(&$hCtx, &$partenza)
    {
        PrenotazioniDb::aggiungiPrenotazionePartenzaDaRoma($hCtx, $partenza);
        $idPrenotazione = PrenotazioniDb::getIdUltimaPrenotazioneInserita($hCtx);

        $numeroPasseggeri = $partenza->getNumeroPasseggeriComplessivo();
        $shuttle = $this->getShuttleConPostoPerIlGruppo($hCtx, $partenza, $numeroPasseggeri);

        $this->aggiungiPasseggeriAdultiAdUnoShuttle($hCtx, $partenza, $idPrenotazione, $shuttle["id"]);
        $this->aggiungiPasseggeriBambiniDa3a6AdUnoShuttle($hCtx, $partenza, $idPrenotazione, $shuttle["id"]);
        $this->aggiungiPasseggeriBambiniDa6a12AdUnoShuttle($hCtx, $partenza, $idPrenotazione, $shuttle["id"]);
    }
    /**
     * - Inserisce la prenotazione sul DB
     * - Numero di passeggeri del gruppo;
     * - Prendi shuttle (o crealo) dove entra il gruppo;
     * - Inserisci i passeggeri nello shuttle;
     *
     */
    public function aggiungiPrenotazioneDiArrivoInRoma(&$hCtx, &$arrivo)
    {
        PrenotazioniDb::aggiungiPrenotazioneDiArrivoInRoma($hCtx, $arrivo);
        $idPrenotazione = PrenotazioniDb::getIdUltimaPrenotazioneInserita($hCtx);

        $numeroPasseggeri = $arrivo->getNumeroPasseggeriComplessivo();

        $shuttle = $this->getShuttleConPostoPerIlGruppo($hCtx, $arrivo, $numeroPasseggeri);

        $this->aggiungiPasseggeriAdultiAdUnoShuttle($hCtx, $arrivo, $idPrenotazione, $shuttle["id"]);
        $this->aggiungiPasseggeriBambiniDa3a6AdUnoShuttle($hCtx, $arrivo, $idPrenotazione, $shuttle["id"]);
        $this->aggiungiPasseggeriBambiniDa6a12AdUnoShuttle($hCtx, $arrivo, $idPrenotazione, $shuttle["id"]);
    }

    public function getShuttleConPostoPerIlGruppo(&$hCtx, $viaggio, $numeroPasseggeri) {
        $shuttleAperto = null;
        $listaShuttle = ShuttleDb::getByViaggio($hCtx, $viaggio);

       // echo "<pre>"; print_r($listaShuttle); exit;

        $trovato = false;

        if (is_array($listaShuttle))
        {
            foreach ($listaShuttle as &$shuttle)
            {
                if (($shuttle["numeroPasseggeriPresenti"] + $numeroPasseggeri) <= MASSIMO_NUMERO_PASSEGGERI_PER_SHUTTLE)
                {
                    $trovato = true;
                    // $shuttleAperto = $shuttle;
                    break;
                }
            }
        }

        if ($trovato == false)
        {
            ShuttleDb::creaShuttleByViaggio($hCtx, $viaggio);
            $idShuttle = ShuttleDb::getIdUltimoShuttleInserito($hCtx);
            $shuttle = ShuttleDb::getById($hCtx, $idShuttle);
        }

        $shuttleAperto = $shuttle;

        // echo "<pre>"; print_r($shuttleAperto); exit;

        return $shuttleAperto;
    }

    public function aggiungiPasseggeriAdultiAdUnoShuttle(&$hCtx, &$viaggio, $idPrenotazione, $idShuttle) {
        for ($i = 0; $i < $viaggio->getNumeroAdulti(); $i++) {
            PasseggeriDb::creaPasseggeroAdulto($hCtx, $idPrenotazione, $idShuttle);
        }
    }

    public function aggiungiPasseggeriBambiniDa3a6AdUnoShuttle(&$hCtx, &$viaggio, $idPrenotazione, $idShuttle) {
        for ($i = 0; $i < $viaggio->getNumeroBambiniDa3A6(); $i++) {
            PasseggeriDb::creaPasseggeroBambinoDa3A6($hCtx, $idPrenotazione, $idShuttle);
        }
    }

    public function aggiungiPasseggeriBambiniDa6a12AdUnoShuttle(&$hCtx, &$viaggio, $idPrenotazione, $idShuttle) {
        for ($i = 0; $i < $viaggio->getNumeroBambiniDa6A12(); $i++) {
            PasseggeriDb::creaPasseggeroBambinoDa6A12($hCtx, $idPrenotazione, $idShuttle);
        }
    }

    /**
     * Prende la lista degli shuttle per uno specifico viaggio, ne cerca uno che abbia ancora posti vuoti.
     * Se non trova shuttle disponibili ne crea uno nuovo.
     *
     * @param $hCtx
     * @param $viaggio
     * @return mixed
     */
    public function getShuttleAncoraAperto(&$hCtx, &$viaggio)
    {
        $shuttleAperto = null;
        $listaShuttle = ShuttleDb::getByViaggio($hCtx, $viaggio);

        // echo "<pre>"; print_r($listaShuttle); exit;

        $trovato = false;

        if (is_array($listaShuttle) ) {
            foreach ($listaShuttle as &$shuttle) {
                if ($shuttle["numeroPasseggeriPresenti"] < MASSIMO_NUMERO_PASSEGGERI_PER_SHUTTLE) {
                    $trovato = true;
                    $shuttleAperto = $shuttle;
                    break;
                }
            }
        }

        if ($trovato == false) {
            ShuttleDb::creaShuttleByViaggio($hCtx, $viaggio);
            return $this->getShuttleAncoraAperto($hCtx, $viaggio);
        }

        return $shuttleAperto;
    }

}