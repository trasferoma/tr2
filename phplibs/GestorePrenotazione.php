<?php
require_once("./phplibs/db/PrenotazioniDb.php");
require_once("./phplibs/db/PasseggeriDb.php");
require_once("./phplibs/db/ShuttleDb.php");



class GestorePrenotazione
{
    /**
     * - Inserisce la prenotazione sul DB
     *
     * - crea i record passeggeri
     * - per ogni passeggero:
     *      - prende lo shuttle con posto libero (se non c'e' lo crea)
     *      - inserisce il passeggero
     *
     */
    public function aggiungiPrenotazioneDiArrivoInRoma(&$hCtx, &$arrivo)
    {
        PrenotazioniDb::aggiungiPrenotazioneDiArrivoInRoma($hCtx, $arrivo);
        $idPrenotazione = PrenotazioniDb::getIdUltimaPrenotazioneInserita($hCtx);

        $this->aggiungiPasseggeriAdultiAdUnoShuttle($hCtx, $arrivo, $idPrenotazione);
        // $this->aggiungiPasseggeriBambiniDa3a6AdUnoShuttle($hCtx, $arrivo, $idPrenotazione);
        // $this->aggiungiPasseggeriBambiniDa6a11AdUnoShuttle($hCtx, $arrivo, $idPrenotazione);
    }

    public function aggiungiPasseggeriAdultiAdUnoShuttle(&$hCtx, &$viaggio, $idPrenotazione) {

        $numeroPostiDisponibili = 0;

        for ($i = 0; $i < $viaggio->getNumeroAdulti(); $i++) {
            if ($numeroPostiDisponibili == 0) {
                $shuttle = $this->getShuttleAncoraAperto($hCtx, $viaggio);
                $numeroPostiDisponibili = $shuttle["numeroPasseggeriPresenti"];
            }

            PasseggeriDb::creaPasseggeroAdulto($hCtx, $idPrenotazione, $shuttle["id"]);
            // $idPasseggero = PasseggeriDb::getIdUltimoPasseggeroInserito($hCtx);

            $numeroPostiDisponibili--;
        }
    }

    public function aggiungiPasseggeriBambiniDa3a6AdUnoShuttle(&$hCtx, &$viaggio, $idPrenotazione) {

        $numeroPostiDisponibili = 0;

        for ($i = 0; $i < $viaggio->getNumeroBambiniDa3A6(); $i++) {
            if ($numeroPostiDisponibili == 0) {
                $shuttle = $this->getShuttleAncoraAperto($hCtx, $viaggio);
                $numeroPostiDisponibili = $shuttle["numeroPasseggeriPresenti"];
            }

            PasseggeriDb::creaPasseggeroBambinoDa3A6($hCtx, $idPrenotazione, $shuttle["id"]);

            $numeroPostiDisponibili--;
        }
    }

    public function aggiungiPasseggeriBambiniDa6a11AdUnoShuttle(&$hCtx, &$viaggio, $idPrenotazione) {

        $numeroPostiDisponibili = 0;

        for ($i = 0; $i < $viaggio->getNumeroBambiniDa6A11(); $i++) {
            if ($numeroPostiDisponibili == 0) {
                $shuttle = $this->getShuttleAncoraAperto($hCtx, $viaggio);
                $numeroPostiDisponibili = $shuttle["numeroPasseggeriPresenti"];
            }

            PasseggeriDb::creaPasseggeroBambinoDa6A11($hCtx, $idPrenotazione, $shuttle["id"]);

            $numeroPostiDisponibili--;
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
        $listaShuttle = ShuttleDb::getByViaggio($hCtx, $viaggio);

        if (is_array($listaShuttle)) {
            foreach ($listaShuttle as &$shuttle) {
                if ($shuttle["numeroPasseggeriPresenti"] < MASSIMO_NUMERO_PASSEGGERI_PER_SHUTTLE) {
                    return $shuttle;
                }
            }
        } else {
            ShuttleDb::creaShuttleByViaggio($hCtx, $viaggio);
            return getShuttleAncoraAperto($hCtx, $viaggio);
        }
    }

}