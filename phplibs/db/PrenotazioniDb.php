<?php
require_once ("./phplibs/strumenti/StrumentiDate.php");
/*
 *  “s”	Corrisponde a variabili associate al tipo di dato stringa.
 *  “i”	Corrisponde a variabili associate al tipo di dato numeri interi.
 *  “d”	Corrisponde a variabili associate al tipo di dato numeri double.
 *  “b”	Corrisponde a variabili associate al tipo di dato BLOB, formato binario.
 */
class PrenotazioniDb {

    // ---------------------------------------
    static function aggiungiPrenotazionePartenzaDaRoma(&$hCtx, &$prenotazione) {
        PrenotazioniDb::aggiungiPrenotazionePartenzaArrivoDaRoma($hCtx, $prenotazione);
    }

    // ---------------------------------------
    static function aggiungiPrenotazioneDiArrivoInRoma(&$hCtx, &$prenotazione) {
        PrenotazioniDb::aggiungiPrenotazionePartenzaArrivoDaRoma($hCtx, $prenotazione);
    }

    // ---------------------------------------
    static function aggiungiPrenotazionePartenzaArrivoDaRoma(&$hCtx, &$prenotazione) {
        $mysqli = &$hCtx->hDBCtx;

        $listaColonne = "data_arrivo, id_struttura, id_mezzo_piu_orario, numero_adulti, numero_animali, numero_bambini_3_6, numero_bambini_6_11, nome_contatto, cognome_contatto, email_contatto, cellulare_contatto, indirizzo_destinazione, tipo";

        $stmt = $mysqli->prepare("INSERT INTO tr_prenotazioni ($listaColonne) values (?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $data = StrumentiDate::daFormatoItalianoInFormatoDb($prenotazione->getData());

        // echo "<pre>"; print_r($prenotazione); exit;

        @$stmt->bind_param('sddddddssssss',
                            $data,
                            $prenotazione->getStruttura(),
                            $prenotazione->getMezzoPiuOrario(),
                            $prenotazione->getNumeroAdulti(),
                            $prenotazione->getNumeroAnimali(),
                            $prenotazione->getNumeroBambiniDa3A6(),
                            $prenotazione->getNumeroBambiniDa6A12(),
                            $prenotazione->getNomeContatto(),
                            $prenotazione->getCognomeContatto(),
                            $prenotazione->getEmailContatto(),
                            $prenotazione->getCellulareContatto(),
                            $prenotazione->getIndirizzoDestinazione(),
                            $prenotazione->getTipo()
        );

        $stmt->execute();

        // printf("%d Row inserted.\n", $stmt->affected_rows);

        $stmt->close();
    }

    // ---------------------------------------
    static function aggiungiPrenotazioneDiPartenzaDaRoma(&$hCtx, &$prenotazione) {
        $mysqli = &$hCtx->hDBCtx;

        $listaColonne = "data_arrivo, id_struttura, id_mezzo_piu_orario, numero_adulti, numero_animali, numero_bambini_3_6, numero_bambini_6_11, nome_contatto, cognome_contatto, email_contatto, cellulare_contatto, indirizzo_destinazione, tipo";

        $stmt = $mysqli->prepare("INSERT INTO tr_prenotazioni ($listaColonne) values (?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $data = StrumentiDate::daFormatoItalianoInFormatoDb($prenotazione->getData());

        $stmt->bind_param('sddddddssssss',
            $data,
            $prenotazione->getStruttura(),
            $prenotazione->getMezzoPiuOrario(),
            $prenotazione->getNumeroAdulti(),
            $prenotazione->getNumeroAnimali(),
            $prenotazione->getNumeroBambiniDa3A6(),
            $prenotazione->getNumeroBambiniDa6A12(),
            $prenotazione->getNomeContatto(),
            $prenotazione->getCognomeContatto(),
            $prenotazione->getEmailContatto(),
            $prenotazione->getCellulareContatto(),
            $prenotazione->getIndirizzoDestinazione(),
            $prenotazione->getTipo()
        );

        $stmt->execute();

        // printf("%d Row inserted.\n", $stmt->affected_rows);

        $stmt->close();
    }

    static function getIdUltimaPrenotazioneInserita(&$hCtx)
    {
        $mysqli = &$hCtx->hDBCtx;
        return $mysqli->insert_id;
    }
/**
 *	
 */
} // end of class
?>
