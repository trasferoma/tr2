<?php
/*
 *  “s”	Corrisponde a variabili associate al tipo di dato stringa.
 *  “i”	Corrisponde a variabili associate al tipo di dato numeri interi.
 *  “d”	Corrisponde a variabili associate al tipo di dato numeri double.
 *  “b”	Corrisponde a variabili associate al tipo di dato BLOB, formato binario.
 */
class PrenotazioniDb {

    // ---------------------------------------
    static function aggiungiPrenotazioneDiArrivoInRoma(&$hCtx, &$arrivo) {
        $mysqli = &$hCtx->hDBCtx;
        $uname = "Jester";

        $stmt  = $mysqli->prepare("INSERT INTO tr_prenotazione (nome) value (?)");
        $stmt->bind_param('s', $uname);
        $stmt->execute();

        printf("%d Row inserted.\n", $stmt->affected_rows);

        $stmt->close();
    }


/**
 *	
 */
} // end of class
?>
